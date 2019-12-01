<?php
class Caso_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
		$this->load->model('PagoCaso_model');
    }
	
    
	// REVISADO
    public function insertar_caso_juridico($id_usuario, $id_datos_cliente, $fecha_creacion, $nombre_caso, $id_tipo_caso_juridico, $descripcion, $estado_caso)
    {	
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_datos_cliente' => $id_datos_cliente,
			'fecha_creacion' => $fecha_creacion,
			'nombre_caso' => $nombre_caso,
			'id_tipo_caso_juridico' => $id_tipo_caso_juridico,
			'descripcion' => $descripcion,
			'estado_caso' => $estado_caso
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_caso_juridico', $datos);
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
	public function obtener_datos_caso_juridico($id_caso_juridico)
	{
		$condicion= array(
			'id_caso_juridico'=>$id_caso_juridico
		);
		
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->select('*');
		$this->db->from('tbl_caso_juridico');
		$this->db->where($condicion);
		$this->db->join('tbl_usuario', 'tbl_usuario.id_usuario = tbl_caso_juridico.id_usuario');
		$this->db->join('tbl_tipo_caso_juridico', 'tbl_tipo_caso_juridico.id_tipo_caso_juridico = tbl_caso_juridico.id_tipo_caso_juridico');
        $query = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $query[0];
	}

	
	public function actualizar_datos_caso_juridico($id_caso_juridico, $id_usuario, $id_datos_cliente, $fecha_creacion, $nombre_caso, $id_tipo_caso_juridico, $descripcion, $estado_caso, $fecha_terminacion)
	{
		
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_datos_cliente' => $id_datos_cliente,
			'fecha_creacion' => $fecha_creacion,
			'nombre_caso' => $nombre_caso,
			'id_tipo_caso_juridico' => $id_tipo_caso_juridico,
			'descripcion' => $descripcion,
			'estado_caso' => $estado_caso,
			'fecha_terminacion' => null
		);
		
		if (!empty($fecha_terminacion))
		{
			$datos['fecha_terminacion'] = $fecha_terminacion;
		}
		
		$condicion = array(
			'id_caso_juridico' => $id_caso_juridico
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_caso_juridico', $datos);
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
	
	public function eliminar_caso_juridico($id_caso_juridico)
	{
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->where('id_caso_juridico', $id_caso_juridico);
		$this->db->delete('tbl_caso_juridico');
		$this->db->flush_cache();
	}
	
	public function obtener_total_caso_juridico($id_datos_cliente){
		$condicion = array(
			'id_datos_cliente' => $id_datos_cliente
		);
		
		$this->db->where($condicion);
		$res = $this->db->count_all("tbl_tipo_caso_juridico");
		$this->db->flush_cache();
		return $res;
	}
	
	public function obtener_lista_caso_juridico($id_datos_cliente, $limite, $inicio){
		$condicion = array(
			'id_datos_cliente' => $id_datos_cliente
		);
		
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->select('*');
		$this->db->from('tbl_caso_juridico');
		$this->db->where($condicion);
		$this->db->join('tbl_usuario', 'tbl_usuario.id_usuario = tbl_caso_juridico.id_usuario');
		$this->db->limit($limite, $inicio);
        $query = $this->db->get()->result_array();
		$this->db->flush_cache();
		
		return $query;
	}
	
	public function obtener_lista_caso_juridico_2($id_datos_cliente){
		$condicion = array(
			'id_datos_cliente' => $id_datos_cliente
		);
		
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->select('*');
		$this->db->from('tbl_caso_juridico');
		$this->db->order_by('fecha_creacion DESC');
		$this->db->where($condicion);
        $query = $this->db->get()->result_array();
		$this->db->flush_cache();
		
		return $query;
	}
	
	public function obtener_lista_caso_juridico_3($id_datos_cliente){
		$condicion = array(
			'id_datos_cliente' => $id_datos_cliente
		);
		
		$this->db->flush_cache();
		$this->db->start_cache();
		$this->db->stop_cache();
		$this->db->select('*');
		$this->db->from('tbl_caso_juridico');
		$this->db->order_by('fecha_creacion DESC');
		$this->db->join('tbl_usuario', 'tbl_usuario.id_usuario = tbl_caso_juridico.id_usuario');
		$this->db->where($condicion);
        $query = $this->db->get()->result_array();
		$this->db->flush_cache();
		
		return $query;
	}
	
	
	public function obtener_deuda_caso_legal($id_caso_juridico)
	{
		$deuda = 0.0;
		$lista_pagos = $this->PagoCaso_model->obtener_lista_pago_caso_2($id_caso_juridico);
		
		foreach ($lista_pagos as $pago)
		{
			if ($pago['estado_pago'] == 'sin pagar')
			{
				$deuda = $deuda + $pago['monto_pago'];
			}
		}
		
		return $deuda;
	}
}