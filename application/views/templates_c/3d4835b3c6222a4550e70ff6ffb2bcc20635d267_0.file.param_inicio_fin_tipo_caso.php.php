<?php
/* Smarty version 3.1.32, created on 2019-12-01 09:53:19
  from 'C:\xampp3\htdocs\api\application\views\templates\param_inicio_fin_tipo_caso.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de3e1efc32b15_67526899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d4835b3c6222a4550e70ff6ffb2bcc20635d267' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\param_inicio_fin_tipo_caso.php',
      1 => 1575215353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de3e1efc32b15_67526899 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
	<div class="col-sm-12 col-md-6 center-column">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 center-column">
				<div class="form-group">
					<label>Fecha de inicio</label>
					<input readonly name="fecha_inicio" id="fecha_inicio" class="form-control form-control-md" type="text" required>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 center-column">
				<div class="form-group">
					<label>Fecha final:</label>
					<input readonly name="fecha_fin" id="fecha_fin" class="form-control form-control-md" type="text" required>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 center-column">
				<div class="form-group">
					<label>Tipo de caso</label>
					<select name="id_tipo_caso_juridico" id="id_tipo_caso_juridico" class="form-control form-control-md">
						<option selected value="-1">---TODOS----</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos']->value, 'tipo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['id_tipo_caso_juridico'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tipo']->value['nombre_tipo'];?>
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
