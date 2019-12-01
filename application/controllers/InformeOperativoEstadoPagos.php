<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformeOperativoEstadoPagos extends CI_Controller {
	
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
		$this->load->model('PagoCaso_model');
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
			'nombre_pantalla' => 'Generar informe operativo',
			'clientes' => $clientes
        ));
        $this->smarty->view('informe_operativo_03.php');
    }
	
	
	public function post_informe()
	{
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'abogado', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'abogado', $this->UsuarioSistema_model));
		}
		
		//////////////////////////////////// Recolección de datos //////////////////////////////////
		$id_datos_cliente = $this->input->post('id_datos_cliente');
		$fecha_fin = $this->input->post('fecha_fin');
		
		$this->session->set_userdata('fecha_fin', $this->input->post('fecha_fin'));
		
		// Creando reporte
		$fecha_fin_f = explode("/", $fecha_fin)[2] . '-' . explode("/", $fecha_fin)[1] . '-' . explode("/", $fecha_fin)[0];
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
			$fecha_pago = array();
			$monto_pago = array();
			$estado_pago = array();

			$lista_pagos = $this->PagoCaso_model->obtener_lista_pago_caso_3($cliente['id_datos_cliente'], $fecha_fin_f);
			$total_deuda = 0.0;
			$total_pagado = 0.0;
			
			
			foreach ($lista_pagos as $pago)
			{
				// Modificar fechas
				$pago['fecha_pago'] = explode(" ", $pago['fecha_pago'])[0];
				$pago['fecha_pago'] = explode("-", $pago['fecha_pago'])[2] . '/' . explode("-", $pago['fecha_pago'])[1] . '/' . explode("-", $pago['fecha_pago'])[0];
			
				
				if ($pago['estado_pago'] == 'sin pagar')
				{
					$pago['estado_pago'] = 'SIN PAGAR';
					$total_deuda += $pago['monto_pago'];
				}
				else
				{
					$pago['estado_pago'] = 'PAGADO';
					$total_pagado += $pago['monto_pago'];
				}
				
				array_push($nombre_caso, $pago['nombre_caso']);
				array_push($fecha_pago, $pago['fecha_pago']);
				array_push($monto_pago, $pago['monto_pago']);
				array_push($estado_pago, $pago['estado_pago']);
			}
			
			$clien['nombre_caso'] = $nombre_caso;
			$clien['fecha_pago'] = $fecha_pago;
			$clien['monto_pago'] = $monto_pago;
			$clien['estado_pago'] = $estado_pago;
			$clien['total_deuda'] = $total_deuda;
			$clien['total_pagado'] = $total_pagado;
			
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
		
		$fecha_fin = json_decode($this->session->userdata('fecha_fin'), true); 
		$clientes = json_decode($this->session->userdata('resultado_consulta'), true);
		
		// Armar HTML
		$html = '';
		for ($i = 0; $i < count($clientes); $i++)
		{
			$html .= "<table style='font-family: arial, sans-serif; font-size: 12pt; border-collapse: collapse; border: 1px solid black; width:100%'>";
							
			$html .= "<tr>";
			$html .= '<th colspan="4" style="border: 1px solid black;">' . $clientes[$i]['nombre_cliente'] . '</th>';
			$html .= "</tr>";
				
			$html .= "<tr>";
			$html .= '<th style="width: 25%; border: 1px solid black; text-align: center;">Nombre caso</th>';
			$html .= '<th style="width: 25%; border: 1px solid black; text-align: center;">Fecha pago</th>';
			$html .= '<th style="width: 25%; border: 1px solid black; text-align: center;">Monto pago</th>';
			$html .= '<th style="width: 25%; border: 1px solid black; text-align: center;">Estado pago</th>';
			$html .= "</tr>";
			
			for ($j = 0; $j < count($clientes[$i]['nombre_caso']); $j++)
			{
				$html .= '<tr>';
				$html .= '<td style="width: 25%; border: 1px solid black;">' . $clientes[$i]['nombre_caso'][$j] . '</td>';
				$html .= '<td style="width: 25%; border: 1px solid black; text-align: center;">' . $clientes[$i]['fecha_pago'][$j] . '</td>';
				$html .= '<td style="width: 25%; border: 1px solid black; text-align: center;">$' . $clientes[$i]['monto_pago'][$j] . '</td>';
				$html .= '<td style="width: 25%; border: 1px solid black; text-align: center;">' . $clientes[$i]['estado_pago'][$j] . '</td>';
				$html .= '</tr>';
			}
			
			$html .= "<tr>";
			$html .= '<td style="width: 80%; border: 1px solid black;" colspan="3">Total de pagos pendientes</td>';
			$html .= '<td style="width: 20%; border: 1px solid black; text-align: center;">$' . $clientes[$i]['total_deuda'] . '</td>';
			$html .= '</tr>';
			
			$html .= "<tr>";
			$html .= '<td style="width: 80%; border: 1px solid black;" colspan="3">Total de pagos terminados</td>';
			$html .= '<td style="width: 20%; border: 1px solid black; text-align: center;">$' . $clientes[$i]['total_pagado'] . '</td>';
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
			'fecha_fin' => $fecha_fin
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
