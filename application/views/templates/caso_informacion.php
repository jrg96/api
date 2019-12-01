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
								<a class="nav-link" href="/api/index.php/clienteinformacion/index/{$id_datos_cliente}">Informacion de cliente</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/casoinformacion/index/{$id_datos_cliente}/{$id_caso_juridico}">Informacion de caso legal</a>
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
                        <h5 class="mb-0">Datos del caso legal:</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Nombre del caso legal:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.nombre_caso}</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Atendido por:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.apellidos}, {$usuario.nombres}</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Tipo de caso:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.nombre_tipo}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Descripcion:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$usuario.descripcion}</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Estado:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>
								{if $usuario.estado_caso eq 'proceso'}
								En proceso
								{else}
								Terminado
								{/if}
								</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Fecha iniciado:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$fecha_creacion}</h5>
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
                                <h5 class="v-align-center">Pagos del caso legal</h5>
                            </div>
                            <div class="col-sm-6"><a class="btn btn-primary float-right" role="button" href="/api/index.php/pagoinsertar/index/{$id_datos_cliente}/{$id_caso_juridico}">Nuevo pago</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Monto</th>
										<th>Fecha</th>
                                        <th>Emitido por</th>
										<th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
									{foreach item=pago from=$pagos}
                                    <tr>
                                        <td>
											<div class="btn-group" role="group">
												<a class="btn btn-success" role="button" href="/api/index.php/pagomodificar/index/{$id_datos_cliente}/{$id_caso_juridico}/{$pago.id_pago_caso}">
													<i class="fa fa-pencil"></i>
												</a>
												<a class="btn btn-primary" role="button" href="/api/index.php/tipocasoinformacion/index/{$usuario.id_tipo_caso_juridico}">
													<i class="fa fa-info"></i>
												</a>
												<a class="btn btn-danger" role="button" href="/api/index.php/pagoeliminar/index/{$id_datos_cliente}/{$id_caso_juridico}/{$pago.id_pago_caso}">
													<i class="fa fa-trash"></i>
												</a>
											</div>
										</td>
                                        <td>${$pago.monto_pago}</td>
                                        <td>{$pago.fecha_pago}</td>
										<td>{$pago.apellidos}, {$pago.nombres}</td>
										<td>{$pago.estado_pago}</td>
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