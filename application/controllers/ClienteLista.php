<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientelista extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('UsuarioSistema_model');
		$this->load->model('Cliente_model');
    }
    
    public function index()
    {
		////////////////////////////////////Seguridad de la Aplicacion//////////////////////////////
        if (es_necesario_redireccionar($this->session, 'administrador', $this->UsuarioSistema_model))
		{
			redirect(obtener_redireccion($this->session, 'administrador', $this->UsuarioSistema_model));
		}
		
		// Registrar accion
		$this->UsuarioSistema_model->registrar_accion($this->session->userdata('id_usuario'), "Usuario ha accedido a la pantalla de lista de usuarios del sistema de información gerencial");
		

		//////////////////////// Datos por paginacion ///////////////////////
		$params = array();
		$limite_por_pagina = 3;
		$inicio_indice = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->Cliente_model->obtener_total_datos_cliente();
		
		$pagina_actual = (intval($inicio_indice) / $limite_por_pagina) + 1;
		$total_paginas = ceil($total_records / $limite_por_pagina);
		
		$params['resultados'] = array();
		$params['links'] = $this->pagination->create_links();
		
		if ($total_records > 0){
			$params['resultados'] = $this->Cliente_model->obtener_lista_datos_cliente($limite_por_pagina, $inicio_indice);
			
			// parametros para realizar la paginacion
			$config['base_url'] = base_url() . 'index.php/clientelista/index';
			$config['total_rows'] = $total_records;
            $config['per_page'] = $limite_por_pagina;
            $config['uri_segment'] = 3;
            
			// parametros para estilo
			$config['num_links'] = 2;
            $config['reuse_query_string'] = TRUE;
			
			$config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
			
			$config['first_link'] = '«';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
			
			$config['last_link'] = '»';
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
			'links' => $params['links'],
			'usuarios' => $params['resultados'],
			'pagina_actual' => $pagina_actual,
			'total_paginas' => $total_paginas,
			'usuario_tipo' => $this->session->userdata('tipo')
        ));
        $this->smarty->view('cliente_lista.php');
    }
}
