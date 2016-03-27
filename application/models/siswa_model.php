<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	var $_collection = 'siswa';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('mongo_db');
	}

	public function get()
	{
		return $this->mongo_db->get($this->_collection);
	}

	public function insert($nama='', $jenis_kelamin = '', $usia = '')
	{
		return $this->mongo_db->insert($this->_collection, array(
			'nama'          => $nama,
			'jenis_kelamin' => $jenis_kelamin,
			'usia'          => $usia
		));
	}

	public function update($data, $uniqe_id)
	{
		$this->mongo_db->set($data)->where(array('_id' => new MongoID($uniqe_id)));
		return $this->mongo_db->update($this->_collection);
	}

	public function delete($uniqe_id)
	{
		$this->mongo_db->where(array('_id' => $uniqe_id));
		return $this->mongo_db->delete_all($this->_collection);
	}

}

/* End of file siswa_model.php */
/* Location: ./application/models/siswa_model.php */