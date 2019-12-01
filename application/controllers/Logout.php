<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index()
    {
		$this->session->unset_userdata('id_usuario');
		$this->session->unset_userdata('nombre_usuario');
		$this->session->unset_userdata('tipo');
		$this->session->unset_userdata('estado');
		
        redirect('/login/index');
    }
}
