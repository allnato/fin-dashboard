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
$route['default_controller'] = 'FinController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'FinController/login';
$route['verifyLogin'] = 'FinController/verifyLogin';
$route['logout'] = 'FinController/logout';

$route['org'] = 'ORGController';
$route['org/new-activity'] = 'ORGController/new_activity';
$route['org/activity-list'] = 'ORGController/activity_list';
$route['org/activity-page/(:num)'] = 'ORGController/activity_page/$1';
$route['org/profile'] = 'ORGController/profile';
$route['org/billing-list'] = 'ORGController/billing_list';
$route['org/billing-page/(:any)/(:num)'] = 'ORGController/billing_page/$1/$2';
$route['org/submit'] = 'ORGController/submit_activity';


$route['admin'] = 'CSOController';
$route['admin/activity-list'] = 'CSOController/activity_list';
$route['admin/activity-page/(:any)/(:num)'] = 'CSOController/activity_page/$1/$2';
$route['admin/archive-list'] = 'CSOController/archive_list';
$route['admin/create-activity'] = 'CSOController/create_activity';
$route['admin/org-activity-list'] = 'CSOController/org_activity_list';
$route['admin/org-list'] = 'CSOController/org_list';
$route['admin/org/(:any)'] = 'CSOController/view_org/$1';

$route['admin/submit'] = 'CSOController/submit_activity';
$route['admin/newOrg'] = 'CSOController/newOrganization';
$route['admin/remark-activity'] = 'CSOController/remark_activity';
$route['admin/edit-activity-details/(:any)/(:num)'] = 'CSOController/edit_activity_details/$1/$2';
$route['admin/edit-activity-process/(:any)/(:num)'] = 'CSOController/edit_activity_process/$1/$2';
$route['admin/approve'] = 'CSOController/approve_activity';
$route['admin/decline'] = 'CSOController/decline_activity';
$route['admin/delete'] = 'CSOController/deleteOrganization';

$route['admin/billing-list'] = 'CSOController/billing_list';
$route['admin/new-billing'] = 'CSOController/new_billing';
$route['admin/add-billing'] = 'CSOController/add_billing';
$route['admin/billing-page/(:any)/(:num)'] = 'CSOController/billing_page/$1/$2';
$route['admin/edit-billing/(:any)/(:num)'] = 'CSOController/edit_billing/$1/$2';
