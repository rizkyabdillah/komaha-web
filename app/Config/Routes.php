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

$routes->group('user', ['filter' =>  'not_auth_user_filter'],       function ($routes) {
    $routes->get('',                 'UserDashboard::index',             ['as' => 'dashboard-user']);
});

// ================>> <<||>>

$routes->group('admin', ['filter' => 'not_auth_admin_filter'],  function ($routes) {
    $routes->get('',                 'AdminDashboard::index',            ['as' => 'dashboard-admin']);

    $routes->group('users', function ($routes) {
        $routes->get('',             'AdminKelolaUser::index',           ['as' => 'users-admin']);
        // $routes->get('add',        'AdminKelolaUser::storeIndex',      ['as' => 'users-store-index-admin']);
        // $routes->post('/',           'AdminKelolaUser::store',           ['as' => 'users-store-admin']);
        $routes->get('(:any)',       'AdminKelolaUser::editIndex/$1',    ['as' => 'users-edit-index-admin']);
        $routes->put('(:any)',       'AdminKelolaUser::update/$1',       ['as' => 'users-update-admin']);
        $routes->delete('(:any)',    'AdminKelolaUser::delete/$1',       ['as' => 'users-delete-admin']);
    });

    $routes->group('kost', function ($routes) {
        $routes->get('',             'AdminKelolaKost::index',           ['as' => 'kost-admin']);
        $routes->get('add',          'AdminKelolaKost::addIndex',        ['as' => 'kost-add-index-admin']);
        $routes->get('(:any)',       'AdminKelolaKost::editIndex/$1',    ['as' => 'kost-edit-index-admin']);
        $routes->post('',            'AdminKelolaKost::store',           ['as' => 'kost-store-admin']);
        $routes->put('(:any)',       'AdminKelolaKost::update/$1',       ['as' => 'kost-update-admin']);
        $routes->delete('(:any)',    'AdminKelolaKost::delete/$1',       ['as' => 'kost-delete-admin']);
    });
});

// ================>> <<||>>

$routes->get('/',                    'Home::index',                      ['as' => 'index']);
$routes->get('detail-kost/(:any)',   'Home::detailKost/$1',              ['as' => 'detail-kost']);

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
