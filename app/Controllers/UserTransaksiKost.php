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
        $DATA_KOST = $this->model->getRowDataArray('KOST', ['ID_KOST' => $idTransaksi]);
        $DATA = [
            'dataKost'  => $DATA_KOST,
            'isBack'    => true
        ];
        return view('home/user-detail-transaksi-kost', array_merge($this->arrayDefault(), $DATA));
    }

    public function register()
    {
        $DATA               = $this->request->getVar();
        $DATA['ID_USER']    = 'U-' . strtoupper(random_string('alnum', 8));

        if (!hash_equals($DATA['PASSWORD'], $DATA['KONFIRMASI_PASSWORD'])) {
            session()->setFlashData('pesan', 'Konfirmasi password tidak sama!');
            return redirect()->back();
        } else {
            $CEK_USERNAME = $this->model->getRowDataArray('USER', ['USERNAME' => $DATA['USERNAME']]);
            if (!is_null($CEK_USERNAME)) {
                session()->setFlashData('pesan', 'Username ' . $DATA['USERNAME'] . ' sebelumnya sudah terdaftar!');
                return redirect()->back();
            }

            unset($DATA['KONFIRMASI_PASSWORD']);
            $this->model->insertData('USER', $DATA);
            session()->setFlashData('status', 'success');
            session()->setFlashData('pesan', 'Berhasil mendaftar, silahkan masuk!');
            return redirect()->to(route_to('auth-user-view'));
        }
    }

    public function auth()
    {
        $DATA               = $this->request->getVar();
        $CEK_USERNAME       = $this->model->getRowDataArray('USER', ['USERNAME' => $DATA['USERNAME']]);

        $VALIDASI = is_null($CEK_USERNAME) ? true : (!hash_equals($CEK_USERNAME['PASSWORD'], $DATA['PASSWORD']) ? true : hash_equals($CEK_USERNAME['LEVEL'], $DATA['USERNAME']));
        if ($VALIDASI) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('pesan', 'Username atau password anda salah!');
            return redirect()->back();
        }

        session()->set([
            'IS_LOGIN'      => 1,
            'LEVEL'         => $CEK_USERNAME['LEVEL'],
            'NAMA_LENGKAP'  => ucfirst(strtolower($CEK_USERNAME['NAMA_LENGKAP']))
        ]);
        return redirect()->to(route_to('dashboard-user'));
    }

    public function logout()
    {
        session()->remove('IS_LOGIN');
        session()->remove('LEVEL');
        session()->remove('NAMA_LENGKAP');
        return redirect()->to(route_to('auth-user-view'));
    }
}
