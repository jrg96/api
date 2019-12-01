<?php
class Cliente_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
	
    
	// REVISADO
    public function insertar_datos_cliente($apellidos, $nombres, $dui, $nit, $celular, $residencia)
    {	
		$datos = array(
			'apellidos' => $apellidos,
			'nombres' => $nombres,
			'dui' => $dui,
			'nit' => $nit,
			'celular' => $celular,
			'residencia' => $residencia
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_datos_cliente', $datos);
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
	public function obtener_datos_cliente($id_datos_cliente)
	{
		$datos= array(
			'id_datos_cliente'=>$id_datos_cliente
		);

		//Realizando la consultada
		$this->db->select('*');
        $this->db->from('tbl_datos_cliente');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();

		return $query[0];
	}

	
	public function actualizar_datos_cliente($id_datos_cliente, $apellidos, $nombres, $dui, $nit, $celular, $residencia)
	{
		
		$datos = array(
			'apellidos' => $apellidos,
			'nombres' => $nombres,
			'dui' => $dui,
			'nit' => $nit,
			'celular' => $celular,
			'residencia' => $residencia
		);
		
		$condicion = array(
			'id_datos_cliente' => $id_datos_cliente
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_datos_cliente', $datos);
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
	
	public function eliminar_datos_cliente($id_datos_cliente)
	{
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->where('id_datos_cliente', $id_datos_cliente);
		$this->db->delete('tbl_datos_cliente');
		$this->db->flush_cache();
	}
	
	public function obtener_total_datos_cliente(){
		return $this->db->count_all("tbl_datos_cliente");
	}
	
	public function obtener_lista_datos_cliente($limite, $inicio){
		$this->db->limit($limite, $inicio);
        $query = $this->db->get("tbl_datos_cliente")->result_array();
		
		return $query;
	}
	
	public function obtener_lista_datos_cliente_2(){
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->order_by('apellidos ASC, nombres ASC');
        $query = $this->db->get("tbl_datos_cliente")->result_array();
		$this->db->flush_cache();
		return $query;
	}
}