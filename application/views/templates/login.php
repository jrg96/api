<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bufete Ciber Abogados</title>
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

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand" href="#"><strong>Rivas y Gonzalez</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Inicio</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Iniciar sesión</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="login-clean">
        <div class="container">
        {if $resultado_operacion eq 'fracaso'}
            <div class="alert alert-danger" role="alert"><span><strong>Error al iniciar sesion: {$mensaje_operacion}</strong><br></span></div>
        {/if}
        </div>
        <form method="post" action="/api/index.php/login/procesar">
            <h2 class="center-text">Iniciar sesión</h2>
            <div class="illustration"><i class="fa fa-user-circle"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre de usuario"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" id="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Iniciar sesión</button></div>
        </form>
    </div>
    <script src="{$base_url}assets/js/jquery.min.js"></script>
    <script src="{$base_url}assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>