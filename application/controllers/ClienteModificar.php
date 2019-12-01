<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientemodificar extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UsuarioSistema_model');
		$this->load->model('Cliente_model');
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
		
		
		
        $datos = $this->Cliente_model->obtener_datos_cliente($id_usuario);

        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion'=> $resultado_operacion,
			'mensaje_operacion' =>$mensaje_operacion,
            'datos_usuario'=>$datos,
			'usuario_tipo' => $this->session->userdata('tipo')
        ));
        $this->smarty->view('cliente_modificar.php');
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
		$id_datos_cliente = $this->input->post('id_datos_cliente', TRUE);
		
		$apellidos = $this->input->post('apellidos', TRUE);
		$nombres = $this->input->post('nombres', TRUE);
		$dui = $this->input->post('dui', TRUE);
		$nit = $this->input->post('nit', TRUE);
		$celular = $this->input->post('celular', TRUE);
		$residencia = $this->input->post('residencia', TRUE);
		
		/*echo var_dump($nombre_usuario);
		echo var_dump($password);
		echo var_dump($password_rep);
		echo var_dump($tipo);
		echo var_dump($estado);*/

		
		
		////////////////////////// Validacion de datos ///////////////////////////
		if ( empty($apellidos) || empty($nombres) 
			|| empty($dui) || empty($nit) || empty($celular) || empty($residencia))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}
		
		if (strlen($dui) != 9 || !ctype_digit($dui))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','DUI debe estar compuesto de 9 digitos y debe estar compuesto de solo numeros');
		}
		
		if (strlen($nit) != 14 || !ctype_digit($nit))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','NIT debe estar compuesto de 14 digitos y debe estar compuesto de solo numeros');
		}
		
		if (strlen($celular) != 8 || !ctype_digit($celular))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Celular debe estar compuesto de 8 digitos y debe estar compuesto de solo numeros');
		}
		
		///////////////////////// Zona de ejecucion y resultados ////////////////////
		if ($valido)
		{
			$resultado = $this->Cliente_model->actualizar_datos_cliente($id_datos_cliente, $apellidos, $nombres, $dui, $nit, $celular, $residencia);
		    
			// Registrar accion
			$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha modificado al cliente con id = $id_datos_cliente");
		
			
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
		
		redirect('/clientemodificar/index/' . $id_datos_cliente);
	}
}