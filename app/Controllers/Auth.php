<?php

namespace App\Controllers;

use App\Models\Model_auth;

class Auth extends BaseController
{

	function __construct()
	{
		$this->Model_auth = new Model_auth();
	}

	public function index()
	{
		$data = array(
			'title' => "Login"
		);
		return view('v_login', $data);
	}

	public function login()
	{
		if ($this->validate([
			'email' => [
				'label'  => 'E-mail',
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
			]
		])) {
			$email = $this->request->getVar('email');
			$password = $this->request->getVar('password');
			$cek = $this->Model_auth->login($email, $password);


			if ($cek) {
				session()->set('log', true);
				session()->set('nama_user', $cek['nama_user']);
				session()->set('id_user', $cek['id_user']);
				session()->set('email', $cek['email']);
				session()->set('level', $cek['level']);
				session()->set('foto', $cek['foto']);
				session()->set('id_department', $cek['id_department']);
				return redirect()->to(base_url('home'));
			} else {
				$this->session->setFlashdata('pesan2', "Login Gagal, Username / Password Salah");
				return redirect()->to(base_url('auth/index'));
			}
		} else {
			$this->session->setFlashdata('pesan', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('auth/index'));
		}
	}

	public function logout()
	{
		session()->remove('log');
		session()->remove('nama_user');
		session()->remove('email');
		session()->remove('level');
		session()->remove('foto');
		$this->session->setFlashdata('pesan2', "Anda telah logout");
		return redirect()->to(base_url('auth/index'));
	}

	//--------------------------------------------------------------------

}
