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
								<a class="nav-link" href="/api/index.php/adminpanel/index">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/api/index.php/usuariolista/index">Lista de usuarios</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/usuariomodificar/index/{$id_usuario}">Modificar usuario</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	    {if $resultado_operacion eq 'exito'}
		<br />
        <div class="alert alert-success" role="alert"><span><strong>Usuario modificado con exito</strong><br></span></div>
        {/if}
		{if $resultado_operacion eq 'fracaso'}
		<br />
		<div class="alert alert-danger" role="alert"><span><strong>Error al modificar usuario: {$mensaje_operacion}</strong></span></div>
        {/if}
		<div class="row insert-row-padding">
            <div class="col-lg-6 col-xl-6 center-column">
                <div class="card box-shadow">
                    <div class="card-body">
                        <form method="post" action="/api/index.php/usuariomodificar/procesar">
						    <input type="hidden" name="id_usuario" id="id_usuario" value="{$datos_usuario.id_usuario}" />
                            
							<div class="form-group">
                                <h1 class="center-text-align">Modificar usuario</h1>
								<label>Nombre de usuario:</label>
								<input name="nombre_usuario" required readonly id="nombre_usuario" class="form-control form-control-lg" type="text" value="{$datos_usuario.nombre_usuario}">
							</div>
							<div class="form-group">
								<label>Nombres:</label>
								<input name="nombres" required id="nombres" class="form-control form-control-lg" type="text" value="{$datos_usuario.nombres}">
							</div>
							<div class="form-group">
								<label>Apellidos:</label>
								<input name="apellidos" required id="apellidos" class="form-control form-control-lg" type="text" value="{$datos_usuario.apellidos}">
							</div>
                            <div class="form-group">
								<label>Contraseña</label>
								<input name="password" required id="password" class="form-control form-control-lg" type="password" value="{$datos_usuario.password}">
							</div>
                            <div class="form-group">
								<label>Confirmar contraseña</label>
								<input name="password_rep" required id="pasword_rep" class="form-control form-control-lg" type="password" value="{$datos_usuario.password}">
							</div>
                            <div class="form-group">
								<label>Tipo usuario</label>
								<select name="tipo" id="tipo" required class="form-control form-control-lg">
									{if $datos_usuario.tipo_usuario eq 'estrategico'}
									<option value="estrategico" selected>Usuario estrategico</option>
									{else}
									<option value="estrategico">Usuario estrategico</option>
									{/if}
									
									{if $datos_usuario.tipo_usuario eq 'tactico'}
									<option value="tactico" selected>Usuario tactico</option>
									{else}
									<option value="tactico">Usuario tactico</option>
									{/if}
									
									{if $datos_usuario.tipo_usuario eq 'admin'}
									<option value="admin" selected>Administrador</option>
									{else}
									<option value="admin">Administrador</option>
									{/if}
								</select>
							</div>
                            <div class="form-group">
								<label>Habilitado</label>
								<select name="estado" id="estado" class="form-control form-control-lg">
									{if $datos_usuario.estado eq 'habilitado'}
									<option value="habilitado" selected>Habilitado en el sistema</option>
									<option value="deshabilitado">Deshabilitado en el sistema</option>
									{else}
									<option value="habilitado">Habilitado en el sistema</option>
									<option value="deshabilitado" selected>Deshabilitado en el sistema</option>
									{/if}
								</select>
							</div>
							
							
                    <div class="form-group long-v-spacing">
						<input class="btn btn-primary btn-block btn-lg" type="submit" value="Modificar usuario" />
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