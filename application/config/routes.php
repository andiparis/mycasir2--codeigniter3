<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['stock/in'] = 'stock/stock_in_data';
$route['stock/in/add'] = 'stock/stock_in_add';
$route['stock/in/delete/(:num)/(:num)'] = 'stock/stock_in_delete';

$route['stock/out'] = 'stock/stock_out_data';
$route['stock/out/add'] = 'stock/stock_out_add';
$route['stock/out/delete/(:num)/(:num)'] = 'stock/stock_out_delete';