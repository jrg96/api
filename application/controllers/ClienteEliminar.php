<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteEliminar extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->model('UsuarioSistema_model');
        $this->load->model('Cliente_model');
    }
    
    public function index($id_datos_cliente)
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
            'id_datos_cliente' => $id_datos_cliente
        ));
        $this->smarty->view('cliente_eliminar.php');
    }

    public function procesar()
    {
		/////////////////////////// Variables utilizadas /////////////////////////
        $valido = true;
        
        /////////////////////////// Captura datos ////////////////////////////////
        /////////////////////////// TRUE = Proteccion XSS ////////////////////////
        $opcion_eliminar = $this->input->post('opcion_eliminar', TRUE);
		$id_datos_cliente = $this->input->post('id_datos_cliente', TRUE);
		
		if ($opcion_eliminar == 'eliminar')
		{
			$this->Cliente_model->eliminar_datos_cliente($id_datos_cliente);
			$this->session->set_userdata('resultado_operacion','exito');
            $this->session->set_userdata('mensaje_operacion','Cliente eliminado con exito');
		}
		
        redirect('/abogadopanel/index');
    }
}
