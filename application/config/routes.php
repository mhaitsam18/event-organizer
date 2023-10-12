<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['register'] = 'Dashboard/Register';
$route['login'] = 'Dashboard/Login';
$route['logout'] = 'Dashboard/Logout';
$route['dashboard'] = 'Dashboard/Home';
$route['organizer'] = 'Organizer/Home';
$route['admin'] = 'Admin/Home';
$route['404_override'] = '';
$route['test'] = 'Test';
$route['translate_uri_dashes'] = FALSE;
