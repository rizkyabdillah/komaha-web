<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $KOST_DATA = $this->model->getDataWhereArray('KOST', ['REKOMENDASI' => 'YA']);
        $DATA = [
            'data' => $KOST_DATA,
        ];
        // return dd($DATA);
        return view('home/index', $DATA);
    }

    public function detailKost($idKost)
    {
        $KOST_DATA = $this->model->getRowDataArray('KOST', ['ID_KOST' => $idKost]);

        $DATA = [
            'data' => $KOST_DATA,
        ];
        return view('home/detail-kost', $DATA);
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
