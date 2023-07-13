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

$routes->group('', function ($routes) {
    $routes->get('',                    'Home::index',                      ['as' => 'index']);
    $routes->get('detail-kost',         'Home::detailKost',                 ['as' => 'detail-kost']);
    $routes->get('login',               'Home::auth',                       ['as' => 'auth-user-view']);
    $routes->get('register',            'Home::register',                   ['as' => 'regist-view']);


    $routes->post('auth',               'Auth::auth',                       ['as' => 'auth-user']);
    $routes->get('logout',              'Auth::logout',                     ['as' => 'logout-user']);
    $routes->post('register',           'Auth::register',                   ['as' => 'regist-user']);

    $routes->group('user', function ($routes) {
        $routes->get('',                'DashDashboard::index',             ['as' => 'dashboard-user']);
    });

    // ================>> <<||>>

    $routes->get('admin/login',         'AdminAuth::index',                 ['as' => 'auth-view']);
    $routes->post('admin/auth',         'AdminAuth::auth',                  ['as' => 'auth-admin']);

    $routes->group('admin', function ($routes) {
        $routes->get('',                'AdminDashboard::index',            ['as' => 'dashboard-admin']);
    });
});

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
