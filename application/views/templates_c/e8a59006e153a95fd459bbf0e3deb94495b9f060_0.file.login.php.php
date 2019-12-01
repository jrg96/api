<?php
/* Smarty version 3.1.32, created on 2019-12-01 23:19:46
  from 'C:\xampp3\htdocs\api\application\views\templates\login.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de43c82c36be4_71918008',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8a59006e153a95fd459bbf0e3deb94495b9f060' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\login.php',
      1 => 1575223044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de43c82c36be4_71918008 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bufete Ciber Abogados</title>
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

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand" href="#"><strong>Bufete Ciber Abogados</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
        <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'fracaso') {?>
            <div class="alert alert-danger" role="alert"><span><strong>Error al iniciar sesion: <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>
</strong><br></span></div>
        <?php }?>
        </div>
        <form method="post" action="/api/index.php/login/procesar">
            <h2 class="center-text">Iniciar sesión</h2>
            <div class="illustration"><i class="fa fa-user-circle"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre de usuario"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" id="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Iniciar sesión</button></div>
        </form>
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
