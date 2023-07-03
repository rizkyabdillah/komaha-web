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
    $routes->get('login',               'Home::auth',                       ['as' => 'auth-view']);
    $routes->get('register',            'Home::register',                   ['as' => 'regist-view']);

    $routes->get('dash-dashboard',      'DashDashboard::index',             ['as' => 'dash-dashboard']);

    $routes->post('login',              'Auth::auth',                       ['as' => 'auth-user']);
    $routes->get('logout',              'Auth::logout',                     ['as' => 'logout-user']);
    $routes->post('register',           'Auth::register',                   ['as' => 'regist-user']);
});

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
