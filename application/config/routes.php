<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//Programs
$route['admin/programs/add'] = "admin/add_program";
$route['admin/programs/view'] = "admin/view_programs";
$route['admin/programs/edit/(:any)/(:num)'] = "admin/edit_program";
$route['admin/programs/delete/program/(:any)'] = "admin/delete_program";
$route['admin/programs/delete/(:any)/(:num)'] = "admin/delete_programYear";
$route['admin/programs/outcome/(:any)/(:num)'] = "admin/program_outcome";

$route['admin/view_students/edit/(:num)'] = "admin/edit_student";

//Teachers
$route['admin/teachers/upload'] = "admin/upload_class";
$route['admin/teachers/classes/(:any)'] = "admin/view_class";
$route['admin/teachers/edit/(:num)'] = "admin/edit_teacher";
$route['admin/teachers/delete/(:num)'] = "admin/delete_teacher";
$route['admin/teachers/classes/(:any)/(:num)'] = "admin/view_class";
$route['admin/teachers/scorecard/(:any)/(:num)/(:num)'] = "admin/view_class_scorecard";

//Reports
$route['admin/reports/teacher'] = "admin/report_teacher";
$route['admin/reports/teacher/(:num)'] = "admin/report_teacher";
$route['admin/reports/student'] = "admin/report_student";

$route['default_controller'] = "site";
$route['404_override'] = 'site/error_404';

/* End of file routes.php */
/* Location: ./application/config/routes.php */