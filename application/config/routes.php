<?php
defined('BASEPATH') or exit('No direct script access allowed');


// $route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['abouts'] = 'welcome/demo';

$route['home'] = 'PageController/index';

$route['about'] = 'PageController/abouts';

$route['blog/(:any)'] = 'PageController/blog/$1';


$route['employee'] = 'Frontend/EmployeeController/index';

$route['employee/add'] = 'Frontend/EmployeeController/create';

$route['employee/store'] =  'Frontend/EmployeeController/store';


// $route['questions'] = 'QuestionController/index';

$route['default_controller'] = 'users/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['users/login'] = 'users/login';
$route['users/register'] = 'users/register';
$route['questions'] = 'questions/index';
$route['questions/upvote/(:num)'] = 'questions/upvote/$1';
$route['questions/downvote/(:num)'] = 'questions/downvote/$1';
$route['answers/index/(:num)'] = 'answers/index/$1';
