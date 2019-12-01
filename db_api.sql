CREATE TABLE tbl_usuario(
    id_usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_usuario VARCHAR(50) NOT NULL,
	password VARCHAR(128) NOT NULL,
	tipo_usuario VARCHAR(20) NOT NULL,
	estado VARCHAR(20) NOT NULL,
	apellidos VARCHAR(200) NOT NULL,
	nombres VARCHAR(200) NOT NULL
);

CREATE TABLE tbl_bitacora_accion(
	id_bitacora_accion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	descripcion_accion VARCHAR(1000) NOT NULL,
	fecha_hora_accion DATETIME NOT NULL,
	FOREIGN KEY(id_usuario) REFERENCES tbl_usuario(id_usuario)
);


CREATE TABLE tbl_datos_cliente(
    id_datos_cliente INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	apellidos VARCHAR(200) NOT NULL,
	nombres VARCHAR(200) NOT NULL,
	dui VARCHAR(10) NOT NULL,
	nit VARCHAR(17) NOT NULL,
	celular VARCHAR(10) NOT NULL,
	residencia VARCHAR(600) NOT NULL
);

CREATE TABLE tbl_libro_protocolo(
    id_libro_protocolo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nombre_libro VARCHAR(500),
	id_usuario INT NOT NULL,
	FOREIGN KEY(id_usuario) REFERENCES tbl_usuario(id_usuario)
);

CREATE TABLE tbl_hoja_protocolo(
    id_hoja_protocolo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_libro_protocolo INT NOT NULL,
	id_usuario INT NOT NULL,
	numero_pagina INT NOT NULL,
	estado_pagina VARCHAR(20) NOT NULL,
	descripcion TEXT,
	FOREIGN KEY(id_usuario) REFERENCES tbl_usuario(id_usuario),
	FOREIGN KEY(id_libro_protocolo) REFERENCES tbl_libro_protocolo(id_libro_protocolo)
);

CREATE TABLE tbl_evento_proximo(
    id_evento_proximo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	fecha_evento DATE,
	hora_evento TIME,
	titulo_evento VARCHAR(500) NOT NULL,
	descripcion_evento TEXT NOT NULL,
	FOREIGN KEY(id_usuario) REFERENCES tbl_usuario(id_usuario)
);

CREATE TABLE tbl_tipo_caso_juridico(
	id_tipo_caso_juridico INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	nombre_tipo VARCHAR(200),
	FOREIGN KEY(id_usuario) REFERENCES tbl_usuario(id_usuario)
);

CREATE TABLE tbl_caso_juridico(
	id_caso_juridico INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	id_datos_cliente INT NOT NULL,
	fecha_creacion DATETIME NOT NULL,
	fecha_terminacion DATETIME NULL,
	nombre_caso VARCHAR(800) NOT NULL,
	id_tipo_caso_juridico INT NOT NULL,
	descripcion TEXT NOT NULL,
	estado_caso VARCHAR(20),
	FOREIGN KEY(id_usuario) REFERENCES tbl_usuario(id_usuario),
	FOREIGN KEY(id_datos_cliente) REFERENCES tbl_datos_cliente(id_datos_cliente),
	FOREIGN KEY(id_tipo_caso_juridico) REFERENCES tbl_tipo_caso_juridico(id_tipo_caso_juridico)
);

CREATE TABLE tbl_pago_caso(
	id_pago_caso INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	id_caso_juridico INT NOT NULL,
	monto_pago DECIMAL(10,2) NOT NULL,
	fecha_pago DATETIME NOT NULL,
	descripcion TEXT NOT NULL,
	estado_pago VARCHAR(20) NOT NULL,
	FOREIGN KEY(id_usuario) REFERENCES tbl_usuario(id_usuario),
	FOREIGN KEY(id_caso_juridico) REFERENCES tbl_caso_juridico(id_caso_juridico)
);

CREATE TABLE tbl_fax_recibido(
	id_fax_recibido INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	id_datos_cliente INT NOT NULL,
	fecha_recibido DATETIME NOT NULL,
	estado_fax VARCHAR(20) NOT NULL,
	descripcion TEXT NOT NULL,
	FOREIGN KEY(id_usuario) REFERENCES tbl_usuario(id_usuario),
	FOREIGN KEY(id_datos_cliente) REFERENCES tbl_datos_cliente(id_datos_cliente)
);