<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
    }

    public function hari()
    {
        $data = array(
            'title' => 'Data Laporan harian',
            'isi' => 'pemilik/laporan/v_hari'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }

    public function bulan()
    {
        $data = array(
            'title' => 'Data Laporan harian',
            'isi' => 'pemilik/laporan/v_bulan'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }
    public function tahun()
    {
        $data = array(
            'title' => 'Data Laporan harian',
            'isi' => 'pemilik/laporan/v_tahun'
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
            'isi' => 'pemilik/laporan/data_laporan/v_lap_tahun'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }
}
