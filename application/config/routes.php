<?php
defined('BASEPATH') or exit('No direct script access allowed');

// $route['default_controller'] = 'UsersController/index';
$route['default_controller'] = 'AuthController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//  route for auth
$route['auth']                  = 'AuthController';
$route['auth/login']            = 'AuthController/login';


// route for users
$route['user']                  = 'UsersController/index';
$route['user/create']           = 'UsersController/create';
$route['user/store']            = 'UsersController/store';
$route['user/edit/(:any)']      = 'UsersController/edit/$1';
$route['user/update/(:any)']    = 'UsersController/update/$1';
$route['user/detail/(:any)']    = 'UsersController/show/$1';
$route['user/destroy/(:any)']   = 'UsersController/destroy/$1';
$route['user/develop']          = 'UsersController/develop';
$route['user/backup_db']        = 'UsersController/backup_db';

// route for roles
$route['role']                  = 'RolesController/index';
$route['role/create']           = 'RolesController/create';
$route['role/store']            = 'RolesController/store';
$route['role/edit/(:any)']      = 'RolesController/edit/$1';
$route['role/update/(:any)']    = 'RolesController/update/$1';
$route['role/detail/(:any)']    = 'RolesController/show/$1';


// route for menu
$route['menu']                  = 'MenuController/index';
$route['menu/create']           = 'MenuController/create';
$route['menu/store']            = 'MenuController/store';
$route['menu/edit/(:any)']      = 'MenuController/edit/$1';
$route['menu/update/(:any)']    = 'MenuController/update/$1';
$route['menu/detail/(:any)']    = 'MenuController/show/$1';

// route for submenu
$route['submenu/index/(:any)']     = 'SubmenuController/index/$1';
$route['submenu/create/(:any)']    = 'SubmenuController/create/$1';
$route['submenu/store/(:any)']     = 'SubmenuController/store/$1';
$route['submenu/edit/(:any)']      = 'SubmenuController/edit/$1';
$route['submenu/update/(:any)']    = 'SubmenuController/update/$1';
$route['submenu/detail/(:any)']    = 'SubmenuController/show/$1';


// route for acl
$route['acl']                                   = 'AclController/index';
$route['acl/create']                            = 'AclController/create';
$route['acl/store/(:any)']                      = 'AclController/store/$1';
$route['acl/update/(:any)']                     = 'AclController/update/$1';
$route['acl/detail/(:any)']                     = 'AclController/show/$1';
$route['acl/duplicate_sync']                    = 'AclController/duplicate_sync';
$route['acl/duplicate_store/(:any)/(:any)']     = 'AclController/duplicate_store/$1/$2';

// route for app-config
$route['app-config']            = 'AppConfController/edit';
$route['app-config/(:any)']     = 'AppConfController/update/$1';

// route for menu-config
$route['menu-config']              = 'MenuConfController/index';
$route['menu-config/update']       = 'MenuConfController/update';
$route['menu-config/show/(:any)']  = 'MenuConfController/show/$1';





// route for develop (programmer only can be use)
$route['develop/class_aktif']     = 'DevelopController/class_aktif';
