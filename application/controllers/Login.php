<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UsuarioSistema_model');
    }
    
    public function index()
    {
    
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
            'resultado_operacion'=> $resultado_operacion,
            'mensaje_operacion' =>$mensaje_operacion

        ));
        $this->smarty->view('login.php');
    }

    public function procesar()
    {
        ///////////////////////Variables Utilizadas///////////////////
        $valido = true;

        /////////////////////////// Captura datos ////////////////////////////////
        /////////////////////////// TRUE = Proteccion XSS ////////////////////////
        $nombre_usuario = $this->input->post('nombre_usuario',TRUE);
        $password =$this->input->post('password',TRUE);
        
        ////////////////////////// Validacion de datos ///////////////////////////
        if (empty($nombre_usuario) || empty($password))
        {
            $valido = false;
            $this->session->set_userdata('resultado_operacion','fracaso');
            $this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
        }


        //////////////////////Zona de ejecucion///////////////////////////
        if($valido)
        {
            $resultado=$this->UsuarioSistema_model->autenticar_usuario($nombre_usuario, $password);

            if($resultado==false)
            {
                $this->session->set_userdata('resultado_operacion','fracaso');
                $this->session->set_userdata('mensaje_operacion','Usuario o password no validos');
            }
            else
            {
                $datos= $this->UsuarioSistema_model->obtener_datos_usuario($nombre_usuario);
				
				if ($datos['estado'] == 'habilitado')
				{
					$this->session->set_userdata('id_usuario',$datos['id_usuario']);
					$this->session->set_userdata('nombre_usuario',$datos['nombre_usuario']);
					$this->session->set_userdata('tipo',$datos['tipo_usuario']);
					$this->session->set_userdata('estado',$datos['estado']);
					
					
					if($datos['tipo_usuario'] == 'admin')
					{
						redirect('/adminpanel/index');
					}
					
					if ($datos['tipo_usuario'] == 'abogado')
					{
						redirect('/abogadopanel/index');
					}
					
					if ($datos['tipo_usuario'] == 'tactico')
					{
						redirect('/tacticopanel/index');
					}
					
					if ($datos['tipo_usuario'] == 'estrategico')
					{
						redirect('/estrategicopanel/index');
					}
				}
				else
				{
					$this->session->set_userdata('resultado_operacion','fracaso');
                    $this->session->set_userdata('mensaje_operacion','Usuario deshabilitado del sistema, contacte administrador');
				}
            }
        }

        redirect('/login/index');
    }
}
