<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Lokasitoko extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('m_transaksi');
		$this->load->model('m_chatting');
	}
	//lokasi toko
	public function lokasi()
	{
		$this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', array('required' => '%s Mohon Untuk Diisi'));
		$this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s Mohon Untuk Diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Mohon Untuk Diisi'));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Setting Lokasi Toko',
				'lokasi' => $this->m_admin->data_lokasi(),
				'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
				'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
				'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
				'grafik_produk_laris' => $this->m_transaksi->grafik_produk_laris(),
				'grafik_produk_merek' => $this->m_transaksi->grafik_produk_merek(),
				'grafik_kategori_laris' => $this->m_transaksi->grafik_kategori_laris(),
				'isi' => 'backend/lokasi/v_lokasi'
			);
			$this->load->view('backend/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id' => 1,
				'lokasi' => $this->input->post('kota'),
				'nama_toko' => $this->input->post('nama_toko'),
				'alamat' => $this->input->post('alamat'),
			);
			$this->m_admin->edit($data);
			$this->session->set_flashdata('pesan', 'Lokasi Toko berhasil di update');
			redirect('admin/lokasi');
		}
	}
}

/* End of file Admin.php */
