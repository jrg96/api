<?php
/* Smarty version 3.1.32, created on 2019-11-30 06:54:15
  from 'C:\xampp3\htdocs\api\application\views\templates\pago_insertar.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de2667788cc38_51861064',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6397884535e81291aa16d59d5c1079b45636a77' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\pago_insertar.php',
      1 => 1575118449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de2667788cc38_51861064 (Smarty_Internal_Template $_smarty_tpl) {
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
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/css/gijgo.min.css">
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
								<a class="nav-link" href="/api/index.php/abogadopanel/index">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/api/index.php/clienteinformacion/index/<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
">Informacion de cliente</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/api/index.php/casoinformacion/index/<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['id_caso_juridico']->value;?>
">Informacion de caso legal</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/pagoinsertar/index/<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['id_caso_juridico']->value;?>
">Insertar pago</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	    <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value != 'ninguna') {?>
		<?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'exito') {?>
        <div class="alert alert-success" role="alert"><span><strong>Pago agregado con exito</strong><br></span></div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'fracaso') {?>
        <div class="alert alert-danger" role="alert"><span><strong>Error al agregar pago: <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>
</strong></span></div>
		<?php }?>
		<?php }?>
		
        <div class="row insert-row-padding">
            <div class="col-lg-6 col-xl-6 center-column">
                <div class="card box-shadow">
                    <div class="card-body">
                        <form action="/api/index.php/pagoinsertar/procesar" method="post">
							<input type="hidden" name="id_datos_cliente" id="id_datos_cliente" value="<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
" />
							<input type="hidden" name="id_caso_juridico" id="id_caso_juridico" value="<?php echo $_smarty_tpl->tpl_vars['id_caso_juridico']->value;?>
" />							
                            
							<div class="form-group">
                                <h1 class="center-text-align">Insertar pago</h1>
								<label>Fecha de pago</label>
								<input required readonly name="fecha_pago" id="fecha_pago" class="form-control form-control-lg" type="text">
							</div>
							<div class="form-group">
								<label>Monto</label>
								<input name="monto_pago" required id="monto_pago" class="form-control form-control-lg" type="text">
							</div>
							<div class="form-group">
								<label>Descripcion</label>
								<textarea name="descripcion" required id="descripcion" class="form-control form-control-lg"></textarea>
							</div>
							<div class="form-group">
								<label>Estado del pago</label>
								<select name="estado_pago" id="estado_pago" required class="form-control form-control-lg">
									<option value="pagado">Pagado</option>
									<option value="sin pagar">Sin pagar</option>
								</select>
							</div>
						<div class="form-group long-v-spacing"><input class="btn btn-primary btn-block btn-lg" type="submit" value="Insertar pago"></input></div>
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
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/gijgo.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/messages.es-es.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/pago_insertar.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
