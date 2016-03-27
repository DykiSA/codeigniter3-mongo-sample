<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model', 'siswa');
	}

	public function index()
	{
		$data['siswa'] = $this->siswa->get();
		$data['pesan'] = $this->session->flashdata('pesan');
		$this->load->view('home', $data);
	}

	public function tambah_data()
	{
		$insert = array();
		// mendapatkan nilai yang mau di ubah dari document
		foreach ($this->input->post() as $nama_field => $nilai) {
			$insert[$nama_field] = $nilai;
		}
		// tambahkan document/row/record
		if ($this->siswa->insert($insert['nama'], $insert['jenis_kelamin'], $insert['usia'])) {
			// sukses
			$this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
		}else{
			// gagal
			$this->session->set_flashdata('pesan', 'Tidak dapat menambahkan data');
		}
		redirect();
	}

	public function hapus_data($id)
	{
		// hapus document/row/record
		if ($this->siswa->delete($id)) {
			// sukses
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus');
		}else{
			// gagal
			$this->session->set_flashdata('pesan', 'Tidak dapat menghapus data');
		}
		redirect();
	}

	public function update_data()
	{
		$up = array();
		// mendapatkan nilai yang mau di ubah dari document
		foreach ($this->input->post() as $nama_field => $nilai) {
			if (!empty($nilai) && $nama_field != 'doc_id') {
				// jika nilai tidak kosong
				$up[$nama_field] = $nilai;
			}
		}
		$doc_id = $this->input->post('doc_id');
		// tambahkan document/row/record
		if ($this->siswa->update($up, $doc_id)) {
			// sukses
			$this->session->set_flashdata('pesan', 'Data berhasil diperbarui');
		}else{
			// gagal
			$this->session->set_flashdata('pesan', 'Tidak dapat memperbarui data');
		}
		redirect();
	}

}

/* End of file page.php */
/* Location: ./application/controllers/page.php */
