<?php
/* Smarty version 3.1.32, created on 2019-11-29 14:54:05
  from 'C:\xampp3\htdocs\api\application\views\templates\cliente_lista.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de1856db6cb14_86770283',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db0d693d22de2e1f017a78150171be7b0db7e5fa' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\cliente_lista.php',
      1 => 1575060839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de1856db6cb14_86770283 (Smarty_Internal_Template $_smarty_tpl) {
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
								<a class="nav-link active" href="/api/index.php/clientelista/index">Lista de clientes</a>
							</li>
						</ul>
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
                                <h5 class="v-align-center">Lista de clientes</h5>
                            </div>
                            <div class="col-sm-6"><a class="btn btn-primary float-right" role="button" href="/api/index.php/clienteinsertar/index">Nuevo cliente</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-cog"></i></th>
                                        <th>ID</th>
                                        <th>Apellidos / Nombres</th>
                                        <th>DUI</th>
										<th>Celular</th>
                                    </tr>
                                </thead>
                                <tbody>
								    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'usuario');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->value) {
?>
                                    <tr>
                                        <td>
                                            <div class="btn-group" role="group">
												<a class="btn btn-success" role="button" href="/api/index.php/clientemodificar/index/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id_datos_cliente'];?>
">
													<i class="fa fa-pencil"></i>
												</a>
												<a class="btn btn-primary" role="button" href="/api/index.php/clienteinformacion/index/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id_datos_cliente'];?>
">
													<i class="fa fa-info"></i>
												</a>
												<a class="btn btn-danger" role="button" href="/api/index.php/clienteeliminar/index/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id_datos_cliente'];?>
">
													<i class="fa fa-trash"></i>
												</a>
											</div>
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['id_datos_cliente'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['apellidos'];?>
 <?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombres'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['dui'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['celular'];?>
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
