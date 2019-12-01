<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuariomodificar extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UsuarioSistema_model');

    }
    
    public function index($id_usuario)
    {
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'administrador', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'administrador', $this->UsuarioSistema_model));
		}
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido a la pantalla de modificar un usuario del sistema de informacion gerencial, con id = $id_usuario");
		
		
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
		
		
		
        $datos = $this->UsuarioSistema_model->obtener_datos_usuario_id($id_usuario);

        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion'=> $resultado_operacion,
			'mensaje_operacion' =>$mensaje_operacion,
            'datos_usuario'=>$datos,
			'usuario_tipo' => $this->session->userdata('tipo')
        ));
        $this->smarty->view('usuario_modificar.php');
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
		$id_usuario = $this->input->post('id_usuario', TRUE);
		
		$nombre_usuario = $this->input->post('nombre_usuario', TRUE);
		$apellidos = $this->input->post('apellidos', TRUE);
		$nombres = $this->input->post('nombres', TRUE);
		$password = $this->input->post('password', TRUE);
		$password_rep = $this->input->post('password_rep', TRUE);
		$tipo = $this->input->post('tipo', TRUE);
		$estado = $this->input->post('estado', TRUE);
		
		/*echo var_dump($nombre_usuario);
		echo var_dump($password);
		echo var_dump($password_rep);
		echo var_dump($tipo);
		echo var_dump($estado);*/

		
		
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
			$this->session->set_userdata('mensaje_operacion','Ambas contraseñas no cocinciden');
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
		
		if (strlen($password) != 32)
		{
			if (preg_match('~[0-9]~', $password) != 1 || preg_match('~[A-Z]~', $password) != 1 || preg_match('/[\'\.^£$%&*()}{@#~?><>,|=_+¬-]/', $password) != 1 || strlen($password) < 8)
			{
				$valido = false;
				$this->session->set_userdata('resultado_operacion','fracaso');
				$this->session->set_userdata('mensaje_operacion','Contraseña debe estar como mínimo por 8 caracteres, 1 o más letras mayúscula, 1 o más caracteres espciales');
			}
		}
		
		///////////////////////// Zona de ejecucion y resultados ////////////////////
		if ($valido)
		{
			$nueva_pass = true;
			
			// Dejo tal cual el md5
			if (strlen($password) == 32)
			{
				$nueva_pass = false;
			}
			$resultado = $this->UsuarioSistema_model->actualizar_usuario_por_id($id_usuario, $nombre_usuario, $password, $tipo, $estado, $nueva_pass, $apellidos, $nombres);
		    // Registrar accion
			$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha modificado al usuario con id = $id_usuario");
		
			
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
		
		redirect('/usuariomodificar/index/' . $id_usuario);
	}
}