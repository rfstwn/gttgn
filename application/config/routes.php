<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['produk'] = 'produk';
$route['produk/detail/(:num)'] = 'produk/detail/$1';

$route['api/user'] = 'api/apiuser';

// Admin main route
$route['admin'] = '4dm1n/Auth';

// New admin routes with grouped controllers
// Auth routes
$route['admin/auth'] = '4dm1n/Auth';
$route['admin/auth/login'] = '4dm1n/Auth/login';
$route['admin/auth/logout'] = '4dm1n/Auth/logout';

// Dashboard routes
$route['admin/dashboard'] = '4dm1n/Dashboard';

// User Admin routes
$route['admin/user-admin'] = '4dm1n/UserAdmin';
$route['admin/user-admin/add'] = '4dm1n/UserAdmin/add';
$route['admin/user-admin/save'] = '4dm1n/UserAdmin/save';
$route['admin/user-admin/edit/(:num)'] = '4dm1n/UserAdmin/edit/$1';
$route['admin/user-admin/update'] = '4dm1n/UserAdmin/update';
$route['admin/user-admin/delete/(:num)'] = '4dm1n/UserAdmin/delete/$1';

// User Data routes
$route['admin/user-data'] = '4dm1n/UserData';
$route['admin/user-data/export'] = '4dm1n/UserData/export';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
