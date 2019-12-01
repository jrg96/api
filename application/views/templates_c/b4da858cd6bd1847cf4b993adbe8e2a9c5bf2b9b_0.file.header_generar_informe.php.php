<?php
/* Smarty version 3.1.32, created on 2019-11-30 07:29:08
  from 'C:\xampp3\htdocs\api\application\views\templates\header_generar_informe.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de26ea430c941_55213288',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4da858cd6bd1847cf4b993adbe8e2a9c5bf2b9b' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\header_generar_informe.php',
      1 => 1575120058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de26ea430c941_55213288 (Smarty_Internal_Template $_smarty_tpl) {
?><h2 class="center-text-align">Bufete Ciber Abogados</h2>
<h3 class="center-text-align">Unidad de casos legales</h3>
<br />

<div class="row">
	<div class="col-lg-4 center-column">
		<center><h5>Fecha: <?php echo $_smarty_tpl->tpl_vars['fecha_actual']->value;?>
</h5></center>
	</div>
	<div class="col-lg-4 center-column">
		<center><h5>Pantalla: <?php echo $_smarty_tpl->tpl_vars['nombre_pantalla']->value;?>
</h5></center>
	</div>
	<div class="col-lg-4 center-column">
		<center><h5>Usuario: <?php echo $_smarty_tpl->tpl_vars['nombre_usuario']->value;?>
</h5></center>
	</div>
</div><?php }
}
