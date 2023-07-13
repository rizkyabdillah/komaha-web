<?php

namespace App\Controllers;

class AdminAuth extends BaseController
{
    public function index()
    {
        return view('admin/auth');
    }

    public function auth()
    {
        $DATA               = $this->request->getVar();
        $CEK_USERNAME       = $this->model->getRowDataArray('USER', ['USERNAME' => $DATA['USERNAME']]);

        $VALIDASI = is_null($CEK_USERNAME) ? true : (!hash_equals($CEK_USERNAME['PASSWORD'], $DATA['PASSWORD']) ? true : !hash_equals($CEK_USERNAME['LEVEL'], $DATA['USERNAME']));
        if ($VALIDASI) {
            session()->setFlashData('status', 'danger');
            session()->setFlashData('pesan', 'Username atau password anda salah!');
            return redirect()->back();
        }

        session()->set([
            'IS_LOGIN' => 1,
            'LOGIN_AS' => "ADMIN",
            'NAMA_LENGKAP' => ucfirst(strtolower($CEK_USERNAME['NAMA_LENGKAP']))
        ]);
        return redirect()->to(route_to('dashboard-admin'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(route_to('auth-user'));
    }
}
