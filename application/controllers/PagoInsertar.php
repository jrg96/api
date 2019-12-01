<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagoinsertar extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->model('UsuarioSistema_model');
		$this->load->model('TipoCaso_model');
		$this->load->model('Caso_model');
		$this->load->model('PagoCaso_model');
    }
    
    public function index($id_datos_cliente, $id_caso_juridico)
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
			'id_datos_cliente' => $id_datos_cliente,
			'id_caso_juridico' => $id_caso_juridico
        ));
        $this->smarty->view('pago_insertar.php');
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
		$id_usuario_sistema = $this->session->userdata('id_usuario');
		
		$id_datos_cliente = $this->input->post('id_datos_cliente', TRUE);
		$id_caso_juridico = $this->input->post('id_caso_juridico', TRUE);
		$monto_pago = $this->input->post('monto_pago', TRUE);
		$fecha_pago = $this->input->post('fecha_pago', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$estado_pago = $this->input->post('estado_pago', TRUE);
		
		////////////////////////// Validacion de datos ///////////////////////////
		if ( empty($id_usuario_sistema) || empty($id_datos_cliente) || empty($id_caso_juridico) || empty($monto_pago)
			|| empty($fecha_pago) || empty($descripcion) || empty($estado_pago))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}

		if (preg_match('/\.\d{3,}/', $monto_pago) || !is_numeric($monto_pago))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','fracaso');
			$this->session->set_userdata('mensaje_operacion','El monto a pagar debe ser un número con 2 decimales como máximo');
		}
		
		///////////////////////// Zona de ejecucion y resultados ////////////////////
		if ($valido)
		{
			$fecha_pago_f = explode("/", $fecha_pago)[2] . '-' . explode("/", $fecha_pago)[1] . '-' . explode("/", $fecha_pago)[0];
			$resultado = $this->PagoCaso_model->insertar_pago_caso($id_usuario_sistema, $id_caso_juridico, $monto_pago, $fecha_pago_f, $descripcion, $estado_pago);
			
			// Registrar accion
			$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha creado un nuevo pago Monto=$monto_pago ID=$resultado");
		
			
			if ($resultado == true)
			{
				$this->session->set_userdata('resultado_operacion','exito');
			    $this->session->set_userdata('mensaje_operacion','Pago creado con exito');
			} 
			else
			{
				$this->session->set_userdata('resultado_operacion','fracaso');
			    $this->session->set_userdata('mensaje_operacion','Error desconocido');
			}
		}
		
		redirect('/pagoinsertar/index/' . $id_datos_cliente . '/' . $id_caso_juridico);
	}
}
