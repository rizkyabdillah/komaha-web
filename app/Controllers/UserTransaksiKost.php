<?php

namespace App\Controllers;

class UserTransaksiKost extends BaseController
{

    private function arrayDefault()
    {
        return [
            'titlePage'         => 'KOMAHA - Daftar Transaksi Kost',
            'sectionTitle'      => 'Daftar Transaksi Kost',
            'linkBreadCrumb'    => route_to('tr-kost-user'),
            'isBack'            => false,
            'breadCrumb'        => [
                'Transaksi', 'Daftar Transaksi Kost', ''
            ],
        ];
    }

    public function indexDetailTransaksi($idTransaksi)
    {
        $DATA_TRANSAKSI = $this->model->getRowDataArray('TRANSAKSI_KOST', ['ID_TRANSAKSI' => $idTransaksi]);
        $DATA_KOST      = $this->model->getRowDataArray('KOST', ['ID_KOST' => $DATA_TRANSAKSI['ID_KOST']]);
        $DATA = [
            'dataTR'    => $DATA_TRANSAKSI,
            'dataKost'  => $DATA_KOST,
            'isBack'    => true
        ];
        return view('home/user-detail-transaksi-kost', array_merge($this->arrayDefault(), $DATA));
    }


    public function store()
    {
        $POST_DATA  = $this->request->getPost();
        $POST_DATA['ID_TRANSAKSI']          = 'TRX-' . strtoupper(random_string('alnum', 16));
        $POST_DATA['TANGGAL_AWAL_MASUK']    = implode("-", array_reverse(explode("/", $POST_DATA['TANGGAL_AWAL_MASUK'])));
        unset($POST_DATA['csrf_test_name']);

        $this->model->insertData('TRANSAKSI_KOST', $POST_DATA);

        session()->setFlashData('pesan', 'Transaksi berhasil dibuat, silahkan lakukan pembayaran!');
        return redirect()->to(route_to('tr-kost-user-detail', $POST_DATA['ID_TRANSAKSI']));
    }
}
