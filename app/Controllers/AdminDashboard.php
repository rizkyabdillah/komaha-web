<?php

namespace App\Controllers;

class AdminDashboard extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Admin Dashboard',
            'sectionTitle'      => 'Dashboard',
            'linkBreadCrumb'    => route_to('adminDash'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Dashboard', 'Admin Dashboard', ''
            ],
        ];
    }

    public function index()
    {
        return view('admin/dashboard', array_merge($this->arrayDefault(), []));
    }
}
