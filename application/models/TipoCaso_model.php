<?php
class TipoCaso_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
	
    
	// REVISADO
    public function insertar_datos_cliente($id_usuario, $nombre_tipo)
    {	
		$datos = array(
			'id_usuario' => $id_usuario,
			'nombre_tipo' => $nombre_tipo
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_tipo_caso_juridico', $datos);
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
	public function obtener_datos_tipo_caso_juridico($id_tipo_caso_juridico)
	{
		$datos= array(
			'id_tipo_caso_juridico'=>$id_tipo_caso_juridico
		);

		//Realizando la consultada
		$this->db->select('*');
        $this->db->from('tbl_tipo_caso_juridico');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();

		return $query[0];
	}

	
	public function actualizar_datos_tipo_caso_juridico($id_tipo_caso_juridico, $id_usuario, $nombre_tipo)
	{
		
		$datos = array(
			'id_usuario' => $id_usuario,
			'nombre_tipo' => $nombre_tipo
		);
		
		$condicion = array(
			'id_tipo_caso_juridico' => $id_tipo_caso_juridico
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_tipo_caso_juridico', $datos);
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
	
	public function eliminar_tipo_caso_juridico($id_tipo_caso_juridico)
	{
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->where('id_tipo_caso_juridico', $id_tipo_caso_juridico);
		$this->db->delete('tbl_tipo_caso_juridico');
		$this->db->flush_cache();
	}
	
	public function obtener_total_tipo_caso_juridico(){
		return $this->db->count_all("tbl_tipo_caso_juridico");
	}
	
	public function obtener_lista_tipo_caso_juridico($limite, $inicio){
		$this->db->limit($limite, $inicio);
        $query = $this->db->get("tbl_tipo_caso_juridico")->result_array();
		
		return $query;
	}
	
	public function obtener_lista_tipo_caso_juridico_2(){
        $query = $this->db->get("tbl_tipo_caso_juridico")->result_array();
		return $query;
	}
	
	public function obtener_lista_tipo_caso_juridico_3(){
		
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->order_by('nombre_tipo ASC');
        $query = $this->db->get("tbl_tipo_caso_juridico")->result_array();
		$this->db->flush_cache();
		return $query;
	}
}