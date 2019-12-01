<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipocasomodificar extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UsuarioSistema_model');
		$this->load->model('TipoCaso_model');
    }
    
    public function index($id_usuario)
    {
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'administrador', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'administrador', $this->UsuarioSistema_model));
		}
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido a la pantalla de modificar un tipo de caso del sistema de informacion gerencial, con id = $id_usuario");
		
		
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
		
		
		
        $datos = $this->TipoCaso_model->obtener_datos_tipo_caso_juridico($id_usuario);

        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion'=> $resultado_operacion,
			'mensaje_operacion' =>$mensaje_operacion,
            'datos_usuario'=>$datos,
			'usuario_tipo' => $this->session->userdata('tipo'),
			'id_usuario_sistema' => $this->session->userdata('id_usuario')
        ));
        $this->smarty->view('tipocaso_modificar.php');
    }
	
	public function procesar()
	{
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
		if (es_necesario_redireccionar($this->session, 'administrador', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'administrador', $this->UsuarioSistema_model));
		}
		
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		
		/////////////////////////// Captura datos ////////////////////////////////
		/////////////////////////// TRUE = Proteccion XSS ////////////////////////
		$id_tipo_caso_juridico = $this->input->post('id_tipo_caso_juridico', TRUE);
		$id_usuario_sistema = $this->input->post('id_usuario_sistema', TRUE);
		$nombre_tipo = $this->input->post('nombre_tipo', TRUE);

		
		
		////////////////////////// Validacion de datos ///////////////////////////
		if ( empty($id_tipo_caso_juridico) || empty($nombre_tipo) || empty($id_usuario_sistema))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}
		
		///////////////////////// Zona de ejecucion y resultados ////////////////////
		if ($valido)
		{
			$resultado = $this->TipoCaso_model->actualizar_datos_tipo_caso_juridico($id_tipo_caso_juridico, $id_usuario_sistema, $nombre_tipo);
		    
			// Registrar accion
			$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha modificado el tipo de caso juridico con id = $id_tipo_caso_juridico");
		
			
			if ($resultado == true)
			{
				$this->session->set_userdata('resultado_operacion','exito');
			    $this->session->set_userdata('mensaje_operacion','Usuario modificado con exito');
			} 
			else
			{
				$this->session->set_userdata('resultado_operacion','fracaso');
			    $this->session->set_userdata('mensaje_operacion','Error desconocido');
			}
		}
		
		redirect('/tipocasomodificar/index/' . $id_tipo_caso_juridico);
	}
}