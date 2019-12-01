<?php
/* Smarty version 3.1.32, created on 2019-11-30 10:01:23
  from 'C:\xampp3\htdocs\api\application\views\templates\informe_operativo_02.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de29253205163_98011963',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7e0ea46cc4e8951b7c42febe3c7bec3aaf3a0ac' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\informe_operativo_02.php',
      1 => 1575129159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.php' => 1,
    'file:navbar.php' => 1,
    'file:navegacion_operativo.php' => 1,
    'file:header_generar_informe.php' => 1,
    'file:param_cliente.php' => 1,
  ),
),false)) {
function content_5de29253205163_98011963 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
<?php $_smarty_tpl->_subTemplateRender('file:header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
							<?php $_smarty_tpl->_subTemplateRender('file:navegacion_operativo.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
							<li class="nav-item">
								<a class="nav-link active" href="/api/index.php/operativo2/index">Informe de casos juridicos por cliente</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	

        <div class="row insert-row-padding">
            <div class="col-lg-12 col-xl-12 center-column">
                <div class="card box-shadow">
                    <div class="card-body">
						<?php $_smarty_tpl->_subTemplateRender('file:header_generar_informe.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
						<br />
						

						<center><h4>Informe de casos juridicos por cliente</h4></center>
						<br />
						
						<div id="formulario_generar_informe" name="formulario_generar_informe">
							<center><h5>Parámetros</h5></center>
							<?php $_smarty_tpl->_subTemplateRender('file:param_cliente.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
							
							
							<div class="row" id="botones_generar_reporte" name="botones_generar_reporte">
								<div class="col-sm-12 col-md-6 center-column">
									<a id="generar_informe" name="generar_informe" class="btn btn-primary btn-block btn-lg" href="#">Generar informe</a>
								</div>
								<div class="col-sm-12 col-md-6 center-column">
									<a class="btn btn-success btn-block btn-lg" href="#">Regresar</a>
								</div>
							</div>
						</div>
						
						
						<div id="cuerpo_informe" name="cuerpo_informe" class="row">
							<div class="col-sm-12 col-md-6 center-column">
							<center>
								<div id="datos_informe" name="datos_informe">
									<table style='font-family: arial, sans-serif; font-size: 12pt; border-collapse: collapse; border: 1px solid black; width:100%'>
										<tr>
											<th colspan="5" style="border: 1px solid black;">Empleado 1</th>
										</tr>
										<tr>
											<th style="width: 20%; border: 1px solid black;">Nombre</th>
											<th style="width: 20%; border: 1px solid black; text-align: center;">Fecha inicio</th>
											<th style="width: 20%; border: 1px solid black; text-align: center;">Fecha fin</th>
											<th style="width: 20%; border: 1px solid black; text-align: center;">Estado</th>
											<th style="width: 20%; border: 1px solid black; text-align: center;">Atendido por</th>
										</tr>
										<tr>
											<td style="width: 70%; border: 1px solid black;">Prado El Salvador</td>
											<td style="width: 30%; border: 1px solid black; text-align: center;">500</td>
											<td style="width: 30%; border: 1px solid black; text-align: center;">500</td>
											<td style="width: 30%; border: 1px solid black; text-align: center;">500</td>
											<td style="width: 30%; border: 1px solid black; text-align: center;">500</td>
										</tr>
									</table>
								</div>
							</center>
							</div>
						</div>
						
						<br />
						<div class="row" id="botones_imprimir_informe" name="botones_imprimir_reporte">
							<div class="col-sm-12 col-md-6 center-column">
								<a class="btn btn-primary btn-block btn-lg" href="/api/index.php/operativo2/imprimir_informe" target="_blank">Imprimir informe</a>
							</div>
							<div class="col-sm-12 col-md-6 center-column">
								<a  id="boton_regresar_param" name="boton_regresar_param" class="btn btn-success btn-block btn-lg" href="#">Regresar</a>
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
assets/js/progreso_usuario.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
assets/js/informe_operativo_02.js"><?php echo '</script'; ?>
>
	
</body>

</html><?php }
}
