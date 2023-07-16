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

    public function indexDaftarKost()
    {
        $KOST_DATA = $this->model->getAllDataArray('KOST');
        $DATA = [
            'data' => $KOST_DATA,
        ];
        // return dd($DATA);
        return view('home/daftar-kost', $DATA);
    }

    public function indexDaftarCatering()
    {
        $KOST_DATA = $this->model->getAllDataArray('CATERING');
        $DATA = [
            'data' => $KOST_DATA,
        ];
        // return dd($DATA);
        return view('home/daftar-catering', $DATA);
    }

    public function detailKost($idKost)
    {
        $KOST_DATA = $this->model->getRowDataArray('KOST', ['ID_KOST' => $idKost]);

        $DATA = [
            'data' => $KOST_DATA,
        ];
        return view('home/detail-kost', $DATA);
    }

    public function detailCatering($idCatering)
    {
        $KOST_DATA = $this->model->getRowDataArray('CATERING', ['ID_CATERING' => $idCatering]);

        $DATA = [
            'data' => $KOST_DATA,
        ];
        return view('home/detail-catering', $DATA);
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
