<?php
class PagoCaso_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
	
    
	// REVISADO
    public function insertar_pago_caso($id_usuario, $id_caso_juridico, $monto_pago, $fecha_pago, $descripcion, $estado_pago)
    {	
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_caso_juridico' => $id_caso_juridico,
			'monto_pago' => $monto_pago,
			'fecha_pago' => $fecha_pago,
			'descripcion' => $descripcion,
			'estado_pago' => $estado_pago
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_pago_caso', $datos);
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
	public function obtener_datos_pago_caso($id_pago_caso)
	{
		$datos= array(
			'id_pago_caso'=>$id_pago_caso
		);

		//Realizando la consultada
		$this->db->select('*');
        $this->db->from('tbl_pago_caso');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();

		return $query[0];
	}

	
	public function actualizar_datos_pago_caso($id_pago_caso, $id_caso_juridico, $monto_pago, $fecha_pago, $descripcion, $estado_pago)
	{
		
		$datos = array(
			'id_caso_juridico' => $id_caso_juridico,
			'monto_pago' => $monto_pago,
			'fecha_pago' => $fecha_pago,
			'descripcion' => $descripcion,
			'estado_pago' => $estado_pago
		);
		
		$condicion = array(
			'id_pago_caso' => $id_pago_caso
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_pago_caso', $datos);
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
	
	public function eliminar_pago_caso($id_pago_caso)
	{
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->where('id_pago_caso', $id_pago_caso);
		$this->db->delete('tbl_pago_caso');
		$this->db->flush_cache();
	}
	
	public function obtener_total_pago_caso($id_caso_juridico){
		$condicion = array(
			'id_caso_juridico' => $id_caso_juridico
		);
		
		$this->db->where($condicion);
		$res = $this->db->count_all("tbl_pago_caso");
		$this->db->flush_cache();
		return $res;
	}
	
	public function obtener_lista_pago_caso($id_caso_juridico, $limite, $inicio){
		$condicion = array(
			'id_caso_juridico' => $id_caso_juridico
		);
		
		
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->select('*');
		$this->db->from('tbl_pago_caso');
		$this->db->where($condicion);
		$this->db->join('tbl_usuario', 'tbl_usuario.id_usuario = tbl_pago_caso.id_usuario');
		$this->db->limit($limite, $inicio);
        $query = $this->db->get()->result_array();
		$this->db->flush_cache();
		
		return $query;
	}
	
	public function obtener_lista_pago_caso_3($id_datos_cliente, $fecha_fin){
		$condicion = array(
			'id_datos_cliente' => $id_datos_cliente,
			'fecha_pago <= ' => $fecha_fin
		);
		
		
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->select('*');
		$this->db->from('tbl_pago_caso');
		$this->db->where($condicion);
		$this->db->join('tbl_caso_juridico', 'tbl_caso_juridico.id_caso_juridico = tbl_pago_caso.id_caso_juridico');
		$this->db->order_by('fecha_creacion DESC, nombre_caso ASC, estado_pago DESC');
        $query = $this->db->get()->result_array();
		$this->db->flush_cache();
		
		return $query;
	}
	
	public function obtener_lista_pago_caso_2($id_caso_juridico){
		$condicion = array(
			'id_caso_juridico' => $id_caso_juridico
		);
		
		
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->select('*');
		$this->db->from('tbl_pago_caso');
		$this->db->where($condicion);
        $query = $this->db->get()->result_array();
		$this->db->flush_cache();
		
		return $query;
	}
	
	public function obtener_ganancia_deuda_tipo_caso($id_tipo_caso_juridico, $estado, $fecha_inicio, $fecha_fin)
	{
		$condicion = array(
			'tbl_tipo_caso_juridico.id_tipo_caso_juridico' => $id_tipo_caso_juridico,
			'estado_pago' => $estado,
			'fecha_pago >= ' => $fecha_inicio,
			'fecha_pago <= ' => $fecha_fin
		);
		
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->select('*');
		$this->db->from('tbl_pago_caso');
		$this->db->where($condicion);
		$this->db->join('tbl_caso_juridico', 'tbl_caso_juridico.id_caso_juridico = tbl_pago_caso.id_caso_juridico');
        $this->db->join('tbl_tipo_caso_juridico', 'tbl_caso_juridico.id_tipo_caso_juridico = tbl_tipo_caso_juridico.id_tipo_caso_juridico');
		$query = $this->db->get()->result_array();
		$this->db->flush_cache();
		
		// Realizar recuento
		$valor = 0.0;
		foreach ($query as $pago)
		{
			$valor += $pago['monto_pago'];
		}
		
		return $valor;
	}
}