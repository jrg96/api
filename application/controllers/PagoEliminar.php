<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagoeliminar extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->model('UsuarioSistema_model');
        $this->load->model('Caso_model');
		$this->load->model('PagoCaso_model');
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


        /////////////////////////// Zona de despliegue ///////////////////////////
		
        $this->smarty->assign(array(
            'base_url' => base_url(),
            'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
            'id_caso_juridico' => $id_caso_juridico,
			'id_datos_cliente' => $id_datos_cliente,
			'id_pago_caso' => $id_pago_caso
        ));
        $this->smarty->view('pago_eliminar.php');
    }

    public function procesar()
    {
		/////////////////////////// Variables utilizadas /////////////////////////
        $valido = true;
        
        /////////////////////////// Captura datos ////////////////////////////////
        /////////////////////////// TRUE = Proteccion XSS ////////////////////////
        $opcion_eliminar = $this->input->post('opcion_eliminar', TRUE);
		$id_datos_cliente = $this->input->post('id_datos_cliente', TRUE);
		$id_caso_juridico = $this->input->post('id_caso_juridico', TRUE);
		$id_pago_caso = $this->input->post('id_pago_caso', TRUE);
		
		
		if ($opcion_eliminar == 'eliminar')
		{
			$this->PagoCaso_model->eliminar_pago_caso($id_pago_caso);
			$this->session->set_userdata('resultado_operacion','exito');
            $this->session->set_userdata('mensaje_operacion','Pago eliminado con exito');
		}
		
        redirect('/casoinformacion/index/' . $id_datos_cliente . '/' . $id_caso_juridico);
    }
}
