<?php
/* Smarty version 3.1.32, created on 2019-12-01 23:20:59
  from 'C:\xampp3\htdocs\api\application\views\templates\pago_informacion.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de43ccba21673_92761771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92848bfad1197f4ccf1943c78800a4448e5bd12d' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\pago_informacion.php',
      1 => 1575238422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.php' => 1,
  ),
),false)) {
function content_5de43ccba21673_92761771 (Smarty_Internal_Template $_smarty_tpl) {
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
								<a class="nav-link" href="/api/index.php/clienteinformacion/index/<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
">Informacion de cliente</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/api/index.php/casoinformacion/index/<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['id_caso_juridico']->value;?>
">Informacion de caso legal</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/pagoinformacion/index/<?php echo $_smarty_tpl->tpl_vars['id_datos_cliente']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['id_caso_juridico']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['id_pago_caso']->value;?>
">Informacion de pago</a>
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
                        <h5 class="mb-0">Datos de pago:</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Monto pago:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>$<?php echo $_smarty_tpl->tpl_vars['usuario']->value['monto_pago'];?>
</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Fecha pago:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['fecha_pago']->value;?>
</h5>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-3">
                                <h5>Descripcion:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?php echo $_smarty_tpl->tpl_vars['usuario']->value['descripcion'];?>
</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5>Estado:&nbsp;</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5>
								<?php if ($_smarty_tpl->tpl_vars['usuario']->value['estado_pago'] == 'sin pagar') {?>
								Sin pagar
								<?php } else { ?>
								Pagado
								<?php }?>
								</h5>
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
