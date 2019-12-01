<?php
/* Smarty version 3.1.32, created on 2019-11-30 13:51:30
  from 'C:\xampp3\htdocs\api\application\views\templates\pago_eliminar.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de265d2063265_17612036',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '813d88a1426681ed01b325a91080515d11792c36' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\pago_eliminar.php',
      1 => 1575118287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de265d2063265_17612036 (Smarty_Internal_Template $_smarty_tpl) {
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
                <form method="post" action="/api/index.php/pagoeliminar/procesar">
					<input type="hidden" name="id_datos_cliente" id="id_datos_cliente" value="<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
" />
					<input type="hidden" name="id_caso_juridico" id="id_caso_juridico" value="<?php echo $_smarty_tpl->tpl_vars['id_caso_juridico']->value;?>
" />
					<input type="hidden" name="id_pago_caso" id="id_pago_caso" value="<?php echo $_smarty_tpl->tpl_vars['id_pago_caso']->value;?>
" />
					
					<div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Eliminar pago</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Esta seguro que desea eliminar el pago con ID=<?php echo $_smarty_tpl->tpl_vars['id_pago_caso']->value;?>
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
