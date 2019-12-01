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
								<a class="nav-link" href="/api/index.php/tipocasolista/index">Lista de tipos de caso</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/tipocasomodificar/index/{$datos_usuario.id_tipo_caso_juridico}">Modificar tipo de caso</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	    {if $resultado_operacion eq 'exito'}
		<br />
        <div class="alert alert-success" role="alert"><span><strong>Tipo de caso modificado con exito</strong><br></span></div>
        {/if}
		{if $resultado_operacion eq 'fracaso'}
		<br />
		<div class="alert alert-danger" role="alert"><span><strong>Error al modificar tipo de caso: {$mensaje_operacion}</strong></span></div>
        {/if}
		<div class="row insert-row-padding">
            <div class="col-lg-6 col-xl-6 center-column">
                <div class="card box-shadow">
                    <div class="card-body">
                        <form method="post" action="/api/index.php/tipocasomodificar/procesar">
						    <input type="hidden" name="id_tipo_caso_juridico" id="id_tipo_caso_juridico" value="{$datos_usuario.id_tipo_caso_juridico}" />
							<input type="hidden" name="id_usuario_sistema" id="id_usuario_sistema" value="{$datos_usuario.id_usuario}" />
                            
							<div class="form-group">
                                <h1 class="center-text-align">Modificar tipo de caso</h1>
								<label>Nombre del tipo de caso</label>
								<input name="nombre_tipo" required id="nombre_tipo" class="form-control form-control-lg" type="text" value="{$datos_usuario.nombre_tipo}">	
							</div>
							
                    <div class="form-group long-v-spacing">
						<input class="btn btn-primary btn-block btn-lg" type="submit" value="Modificar datos del tipo de caso" />
					</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{$base_url}assets/js/jquery.min.js"></script>
    <script src="{$base_url}assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>