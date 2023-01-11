<?php

namespace App\Controllers;
use App\Models\Model_home;

class Home extends BaseController
{
	function __construct()
	{
		$this->Model_home = new Model_home;
	}

	public function index()
	{
		$data = array(
			'title' => "Home",
			'total_arsip' => $this->Model_home->total_arsip(),
			'total_kategori' => $this->Model_home->total_kategori(),
			'total_department' => $this->Model_home->total_department(),
			'total_user' => $this->Model_home->total_user(),
			'isi'   => "v_home"
		);
		return view('layout/v_wrapper', $data);
	}

	//--------------------------------------------------------------------

}
