<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rivas y Gonzalez</title>
    <link rel="stylesheet" href="{$base_url}assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{$base_url}assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="{$base_url}assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="{$base_url}assets/css/Data-Summary-Panel---3-Column-Overview--Mobile-Responsive.css">
    <link rel="stylesheet" href="{$base_url}assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="{$base_url}assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="{$base_url}assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="{$base_url}assets/css/styles.css">
</head>

<body class="basic-container">
    {include file='navbar.php'}
    <div class="container">
		<br />
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<ul class="nav nav-pills">
							<li class="nav-item">
								<a class="nav-link" href="/api/index.php/adminpanel/index">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/api/index.php/usuariolista/index">Lista de usuarios</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/usuarioinformacion/index/{$usuario.id_usuario}">Informacion usuario</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
        <div class="row table-row-space">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Datos del usuario</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Nombre de usuario:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.nombre_usuario}</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Nombres:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.nombres}</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Apellidos:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.apellidos}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Tipo de usuario:&nbsp;</h5>
                            </div>
                            <div class="col-sm-3">
                                <h5>
								{if $usuario.tipo_usuario eq 'estrategico'}
								Usuario estrategico
								{/if}
								
								{if $usuario.tipo_usuario eq 'tactico'}
								Usuario táctico
								{/if}
								
								{if $usuario.tipo_usuario eq 'admin'}
								Administrador
								{/if}
								</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Estado:&nbsp;</h5>
                            </div>
                            <div class="col-sm-3">
                                <h5>
								{if $usuario.estado eq 'habilitado'}
								Habilitado en el sistema
								{else}
								Deshabilitado en el sistema
								{/if}
								</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row table-row-space">
            <div class="col">
                <div class="card panel-table">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6 align-self-end">
                                <h5 class="v-align-center">Bitacora de acciones</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Descripcion</th>
                                        <th>Fecha y hora</th>
                                    </tr>
                                </thead>
                                <tbody>
									{foreach item=accion from=$bitacora}
                                    <tr>
                                        <td><center>{$accion.id_bitacora_accion}</center></td>
                                        <td>{$accion.descripcion_accion}</td>
                                        <td>{$accion.fecha_hora_accion}</td>
                                    </tr>
									{/foreach}
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
					<div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4"><label class="col-form-label">Pagina {$pagina_actual} de {$total_paginas}</label></div>
                            <div class="col-sm-8">
                                <nav class="float-right align-self-baseline">
                                    {$links|unescape:"htmlall"}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
    <script src="{$base_url}assets/js/jquery.min.js"></script>
    <script src="{$base_url}assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>