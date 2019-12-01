<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casoinformacion extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('UsuarioSistema_model');
		$this->load->model('Cliente_model');
		$this->load->model('Caso_model');
		$this->load->model('PagoCaso_model');
		$this->load->library('pagination');
    }
    
    public function index($id_datos_cliente, $id_caso_juridico)
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
		
        $datos = $this->Caso_model->obtener_datos_caso_juridico($id_caso_juridico);
		$datos['fecha_creacion'] = explode(" ", $datos['fecha_creacion'])[0];
		$fecha_creacion = explode("-", $datos['fecha_creacion'])[2] . '/' . explode("-", $datos['fecha_creacion'])[1] . '/' . explode("-", $datos['fecha_creacion'])[0];
		
		
		//////////////////////// Datos por paginacion ///////////////////////
		$params = array();
		$limite_por_pagina = 10;
		$inicio_indice = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$total_records = $this->PagoCaso_model->obtener_total_pago_caso($id_caso_juridico);
		
		$pagina_actual = (intval($inicio_indice) / $limite_por_pagina) + 1;
		$total_paginas = ceil($total_records / $limite_por_pagina);
		
		$params['resultados'] = array();
		$params['links'] = $this->pagination->create_links();
		
		if ($total_records > 0){
			$params['resultados'] = $this->PagoCaso_model->obtener_lista_pago_caso($id_caso_juridico, $limite_por_pagina, $inicio_indice);
			
			for ($i = 0; $i < count($params['resultados']); $i++) {
				$fecha = explode(" ", $params['resultados'][$i]['fecha_pago'])[0];
				$fecha_f = explode("-", $fecha)[2] . '/' . explode("-", $fecha)[1] . '/' . explode("-", $fecha)[0];
				$params['resultados'][$i]['fecha_pago'] = $fecha_f;
			}
			
			// parametros para realizar la paginacion
			$config['base_url'] = base_url() . 'index.php/casoinformacion/index/' . $id_datos_cliente . '/' . $id_caso_juridico;
			$config['total_rows'] = $total_records;
            $config['per_page'] = $limite_por_pagina;
            $config['uri_segment'] = 5;
            
			// parametros para estilo
			$config['num_links'] = 2;
            $config['reuse_query_string'] = TRUE;
			
			$config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
			
			$config['first_link'] = '<<';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
			
			$config['last_link'] = '>>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
			
			$config['cur_tag_open'] = '<li class="page-item"><a class="page-link">';
            $config['cur_tag_close'] = '</a></li>';
 
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
			
			$config['attributes'] = array('class' => 'page-link');
			$this->pagination->initialize($config);
			
			$params['links'] = $this->pagination->create_links();
		}
		

        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion'=> $resultado_operacion,
			'mensaje_operacion' =>$mensaje_operacion,
            'usuario'=>$datos,
			'usuario_tipo' => $this->session->userdata('tipo'),
			'pagos' => $params['resultados'],
			'pagina_actual' => $pagina_actual,
			'total_paginas' => $total_paginas,
			'links' => $params['links'],
			'fecha_creacion' => $fecha_creacion,
			'id_datos_cliente' => $id_datos_cliente,
			'id_caso_juridico' => $id_caso_juridico
        ));
        $this->smarty->view('caso_informacion.php');
    }
}