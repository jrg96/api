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
	<link rel="stylesheet" href="{$base_url}assets/css/gijgo.min.css">
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
								<a class="nav-link" href="/api/index.php/clienteinformacion/index/{$id_datos_cliente}">Datos de cliente</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/casomodificar/index/{$id_datos_cliente}/{$id_caso_juridico}">Modificar caso legal</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	    {if $resultado_operacion neq 'ninguna'}
		{if $resultado_operacion eq 'exito'}
        <div class="alert alert-success" role="alert"><span><strong>Caso legal modificado con exito</strong><br></span></div>
		{/if}
		{if $resultado_operacion eq 'fracaso'}
        <div class="alert alert-danger" role="alert"><span><strong>Error al modificar caso legal: {$mensaje_operacion}</strong></span></div>
		{/if}
		{/if}
		
        <div class="row insert-row-padding">
            <div class="col-lg-6 col-xl-6 center-column">
                <div class="card box-shadow">
                    <div class="card-body">
                        <form action="/api/index.php/casomodificar/procesar" method="post">
							<input type="hidden" name="id_datos_cliente" id="id_datos_cliente" value="{$id_datos_cliente}" />
							<input type="hidden" name="id_caso_juridico" id="id_caso_juridico" value="{$id_caso_juridico}" />							
                            
							<div class="form-group">
                                <h1 class="center-text-align">Modificar caso legal</h1>
								<label>Fecha de inicio del caso</label>
								<input required readonly name="fecha_creacion" id="fecha_creacion" class="form-control form-control-lg" type="text" value="{$fecha_creacion}">
							</div>
							<div class="form-group">
								<label>Fecha de fin del caso</label>
								<input name="fecha_terminacion" id="fecha_terminacion" class="form-control form-control-lg" type="text" value="{$fecha_terminacion}">
							</div>
							<div class="form-group">
								<label>Abogado encargado</label>
								<select name="id_usuario_sistema" id="id_usuario_sistema" required class="form-control form-control-lg">
									{foreach item=abogado from=$abogados}
									{if $datos_usuario.id_usuario eq $abogado.id_usuario}
									<option selected value="{$abogado.id_usuario}"> ID: {$abogado.id_usuario} - {$abogado.apellidos},{$abogado.nombres} </option>
									{else}
									<option value="{$abogado.id_usuario}"> ID: {$abogado.id_usuario} - {$abogado.apellidos},{$abogado.nombres} </option>
									{/if}
									{/foreach}
								</select>
							</div>
							<div class="form-group">
								<label>Nombre del caso</label>
								<input name="nombre_caso" required id="nombre_caso" class="form-control form-control-lg" type="text" value="{$datos_usuario.nombre_caso}">
							</div>
							<div class="form-group">
								<label>Tipo usuario</label>
								<select name="id_tipo_caso_juridico" id="id_tipo_caso_juridico" required class="form-control form-control-lg">
									{foreach item=tipo from=$tipos_caso}
									{if $datos_usuario.id_tipo_caso_juridico eq $tipo.id_tipo_caso_juridico}
									<option selected value="{$tipo.id_tipo_caso_juridico}">{$tipo.nombre_tipo}</option>
									{else}
									<option value="{$tipo.id_tipo_caso_juridico}">{$tipo.nombre_tipo}</option>
									{/if}
									{/foreach}
								</select>
							</div>
							<div class="form-group">
								<label>Descripcion</label>
								<textarea name="descripcion" required id="descripcion" class="form-control form-control-lg">{$datos_usuario.descripcion}</textarea>
							</div>
							<div class="form-group">
								<label>Estado</label>
								<select name="estado_caso" id="estado_caso" class="form-control form-control-lg">
									{if $datos_usuario.estado_caso eq 'proceso'}
									<option selected value="proceso">Caso en proceso</option>
									<option value="terminado">Caso terminado</option>
									{else}
									<option value="proceso">Caso en proceso</option>
									<option selected value="terminado">Caso terminado</option>
									{/if}
								</select>
							</div>
							
						<div class="form-group long-v-spacing"><input class="btn btn-primary btn-block btn-lg" type="submit" value="Modificar caso legal"></input></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{$base_url}assets/js/jquery.min.js"></script>
    <script src="{$base_url}assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="{$base_url}assets/js/gijgo.min.js"></script>
	<script src="{$base_url}assets/js/messages.es-es.js"></script>
	<script src="{$base_url}assets/js/caso_modificar.js"></script>
</body>

</html>