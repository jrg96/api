<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformeOperativoSolvenciaCliente extends CI_Controller {
	
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
			'nombre_usuario' => $this->session->userdata('nombre_usuario'),
			'nombre_pantalla' => 'Generar informe Operativo',
			'clientes' => $clientes
        ));
        $this->smarty->view('informe_operativo_01.php');
    }
	
	
	public function post_informe()
	{
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'abogado', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'abogado', $this->UsuarioSistema_model));
		}
		
		//////////////////////////////////// Recolección de datos //////////////////////////////////
		$fecha_fin = $this->input->post('fecha_fin');
		$id_datos_cliente = $this->input->post('id_datos_cliente');
		
		$this->session->set_userdata('fecha_fin', $this->input->post('fecha_fin'));
		
		// Creando reporte
		$fecha_fin_f = explode("/", $fecha_fin)[2] . '-' . explode("/", $fecha_fin)[1] . '-' . explode("/", $fecha_fin)[0];
		
		$lista_clientes = $this->Cliente_model->obtener_lista_datos_cliente_2();
		
		if ($id_datos_cliente != '-1')
		{
			$lista_clientes = array($this->Cliente_model->obtener_datos_cliente($id_datos_cliente));
		}
		
		
		$resultados = array();
		$clientes = array();
		$total = 0.0;
		foreach ($lista_clientes as $cliente)
		{
			$clien = array();
			$clien['nombre_cliente'] = $cliente['apellidos'] . ', ' . $cliente['nombres'];
			$clien['deuda'] = 0.0;
			$clien['estado'] = 'SOLVENTE';
			
			$solvencia_asignada = false;
			
			// Obtener lista de casos legales
			$casos_legales = $this->Caso_model->obtener_lista_caso_juridico_2($cliente['id_datos_cliente']);
			foreach ($casos_legales as $caso)
			{
				$deuda = $this->Caso_model->obtener_deuda_caso_legal($caso['id_caso_juridico']);
				$clien['deuda'] = $clien['deuda'] + $deuda;
				
				if ($deuda > 0.0 && !$solvencia_asignada)
				{
					$clien['estado'] = 'INSOLVENTE';
					$solvencia_asignada = true;
				}
			}
			
			$total = $total + $clien['deuda'];
			array_push($clientes, $clien);
		}

		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido a la previsualización del informe táctico de capacidad de cuentas por empleado con parametros fecha_inicio=$fecha_inicio, fecha_fin=$fecha_fin, id_empleado=$id_empleado");
		
		
		
		// Persistir array en session
		$resultados['clientes'] = $clientes;
		$resultados['total'] = $total;
		
		$this->session->set_userdata('resultado_consulta', json_encode($resultados));
		
		// Imprimir resutado
		echo json_encode($resultados);
	}
	
	public function imprimir_informe()
	{
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'abogado', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'abogado', $this->UsuarioSistema_model));
		}
		
		$resultados = json_decode($this->session->userdata('resultado_consulta'), true);
		
		// Armar HTML
		$html = '';
		$html .= "<table style='font-family: arial, sans-serif; font-size: 12pt; border-collapse: collapse; border: 1px solid black; width:100%'>";
	    $html .= "<tr><th style='border: 1px solid black; text-align: center;'>Nombre del cliente</th><th style='border: 1px solid black; text-align: center;'>Estado</th><th style='border: 1px solid black; text-align: center;'>Monto ($$$)</th></tr>";
		for ($i = 0; $i < count($resultados['clientes']); $i++)
		{
			$html .= "<tr>";
			$html .= '<td style="width: 50%; border: 1px solid black;">' . $resultados['clientes'][$i]['nombre_cliente'] . "</td>";
			$html .= '<td style="width: 25%; border: 1px solid black; text-align: center;">' . $resultados['clientes'][$i]['estado'] . '</td>';
			$html .= '<td style="width: 25%; border: 1px solid black; text-align: center;">$'. $resultados['clientes'][$i]['deuda'] . '</td>';
			$html .= '</tr>';
		}
		$html .= "<tr>";
		$html .= '<td style="width: 75%; border: 1px solid black;" colspan="2">Total</td>';
		$html .= '<td style="width: 25%; border: 1px solid black; text-align: center;">$' . $resultados['total'] . '</td>';
		$html .= '</tr>';
		$html .= '</table>';
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha generado el pdf del informe táctico de capacidad de cuentas por empleado");
		
		
		date_default_timezone_set('America/El_Salvador');
		$data = array(
			'tabla' => $html,
			'nombre_informe' => 'Informe de solvencia de clientes',
			'fecha_generacion' => date('d/m/Y'),
			'fecha_fin' => $this->session->userdata('fecha_fin')
		);
		$documento = $this->load->view('templates_informes/informe_operativo_fin.php', $data, TRUE);
		
		$filename = time()."_reporte.pdf";
		$mpdf = $this->m_pdf->pdf;
        $mpdf->SetTitle("$filename");
        $mpdf->SetAuthor('Rivas y Gonzalez Servicios Integrales');
        $mpdf->WriteHTML($documento);
        $mpdf->Output($filename, 'I'); 
		
	}
}
