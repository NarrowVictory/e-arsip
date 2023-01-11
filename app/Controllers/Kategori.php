<?php

namespace App\Controllers;

use App\Models\Model_kategori;

class Kategori extends BaseController
{
	public function __construct()
	{
		$this->Model_kategori = new Model_kategori();
	}

	public function index()
	{
		$data = array(
			'title' => "Kategori",
			'kategori' => $this->Model_kategori->all_data(),
			'isi'   => "v_kategori"
		);
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = array('nama_kategori' => $this->request->getVar('nama_kategori'));
		$this->Model_kategori->add($data);
		session()->setFlashdata('pesan2', 'Data berhasil ditambahkan');
		return redirect()->to(base_url('kategori'));
	}

	public function edit($id_kategori)
	{
		$data = array(
			'nama_kategori' => $this->request->getVar('nama_kategori'),
			'id_kategori' => $id_kategori
		);
		$this->Model_kategori->edit($data);
		session()->setFlashdata('pesan2', 'Data berhasil Diedit');
		return redirect()->to(base_url('kategori'));
	}

	public function delete($id_kategori)
	{
		$data = array(
			'id_kategori' => $id_kategori
		);
		$this->Model_kategori->hapus($data);
		session()->setFlashdata('pesan3', 'Data berhasil Didelete');
		return redirect()->to(base_url('kategori'));
	}

	//--------------------------------------------------------------------

}
