<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformeEstrategicoGanancias extends CI_Controller {
	
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
		$this->load->model('TipoCaso_model');
    }
    
    public function index()
    {

        ////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'estrategico', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'estrategico', $this->UsuarioSistema_model));
		}
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido al informe táctico de capacidad de cuentas por empleado");
		
		
		/////////////////////////// Recoleccion de datos ///////////////////////////////////////////

        /////////////////////////// Zona de despliegue /////////////////////////////////////////////
		date_default_timezone_set('America/El_Salvador');
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'usuario_tipo' => $this->session->userdata('tipo'),
			'fecha_actual' => date('d/m/Y'),
			'nombre_usuario' => $this->session->userdata('nombre_usuario'),
			'nombre_pantalla' => 'Generar informe Estratégico',
			'tipos' => $tipos
        ));
        $this->smarty->view('informe_estrategico_01.php');
    }
	
	
	public function post_informe()
	{
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'estrategico', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'estrategico', $this->UsuarioSistema_model));
		}
		
		//////////////////////////////////// Recolección de datos //////////////////////////////////
		$fecha_fin = $this->input->post('fecha_fin');
		$fecha_inicio = $this->input->post('fecha_inicio');
		
		$this->session->set_userdata('fecha_fin', $this->input->post('fecha_fin'));
		$this->session->set_userdata('fecha_inicio', $this->input->post('fecha_inicio'));
		
		// Creando reporte
		$fecha_fin_f = explode("/", $fecha_fin)[2] . '-' . explode("/", $fecha_fin)[1] . '-' . explode("/", $fecha_fin)[0];
		$fecha_inicio_f = explode("/", $fecha_inicio)[2] . '-' . explode("/", $fecha_inicio)[1] . '-' . explode("/", $fecha_inicio)[0];
		
		$lista_tipos = $this->TipoCaso_model->obtener_lista_tipo_caso_juridico_3();
		
		
		$resultados = array();
		$tipos = array();
		$total = 0.0;
		foreach ($lista_tipos as $tipo)
		{
			$tip = array();
			$tip['nombre_tipo'] = $tipo['nombre_tipo'];
			$tip['saldo'] = $this->PagoCaso_model->obtener_ganancia_deuda_tipo_caso($tipo['id_tipo_caso_juridico'], 'pagado', $fecha_inicio_f, $fecha_fin_f);
			
			$total = $total + $tip['saldo'];
			array_push($tipos, $tip);
		}

		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido a la previsualización del informe táctico de capacidad de cuentas por empleado con parametros fecha_inicio=$fecha_inicio, fecha_fin=$fecha_fin, id_empleado=$id_empleado");
		
		
		
		// Persistir array en session
		$resultados['tipos'] = $tipos;
		$resultados['total'] = $total;
		
		$this->session->set_userdata('resultado_consulta', json_encode($resultados));
		
		// Imprimir resutado
		echo json_encode($resultados);
	}
	
	public function imprimir_informe()
	{
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'estrategico', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'estrategico', $this->UsuarioSistema_model));
		}
		
		$resultados = json_decode($this->session->userdata('resultado_consulta'), true);
		
		// Armar HTML
		$html = '';
		$html .= "<table style='font-family: arial, sans-serif; font-size: 12pt; border-collapse: collapse; border: 1px solid black; width:100%'>";
		$html .= "<tr><th style='border: 1px solid black; text-align: center;'>Parámetro</th><th style='border: 1px solid black; text-align: center;'>($$$)</th></tr>";
		$html .= "<tr>";
		$html .= '<td style="width: 75%; border: 1px solid black; text-align: center;" colspan="1">Ganancias</td>';
		$html .= '<td style="width: 25%; border: 1px solid black; text-align: center;">$' . $resultados['total'] . '</td>';
		$html .= '</tr>';
		$html .= '</table>';
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha generado el pdf del informe táctico de capacidad de cuentas por empleado");
		
		
		date_default_timezone_set('America/El_Salvador');
		$data = array(
			'tabla' => $html,
			'nombre_informe' => 'Informe de ganancias de casos juridicos',
			'fecha_generacion' => date('d/m/Y'),
			'fecha_fin' => $this->session->userdata('fecha_fin'),
			'fecha_inicio' => $this->session->userdata('fecha_inicio')
		);
		$documento = $this->load->view('templates_informes/informe_tactico_inicio_fin.php', $data, TRUE);
		
		$filename = time()."_reporte.pdf";
		$mpdf = $this->m_pdf->pdf;
        $mpdf->SetTitle("$filename");
        $mpdf->SetAuthor('Rivas y Gonzalez Servicios Integrales');
        $mpdf->WriteHTML($documento);
        $mpdf->Output($filename, 'I'); 
		
	}
}
