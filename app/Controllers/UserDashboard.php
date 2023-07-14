<?php

namespace App\Controllers;

class UserDashboard extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Dashboard',
            'sectionTitle'      => 'Dashboard',
            'linkBreadCrumb'    => route_to('dashboard-user'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Dashboard', 'Dashboard', ''
            ],
        ];
    }

    public function index()
    {
        return view('home/user-dashboard', array_merge($this->arrayDefault(), []));
    }
}
