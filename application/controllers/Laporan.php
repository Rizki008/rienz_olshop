<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
		$this->load->model('m_transaksi');
		$this->load->model('m_chatting');
	}

	public function hari()
	{
		$data = array(
			'title' => 'Data Laporan harian',
			'laporan' => $this->m_laporan->lap_hari(),
			'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
			'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
			'grafik_produk_laris' => $this->m_transaksi->grafik_produk_laris(),
			'grafik_kategori_laris' => $this->m_transaksi->grafik_kategori_laris(),
			'grafik_produk_merek' => $this->m_transaksi->grafik_produk_merek(),
			'laporan' => $this->m_laporan->lap_hari(),
			'isi' => 'pemilik/laporan/v_hari'
			// 'isi' => 'pemilik/laporan/data_laporan/v_lap_hari'
		);
		$this->load->view('pemilik/v_wrapper', $data, FALSE);
	}

	public function bulan()
	{
		$data = array(
			'title' => 'Data Laporan Perbulan',
			// 'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'laporan' => $this->m_laporan->lap_bulan(),
			'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
			'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
			'grafik_produk_laris' => $this->m_transaksi->grafik_produk_laris(),
			'grafik_produk_merek' => $this->m_transaksi->grafik_produk_merek(),
			'grafik_kategori_laris' => $this->m_transaksi->grafik_kategori_laris(),
			'isi' => 'pemilik/laporan/v_bulan',
			// 'isi' => 'pemilik/laporan/data_laporan/v_lap_bulan'
		);
		$this->load->view('pemilik/v_wrapper', $data, FALSE);
	}
	public function tahun()
	{
		$data = array(
			'title' => 'Data Laporan Pertahun',
			// 'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'laporan' => $this->m_laporan->lap_tahun(),
			'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
			'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
			'grafik_produk_laris' => $this->m_transaksi->grafik_produk_laris(),
			'grafik_produk_merek' => $this->m_transaksi->grafik_produk_merek(),
			'grafik_kategori_laris' => $this->m_transaksi->grafik_kategori_laris(),
			'isi' => 'pemilik/laporan/v_tahun'
			// 'isi' => 'pemilik/laporan/data_laporan/v_lap_tahun'
		);
		$this->load->view('pemilik/v_wrapper', $data, FALSE);
	}

	public function lap_hari()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Penjualan Perhari',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_hari($tanggal, $bulan, $tahun),
			'laporan' => $this->m_laporan->lap_bulan(),
			'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
			'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
			'grafik_produk_laris' => $this->m_transaksi->grafik_produk_laris(),
			'grafik_produk_merek' => $this->m_transaksi->grafik_produk_merek(),
			'grafik_kategori_laris' => $this->m_transaksi->grafik_kategori_laris(),
			'isi' => 'pemilik/laporan/data_laporan/v_lap_hari'
		);
		$this->load->view('pemilik/v_wrapper', $data, FALSE);
	}

	public function lap_bulan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Perbulan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_bulan($bulan, $tahun),
			'laporan' => $this->m_laporan->lap_bulan(),
			'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
			'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
			'grafik_produk_laris' => $this->m_transaksi->grafik_produk_laris(),
			'grafik_produk_merek' => $this->m_transaksi->grafik_produk_merek(),
			'grafik_kategori_laris' => $this->m_transaksi->grafik_kategori_laris(),
			'isi' => 'pemilik/laporan/data_laporan/v_lap_bulan'
		);
		$this->load->view('pemilik/v_wrapper', $data, FALSE);
	}

	public function lap_tahun()
	{
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Pertahun',
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_tahun($tahun),
			'laporan' => $this->m_laporan->lap_bulan(),
			'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
			'grafik_member' => $this->m_transaksi->grafik_pelanggan_member(),
			'grafik_kelamin' => $this->m_transaksi->grafik_kelamin(),
			'grafik_produk_laris' => $this->m_transaksi->grafik_produk_laris(),
			'grafik_produk_merek' => $this->m_transaksi->grafik_produk_merek(),
			'grafik_kategori_laris' => $this->m_transaksi->grafik_kategori_laris(),
			'isi' => 'pemilik/laporan/data_laporan/v_lap_tahun'
		);
		$this->load->view('pemilik/v_wrapper', $data, FALSE);
	}
}
