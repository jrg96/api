<?php
    // OBTENER ID INSERTADO $conn->insert_id
	
    // ---------- ZONA DE RECEPCION PARAMS ----------
	$argumentos = $_SERVER['argv'];
	$id_cartera = $argumentos[1];

	// ---------- ZONA DE CREDENCIALES --------------
	$host_st = 'localhost';
	$usuario_st = 'root';
	$password_st = '';
	$bd_st = 'rygoservin';
	
	$host_sg = 'localhost';
	$usuario_sg = 'root';
	$password_sg = '';
	$bd_sg = 'bdgerencial';
	
	// Paso 1: Conectarse a ambas bases de datos
	$db_transaccional = new mysqli($host_st, $usuario_st, $password_st);
	$db_gerencial = new mysqli($host_sg, $usuario_sg, $password_sg);
	
	// Paso 2: seleccionar bases de datos a comparar
	$db_transaccional->select_db($bd_st);
	$db_gerencial->select_db($bd_sg);
	
	
	// ------------------ PASOS GENERALES --------------------------------
	// Paso 3: Comprobar si hay nuevos usuarios que mover de la ST a la SG
	echo "CARGANDO NUEVOS USUARIOS A LA BD GERENCIAL...\n";
	$usuarios_st = $db_transaccional->query('SELECT * FROM tbl_usuario');
	$usuarios_sg = $db_gerencial->query('SELECT * FROM tbl_usuario');
	
	if ($usuarios_st->num_rows > $usuarios_sg->num_rows)
	{
		while($fila = $usuarios_st->fetch_assoc())
		{
			$sentencia = $db_gerencial->prepare('INSERT INTO tbl_usuario(id_usuario, usuario_nombre_completo) VALUES (?, ?)');
			$sentencia->bind_param('is', $fila['id_usuario'], $fila['usuario_nombre_completo']);
			
			if ($sentencia->execute())
			{
				echo "SE HA AGREGADO UN NUEVO USUARIO A LA BD GERENCIAL \n";
			}
			
		}
	}
	echo "\n";
	echo "\n";
	
	// ------------------ PASOS ESPECIFICOS DE LA BD ----------------------
	// ------------------ ELIMINANDO (VACIANDO TABLAS) --------------------
	if ($id_cartera != 'todos')
	{
		$query = $db_gerencial->query("SELECT * FROM tbl_cartera WHERE id_cartera = $id_cartera");
		$row = $query->fetch_assoc();
		$sufijo_cartera = $row['sufijo_cartera'];
		
		$db_gerencial->query("DROP TABLE IF EXISTS tbl_gestion_deuda$sufijo_cartera");
		$db_gerencial->query("DROP TABLE IF EXISTS tbl_gestion_deuda$sufijo_cartera");
		$db_gerencial->query("DROP TABLE IF EXISTS tbl_campo_pk_deuda$sufijo_cartera");
		$db_gerencial->query("DROP TABLE IF EXISTS tbl_campo_pk_cliente$sufijo_cartera");
		$db_gerencial->query("DROP TABLE IF EXISTS tbl_campo_pk_cliente$sufijo_cartera");
		$db_gerencial->query("DELETE FROM tbl_estado_sub_disponible WHERE id_cartera = $id_cartera");
		$db_gerencial->query("DELETE FROM tbl_estado_disponible WHERE id_cartera = $id_cartera");
		
	}
	else
	{
		$query = $db_gerencial->query("SELECT * FROM tbl_cartera");
		while($fila = $query->fetch_assoc())
		{
			$id_cartera_n = $fila['id_cartera'];
			$sufijo_cartera_n = $row['sufijo_cartera'];
			
			$db_gerencial->query("DROP TABLE IF EXISTS tbl_gestion_deuda$sufijo_cartera_n");
			$db_gerencial->query("DROP TABLE IF EXISTS tbl_gestion_deuda$sufijo_cartera_n");
			$db_gerencial->query("DROP TABLE IF EXISTS tbl_campo_pk_deuda$sufijo_cartera_n");
			$db_gerencial->query("DROP TABLE IF EXISTS tbl_campo_pk_cliente$sufijo_cartera_n");
			$db_gerencial->query("DROP TABLE IF EXISTS tbl_campo_pk_cliente$sufijo_cartera_n");
			$db_gerencial->query("DELETE FROM tbl_estado_sub_disponible WHERE id_cartera = $id_cartera_n");
			$db_gerencial->query("DELETE FROM tbl_estado_disponible WHERE id_cartera = $id_cartera_N");
		}
	}
	
	
	// Paso 4: detectar si hay nuevas categorias de estados a agregar a la BD
	echo "CARGANDO NUEVOS ESTADOS DE CARTERA A LA BD GERENCIAL...\n";
	$estados_st = $db_transaccional->query('SELECT * FROM tbl_estado_disponible');
	$estados_sg = $db_gerencial->query('SELECT * FROM tbl_estado_disponible');
	
	if ($estados_st->num_rows > $estados_sg->num_rows)
	{
		while($fila = $estados_st->fetch_assoc())
		{
			$sentencia = $db_gerencial->prepare('INSERT INTO tbl_estado_disponible(id_estado_disponible, id_cartera, nombre_estado_disponible) VALUES (?, ?, ?)');
			$sentencia->bind_param('iis', $fila['id_estado_disponible'], $fila['id_cartera'], $fila['nombre_estado_disponible']);
			
			if ($sentencia->execute())
			{
				echo "SE HA AGREGADO UN NUEVO ESTADO A LA BD GERENCIAL \n";
			}
			
		}
	}
	echo "\n";
	echo "\n";
	
	
	// Paso 5: detectar si hay nuevos sub estados a agregar a la BD
	echo "CARGANDO NUEVOS SUB ESTADOS DE CARTERA A LA BD GERENCIAL...\n";
	$estados_st = $db_transaccional->query('SELECT * FROM tbl_estado_sub_disponible');
	$estados_sg = $db_gerencial->query('SELECT * FROM tbl_estado_sub_disponible');
	
	if ($estados_st->num_rows > $estados_sg->num_rows)
	{
		while($fila = $estados_st->fetch_assoc())
		{
			$sentencia = $db_gerencial->prepare('INSERT INTO tbl_estado_sub_disponible(id_estado_sub_disponible, id_estado_disponible, nombre_estado_sub_disponible) VALUES (?, ?, ?)');
			$sentencia->bind_param('iis', $fila['id_estado_sub_disponible'], $fila['id_estado_disponible'], $fila['nombre_estado_sub_disponible']);
			
			if ($sentencia->execute())
			{
				echo "SE HA AGREGADO UN NUEVO SUB ESTADO A LA BD GERENCIAL \n";
			}
		}
	}
	echo "\n";
	echo "\n";
	
	
	// Paso 6: Verificar todas las carteras que aun no tienen espacio fisico en BD gerencial
	echo "VERIFICANDO NUEVAS CARTERAS DE CLIENTES...\n";
	
	$carteras_sg = '';
	if ($id_cartera == 'todos')
	{
		$carteras_sg = $db_gerencial->query("SELECT * FROM tbl_cartera");
	}
	else
	{
		$carteras_sg = $db_gerencial->query("SELECT * FROM tbl_cartera WHERE id_cartera = $id_cartera");
	}
	
	if ($carteras_sg->num_rows > 0)
	{
		echo "SE HAN DETECTADO NUEVAS CARTERAS DE CLIENTES...\n";
		while($fila = $carteras_sg->fetch_assoc())
		{
			// tabla tbl_campo_pk_cliente
			$nombre_tabla_cliente = 'tbl_campo_pk_cliente' . $fila['sufijo_cartera'];
			$sql = 
			"CREATE TABLE $nombre_tabla_cliente(
			    id_campo_pk_cliente INT PRIMARY KEY NOT NULL
			)";
			$db_gerencial->query($sql);
			
			// tabla tbl_campo_pk_deuda
			$nombre_tabla_deuda = 'tbl_campo_pk_deuda' . $fila['sufijo_cartera'];
			$sql = 
			"CREATE TABLE $nombre_tabla_deuda(
			    id_campo_pk_deuda INT PRIMARY KEY NOT NULL,
				id_campo_pk_cliente INT NOT NULL,
				valor_deuda DECIMAL(10, 2) NOT NULL,
				FOREIGN KEY (id_campo_pk_cliente) REFERENCES $nombre_tabla_cliente(id_campo_pk_cliente)
			)";
			$db_gerencial->query($sql);
			
			
			// tabla tbl_gestion_deuda
			$nombre_tabla_gestion = 'tbl_gestion_deuda' . $fila['sufijo_cartera'];
			$sql = 
			"CREATE TABLE $nombre_tabla_gestion(
			    id_gestion_deuda INT PRIMARY KEY NOT NULL,
				id_campo_pk_cliente INT NOT NULL,
				id_usuario INT NOT NULL,
				id_estado_disponible INT NOT NULL,
				id_estado_sub_disponible INT NOT NULL,
				fecha_gestion DATE,
				FOREIGN KEY (id_campo_pk_cliente) REFERENCES $nombre_tabla_cliente(id_campo_pk_cliente),
				FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario),
				FOREIGN KEY (id_estado_disponible) REFERENCES tbl_estado_disponible(id_estado_disponible),
				FOREIGN KEY (id_estado_sub_disponible) REFERENCES tbl_estado_sub_disponible(id_estado_sub_disponible)
			)";
			$db_gerencial->query($sql);
			
			// tabla tbl_promesa_pago
			$nombre_tabla_promesa = 'tbl_promesa_pago' . $fila['sufijo_cartera'];
			$sql = 
			"CREATE TABLE $nombre_tabla_promesa(
			    id_promesa_pago INT PRIMARY KEY NOT NULL,
				id_campo_pk_cliente INT NOT NULL,
				id_usuario INT NOT NULL,
				saldo_a_pagar DECIMAL(10,2) NOT NULL,
				descuento DECIMAL(10,2) NOT NULL,
				fecha_emision_promesa DATE,
				FOREIGN KEY (id_campo_pk_cliente) REFERENCES $nombre_tabla_cliente(id_campo_pk_cliente),
				FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario)
			)";
			$db_gerencial->query($sql);
			
			$sentencia = $db_gerencial->prepare("UPDATE tbl_cartera SET existe_en_bd = 'si' WHERE id_cartera = ?");
			$sentencia->bind_param('i', $fila['id_cartera']);
			$sentencia->execute();
			echo "SE HA AGREGADO LA CARTERA: " . $fila['cartera_nombre'] . " AL ESPACIO FISICO DE LA BD GERENCIAL \n";
			
		}
	}
	
	
	// Paso 7: verificar todos las cuentas (deudoras), e insertar si hay nuevos
	echo "VERIFICANDO CUENTAS DEUDORAS DE LAS CARTERAS...\n";
	$carteras_sg2 = $db_gerencial->query("SELECT * FROM tbl_cartera");
	if ($carteras_sg2->num_rows > 0)
	{
		while($fila = $carteras_sg2->fetch_assoc())
		{
			echo "VERIFICANDO: " . $fila['cartera_nombre'] . "\n";
			$sufijo_cartera = $fila['sufijo_cartera'];
			
			$deudores_st = $db_transaccional->query("SELECT * FROM tbl_campo_pk_cliente$sufijo_cartera");
			$deudores_sg = $db_gerencial->query("SELECT * FROM tbl_campo_pk_cliente$sufijo_cartera");
			
			if ($deudores_st->num_rows > $deudores_sg->num_rows)
			{
				echo "SE HAN DETECTADO NUEVAS CUENTAS DEUDORAS... AGREGANDO \n";
				
				while($fila2 = $deudores_st->fetch_assoc())
				{
					$sentencia = $db_gerencial->prepare("INSERT INTO tbl_campo_pk_cliente$sufijo_cartera(id_campo_pk_cliente)  VALUES (?)");
					$sentencia->bind_param('i', $fila2['id_campo_pk_cliente']);
					
					if ($sentencia->execute())
					{
						echo "SE HA AGREGADO UNA NUEVA CUENTA DEUDORA \n";
					}
				}
				echo "\n";
				echo "\n";
			}
			
		}
		echo "\n";
		echo "\n";
	}
	
	// Paso 8: verificndo deudas de las cuentas deudoras
	echo "VERIFICANDO DEUDAS DE LAS CUENTAS DEUDORAS DE LAS CARTERAS...\n";
	$carteras_sg3 = $db_gerencial->query("SELECT * FROM tbl_cartera");
	if ($carteras_sg3->num_rows > 0)
	{
		while($fila = $carteras_sg3->fetch_assoc())
		{
			echo "VERIFICANDO: " . $fila['cartera_nombre'] . "\n";
			$sufijo_cartera = $fila['sufijo_cartera'];
			
			$deudas_st = $db_transaccional->query("SELECT * FROM tbl_campo_pk_deuda$sufijo_cartera");
			$deudas_sg = $db_gerencial->query("SELECT * FROM tbl_campo_pk_deuda$sufijo_cartera");
			
			if ($deudas_st->num_rows > $deudas_sg->num_rows)
			{
				echo "SE HAN DETECTADO NUEVAS CUENTAS DEUDORAS... AGREGANDO \n";
				while($fila2 = $deudas_st->fetch_assoc())
				{
					$id_campo_pk_deuda = $fila2['id_campo_pk_deuda'];
					// OJO: ESTE VALOR LO DEBO SACAR DE LA CONFIGURACION DE LA DB
					$id_campo_info_deuda = '7';
				
					$valor_deuda = $db_transaccional->query("SELECT * FROM tbl_campo_valor_deuda$sufijo_cartera WHERE id_campo_pk_deuda = $id_campo_pk_deuda AND id_campo_info_deuda = $id_campo_info_deuda");
					if ($fila3 = $valor_deuda->fetch_assoc())
					{
						$sentencia = $db_gerencial->prepare("INSERT INTO tbl_campo_pk_deuda$sufijo_cartera(id_campo_pk_deuda, id_campo_pk_cliente, valor_deuda)  VALUES (?, ?, ?)");
						$sentencia->bind_param('iid', $id_campo_pk_deuda, $fila2['id_campo_pk_cliente'], $fila3['valor']);
						$sentencia->execute();
						
						echo "SE HA AGREGADO UNA NUEVA DEUDA \n";
					}
				}
			}
		}
		echo "\n";
		echo "\n";
	}
	
	
	// Paso 9: verificando gestiones de las carteras
	echo "VERIFICANDO GESTIONES DE LAS CARTERAS...\n";
	$carteras_sg4 = $db_gerencial->query("SELECT * FROM tbl_cartera");
	if ($carteras_sg4->num_rows > 0)
	{
		while($fila = $carteras_sg4->fetch_assoc())
		{
			echo "VERIFICANDO: " . $fila['cartera_nombre'] . "\n";
			$sufijo_cartera = $fila['sufijo_cartera'];
			
			$gestiones_st = $db_transaccional->query("SELECT * FROM tbl_gestion_deuda$sufijo_cartera");
			$gestiones_sg = $db_gerencial->query("SELECT * FROM tbl_gestion_deuda$sufijo_cartera");
			
			if ($gestiones_st->num_rows > $gestiones_sg->num_rows)
			{
				while($fila2 = $gestiones_st->fetch_assoc())
				{
					$sentencia = $db_gerencial->prepare("INSERT INTO tbl_gestion_deuda$sufijo_cartera(id_gestion_deuda, id_campo_pk_cliente, id_usuario, id_estado_disponible, id_estado_sub_disponible, fecha_gestion)  VALUES (?, ?, ?, ?, ?, ?)");
					$sentencia->bind_param('iiiiis', $fila2['id_gestion_deuda'] , $fila2['id_campo_pk_cliente'], $fila2['id_usuario'], $fila2['id_estado_disponible'], $fila2['id_estado_sub_disponible'], $fila2['fecha_gestion']);
					
					if ($sentencia->execute())
					{
						echo "SE HA AGREGADO UNA NUEVA GESTION \n";
					}
				}
			}
		}
		echo "\n";
		echo "\n";
	}
	
	// Paso 10: verificando promesas de pago de las carteras 
	echo "VERIFICANDO PROMESAS DE PAGO DE LAS CARTERAS...\n";
	$carteras_sg5 = $db_gerencial->query("SELECT * FROM tbl_cartera");
	if ($carteras_sg5->num_rows > 0)
	{
		while($fila = $carteras_sg5->fetch_assoc())
		{
			echo "VERIFICANDO: " . $fila['cartera_nombre'] . "\n";
			$sufijo_cartera = $fila['sufijo_cartera'];
			
			$promesas_st = $db_transaccional->query("SELECT * FROM tbl_promesa_pago$sufijo_cartera");
			$promesas_sg = $db_gerencial->query("SELECT * FROM tbl_promesa_pago$sufijo_cartera");
			
			if ($promesas_st->num_rows > $promesas_sg->num_rows)
			{
				while($fila2 = $promesas_st->fetch_assoc())
				{
					$sentencia = $db_gerencial->prepare("INSERT INTO tbl_promesa_pago$sufijo_cartera(id_promesa_pago, id_campo_pk_cliente, id_usuario, saldo_a_pagar, descuento, fecha_emision_promesa)  VALUES (?, ?, ?, ?, ?, ?)");
					$sentencia->bind_param('iiidds', $fila2['id_promesa_pago'] , $fila2['id_campo_pk_cliente'], $fila2['id_usuario'], $fila2['saldo_a_pagar'], $fila2['descuento'], $fila2['fecha_emision_promesa']);
					
					if ($sentencia->execute())
					{
						echo "SE HA AGREGADO UNA NUEVA PROMESA DE PAGO \n";
					}
				}
			}
		}
		echo "\n";
		echo "\n";
	}
?>