<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casoinsertar extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->model('UsuarioSistema_model');
		$this->load->model('TipoCaso_model');
		$this->load->model('Caso_model');
    }
    
    public function index($id_datos_cliente)
    {
    	////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'abogado', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'abogado', $this->UsuarioSistema_model));
		}
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido a la pantalla de crear nuevo caso legal del bufete");
		
		
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
			'usuario_tipo' => $this->session->userdata('tipo'),
			'id_usuario_sistema' => $this->session->userdata('id_usuario'),
			'id_datos_cliente' => $id_datos_cliente
        ));
        $this->smarty->view('caso_insertar.php');
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
		$id_usuario_sistema = $this->input->post('id_usuario_sistema', TRUE);
		$id_datos_cliente = $this->input->post('id_datos_cliente', TRUE);
		$fecha_creacion = $this->input->post('fecha_creacion', TRUE);
		$nombre_caso = $this->input->post('nombre_caso', TRUE);
		$id_tipo_caso_juridico = $this->input->post('id_tipo_caso_juridico', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$estado_caso = $this->input->post('estado_caso', TRUE);
		
		////////////////////////// Validacion de datos ///////////////////////////
		if ( empty($id_usuario) || empty($nombre_tipo))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}		
		
		///////////////////////// Zona de ejecucion y resultados ////////////////////
		if ($valido)
		{
			$resultado = $this->TipoCaso_model->insertar_datos_cliente($id_usuario, $nombre_tipo);
			
			// Registrar accion
			$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha creado un nuevo tipo de caso Tipo=$nombre_tipo");
		
			
			if ($resultado == true)
			{
				$this->session->set_userdata('resultado_operacion','exito');
			    $this->session->set_userdata('mensaje_operacion','Tipo de caso creado con exito');
			} 
			else
			{
				$this->session->set_userdata('resultado_operacion','fracaso');
			    $this->session->set_userdata('mensaje_operacion','Error desconocido');
			}
		}
		
		redirect('/tipocasoinsertar/index');
	}
}
