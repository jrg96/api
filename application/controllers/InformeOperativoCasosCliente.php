<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformeOperativoCasosCliente extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('seguridad_helper');
		$this->load->library('M_pdf');
		
		$this->load->model('UsuarioSistema_model');
		$this->load->model('Cliente_model');
		$this->load->model('Caso_model');
    }
    
    public function index()
    {

        ////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'abogado', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'abogado', $this->UsuarioSistema_model));
		}
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido al informe táctico de capacidad de cuentas por empleado");
		
		
		/////////////////////////// Recoleccion de datos ///////////////////////////////////////////
		$clientes = $this->Cliente_model->obtener_lista_datos_cliente_2();

        /////////////////////////// Zona de despliegue /////////////////////////////////////////////
		date_default_timezone_set('America/El_Salvador');
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'usuario_tipo' => $this->session->userdata('tipo'),
			'fecha_actual' => date('d/m/Y'),
			'nombre_usuario' => 'Usuario01',
			'nombre_pantalla' => 'Generar informe operativo',
			'clientes' => $clientes
        ));
        $this->smarty->view('informe_operativo_02.php');
    }
	
	
	public function post_informe()
	{
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'tactico', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'tactico', $this->UsuarioSistema_model));
		}
		
		//////////////////////////////////// Recolección de datos //////////////////////////////////
		$id_datos_cliente = $this->input->post('id_datos_cliente');
		
		
		// Creando reporte
		$lista_clientes = $this->Cliente_model->obtener_lista_datos_cliente_2();
		
		if ($id_datos_cliente != '-1')
		{
			$lista_clientes = array($this->Cliente_model->obtener_datos_cliente($id_datos_cliente));
		}
		
		
		$clientes = array();
		foreach ($lista_clientes as $cliente)
		{
			$clien = array();
			$clien['nombre_cliente'] = $cliente['apellidos'] . ', ' . $cliente['nombres'];
			
			$nombre_caso = array();
			$fecha_inicio_caso = array();
			$fecha_fin_caso = array();
			$estado_caso = array();
			$nombre_abogado = array();
			
			$lista_casos = $this->Caso_model->obtener_lista_caso_juridico_3($cliente['id_datos_cliente']);
			$total_proceso = 0;
			$total_terminado = 0;
			
			foreach ($lista_casos as $caso)
			{
				// Modificar fechas
				$caso['fecha_creacion'] = explode(" ", $caso['fecha_creacion'])[0];
				$caso['fecha_creacion'] = explode("-", $caso['fecha_creacion'])[2] . '/' . explode("-", $caso['fecha_creacion'])[1] . '/' . explode("-", $caso['fecha_creacion'])[0];
				
				if (empty($caso['fecha_terminacion']))
				{
					$caso['fecha_terminacion'] = 'N/A';
				}
				else
				{
					$caso['fecha_terminacion'] = explode(" ", $caso['fecha_terminacion'])[0];
					$caso['fecha_terminacion'] = explode("-", $caso['fecha_terminacion'])[2] . '/' . explode("-", $caso['fecha_terminacion'])[1] . '/' . explode("-", $caso['fecha_terminacion'])[0];
				}
				
				if ($caso['estado_caso'] == 'proceso')
				{
					$caso['estado_caso'] = 'EN PROCESO';
					$total_proceso += 1;
				}
				else
				{
					$caso['estado_caso'] = 'TERMINADO';
					$total_terminado += 1;
				}
				
				array_push($nombre_caso, $caso['nombre_caso']);
				array_push($fecha_inicio_caso, $caso['fecha_creacion']);
				array_push($fecha_fin_caso, $caso['fecha_terminacion']);
				array_push($estado_caso, $caso['estado_caso']);
				array_push($nombre_abogado, $caso['apellidos'] . ', ' . $caso['nombres']);
			}
			
			$clien['nombre_caso'] = $nombre_caso;
			$clien['fecha_inicio_caso'] = $fecha_inicio_caso;
			$clien['fecha_fin_caso'] = $fecha_fin_caso;
			$clien['estado_caso'] = $estado_caso;
			$clien['nombre_abogado'] = $nombre_abogado;
			$clien['total_proceso'] = $total_proceso;
			$clien['total_terminado'] = $total_terminado;
			
			array_push($clientes, $clien);
		}

		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido a la previsualización del informe táctico de capacidad de cuentas por empleado con parametros fecha_inicio=$fecha_inicio, fecha_fin=$fecha_fin, id_empleado=$id_empleado");
		
		
		
		// Persistir array en session
		$this->session->set_userdata('resultado_consulta', json_encode($clientes));
		
		// Imprimir resutado
		echo json_encode($clientes);
	}
	
	public function imprimir_informe()
	{
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'abogado', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'abogado', $this->UsuarioSistema_model));
		}
		
		$clientes = json_decode($this->session->userdata('resultado_consulta'), true);
		
		// Armar HTML
		$html = '';
		for ($i = 0; $i < count($clientes); $i++)
		{
			$html .= "<table style='font-family: arial, sans-serif; font-size: 12pt; border-collapse: collapse; border: 1px solid black; width:100%'>";							
			$html .= "<tr>";
			$html .= '<th colspan="5" style="border: 1px solid black;">' . $clientes[$i]['nombre_cliente'] . '</th>';
			$html .= "</tr>";
				
			$html .= "<tr>";
			$html .= '<th style="width: 20%; border: 1px solid black; text-align: center;">Nombre</th>';
			$html .= '<th style="width: 20%; border: 1px solid black; text-align: center;">Fecha inicio</th>';
			$html .= '<th style="width: 20%; border: 1px solid black; text-align: center;">Fecha fin</th>';
			$html .= '<th style="width: 20%; border: 1px solid black; text-align: center;">Estado</th>';
			$html .= '<th style="width: 20%; border: 1px solid black; text-align: center;">Atendido por</th>';
			$html .= "</tr>";
			
			for ($j = 0; $j < count($clientes[$i]['nombre_caso']); $j++)
			{
				$html .= '<tr>';
				$html .= '<td style="width: 20%; border: 1px solid black;">' . $clientes[$i]['nombre_caso'][$j] . '</td>';
				$html .= '<td style="width: 20%; border: 1px solid black; text-align: center;">' . $clientes[$i]['fecha_inicio_caso'][$j] . '</td>';
				$html .= '<td style="width: 20%; border: 1px solid black; text-align: center;">' . $clientes[$i]['fecha_fin_caso'][$j] . '</td>';
				$html .= '<td style="width: 20%; border: 1px solid black; text-align: center;">' . $clientes[$i]['estado_caso'][$j] . '</td>';
				$html .= '<td style="width: 20%; border: 1px solid black; text-align: center;">' . $clientes[$i]['nombre_abogado'][$j] . '</td>';
				$html .= '</tr>';
			}
			
			$html .= "<tr>";
			$html .= '<td style="width: 80%; border: 1px solid black;" colspan="4">Total de casos en proceso</td>';
			$html .= '<td style="width: 20%; border: 1px solid black; text-align: center;">' . $clientes[$i]['total_proceso'] . '</td>';
			$html .= '</tr>';
			
			$html .= "<tr>";
			$html .= '<td style="width: 80%; border: 1px solid black;" colspan="4">Total de casos terminados</td>';
			$html .= '<td style="width: 20%; border: 1px solid black; text-align: center;">' . $clientes[$i]['total_terminado'] . '</td>';
			$html .= '</tr>';
			$html .= '</table><br />';
		}
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha generado el pdf del informe táctico de capacidad de cuentas por empleado");
		
		
		date_default_timezone_set('America/El_Salvador');
		$data = array(
			'tabla' => $html,
			'nombre_informe' => 'Informe de casos juridicos por cliente',
			'fecha_generacion' => date('d/m/Y'),
		);
		$documento = $this->load->view('templates_informes/informe_operativo_nada.php', $data, TRUE);
		
		$filename = time()."_reporte.pdf";
		$mpdf = $this->m_pdf->pdf;
        $mpdf->SetTitle("$filename");
        $mpdf->SetAuthor('Rivas y Gonzalez Servicios Integrales');
        $mpdf->WriteHTML($documento);
        $mpdf->Output($filename, 'I'); 
		
	}
}
