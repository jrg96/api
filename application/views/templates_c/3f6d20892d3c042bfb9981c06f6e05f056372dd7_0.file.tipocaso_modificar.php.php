<?php
/* Smarty version 3.1.32, created on 2019-11-29 16:26:20
  from 'C:\xampp3\htdocs\api\application\views\templates\tipocaso_modificar.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de19b0c728449_27654307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f6d20892d3c042bfb9981c06f6e05f056372dd7' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\tipocaso_modificar.php',
      1 => 1575066364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de19b0c728449_27654307 (Smarty_Internal_Template $_smarty_tpl) {
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
								<a class="nav-link" href="/api/index.php/abogadopanel/index">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/api/index.php/tipocasolista/index">Lista de tipos de caso</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/tipocasomodificar/index/<?php echo $_smarty_tpl->tpl_vars['datos_usuario']->value['id_tipo_caso_juridico'];?>
">Modificar tipo de caso</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	    <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'exito') {?>
		<br />
        <div class="alert alert-success" role="alert"><span><strong>Tipo de caso modificado con exito</strong><br></span></div>
        <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'fracaso') {?>
		<br />
		<div class="alert alert-danger" role="alert"><span><strong>Error al modificar tipo de caso: <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>
</strong></span></div>
        <?php }?>
		<div class="row insert-row-padding">
            <div class="col-lg-6 col-xl-6 center-column">
                <div class="card box-shadow">
                    <div class="card-body">
                        <form method="post" action="/api/index.php/tipocasomodificar/procesar">
						    <input type="hidden" name="id_tipo_caso_juridico" id="id_tipo_caso_juridico" value="<?php echo $_smarty_tpl->tpl_vars['datos_usuario']->value['id_tipo_caso_juridico'];?>
" />
							<input type="hidden" name="id_usuario_sistema" id="id_usuario_sistema" value="<?php echo $_smarty_tpl->tpl_vars['datos_usuario']->value['id_usuario'];?>
" />
                            
							<div class="form-group">
                                <h1 class="center-text-align">Modificar tipo de caso</h1>
								<label>Nombre del tipo de caso</label>
								<input name="nombre_tipo" required id="nombre_tipo" class="form-control form-control-lg" type="text" value="<?php echo $_smarty_tpl->tpl_vars['datos_usuario']->value['nombre_tipo'];?>
">	
							</div>
							
                    <div class="form-group long-v-spacing">
						<input class="btn btn-primary btn-block btn-lg" type="submit" value="Modificar datos del tipo de caso" />
					</div>
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
