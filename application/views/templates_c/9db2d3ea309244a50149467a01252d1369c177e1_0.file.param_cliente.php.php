<?php
/* Smarty version 3.1.32, created on 2019-11-30 09:25:05
  from 'C:\xampp3\htdocs\api\application\views\templates\param_cliente.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de289d1852299_46496382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9db2d3ea309244a50149467a01252d1369c177e1' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\param_cliente.php',
      1 => 1575127149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de289d1852299_46496382 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
	<div class="col-sm-12 col-md-6 center-column">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 center-column">
				<div class="form-group">
					<label>Cliente</label>
					<select name="id_datos_cliente" id="id_datos_cliente" class="form-control form-control-md">
						<option selected value="-1">---TODOS----</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientes']->value, 'cliente');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value['id_datos_cliente'];?>
"><?php echo $_smarty_tpl->tpl_vars['cliente']->value['apellidos'];?>
, <?php echo $_smarty_tpl->tpl_vars['cliente']->value['nombres'];?>
 ID: <?php echo $_smarty_tpl->tpl_vars['cliente']->value['id_datos_cliente'];?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
