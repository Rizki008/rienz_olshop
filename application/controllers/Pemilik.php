<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('m_transaksi');
	}

	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
			'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
			'grafik_produk_laris' => $this->m_transaksi->grafik_produk_laris(),
			'grafik_produk_merek' => $this->m_transaksi->grafik_produk_merek(),
			'grafik_kategori_laris' => $this->m_transaksi->grafik_kategori_laris(),
			'bulan' => $this->m_transaksi->bulan(),
			'produk' => $this->m_transaksi->produk(),
			'merek' => $this->m_transaksi->merek(),
			'kategori' => $this->m_transaksi->kategori(),
			'pelanggan' => $this->m_transaksi->pelanggan(),
			'jeniskelamin' => $this->m_transaksi->jeniskelamin(),
			'isi' => 'v_pemilik'
		);
		$this->load->view('pemilik/v_wrapper', $data, FALSE);
	}

	//user
	public function user()
	{
		$data = array(
			'title' => 'Data User',
			'user' => $this->m_admin->user(),
			'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
			'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
			'grafik_produk_laris' => $this->m_transaksi->grafik_produk_laris(),
			'grafik_produk_merek' => $this->m_transaksi->grafik_produk_merek(),
			'grafik_kategori_laris' => $this->m_transaksi->grafik_kategori_laris(),
			'isi' => 'pemilik/user/v_user'
		);
		$this->load->view('pemilik/v_wrapper', $data, FALSE);
	}
	public function add()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level' => $this->input->post('level'),
		);
		$this->m_admin->add($data);
		$this->session->set_flashdata('pesan', 'Berhasil Tambah User');
		redirect('pemilik/user');
	}
	public function update($id_user = null)
	{
		$data = array(
			'id_user' => $id_user,
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level' => $this->input->post('level')
		);
		$this->m_admin->update($data);
		$this->session->set_flashdata('pesan', 'Berhasil Diupdate');
		redirect('pemilik/user');
	}
	public function delete($id_user = null)
	{
		$data = array(
			'id_user' => $id_user,
		);
		$this->m_admin->delete($data);
		$this->session->set_flashdata('pesan', 'Berhasil Dihapus');
		redirect('pemilik/user');
	}

	public function analisis_pelanggan()
	{
		$data = array(
			'title' => 'Analisis Pelanggan Loyal',
			'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'isi' => 'pemilik/analisis/v_pelanggan'
		);
		$this->load->view('pemilik/v_wrapper', $data, FALSE);
	}
}
