<?php
/* Smarty version 3.1.32, created on 2019-11-30 05:49:19
  from 'C:\xampp3\htdocs\api\application\views\templates\cliente_informacion.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de1f4cf3b5451_24215660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '144952201c74f420100c618b1063fcf3425578ed' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\cliente_informacion.php',
      1 => 1575089351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de1f4cf3b5451_24215660 (Smarty_Internal_Template $_smarty_tpl) {
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
								<a class="nav-link" href="/api/index.php/clientelista/index">Lista de clientes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/clienteinformacion/index/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id_datos_cliente'];?>
">Informacion de cliente</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
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
        <div class="row table-row-space">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Datos del cliente</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Nombres del cliente:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombres'];?>
</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Apellidos del cliente:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['usuario']->value['apellidos'];?>
</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>DUI:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['usuario']->value['dui'];?>
</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>NIT:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['usuario']->value['nit'];?>
</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Celular:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['usuario']->value['celular'];?>
</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Lugar de residencia:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['usuario']->value['residencia'];?>
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
                                <h5 class="v-align-center">Casos legales del cliente</h5>
                            </div>
                            <div class="col-sm-6"><a class="btn btn-primary float-right" role="button" href="/api/index.php/casoinsertar/index/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id_datos_cliente'];?>
">Nuevo caso legal</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Nombre del caso</th>
                                        <th>Atendido por</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['casos']->value, 'caso');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['caso']->value) {
?>
                                    <tr>
                                        <td>
											<div class="btn-group" role="group">
												<a class="btn btn-success" role="button" href="/api/index.php/casomodificar/index/<?php echo $_smarty_tpl->tpl_vars['caso']->value['id_datos_cliente'];?>
/<?php echo $_smarty_tpl->tpl_vars['caso']->value['id_caso_juridico'];?>
">
													<i class="fa fa-pencil"></i>
												</a>
												<a class="btn btn-primary" role="button" href="/api/index.php/casoinformacion/index/<?php echo $_smarty_tpl->tpl_vars['caso']->value['id_datos_cliente'];?>
/<?php echo $_smarty_tpl->tpl_vars['caso']->value['id_caso_juridico'];?>
">
													<i class="fa fa-info"></i>
												</a>
												<a class="btn btn-danger" role="button" href="/api/index.php/casoeliminar/index/<?php echo $_smarty_tpl->tpl_vars['caso']->value['id_datos_cliente'];?>
/<?php echo $_smarty_tpl->tpl_vars['caso']->value['id_caso_juridico'];?>
">
													<i class="fa fa-trash"></i>
												</a>
											</div>
										</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['caso']->value['nombre_caso'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['caso']->value['apellidos'];?>
 <?php echo $_smarty_tpl->tpl_vars['caso']->value['nombres'];?>
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
