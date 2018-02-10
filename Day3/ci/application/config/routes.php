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

$route['addcart'] = "frontend/addcart";
$route['cart'] = "frontend/cart";
$route['checkout'] = "frontend/checkout";
$route['checkout_submit'] = "frontend/checkout_submit";
$route['checkout_payment/(:num)'] = "frontend/checkout_payment/$1";
$route['checkout_retry/(:num)'] = "frontend/checkout_retry/$1";
$route['checkout_callback'] = "frontend/checkout_callback";
$route['checkout_completed/(:num)'] = "frontend/checkout_completed/$1";

$route['products'] = "frontend/products";
$route['product_detail/(:num)/(:any)'] = "frontend/product_detail/$1/$2";
$route['contact'] = "frontend/contact";
$route['about'] = "frontend/about";

$route['login'] = "frontend/login";
$route['logout'] = "frontend/logout";
$route['forgetpassword'] = "frontend/forgetpassword";
$route['forgetpassword_submit'] = "frontend/forgetpassword_submit";

$route['resetpwd/(:any)/(:any)'] = "frontend/resetpwd/$1/$2";
$route['resetpassword_submit'] = "frontend/resetpassword_submit";

$route['login_submit'] = "frontend/login_submit";
$route['register'] = "frontend/register";
$route['register_submit'] = "frontend/register_submit";
$route['register_success'] = "frontend/register_success";

$route['verify/(:any)/(:any)'] = "frontend/verify/$1/$2";

$route['profile'] = "frontend/profile";
$route['profile_submit'] = "frontend/profile_submit";

$route['verifyMobile/(:any)'] = "frontend/verifyMobile/$1";
$route['verifyMobileCode/(:num)'] = "frontend/verifyMobileCode/$1";
$route['googleLogin'] = "frontend/googleLogin";

$route['default_controller'] = 'frontend/index';
$route['(:num)'] = 'frontend/index/$1';




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
