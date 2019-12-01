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
								<a class="nav-link" href="/api/index.php/abogadopanel/index">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/api/index.php/clientelista/index">Lista de clientes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/clienteinformacion/index/{$usuario.id_datos_cliente}">Informacion de cliente</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		{if $resultado_operacion neq 'ninguna'}

            {if $resultado_operacion eq 'exito'}
                <div class="alert alert-success" role="alert"><span><strong>{$mensaje_operacion}</strong><br></span></div>
            {/if}

            {if $resultado_operacion eq 'fracaso'}
                <div class="alert alert-danger" role="alert"><span><strong>Error:{$mensaje_operacion}</strong></span></div>
            {/if}

        {/if}
        <div class="row table-row-space">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Datos del cliente</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Nombres del cliente:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.nombres}</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Apellidos del cliente:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.apellidos}</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>DUI:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.dui}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>NIT:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.nit}</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Celular:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.celular}</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Lugar de residencia:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.residencia}</h5>
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
                                <h5 class="v-align-center">Casos legales del cliente</h5>
                            </div>
                            <div class="col-sm-6"><a class="btn btn-primary float-right" role="button" href="/api/index.php/casoinsertar/index/{$usuario.id_datos_cliente}">Nuevo caso legal</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Nombre del caso</th>
                                        <th>Atendido por</th>
                                    </tr>
                                </thead>
                                <tbody>
									{foreach item=caso from=$casos}
                                    <tr>
                                        <td>
											<div class="btn-group" role="group">
												<a class="btn btn-success" role="button" href="/api/index.php/casomodificar/index/{$caso.id_datos_cliente}/{$caso.id_caso_juridico}">
													<i class="fa fa-pencil"></i>
												</a>
												<a class="btn btn-primary" role="button" href="/api/index.php/casoinformacion/index/{$caso.id_datos_cliente}/{$caso.id_caso_juridico}">
													<i class="fa fa-info"></i>
												</a>
												<a class="btn btn-danger" role="button" href="/api/index.php/casoeliminar/index/{$caso.id_datos_cliente}/{$caso.id_caso_juridico}">
													<i class="fa fa-trash"></i>
												</a>
											</div>
										</td>
                                        <td>{$caso.nombre_caso}</td>
                                        <td>{$caso.apellidos} {$caso.nombres}</td>
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