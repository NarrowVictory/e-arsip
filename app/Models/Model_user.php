<?php namespace App\Models;

use CodeIgniter\Model;

class Model_user extends Model{

	public function all_data()
	{
		return $this->db->table('tbl_user')
		->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_department', 'left')
		->get()
		->getResultArray();
	}

	public function detail_data($id_user)
	{
		return $this->db->table('tbl_user')
		->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_department', 'left')
		->where('id_user', $id_user)
		->get()
		->getRowArray();
	}

	public function simpan($data)
	{
	    return $this->db->table('tbl_user')->insert($data);
	}

	public function edit($data)
	{
	    return $this->db->table('tbl_user')
	    	->where('id_user', $data['id_user'])
	    	->update($data);
	}

	public function hapus($data)
	{
	    return $this->db->table('tbl_user')
	    ->where('id_user', $data['id_user'])
	    ->delete($data);
	}
}