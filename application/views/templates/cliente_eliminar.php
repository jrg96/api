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
        <div class="row table-row-space">
            <div class="col">
                <form method="post" action="/api/index.php/clienteeliminar/procesar">
					<input type="hidden" name="id_datos_cliente" id="id_datos_cliente" value="{$id_datos_cliente}" />
					<div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Eliminar Datos de Cliente</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Esta seguro que desea eliminar al cliente con ID={$id_datos_cliente}?</strong></p>
                        </div>
                        <div class="card-footer">
							<button name="opcion_eliminar" id="opcion_eliminar" value="cancelar" class="btn btn-primary" type="submit">Cancelar</button>
							<button name="opcion_eliminar" id="opcion_eliminar" value="eliminar" class="btn btn-danger" type="submit">Eliminar</button>
						</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{$base_url}assets/js/jquery.min.js"></script>
    <script src="{$base_url}assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>