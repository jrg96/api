<?php
class UsuarioSistema_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
	
	// REVISADO
	public function registrar_accion($id_usuario, $descripcion_accion)
	{
		date_default_timezone_set('America/El_Salvador');
		$date = date('Y/m/d H:i:s', time());
		
		$datos = array(
			'id_usuario' => $id_usuario,
			'descripcion_accion' => $descripcion_accion,
			'fecha_hora_accion' => $date
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_bitacora_accion', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;

        // Ver codigo de error
        if ($err['code'] == 0)
        {
			$id = $this->db->insert_id();
			
			//$this->Bitacora_model->registrar_accion($this->session->userdata('id_usuario'),"insertar","El usuario inserto datos de la tabla (id = ".$id.")",__CLASS__);
        	return true;
        }
        return false;
	}
	
	// REVISADO
	public function obtener_total_registros_bitacora($id_usuario)
	{
		$datos= array(
			'id_usuario'=>$id_usuario
		);

		//Realizando la consultada
		$this->db->select('*');
        $this->db->from('tbl_bitacora_accion');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();
		$coincidencias = count($query);
		
		
		return $coincidencias;
	}

	// REVISADO
	public function obtener_lista_bitacora_acciones($limite, $inicio, $id_usuario)
	{
		$this->db->limit($limite, $inicio);
		$datos= array(
			'id_usuario'=>$id_usuario
		);

		//Realizando la consultada
		$this->db->select('*');
        $this->db->from('tbl_bitacora_accion');
		$this->db->where($datos);
		$this->db->order_by("fecha_hora_accion", "desc");
		$query = $this->db->get()->result_array();
		
		return $query;
	}
    
	// REVISADO
    public function insertar_usuario($nombre_usuario, $password, $tipo, $estado, $apellidos, $nombres)
    {
		$password = hash('ripemd128', $password);
		
		$datos = array(
			'nombre_usuario' => $nombre_usuario,
			'password' => $password,
			'tipo_usuario' => $tipo,
			'estado' => $estado,
			'apellidos' => $apellidos,
			'nombres' => $nombres
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_usuario', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;

        // Ver codigo de error
        if ($err['code'] == 0)
        {
			$id = $this->db->insert_id();
			
			//$this->Bitacora_model->registrar_accion($this->session->userdata('id_usuario'),"insertar","El usuario inserto datos de la tabla (id = ".$id.")",__CLASS__);
        	return true;
        }
        return false;
    }
	
	
	// REVISADO
	public function usuario_ya_existe($nombre_usuario)
	{
		$this->db->select('*');
        $this->db->from('tbl_usuario');
		$this->db->where('nombre_usuario', $nombre_usuario);
		$query = $this->db->get()->result_array();
		$coincidencias = count($query);
		
		if ($coincidencias == 0)
		{
			return false;
		}
		return true;
	}

	// REVISADO
	public function autenticar_usuario($nombre_usuario,$password)
	{
		$password = hash('ripemd128', $password);
		$datos= array(
			'nombre_usuario'=>$nombre_usuario,
			'password'=>$password
		);

		//Realizando la consultada
		$this->db->select('*');
        $this->db->from('tbl_usuario');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();
		$coincidencias = count($query);
		
		if ($coincidencias == 0)
		{
			return false;
		}
		return true;

	}

	
	// REVISADO
	public function obtener_datos_usuario($nombre_usuario)
	{
		$datos= array(
			'nombre_usuario'=>$nombre_usuario
		);

		//Realizando la consultada
		$this->db->select('*');
        $this->db->from('tbl_usuario');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();

		return $query[0];
	}

	// REVISADO
	public function obtener_datos_usuario_id($id_usuario)
	{
		$datos= array(
			'id_usuario'=>$id_usuario
		);

		//Realizando la consultada
		$this->db->select('*');
        $this->db->from('tbl_usuario');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();

		return $query[0];
	}

	
	public function actualizar_usuario_por_id($id_usuario, $nombre_usuario, $password, $tipo, $estado, $nueva_pass, $apellidos, $nombres)
	{
		if ($nueva_pass == true)
		{
			$password = hash('ripemd128', $password);
		}
		
		$datos = array(
			'nombre_usuario' => $nombre_usuario,
			'password' => $password,
			'tipo_usuario' => $tipo,
			'estado' => $estado,
			'apellidos' => $apellidos, 
			'nombres' => $nombres
		);
		
		$condicion = array(
			'id_usuario' => $id_usuario
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_usuario', $datos);
        $err = $this->db->error();
        $this->db->db_debug = TRUE;
		
		// Ver codigo de error
        if ($err['code'] == 0)
        {
			//$this->Bitacora_model->registrar_accion($this->session->userdata('id_usuario'),"modificar","El usuario modifico datos de la tabla (id = ".$id_usuario.")",__CLASS__);
        
            return true;
        }
        return false;
	}
	
	public function obtener_total_usuarios(){
		return $this->db->count_all("tbl_usuario");
	}
	
	public function obtener_lista_usuarios($limite, $inicio){
		$this->db->limit($limite, $inicio);
        $query = $this->db->get("tbl_usuario")->result_array();
		
		return $query;
	}
	
	public function obtener_lista_abogados(){
		$condicion = array(
			'tipo_usuario' => 'abogado'
		);
		
		$this->db->where($condicion);
        $query = $this->db->get("tbl_usuario")->result_array();
		return $query;
	}
}