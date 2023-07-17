<?php

namespace App\Controllers;

class UserFormTransaksi extends BaseController
{

    public function cekUserLogin($idKost)
    {
        if (!session('IS_LOGIN')) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('pesan', 'Mohon masuk terlebih dahulu!');
            return redirect()->to(route_to('auth-user-view'));
        }

        return redirect()->to(route_to('form-tr-kost', $idKost));
    }

    public function indexFormKost($idKost)
    {

        $DATA['data']   = $this->model->getRowDataArray('KOST', ['ID_KOST' => $idKost]);
        return view('home/transaksi-kost', $DATA);
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
