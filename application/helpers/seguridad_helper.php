<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function es_necesario_redireccionar($ses, $tipo, $usuario_model)
{
	// Si ha iniciado sesion
	if ($ses->userdata('id_usuario'))
	{
		// Obtener los datos mas recientes
		$usuario = $usuario_model->obtener_datos_usuario_id($ses->userdata('id_usuario'));
		
		if ($usuario['estado'] == 'deshabilitado')
		{
			return true;
		}
		
		if ($usuario['tipo_usuario'] == 'admin' && $tipo == 'estrategico')
		{
			return true;
		}
		
		if ($usuario['tipo_usuario'] == 'admin' && $tipo == 'tactico')
		{
			return true;
		}
		
		if ($usuario['tipo_usuario'] == 'admin' && $tipo == 'abogado')
		{
			return true;
		}
		
		if ($usuario['tipo_usuario'] == 'tactico' && $tipo == 'administrador')
		{
			return true;
		}
		
		if ($usuario['tipo_usuario'] == 'tactico' && $tipo == 'estrategico')
		{
			return true;
		}
		
		if ($usuario['tipo_usuario'] == 'tactico' && $tipo == 'abogado')
		{
			return true;
		}
		
		if ($usuario['tipo_usuario'] == 'estrategico' && $tipo == 'administrador')
		{
			return true;
		}
		
		if ($usuario['tipo_usuario'] == 'estrategico' && $tipo == 'abogado')
		{
			return true;
		}
		
		return false;
	}
	return true;
}

function obtener_redireccion($ses, $tipo, $usuario_model)
{
	if ($ses->userdata('id_usuario'))
	{
		// Obtener los datos mas recientes
		$usuario = $usuario_model->obtener_datos_usuario_id($ses->userdata('id_usuario'));
		
		if ($usuario['estado'] == 'deshabilitado')
		{
			return '/login/index';
		}
		
		if (($usuario['tipo_usuario'] == 'admin' && $tipo == 'estrategico') || $usuario['tipo_usuario'] == 'admin' && $tipo == 'tactico' || $usuario['tipo_usuario'] == 'admin' && $tipo == 'abogado')
		{
			return '/adminpanel/index';
		}
		
		if (($usuario['tipo_usuario'] == 'abogado' && $tipo == 'estrategico') || $usuario['tipo_usuario'] == 'abogado' && $tipo == 'tactico' || $usuario['tipo_usuario'] == 'abogado' && $tipo == 'administrador')
		{
			return '/abogadopanel/index';
		}
		
		
		if ($usuario['tipo_usuario'] == 'tactico' && $tipo == 'administrador' || $usuario['tipo_usuario'] == 'tactico' && $tipo == 'estrategico' || $usuario['tipo_usuario'] == 'tactico' && $tipo == 'abogado')
		{
			return '/tacticopanel/index';
		}
		
		if ($usuario['tipo_usuario'] == 'estrategico' && $tipo == 'administrador' || $usuario['tipo_usuario'] == 'estrategico' && $tipo == 'tactico' || $usuario['tipo_usuario'] == 'estrategico' && $tipo == 'abogado')
		{
			return '/estrategicopanel/index';
		}
	}
	return '/login/index';
}