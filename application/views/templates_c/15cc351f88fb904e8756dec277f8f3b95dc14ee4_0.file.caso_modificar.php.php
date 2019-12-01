<?php
/* Smarty version 3.1.32, created on 2019-11-30 09:09:26
  from 'C:\xampp3\htdocs\api\application\views\templates\caso_modificar.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de286265ffc91_15863689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15cc351f88fb904e8756dec277f8f3b95dc14ee4' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\caso_modificar.php',
      1 => 1575126562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de286265ffc91_15863689 (Smarty_Internal_Template $_smarty_tpl) {
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
">Datos de cliente</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/casomodificar/index/<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['id_caso_juridico']->value;?>
">Modificar caso legal</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	    <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value != 'ninguna') {?>
		<?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'exito') {?>
        <div class="alert alert-success" role="alert"><span><strong>Caso legal modificado con exito</strong><br></span></div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value == 'fracaso') {?>
        <div class="alert alert-danger" role="alert"><span><strong>Error al modificar caso legal: <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>
</strong></span></div>
		<?php }?>
		<?php }?>
		
        <div class="row insert-row-padding">
            <div class="col-lg-6 col-xl-6 center-column">
                <div class="card box-shadow">
                    <div class="card-body">
                        <form action="/api/index.php/casomodificar/procesar" method="post">
							<input type="hidden" name="id_datos_cliente" id="id_datos_cliente" value="<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
" />
							<input type="hidden" name="id_caso_juridico" id="id_caso_juridico" value="<?php echo $_smarty_tpl->tpl_vars['id_caso_juridico']->value;?>
" />							
                            
							<div class="form-group">
                                <h1 class="center-text-align">Modificar caso legal</h1>
								<label>Fecha de inicio del caso</label>
								<input required readonly name="fecha_creacion" id="fecha_creacion" class="form-control form-control-lg" type="text" value="<?php echo $_smarty_tpl->tpl_vars['fecha_creacion']->value;?>
">
							</div>
							<div class="form-group">
								<label>Fecha de fin del caso</label>
								<input name="fecha_terminacion" id="fecha_terminacion" class="form-control form-control-lg" type="text" value="<?php echo $_smarty_tpl->tpl_vars['fecha_terminacion']->value;?>
">
							</div>
							<div class="form-group">
								<label>Abogado encargado</label>
								<select name="id_usuario_sistema" id="id_usuario_sistema" required class="form-control form-control-lg">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['abogados']->value, 'abogado');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['abogado']->value) {
?>
									<?php if ($_smarty_tpl->tpl_vars['datos_usuario']->value['id_usuario'] == $_smarty_tpl->tpl_vars['abogado']->value['id_usuario']) {?>
									<option selected value="<?php echo $_smarty_tpl->tpl_vars['abogado']->value['id_usuario'];?>
"> ID: <?php echo $_smarty_tpl->tpl_vars['abogado']->value['id_usuario'];?>
 - <?php echo $_smarty_tpl->tpl_vars['abogado']->value['apellidos'];?>
,<?php echo $_smarty_tpl->tpl_vars['abogado']->value['nombres'];?>
 </option>
									<?php } else { ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['abogado']->value['id_usuario'];?>
"> ID: <?php echo $_smarty_tpl->tpl_vars['abogado']->value['id_usuario'];?>
 - <?php echo $_smarty_tpl->tpl_vars['abogado']->value['apellidos'];?>
,<?php echo $_smarty_tpl->tpl_vars['abogado']->value['nombres'];?>
 </option>
									<?php }?>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</select>
							</div>
							<div class="form-group">
								<label>Nombre del caso</label>
								<input name="nombre_caso" required id="nombre_caso" class="form-control form-control-lg" type="text" value="<?php echo $_smarty_tpl->tpl_vars['datos_usuario']->value['nombre_caso'];?>
">
							</div>
							<div class="form-group">
								<label>Tipo usuario</label>
								<select name="id_tipo_caso_juridico" id="id_tipo_caso_juridico" required class="form-control form-control-lg">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos_caso']->value, 'tipo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
?>
									<?php if ($_smarty_tpl->tpl_vars['datos_usuario']->value['id_tipo_caso_juridico'] == $_smarty_tpl->tpl_vars['tipo']->value['id_tipo_caso_juridico']) {?>
									<option selected value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['id_tipo_caso_juridico'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipo']->value['nombre_tipo'];?>
</option>
									<?php } else { ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['id_tipo_caso_juridico'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipo']->value['nombre_tipo'];?>
</option>
									<?php }?>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</select>
							</div>
							<div class="form-group">
								<label>Descripcion</label>
								<textarea name="descripcion" required id="descripcion" class="form-control form-control-lg"><?php echo $_smarty_tpl->tpl_vars['datos_usuario']->value['descripcion'];?>
</textarea>
							</div>
							<div class="form-group">
								<label>Estado</label>
								<select name="estado_caso" id="estado_caso" class="form-control form-control-lg">
									<?php if ($_smarty_tpl->tpl_vars['datos_usuario']->value['estado_caso'] == 'proceso') {?>
									<option selected value="proceso">Caso en proceso</option>
									<option value="terminado">Caso terminado</option>
									<?php } else { ?>
									<option value="proceso">Caso en proceso</option>
									<option selected value="terminado">Caso terminado</option>
									<?php }?>
								</select>
							</div>
							
						<div class="form-group long-v-spacing"><input class="btn btn-primary btn-block btn-lg" type="submit" value="Modificar caso legal"></input></div>
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
assets/js/caso_modificar.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
