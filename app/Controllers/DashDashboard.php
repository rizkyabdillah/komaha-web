<?php

namespace App\Controllers;

class DashDashboard extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Dashboard',
            'sectionTitle'      => 'Dashboard',
            'linkBreadCrumb'    => route_to('adminDash'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Dashboard', 'Dashboard', ''
            ],
        ];
    }

    public function index()
    {
        return view('home/dash-dashboard', array_merge($this->arrayDefault(), []));
    }

}
