<?php

namespace App\Controllers;

use App\Models\keluargaModel;
use App\Controllers\BaseController;

class Keluarga extends BaseController
{
    protected $keluargaModel;
    public function __construct()
    {
        $this->keluargaModel = new keluargaModel();
    }

    public function show()
    {
        $keluarga = $this->keluargaModel->findAll();

        $data = [
            'keluarga' => $keluarga,
            'validation' => \Config\Services::validation()
        ];

        return view('dataKeluarga', $data);
    }

    public function formInput()
    {
        $keluarga = $this->keluargaModel->findAll();

        $data = [
            'anak' => $keluarga,
            'validation' => \Config\Services::validation()
        ];

        return view('form', $data);
    }

    public function addKeluarga()
    {
        $nama = $this->request->getVar('nama');
        $jk = $this->request->getVar('jk');
        $anak = $this->request->getVar('anak');

        $add = $this->keluargaModel->insert([
            'nama' => $nama,
            'jk' => $jk,
            'f_id' => $anak
        ]);

        if ($add) {
            return redirect()->to(base_url('/'));
        } else return redirect()->back();
    }

    public function updateForm($id)
    {
        // $pegawai = $this->pegawaiModel->where('pegawai_id', $id)->first();

        // $pegawai = $this->pegawaiModel->join('jabatan', 'jabatan.jabatan_id=pegawai.jabatan_id')->join('kontrak', 'kontrak.kontrak_id=pegawai.kontrak_id')->where('pegawai_id', $id)->find();
        $keluarga = $this->keluargaModel->findAll();
        $anak = $this->keluargaModel->join('keluarga', 'keluarga.id=keluarga.f_id')->where('id', $id)->find();
        $data = [
            'keluarga' => $keluarga,
            '$anak' => $anak,
            'validation' => \Config\Services::validation()
        ];

        return view('form', $data);
    }

    public function updateKeluarga($id)
    {
        $nama = $this->request->getVar('nama');
        $jk = $this->request->getVar('jk');
        $anak = $this->request->getVar('anak');

        $update = $this->keluargaModel->update($id, [
            'nama' => $nama,
            'jk' => $jk,
            'anak' => $anak
        ]);

        if ($update) {
            return redirect()->to(base_url('/'));
        } else return redirect()->back();
    }

    public function deleteKeluarga($id)
    {
        $delete = $this->keluargaModel->delete($id);

        if ($delete) {
            return redirect()->back();
        }
    }
}
