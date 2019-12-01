<?php
/* Smarty version 3.1.32, created on 2019-11-29 21:55:02
  from 'C:\xampp3\htdocs\api\application\views\templates\cliente_eliminar.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de185a6002a92_27664762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24f30d2a97c7c24b8925768c0921fd8ce7a8b8a8' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\cliente_eliminar.php',
      1 => 1575060817,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de185a6002a92_27664762 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div class="row table-row-space">
            <div class="col">
                <form method="post" action="/api/index.php/clienteeliminar/procesar">
					<input type="hidden" name="id_datos_cliente" id="id_datos_cliente" value="<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
" />
					<div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Eliminar Datos de Cliente</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Esta seguro que desea eliminar al cliente con ID=<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
?</strong></p>
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
