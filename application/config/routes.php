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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/login';  //form login
$route['loginMe'] = 'auth/loginMe'; // fungsi login
$route['logout'] = 'auth/logout'; // fungsi logout
$route['forbidden'] = 'auth/forbidden'; // fungsi logout

// Route Link App

// Route Link Store
$route['store/new-problem'] = 'store/problem/input'; // New problem
$route['store/problem-detail/(:any)'] = 'store/problem/detail/$1'; // detail problem
$route['store/problem_all'] = 'dashboard/ajax_list_problem_cctv_all_store'; // New problem 


// Route API (Req Data)
$route['api/store/list'] = 'store/problem/ajax_list_toko';
$route['api/store/detail/(:any)'] = 'store/problem/ajax_detail_toko/$1';
$route['api/faktur/get'] = 'store/problem/ajax_get_faktur';
$route['api/problem/save'] = 'store/problem/ajax_save_problem';

