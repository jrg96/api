<?php
/* Smarty version 3.1.32, created on 2019-11-30 08:38:29
  from 'C:\xampp3\htdocs\api\application\views\templates\informe_operativo_01.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de27ee50ecb97_68987531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a35c231f03d77c066584d55d5cabb8239692958c' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\informe_operativo_01.php',
      1 => 1575124701,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.php' => 1,
    'file:navbar.php' => 1,
    'file:navegacion_operativo.php' => 1,
    'file:header_generar_informe.php' => 1,
    'file:param_fin_cliente.php' => 1,
  ),
),false)) {
function content_5de27ee50ecb97_68987531 (Smarty_Internal_Template $_smarty_tpl) {
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
								<a class="nav-link active" href="/api/index.php/carterainsertar/index">Informe de solvencia de clientes</a>
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
						

						<center><h4>Informe de solvencia de clientes</h4></center>
						<br />
						
						<div id="formulario_generar_informe" name="formulario_generar_informe">
							<center><h5>Parámetros</h5></center>
							<?php $_smarty_tpl->_subTemplateRender('file:param_fin_cliente.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
											<th style="border: 1px solid black; text-align: center;">Nombre del cliente</th>
											<th style="border: 1px solid black; text-align: center;">Estado</th>
											<th style="border: 1px solid black; text-align: center;">Monto ($$$)</th>
										</tr>
										<tr>
											<td style="width: 50%; border: 1px solid black;">Cliente 1</td>
											<td style="width: 25%; border: 1px solid black; text-align: center;">Insolvente</td>
											<td style="width: 25%; border: 1px solid black; text-align: center;">Monto ($$$)</td>
										</tr>
										<tr>
											<td style="width: 75%; border: 1px solid black;" colspan="2">Total</td>
											<td style="width: 25%; border: 1px solid black; text-align: center;">$800</td>
										</tr>
									</table>
								</div>
							</center>
							</div>
						</div>
						
						<br />
						<div class="row" id="botones_imprimir_informe" name="botones_imprimir_reporte">
							<div class="col-sm-12 col-md-6 center-column">
								<a class="btn btn-primary btn-block btn-lg" href="/api/index.php/operativo1/imprimir_informe" target="_blank">Imprimir informe</a>
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
assets/js/informe_operativo_01.js"><?php echo '</script'; ?>
>
	
</body>

</html><?php }
}
