<?php

namespace App\Controllers;

use App\Models\Productmodel;
use App\Models\Colormodel;
use App\Models\Product;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function index2()
    {
        return view('view_color');
    }
    public function index3()
    {
        return view('view_product');
    }
    public function getProduct()
    {
        $model = new Productmodel();
        $data = $model->findAll();
        return json_encode($data);
    }

    public function save()
    {
        $model = new Productmodel();
        $json = $this->request->getJSON();
        $data = [
            'kode_ukuran' => $json->kode_ukuran,
            'ukuran' => $json->ukuran
        ];
        $model->insert($data);
    }

    public function update()
    {
        $model = new Productmodel();
        $json = $this->request->getJSON();
        $id = $json->id;
        $data = [
            'ukuran' => $json->ukuran
        ];
        $model->update($id, $data);
    }

    public function delete()
    {
        $model = new Productmodel();
        $json = $this->request->getJSON();
        $id = $json->id;
        $model->delete($id);
    }

    public function getColor()
    {
        $model = new Colormodel();
        $data = $model->findAll();
        return json_encode($data);
    }

    public function save2()
    {
        $model = new Colormodel();
        $json = $this->request->getJSON();
        $data = [
            'kode_warna' => $json->kode_warna,
            'nama_warna' => $json->nama_warna
        ];
        $model->insert($data);
    }

    public function update2()
    {
        $model = new Colormodel();
        $json = $this->request->getJSON();
        $id = $json->id;
        $data = [
            'nama_warna' => $json->nama_warna
        ];
        $model->update($id, $data);
    }

    public function delete2()
    {
        $model = new Colormodel();
        $json = $this->request->getJSON();
        $id = $json->id;
        $model->delete($id);
    }

    public function getProduct2()
    {
        $model = new Product();
        $data = $model->findAll();
        return json_encode($data);
    }

    public function save3()
    {
        $model = new Product();
        $json = $this->request->getJSON();
        $data = [
            'kode_barang' => $json->kode_barang,
            'nama_barang' => $json->nama_barang,
            'kode_ukuran' => $json->kode_ukuran,
            'kode_warna' => $json->kode_warna,
            'harga' => $json->harga,
            'harga_dasar' => $json->harga_dasar
        ];
        $model->insert($data);
    }

    public function update3()
    {
        $model = new Product();
        $json = $this->request->getJSON();
        $id = $json->id;
        $data = [
            'nama_barang' => $json->nama_barang,
            'kode_ukuran' => $json->kode_ukuran,
            'kode_warna' => $json->kode_warna,
            'harga' => $json->harga,
            'harga_dasar' => $json->harga_dasar
        ];
        $model->update($id, $data);
    }

    public function delete3()
    {
        $model = new Product();
        $json = $this->request->getJSON();
        $id = $json->id;
        $model->delete($id);
    }
}