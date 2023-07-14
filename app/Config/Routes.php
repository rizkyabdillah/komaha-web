<?php

namespace Config;

$routes = Services::routes();

if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->group('user', ['filter' => 'not_auth_user_filter'],       function ($routes) {
    $routes->get('/',                'UserDashboard::index',             ['as' => 'dashboard-user']);
});

// ================>> <<||>>

$routes->group('admin', ['filter' => 'not_auth_admin_filter'],  function ($routes) {
    $routes->get('/',                'AdminDashboard::index',            ['as' => 'dashboard-admin']);
    $routes->get('user',             'AdminDashboard::index',            ['as' => 'dashboard-admin']);
});

// ================>> <<||>>

$routes->get('/',                    'Home::index',                      ['as' => 'index']);
$routes->get('detail-kost',          'Home::detailKost',                 ['as' => 'detail-kost']);

$routes->get('logout-user',          'UserAuth::logout',                 ['as' => 'logout-user']);
$routes->get('login',                'Home::auth',                       ['as' => 'auth-user-view', 'filter' => 'auth_user_filter']);
$routes->get('register',             'Home::register',                   ['as' => 'regist-view']);
$routes->post('register',            'UserAuth::register',               ['as' => 'regist-user']);
$routes->post('auth',                'UserAuth::auth',                   ['as' => 'auth-user']);

$routes->get('logout-admin',         'AdminAuth::logout',                ['as' => 'logout-admin']);
$routes->get('admin/login',          'AdminAuth::index',                 ['as' => 'auth-admin-view', 'filter' => 'auth_admin_filter']);
$routes->post('admin/auth',          'AdminAuth::auth',                  ['as' => 'auth-admin']);

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
