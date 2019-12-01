<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarioinsertar extends CI_Controller {
	
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
        if (es_necesario_redireccionar($this->session, 'administrador', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'administrador', $this->UsuarioSistema_model));
		}
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido a la pantalla de crear un nuevo usuario del sistema de información gerencial");
		
		
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
			'usuario_tipo' => $this->session->userdata('tipo')
        ));
        $this->smarty->view('usuario_insertar.php');
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
		$nombre_usuario = $this->input->post('nombre_usuario', TRUE);
		$apellidos = $this->input->post('apellidos', TRUE);
		$nombres = $this->input->post('nombres', TRUE);
		$password = $this->input->post('password', TRUE);
		$password_rep = $this->input->post('password_rep', TRUE);
		$tipo = $this->input->post('tipo', TRUE);
		$estado = $this->input->post('estado', TRUE);
		
		////////////////////////// Validacion de datos ///////////////////////////
		if (empty($nombre_usuario) || empty($password) || empty($password_rep) 
			|| empty($tipo) || empty($estado) || empty($apellidos) || empty($nombres))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}
		
		if (($password != $password_rep))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Ambas contraseñas no coinciden');
		}
		
		if(!ctype_alnum($nombre_usuario))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Nombre de usuario solamente puede contener letras y números sin espacios');
		}
		
		if (strlen($nombre_usuario) < 6)
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Nombre de usuario debe contener como minimo 6 letras/números');
		}
		
		if (preg_match('~[0-9]~', $password) != 1 || preg_match('~[A-Z]~', $password) != 1 || preg_match('/[\'\.^£$%&*()}{@#~?><>,|=_+¬-]/', $password) != 1 || strlen($password) < 8)
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Contraseña debe estar como mínimo por 8 caracteres, 1 o más letras mayúscula, 1 o más caracteres espciales');
		}
		
		if ($this->UsuarioSistema_model->usuario_ya_existe($nombre_usuario)){
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Nombre de usuario ya existe');
		}
		
		
		///////////////////////// Zona de ejecucion y resultados ////////////////////
		if ($valido)
		{
			$resultado = $this->UsuarioSistema_model->insertar_usuario($nombre_usuario, $password, $tipo, $estado, $apellidos, $nombres);
			
			// Registrar accion
			$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha creado un nuevo usuario nombre_usuario=$nombre_usuario, tipo=$tipo, estado=$estado");
		
			
			if ($resultado == true)
			{
				$this->session->set_userdata('resultado_operacion','exito');
			    $this->session->set_userdata('mensaje_operacion','Usuario creado con exito');
			} 
			else
			{
				$this->session->set_userdata('resultado_operacion','fracaso');
			    $this->session->set_userdata('mensaje_operacion','Error desconocido');
			}
		}
		
		redirect('/usuarioinsertar/index');
	}
}
