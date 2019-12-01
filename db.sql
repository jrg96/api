

CREATE TABLE tbl_usuario(
	id_usuario INT PRIMARY KEY NOT NULL,
	usuario_nombre_completo VARCHAR(200) NOT NULL
);

CREATE TABLE tbl_usuario_gerencial(
	id_usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_usuario VARCHAR(200) UNIQUE NOT NULL,
	password VARCHAR(200) NOT NULL,
	tipo VARCHAR(100) NOT NULL
);

CREATE TABLE tbl_cartera(
	id_cartera INT PRIMARY KEY NOT NULL,
	cartera_nombre VARCHAR(50) NOT NULL,
	sufijo_cartera VARCHAR(50) NOT NULL,
	existe_en_bd VARCHAR(2) NOT NULL
);

CREATE TABLE tbl_estado_disponible(
  id_estado_disponible int PRIMARY KEY NOT NULL,
  id_cartera int NOT NULL,
  nombre_estado_disponible varchar(500) NOT NULL,
  FOREIGN KEY (id_cartera) REFERENCES tbl_cartera(id_cartera) ON DELETE CASCADE
);

CREATE TABLE tbl_estado_sub_disponible (
  id_estado_sub_disponible int PRIMARY KEY NOT NULL,
  id_estado_disponible int NOT NULL,
  nombre_estado_sub_disponible varchar(500) DEFAULT NULL,
  FOREIGN KEY (id_estado_disponible) REFERENCES tbl_estado_disponible(id_estado_disponible) ON DELETE CASCADE
);

CREATE TABLE tbl_bitacora_accion(
  id_bitacora_accion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  fecha_hora_accion DATETIME NOT NULL,
  descripcion_accion TEXT, 
  FOREIGN KEY(id_usuario) REFERENCES tbl_usuario_gerencial(id_usuario)
);

CREATE TABLE tbl_configuracion_cartera(
  id_configuracion_cartera INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_cartera INT NOT NULL,
  id_estado_disponible INT NOT NULL,
  FOREIGN KEY (id_cartera) REFERENCES tbl_cartera(id_cartera)
);

CREATE TABLE tbl_bitacora_etl(
  id_bitacora_etl INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  fecha_hora_inicio DATETIME NOT NULL,
  fecha_hora_fin DATETIME,
  progreso INT,
  observaciones TEXT
);

CREATE TABLE tbl_configuracion_etl(
  id_configuracion_etl INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_cartera INT NOT NULL,
  id_campo_info_deuda INT NOT NULL,
  FOREIGN KEY (id_cartera) REFERENCES tbl_cartera(id_cartera)
);

CREATE TABLE tbl_campo_pk_cliente(
  id_campo_pk_cliente INT PRIMARY KEY NOT NULL
);

CREATE TABLE tbl_campo_pk_deuda(
	id_campo_pk_deuda INT PRIMARY KEY NOT NULL,
	id_campo_pk_cliente INT NOT NULL,
	valor_deuda DECIMAL(10, 2) NOT NULL,
	FOREIGN KEY (id_campo_pk_cliente) REFERENCES tbl_campo_pk_cliente(id_campo_pk_cliente)
);

CREATE TABLE tbl_gestion_deuda(
	id_gestion_deuda INT PRIMARY KEY NOT NULL,
	id_campo_pk_cliente INT NOT NULL,
	id_usuario INT NOT NULL,
	id_estado_disponible INT NOT NULL,
	id_estado_sub_disponible INT NOT NULL,
	fecha_gestion DATE,
	FOREIGN KEY (id_campo_pk_cliente) REFERENCES tbl_campo_pk_cliente(id_campo_pk_cliente),
	FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario),
	FOREIGN KEY (id_estado_disponible) REFERENCES tbl_estado_disponible(id_estado_disponible),
	FOREIGN KEY (id_estado_sub_disponible) REFERENCES tbl_estado_sub_disponible(id_estado_sub_disponible)
);

CREATE TABLE tbl_promesa_pago(
	id_promesa_pago INT PRIMARY KEY NOT NULL,
	id_campo_pk_cliente INT NOT NULL,
	id_usuario INT NOT NULL,
	saldo_a_pagar DECIMAL(10,2) NOT NULL,
	descuento DECIMAL(10,2) NOT NULL,
	fecha_emision_promesa DATE,
	FOREIGN KEY (id_campo_pk_cliente) REFERENCES tbl_campo_pk_cliente(id_campo_pk_cliente),
	FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario)
);