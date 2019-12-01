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
								<a class="nav-link active" href="/api/index.php/tipocasolista/index">Lista de tipos de casos</a>
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
                                <h5 class="v-align-center">Lista de tipos de caso</h5>
                            </div>
                            <div class="col-sm-6"><a class="btn btn-primary float-right" role="button" href="/api/index.php/tipocasoinsertar/index">Nuevo tipo de caso</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-cog"></i></th>
                                        <th>ID</th>
                                        <th>Tipo de caso</th>
                                    </tr>
                                </thead>
                                <tbody>
								    {foreach item=usuario from=$usuarios}
                                    <tr>
                                        <td>
                                            <div class="btn-group" role="group">
												<a class="btn btn-success" role="button" href="/api/index.php/tipocasomodificar/index/{$usuario.id_tipo_caso_juridico}">
													<i class="fa fa-pencil"></i>
												</a>
												<!--<a class="btn btn-primary" role="button" href="/api/index.php/tipocasoinformacion/index/{$usuario.id_tipo_caso_juridico}">
													<i class="fa fa-info"></i>
												</a> -->
												<a class="btn btn-danger" role="button" href="/api/index.php/tipocasoeliminar/index/{$usuario.id_tipo_caso_juridico}">
													<i class="fa fa-trash"></i>
												</a>
											</div>
                                        </td>
                                        <td>{$usuario.id_tipo_caso_juridico}</td>
                                        <td>{$usuario.nombre_tipo}</td>
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