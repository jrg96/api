<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['operativo1/index'] = 'InformeOperativoSolvenciaCliente';
$route['operativo1/post_informe'] = 'InformeOperativoSolvenciaCliente/post_informe';
$route['operativo1/imprimir_informe'] = 'InformeOperativoSolvenciaCliente/imprimir_informe';

$route['operativo2/index'] = 'InformeOperativoCasosCliente';
$route['operativo2/post_informe'] = 'InformeOperativoCasosCliente/post_informe';
$route['operativo2/imprimir_informe'] = 'InformeOperativoCasosCliente/imprimir_informe';

$route['operativo3/index'] = 'InformeOperativoEstadoPagos';
$route['operativo3/post_informe'] = 'InformeOperativoEstadoPagos/post_informe';
$route['operativo3/imprimir_informe'] = 'InformeOperativoEstadoPagos/imprimir_informe';

$route['tactico1/index'] = 'InformeTacticoGananciasTipo';
$route['tactico1/post_informe'] = 'InformeTacticoGananciasTipo/post_informe';
$route['tactico1/imprimir_informe'] = 'InformeTacticoGananciasTipo/imprimir_informe';

$route['estrategico1/index'] = 'InformeEstrategicoGanancias';
$route['estrategico1/post_informe'] = 'InformeEstrategicoGanancias/post_informe';
$route['estrategico1/imprimir_informe'] = 'InformeEstrategicoGanancias/imprimir_informe';
