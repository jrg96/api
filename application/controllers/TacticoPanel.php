<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tacticopanel extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->model('UsuarioSistema_model');
    }
    
    public function index()
    {
        ////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'tactico', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'tactico', $this->UsuarioSistema_model));
		}
		
		if ($this->session->userdata('tipo') == 'estrategico')
		{
			redirect('/estrategicopanel/index');
		}
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido al panel de usuario táctico");
		
		
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


        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
			'usuario_tipo' => $this->session->userdata('tipo')
        ));
        $this->smarty->view('tactico_panel.php');
    }
}
