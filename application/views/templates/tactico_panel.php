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
    <div class="container admin-panel">
	    {if $resultado_operacion neq 'ninguna'}

            {if $resultado_operacion eq 'exito'}
                <div class="alert alert-success" role="alert"><span><strong>{$mensaje_operacion}</strong><br></span></div>
            {/if}

            {if $resultado_operacion eq 'fracaso'}
                <div class="alert alert-danger" role="alert"><span><strong>Error:{$mensaje_operacion}</strong></span></div>
            {/if}

        {/if}
        <div class="row header-padding">
            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 inline-header">
                <h1>Panel de control</h1>
            </div>
            <div class="col">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card panel-item">
                    <div class="card-body center-text-align"><i class="fa fa-dollar panel-item-icon"></i>
                        <h4 class="card-title">Reportes tácticos</h4>
                        <div class="row">
							<div class="col-xl-12">
								<a href="/api/index.php/tactico1/index" class="btn btn-primary btn-block btn-lg" style="margin-bottom:4px;white-space: normal;" type="button">Informe de ganancias de casos juridicos por tipo</a>
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