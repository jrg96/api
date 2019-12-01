<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casomodificar extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UsuarioSistema_model');
		$this->load->model('Cliente_model');
		$this->load->model('Caso_model');
		$this->load->model('TipoCaso_model');
    }
    
    public function index($id_datos_cliente, $id_caso_juridico)
    {
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'administrador', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'administrador', $this->UsuarioSistema_model));
		}
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido a la pantalla de modificar un caso legal del sistema de informacion gerencial, con id = $id_caso_juridico");
		
		
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
		
		
		
        $datos = $this->Caso_model->obtener_datos_caso_juridico($id_caso_juridico);
		
		// Modificar fecha a un formato legible en esp
		$datos['fecha_creacion'] = explode(" ", $datos['fecha_creacion'])[0];
		$fecha_creacion = explode("-", $datos['fecha_creacion'])[2] . '/' . explode("-", $datos['fecha_creacion'])[1] . '/' . explode("-", $datos['fecha_creacion'])[0];
		$fecha_terminacion = '';

		if (count(explode(" ", $datos['fecha_terminacion'])) > 1)
		{
			$datos['fecha_terminacion'] = explode(" ", $datos['fecha_terminacion'])[0];
			$fecha_terminacion = explode("-", $datos['fecha_terminacion'])[2] . '/' . explode("-", $datos['fecha_terminacion'])[1] . '/' . explode("-", $datos['fecha_terminacion'])[0];
		}


        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion'=> $resultado_operacion,
			'mensaje_operacion' =>$mensaje_operacion,
            'datos_usuario'=>$datos,
			'usuario_tipo' => $this->session->userdata('tipo'),
			'id_caso_juridico' => $id_caso_juridico,
			'id_datos_cliente' => $id_datos_cliente,
			'tipos_caso' => $this->TipoCaso_model->obtener_lista_tipo_caso_juridico_2(),
			'abogados' => $this->UsuarioSistema_model->obtener_lista_abogados(),
			'fecha_creacion' => $fecha_creacion,
			'fecha_terminacion' => $fecha_terminacion
        ));
        $this->smarty->view('caso_modificar.php');
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
		$id_caso_juridico = $this->input->post('id_caso_juridico', TRUE);
		
		$id_usuario_sistema = $this->input->post('id_usuario_sistema', TRUE);
		$id_datos_cliente = $this->input->post('id_datos_cliente', TRUE);
		$fecha_creacion = $this->input->post('fecha_creacion', TRUE);
		$fecha_terminacion = $this->input->post('fecha_terminacion', TRUE);
		$nombre_caso = $this->input->post('nombre_caso', TRUE);
		$id_tipo_caso_juridico = $this->input->post('id_tipo_caso_juridico', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$estado_caso = $this->input->post('estado_caso', TRUE);

		
		
		////////////////////////// Validacion de datos ///////////////////////////
		if ( empty($id_usuario_sistema) || empty($id_datos_cliente) || empty($fecha_creacion) || empty($nombre_caso)
			|| empty($id_tipo_caso_juridico) || empty($descripcion) || empty($estado_caso))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}
		
		///////////////////////// Zona de ejecucion y resultados ////////////////////
		if ($valido)
		{
			$fecha_creacion_f = explode("/", $fecha_creacion)[2] . '-' . explode("/", $fecha_creacion)[1] . '-' . explode("/", $fecha_creacion)[0];
			$fecha_terminacion_f = '';
			
			if (!empty($fecha_terminacion))
			{
				$fecha_terminacion_f = explode("/", $fecha_terminacion)[2] . '-' . explode("/", $fecha_terminacion)[1] . '-' . explode("/", $fecha_terminacion)[0];
			}
			
			$resultado = $this->Caso_model->actualizar_datos_caso_juridico($id_caso_juridico, $id_usuario_sistema, $id_datos_cliente, $fecha_creacion_f, $nombre_caso, $id_tipo_caso_juridico, $descripcion, $estado_caso, $fecha_terminacion_f);
		    
			// Registrar accion
			$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha modificado el caso legal con id = $id_caso_juridico");
		
			
			if ($resultado == true)
			{
				$this->session->set_userdata('resultado_operacion','exito');
			    $this->session->set_userdata('mensaje_operacion','Caso legal modificado con exito');
			} 
			else
			{
				$this->session->set_userdata('resultado_operacion','fracaso');
			    $this->session->set_userdata('mensaje_operacion','Error desconocido');
			}
		}
		
		redirect('/casomodificar/index/' . $id_datos_cliente . '/' . $id_caso_juridico);
	}
}