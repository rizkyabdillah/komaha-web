<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $USER_DATA = $this->model->getDataWhereArray('KOST', ['REKOMENDASI' => 'YA']);
        $DATA = [
            'data' => $USER_DATA,
        ];
        // return dd($DATA);
        return view('home/index', $DATA);
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
