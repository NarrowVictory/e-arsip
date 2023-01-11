<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_arsip;
use App\Models\Model_kategori;

class Arsip extends BaseController
{
	function __construct()
	{
		$this->Model_arsip = new Model_arsip();
		$this->Model_kategori = new Model_kategori();
	}
	public function index()
	{
		$data = array(
			'title' => "Arsip",
			'arsip' => $this->Model_arsip->all_data(),
			'isi'   => "arsip/v_index"
		);
		return view('layout/v_wrapper', $data);
	}
	public function add()
	{
		$data = array(
			'title' => "Arsip",
			'kategori' => $this->Model_kategori->all_data(),
			'isi'   => "arsip/v_add"
		);
		return view('layout/v_wrapper', $data);
	}
	public function insert()
	{
		if ($this->validate([
			'nama_file' => [
				'label'  => 'Nama File',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi'
				]
			],
			'id_kategori' => [
				'label'  => 'Kategori',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi',
				]
			],
			'deskripsi' => [
				'label'  => 'Deskripsi',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi'
				]
			],
			'file_arsip' => [
				'label'  => 'File Arsip',
				'rules'  => 'uploaded[file_arsip]|max_size[file_arsip, 2048]|ext_in[file_arsip,pdf]',
				'errors' => [
					'uploaded' => '{field} Wajib diupload',
					'max_size' => '{field} Maks 2MB',
					'ext_in' => '{field} Hanya diperbolehkan berformat PDF'
				]
			],
		])) {
			$file_arsip = $this->request->getFile('file_arsip');
			$nama_file = $file_arsip->getRandomName();
			$ukuran = $file_arsip->getSize('kb');
			$data = array(
				'no_arsip' => $this->request->getVar('no_arsip'),
				'nama_file' => $this->request->getVar('nama_file'),
				'id_kategori' => $this->request->getVar('id_kategori'),
				'id_dep' => session()->get('id_department'),
				'id_user' => session()->get('id_user'),
				'tanggal_upload' => date('Y-m-d'),
				'tanggal_update' => date('Y-m-d'),
				'deskripsi' => $this->request->getVar('deskripsi'),
				'file_arsip' => $nama_file,
				'ukuran_file' => $ukuran
			);
			$file_arsip->move('template/file_arsip', $nama_file);
			$this->Model_arsip->simpan($data);
			session()->setFlashdata('pesan2', 'Data berhasil Disimpan');
			return redirect()->to(base_url('arsip'));
		} else {
			$this->session->setFlashdata('pesan', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('arsip/add'));
		}
	}
	public function edit($id_arsip)
	{
		$data = array(
			'title' => "Edit Arsip",
			'arsip' => $this->Model_arsip->detail_data($id_arsip),
			'kategori' => $this->Model_kategori->all_data(),
			'isi'   => "arsip/v_edit"
		);
		return view('layout/v_wrapper', $data);
	}

	public function update($id_arsip)
	{
		if ($this->validate([
			'nama_file' => [
				'label'  => 'Nama File',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi'
				]
			],
			'id_kategori' => [
				'label'  => 'Kategori',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi',
				]
			],
			'deskripsi' => [
				'label'  => 'Deskripsi',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi'
				]
			],
			'file_arsip' => [
				'label'  => 'File Arsip',
				'rules'  => 'max_size[file_arsip, 2048]|ext_in[file_arsip,pdf]',
				'errors' => [
					'uploaded' => '{field} Wajib diupload',
					'max_size' => '{field} Maks 2MB',
					'ext_in' => '{field} Hanya diperbolehkan berformat PDF'
				]
			],
		])) {
			$file_arsip = $this->request->getFile('file_arsip');
			if ($file_arsip->getError() == 4) {
				$data = array(
					'id_arsip' => $id_arsip,
					'no_arsip' => $this->request->getVar('no_arsip'),
					'nama_file' => $this->request->getVar('nama_file'),
					'id_kategori' => $this->request->getVar('id_kategori'),
					'id_dep' => session()->get('id_department'),
					'id_user' => session()->get('id_user'),
					'tanggal_upload' => date('Y-m-d'),
					'tanggal_update' => date('Y-m-d'),
					'deskripsi' => $this->request->getVar('deskripsi'),
				);
				$this->Model_arsip->edit($data);
				session()->setFlashdata('pesan2', 'Data berhasil DiEdit');
				return redirect()->to(base_url('arsip'));
			} else {
				$nama_file = $file_arsip->getRandomName();
				$ukuran = $file_arsip->getSize('kb');
				$arsip = $this->Model_arsip->detail_data($id_arsip);
				if ($arsip['file_arsip'] != '') {
					unlink('template/file_arsip/' . $arsip['file_arsip']);
				}
				$data = array(
					'id_arsip' => $id_arsip,
					'no_arsip' => $this->request->getVar('no_arsip'),
					'nama_file' => $this->request->getVar('nama_file'),
					'id_kategori' => $this->request->getVar('id_kategori'),
					'id_dep' => session()->get('id_department'),
					'id_user' => session()->get('id_user'),
					'tanggal_upload' => date('Y-m-d'),
					'tanggal_update' => date('Y-m-d'),
					'deskripsi' => $this->request->getVar('deskripsi'),
					'file_arsip' => $nama_file,
					'ukuran_file' => $ukuran
				);
				$file_arsip->move('template/file_arsip', $nama_file);
				$this->Model_arsip->edit($data);
				session()->setFlashdata('pesan2', 'Data berhasil DiEdit');
				return redirect()->to(base_url('arsip'));
			}
		} else {
			session()->setFlashdata('pesan', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('arsip'));
		}
	}

	public function delete($id_arsip)
	{

		$data = array(
			'id_arsip' => $id_arsip
		);
		$this->Model_arsip->hapus($data);
		session()->setFlashdata('pesan3', 'Data berhasil Didelete');
		return redirect()->to(base_url('arsip'));
	}

	public function viewpdf($id_arsip)
	{
	    $data = array(
			'title' => "Arsip",
			'arsip' => $this->Model_arsip->detail_data($id_arsip),
			'isi'   => "arsip/v_viewpdf"
		);
		return view('layout/v_wrapper', $data);
	}
}
