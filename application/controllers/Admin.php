<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('m_transaksi');
		$this->load->model('m_chatting');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
			'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
			'grafik_produk_laris' => $this->m_transaksi->grafik_produk_laris(),
			'grafik_produk_merek' => $this->m_transaksi->grafik_produk_merek(),
			'isi' => 'v_admin'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
	}

	//Update one item
	public function update($id = NULL)
	{
	}

	//Delete one item
	public function delete($id = NULL)
	{
	}
}

/* End of file Admin.php */
