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
								<a class="nav-link" href="/api/index.php/casoinformacion/index/{$id_datos_cliente}/{$id_caso_juridico}">Informacion de caso legal</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/pagoinformacion/index/{$id_datos_cliente}/{$id_caso_juridico}/{$id_pago_caso}">Informacion de pago</a>
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
                        <h5 class="mb-0">Datos de pago:</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Monto pago:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>${$usuario.monto_pago}</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Fecha pago:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>{$fecha_pago}</h5>
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
								{if $usuario.estado_pago eq 'sin pagar'}
								Sin pagar
								{else}
								Pagado
								{/if}
								</h5>
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