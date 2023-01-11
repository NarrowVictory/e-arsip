<?php

namespace App\Controllers;

use App\Models\Model_user;
use App\Models\Model_dep;

class User extends BaseController
{
	public function __construct()
	{
		$this->Model_user = new Model_user();
		$this->Model_dep = new Model_dep();
	}

	public function index()
	{
		$data = array(
			'title' => "User",
			'user' => $this->Model_user->all_data(),
			'isi'   => "user/v_index"
		);
		return view('layout/v_wrapper', $data);
	}
	public function add()
	{
		$data = array(
			'title' => "Add User",
			'dep' => $this->Model_dep->all_data(),
			'isi'   => "user/v_add"
		);
		return view('layout/v_wrapper', $data);
	}
	public function insert()
	{
		if ($this->validate([
			'nama_user' => [
				'label'  => 'Nama User',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi'
				]
			],
			'email' => [
				'label'  => 'Email',
				'rules'  => 'required|is_unique[tbl_user.email]',
				'errors' => [
					'required' => '{field} Wajib diisi',
					'is_unique' => '{field} tidak boleh sama'
				]
			],
			'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi'
				]
			],
			'level' => [
				'label'  => 'Level',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi'
				]
			],
			'id_department' => [
				'label'  => 'Department',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi'
				]
			],
			'foto' => [
				'label'  => 'Foto',
				'rules'  => 'uploaded[foto]|max_size[foto, 1024]|mime_in[foto,image/png,image/jpg]',
				'errors' => [
					'uploaded' => '{field} Wajib diupload',
					'max_size' => '{field} Maks 1MB',
					'mime_in' => '{field} Hanya diperbolehkan berformat PNG dan JPG'
				]
			],
		])) {
			$foto = $this->request->getFile('foto');
			$nama_file = $foto->getRandomName();
			$data = array(
				'nama_user' => $this->request->getVar('nama_user'),
				'email' => $this->request->getVar('email'),
				'password' => $this->request->getVar('password'),
				'level' => $this->request->getVar('level'),
				'id_department' => $this->request->getVar('id_department'),
				'foto' => $nama_file
			);
			$foto->move('template/foto', $nama_file);
			$this->Model_user->simpan($data);
			session()->setFlashdata('pesan2', 'Data berhasil Disimpan');
			return redirect()->to(base_url('user'));
		} else {
			$this->session->setFlashdata('pesan', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user/add'));
		}
	}
	public function edit($id_user)
	{
		$data = array(
			'title' => "Edit User",
			'user' => $this->Model_user->detail_data($id_user),
			'dep' => $this->Model_dep->all_data(),
			'isi'   => "user/v_edit"
		);
		return view('layout/v_wrapper', $data);
	}
	public function update($id_user)
	{
		if ($this->validate([
			'nama_user' => [
				'label'  => 'Nama User',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi'
				]
			],
			'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi'
				]
			],
			'level' => [
				'label'  => 'Level',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi'
				]
			],
			'id_department' => [
				'label'  => 'Department',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi'
				]
			],
			'foto' => [
				'label'  => 'Foto',
				'rules'  => 'max_size[foto, 1024]|mime_in[foto,image/png,image/jpg]',
				'errors' => [
					'max_size' => '{field} Maks 1MB',
					'mime_in' => '{field} Hanya diperbolehkan berformat PNG dan JPG'
				]
			],
		])) {
			$foto = $this->request->getFile('foto');
			if ($foto->getError() == 4) {
				$data = array(
					'id_user' => $id_user,
					'nama_user' => $this->request->getVar('nama_user'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
					'level' => $this->request->getVar('level'),
					'id_department' => $this->request->getVar('id_department'),
				);
				//$foto->move('template/foto', $nama_file);
				$this->Model_user->edit($data);
			} else {
				$user = $this->Model_user->detail_data($id_user);
				if ($user['foto'] != '') {
					unlink('template/foto/' . $user['foto']);
				}
				$nama_file = $foto->getRandomName();
				$data = array(
					'id_user' => $id_user,
					'nama_user' => $this->request->getVar('nama_user'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
					'level' => $this->request->getVar('level'),
					'id_department' => $this->request->getVar('id_department'),
					'foto' => $nama_file
				);
				$foto->move('template/foto', $nama_file);
				$this->Model_user->edit($data);
			}


			session()->setFlashdata('pesan2', 'Data berhasil Diedit');
			return redirect()->to(base_url('user'));
		} else {
			$this->session->setFlashdata('pesan', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user/edit'));
		}
	}
	public function delete($id_user)
	{
		$user = $this->Model_user->detail_data($id_user);
		if ($user['foto'] != '') {
			unlink('template/foto/' . $user['foto']);
		}

		$data = array(
			'id_user' => $id_user
		);
		$this->Model_user->hapus($data);
		session()->setFlashdata('pesan3', 'Data berhasil Didelete');
		return redirect()->to(base_url('user'));
	}
	//--------------------------------------------------------------------
}
