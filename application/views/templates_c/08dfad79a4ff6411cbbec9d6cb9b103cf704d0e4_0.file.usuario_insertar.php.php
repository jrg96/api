<?php
/* Smarty version 3.1.32, created on 2019-11-29 01:24:57
  from 'C:\xampp3\htdocs\api\application\views\templates\usuario_insertar.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de0c7c9bc47f3_57692458',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08dfad79a4ff6411cbbec9d6cb9b103cf704d0e4' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\usuario_insertar.php',
      1 => 1575012291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de0c7c9bc47f3_57692458 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rivas y Gonzalez</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/Data-Summary-Panel---3-Column-Overview--Mobile-Responsive.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/styles.css">
</head>

<body class="basic-container">
    <?php $_smarty_tpl->_subTemplateRender('file:navbar.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
								<a class="nav-link active" href="/api/index.php/usuarioinsertar/index">Crear usuario</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	    <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value != 'ninguna') {?>
		<?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'exito') {?>
        <div class="alert alert-success" role="alert"><span><strong>Usuario agregado con exito</strong><br></span></div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'fracaso') {?>
        <div class="alert alert-danger" role="alert"><span><strong>Error al agregar usuario: <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>
</strong></span></div>
		<?php }?>
		<?php }?>
		
        <div class="row insert-row-padding">
            <div class="col-lg-6 col-xl-6 center-column">
                <div class="card box-shadow">
                    <div class="card-body">
                        <form action="/api/index.php/usuarioinsertar/procesar" method="post">
                            <div class="form-group">
                                <h1 class="center-text-align">Crear usuario</h1>
								<label>Nombre de usuario:</label>
								<input name="nombre_usuario" required id="nombre_usuario" class="form-control form-control-lg" type="text">
							</div>
							<div class="form-group">
								<label>Apellidos:</label>
								<input name="apellidos" required id="apellidos" class="form-control form-control-lg" type="text">
							</div>
							<div class="form-group">
								<label>Nombres:</label>
								<input name="nombres" required id="nombres" class="form-control form-control-lg" type="text">
							</div>
                            <div class="form-group">
								<label>Contraseña</label>
								<input name="password" required id="password" class="form-control form-control-lg" type="password">
							</div>
                            <div class="form-group">
								<label>Confirmar contraseña</label>
								<input name="password_rep" required id="pasword_rep" class="form-control form-control-lg" type="password">
							</div>
                            <div class="form-group">
								<label>Tipo usuario</label>
								<select name="tipo" id="tipo" required class="form-control form-control-lg">
									<option value="estrategico">Usuario estrategico</option>
									<option value="tactico">Usuario tactico</option>
									<option value="abogado">Abogado</option>
									<option value="admin">Administrador</option>
								</select>
							</div>
                            <div class="form-group">
								<label>Habilitado</label>
								<select name="estado" id="estado" class="form-control form-control-lg">
									<option value="habilitado">Habilitado en el sistema</option>
									<option value="deshabilitado">Deshabilitado en el sistema</option>
								</select>
							</div>
						<div class="form-group long-v-spacing"><input class="btn btn-primary btn-block btn-lg" type="submit" value="Crear usuario"></input></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
