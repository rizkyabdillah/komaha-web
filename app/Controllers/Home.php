<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/index');
    }

    public function detailKost()
    {
        return view('home/detail-kost');
    }

    public function auth()
    {
        return view('home/auth');
    }

    public function register()
    {
        return view('home/register');
    }
}
