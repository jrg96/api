<?php
    //  Obtener conexion, empezar con la cartera way el salvador
	
	$host_st = 'localhost';
	$usuario_st = 'root';
	$password_st = '';
	$bd_st = 'rygoservin';
	$db_transaccional = new mysqli($host_st, $usuario_st, $password_st);
	$db_transaccional->select_db($bd_st);
	
	$query = $db_transaccional->query("SELECT * FROM tbl_cartera WHERE id_cartera = 17");
	$row = $query->fetch_assoc();
	$sufijo_cartera = $row['sufijo_cartera'];
	
	// Obtener toda la lista de cuentas de usuario
	$query = $db_transaccional->query("SELECT * FROM tbl_campo_pk_cliente$sufijo_cartera");
	
	while($fila = $query->fetch_assoc())
	{
		// Para cada cuenta, insertar una clasificacion respectiva
		$val_2 = 1;
		$val_3 = 7;
		$val_4 = 11;
		$val_5 = 'desc';
		
		$sentencia = $db_transaccional->prepare("INSERT INTO tbl_gestion_deuda$sufijo_cartera(id_campo_pk_cliente, id_usuario, id_estado_disponible, id_estado_sub_disponible, descripcion_gestion, fecha_gestion) VALUES(?, ?, ?, ?, ?, '1970-01-01')" );
		$sentencia->bind_param('iiiis', $fila['id_campo_pk_cliente'], $val_2, $val_3, $val_4, $val_5);
		$sentencia->execute();
		
		echo "gestion isertada con exito\n";
	}
	
	echo "Terminamos carga de gestiones\n";
?>