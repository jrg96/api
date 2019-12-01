<?php
/* Smarty version 3.1.32, created on 2019-11-29 15:19:18
  from 'C:\xampp3\htdocs\api\application\views\templates\admin_panel.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de18b56a747f1_90026834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f55dd14e554088607975b0d5fcd31dfffe02f4de' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\admin_panel.php',
      1 => 1575062346,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de18b56a747f1_90026834 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="container admin-panel">
	    <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value != 'ninguna') {?>

            <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'exito') {?>
                <div class="alert alert-success" role="alert"><span><strong><?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>
</strong><br></span></div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'fracaso') {?>
                <div class="alert alert-danger" role="alert"><span><strong>Error:<?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>
</strong></span></div>
            <?php }?>

        <?php }?>
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
                        <h4 class="card-title">Usuarios</h4>
                        <div class="panel-item-btn-container">
							<div class="row">
								<div class="col-xl-12">
									<a href="/api/index.php/usuariolista/index" class="btn btn-primary btn-block btn-lg" style="margin-bottom:4px;white-space: normal;" type="button">Lista de usuarios</a>
									<a href="/api/index.php/usuarioinsertar/index" class="btn btn-primary btn-block btn-lg" style="margin-bottom:4px;white-space: normal;" type="button">Crear usuario</a>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card panel-item">
                    <div class="card-body center-text-align"><i class="fa fa-dollar panel-item-icon"></i>
                        <h4 class="card-title">Tipo de casos</h4>
                        <div class="panel-item-btn-container">
							<div class="row">
								<div class="col-xl-12">
									<a href="/api/index.php/tipocasolista/index" class="btn btn-primary btn-block btn-lg" style="margin-bottom:4px;white-space: normal;" type="button">Lista de tipos de casos</a>
									<a href="/api/index.php/tipocasoinsertar/index" class="btn btn-primary btn-block btn-lg" style="margin-bottom:4px;white-space: normal;" type="button">Crear tipo de caso</a>
								</div>
							</div>
                        </div>
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
