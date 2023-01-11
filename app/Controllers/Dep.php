<?php

namespace App\Controllers;

use App\Models\Model_dep;

class Dep extends BaseController
{
	public function __construct()
	{
		$this->Model_dep = new Model_dep();
	}

	public function index()
	{
		$data = array(
			'title' => "Department",
			'dep' => $this->Model_dep->all_data(),
			'isi'   => "v_dep"
		);
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = array('nama_dep' => $this->request->getVar('nama_dep'));
		$this->Model_dep->add($data);
		session()->setFlashdata('pesan2', 'Data berhasil ditambahkan');
		return redirect()->to(base_url('dep'));
	}

	public function edit($id_dep)
	{
		$data = array(
			'nama_dep' => $this->request->getVar('nama_dep'),
			'id_dep' => $id_dep
		);
		$this->Model_dep->edit($data);
		session()->setFlashdata('pesan2', 'Data berhasil Diedit');
		return redirect()->to(base_url('dep'));
	}

	public function delete($id_dep)
	{
		$data = array(
			'id_dep' => $id_dep
		);
		$this->Model_dep->hapus($data);
		session()->setFlashdata('pesan3', 'Data berhasil Didelete');
		return redirect()->to(base_url('dep'));
	}

	//--------------------------------------------------------------------

}
