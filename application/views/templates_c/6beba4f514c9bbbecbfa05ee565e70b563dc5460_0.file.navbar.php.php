<?php
/* Smarty version 3.1.32, created on 2019-12-01 06:58:29
  from 'C:\xampp3\htdocs\api\application\views\templates\navbar.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5de3b8f5160030_88896891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6beba4f514c9bbbecbfa05ee565e70b563dc5460' => 
    array (
      0 => 'C:\\xampp3\\htdocs\\api\\application\\views\\templates\\navbar.php',
      1 => 1575135121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de3b8f5160030_88896891 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-light navbar-expand-md" style="background-color:#ffffff;">
    <div class="container-fluid"><a class="navbar-brand" href="#"><strong>Bufete Ciber Abogados</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
				<?php if ($_smarty_tpl->tpl_vars['usuario_tipo']->value == 'admin') {?>
				<li class="nav-item" role="presentation"><a class="nav-link active" href="/api/index.php/adminpanel/index">Inicio</a></li>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['usuario_tipo']->value == 'tactico') {?>
				<li class="nav-item" role="presentation"><a class="nav-link active" href="/api/index.php/tacticopanel/index">Inicio</a></li>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['usuario_tipo']->value == 'estrategico') {?>
				<li class="nav-item" role="presentation"><a class="nav-link active" href="/api/index.php/estrategicopanel/index">Inicio</a></li>
				<?php }?>
                <li class="nav-item" role="presentation"><a class="nav-link" href="/api/index.php/logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</nav><?php }
}
