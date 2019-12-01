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
								<a class="nav-link active" href="/api/index.php/usuariolista/index">Lista de usuarios</a>
							</li>
						</ul>
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
                                <h5 class="v-align-center">Lista de usuarios</h5>
                            </div>
                            <div class="col-sm-6"><a class="btn btn-primary float-right" role="button" href="/api/index.php/usuarioinsertar/index">Nuevo usuario</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-cog"></i></th>
                                        <th>ID</th>
                                        <th>Nombre usuario</th>
                                        <th>Tipo</th>
										<th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
								    {foreach item=usuario from=$usuarios}
                                    <tr>
                                        <td>
                                            <div class="btn-group" role="group">
												<a class="btn btn-success" role="button" href="/api/index.php/usuariomodificar/index/{$usuario.id_usuario}">
													<i class="fa fa-pencil"></i>
												</a>
												<a class="btn btn-primary" role="button" href="/api/index.php/usuarioinformacion/index/{$usuario.id_usuario}">
													<i class="fa fa-info"></i>
												</a>
											</div>
                                        </td>
                                        <td>{$usuario.id_usuario}</td>
                                        <td>{$usuario.nombre_usuario}</td>
                                        <td>
										{if $usuario.tipo_usuario eq 'estrategico'}
										Usuario Estratégico
										{elseif $usuario.tipo_usuario eq 'tactico'}
										Usuario táctico
										{elseif $usuario.tipo_usuario eq 'abogado'}
										Usuario abogado
										{else}
										Administrador
										{/if}
										</td>
										<td>
										{if $usuario.estado eq 'habilitado'}
										Usuario habilitado en el sistema
										{else}
										Usuario deshabilitado en el sistema
										{/if}
										</td>
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
    </div>
    <script src="{$base_url}assets/js/jquery.min.js"></script>
    <script src="{$base_url}assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>