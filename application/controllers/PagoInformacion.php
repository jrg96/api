<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagoinformacion extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UsuarioSistema_model');
		$this->load->model('Cliente_model');
		$this->load->model('Caso_model');
		$this->load->model('PagoCaso_model');
		$this->load->library('pagination');
    }
    
    public function index($id_datos_cliente, $id_caso_juridico, $id_pago_caso)
    {
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'abogado', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'abogado', $this->UsuarioSistema_model));
		}
			
		/////////////////////////// Mensajes de la aplicacion ////////////////////
        $resultado_operacion = 'ninguna';
        $mensaje_operacion = 'm';
        
        if ($this->session->userdata('resultado_operacion'))
        {
            $resultado_operacion = $this->session->userdata('resultado_operacion');
            $mensaje_operacion = $this->session->userdata('mensaje_operacion');
            
            $this->session->unset_userdata('resultado_operacion');
            $this->session->unset_userdata('mensaje_operacion');
        }
		
        $datos = $this->PagoCaso_model->obtener_datos_pago_caso($id_pago_caso);
		$datos['fecha_pago'] = explode(" ", $datos['fecha_pago'])[0];
		$fecha_pago = explode("-", $datos['fecha_pago'])[2] . '/' . explode("-", $datos['fecha_pago'])[1] . '/' . explode("-", $datos['fecha_pago'])[0];
		

        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion'=> $resultado_operacion,
			'mensaje_operacion' =>$mensaje_operacion,
            'usuario'=>$datos,
			'usuario_tipo' => $this->session->userdata('tipo'),
			'fecha_pago' => $fecha_pago,
			'id_datos_cliente' => $id_datos_cliente,
			'id_caso_juridico' => $id_caso_juridico,
			'id_pago_caso' => $id_pago_caso
        ));
        $this->smarty->view('pago_informacion.php');
    }
}