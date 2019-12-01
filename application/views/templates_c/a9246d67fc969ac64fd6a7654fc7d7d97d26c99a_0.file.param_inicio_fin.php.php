<?php
/* Smarty version 3.1.32, created on 2019-12-01 10:53:59
  from 'C:\xampp3\htdocs\api\application\views\templates\param_inicio_fin.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de3f027ccd857_21845795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9246d67fc969ac64fd6a7654fc7d7d97d26c99a' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\param_inicio_fin.php',
      1 => 1575218792,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de3f027ccd857_21845795 (Smarty_Internal_Template $_smarty_tpl) {
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
		</div>
	</div>
</div><?php }
}
