<?php
/* Smarty version 3.1.32, created on 2019-11-29 08:34:19
  from 'C:\xampp3\htdocs\api\application\views\templates\usuario_informacion.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de0c9fb375a78_16074453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '985693949cd7e58df68492146c9fa81b3b183ae4' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\usuario_informacion.php',
      1 => 1575012855,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de0c9fb375a78_16074453 (Smarty_Internal_Template $_smarty_tpl) {
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
								<a class="nav-link" href="/api/index.php/usuariolista/index">Lista de usuarios</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/usuarioinformacion/index/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id_usuario'];?>
">Informacion usuario</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
        <div class="row table-row-space">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Datos del usuario</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Nombre de usuario:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombre_usuario'];?>
</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Nombres:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombres'];?>
</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Apellidos:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['usuario']->value['apellidos'];?>
</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Tipo de usuario:&nbsp;</h5>
                            </div>
                            <div class="col-sm-3">
                                <h5>
								<?php if ($_smarty_tpl->tpl_vars['usuario']->value['tipo_usuario'] == 'estrategico') {?>
								Usuario estrategico
								<?php }?>
								
								<?php if ($_smarty_tpl->tpl_vars['usuario']->value['tipo_usuario'] == 'tactico') {?>
								Usuario táctico
								<?php }?>
								
								<?php if ($_smarty_tpl->tpl_vars['usuario']->value['tipo_usuario'] == 'admin') {?>
								Administrador
								<?php }?>
								</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Estado:&nbsp;</h5>
                            </div>
                            <div class="col-sm-3">
                                <h5>
								<?php if ($_smarty_tpl->tpl_vars['usuario']->value['estado'] == 'habilitado') {?>
								Habilitado en el sistema
								<?php } else { ?>
								Deshabilitado en el sistema
								<?php }?>
								</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row table-row-space">
            <div class="col">
                <div class="card panel-table">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6 align-self-end">
                                <h5 class="v-align-center">Bitacora de acciones</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Descripcion</th>
                                        <th>Fecha y hora</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bitacora']->value, 'accion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['accion']->value) {
?>
                                    <tr>
                                        <td><center><?php echo $_smarty_tpl->tpl_vars['accion']->value['id_bitacora_accion'];?>
</center></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['accion']->value['descripcion_accion'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['accion']->value['fecha_hora_accion'];?>
</td>
                                    </tr>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
					<div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4"><label class="col-form-label">Pagina <?php echo $_smarty_tpl->tpl_vars['pagina_actual']->value;?>
 de <?php echo $_smarty_tpl->tpl_vars['total_paginas']->value;?>
</label></div>
                            <div class="col-sm-8">
                                <nav class="float-right align-self-baseline">
                                    <?php echo mb_convert_encoding($_smarty_tpl->tpl_vars['links']->value, 'UTF-8', 'HTML-ENTITIES');?>

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
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
