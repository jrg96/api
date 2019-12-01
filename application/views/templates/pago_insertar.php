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
								<a class="nav-link" href="/api/index.php/clienteinformacion/index/{$id_datos_cliente}">Informacion de cliente</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/api/index.php/casoinformacion/index/{$id_datos_cliente}/{$id_caso_juridico}">Informacion de caso legal</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/pagoinsertar/index/{$id_datos_cliente}/{$id_caso_juridico}">Insertar pago</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	    {if $resultado_operacion neq 'ninguna'}
		{if $resultado_operacion eq 'exito'}
        <div class="alert alert-success" role="alert"><span><strong>Pago agregado con exito</strong><br></span></div>
		{/if}
		{if $resultado_operacion eq 'fracaso'}
        <div class="alert alert-danger" role="alert"><span><strong>Error al agregar pago: {$mensaje_operacion}</strong></span></div>
		{/if}
		{/if}
		
        <div class="row insert-row-padding">
            <div class="col-lg-6 col-xl-6 center-column">
                <div class="card box-shadow">
                    <div class="card-body">
                        <form action="/api/index.php/pagoinsertar/procesar" method="post">
							<input type="hidden" name="id_datos_cliente" id="id_datos_cliente" value="{$id_datos_cliente}" />
							<input type="hidden" name="id_caso_juridico" id="id_caso_juridico" value="{$id_caso_juridico}" />							
                            
							<div class="form-group">
                                <h1 class="center-text-align">Insertar pago</h1>
								<label>Fecha de pago</label>
								<input required readonly name="fecha_pago" id="fecha_pago" class="form-control form-control-lg" type="text">
							</div>
							<div class="form-group">
								<label>Monto</label>
								<input name="monto_pago" required id="monto_pago" class="form-control form-control-lg" type="text">
							</div>
							<div class="form-group">
								<label>Descripcion</label>
								<textarea name="descripcion" required id="descripcion" class="form-control form-control-lg"></textarea>
							</div>
							<div class="form-group">
								<label>Estado del pago</label>
								<select name="estado_pago" id="estado_pago" required class="form-control form-control-lg">
									<option value="pagado">Pagado</option>
									<option value="sin pagar">Sin pagar</option>
								</select>
							</div>
						<div class="form-group long-v-spacing"><input class="btn btn-primary btn-block btn-lg" type="submit" value="Insertar pago"></input></div>
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
	<script src="{$base_url}assets/js/pago_insertar.js"></script>
</body>

</html>