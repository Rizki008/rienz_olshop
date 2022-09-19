<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Produk Belanja',
            'isi' => 'frontend/cart/v_belanja'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        // $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id' => $this->input->post('id'),
            'id_size' => $this->input->post('id_size'),
            'id_diskon' => $this->input->post('id_diskon'),
            'qty' => $this->input->post('qty'),
            'size' => $this->input->post('size'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'images' => $this->input->post('images'),
            'stock' => $this->input->post('stock'),
            'netto' => $this->input->post('netto')
        );
        $this->cart->insert($data);
        redirect('belanja');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),
            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Berhasil Diupdate');
        redirect('belanja');
    }

    public function cekout()
    {
        $this->pelanggan_login->proteksi_halaman();

        // $this->form_validation->set_rules('id_pelanggan', 'Nama Depan', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
        // $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
        $this->form_validation->set_rules('provinsi', 'Provinsi Penerima', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
        $this->form_validation->set_rules('kota', 'Kota Penerima', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
        $this->form_validation->set_rules('expedisi', 'Expedisi', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
        $this->form_validation->set_rules('paket', 'Paket', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
        $this->form_validation->set_rules('alamat', 'Alamat Penerima', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
        $this->form_validation->set_rules('no_tlpn', 'No Telphon Penerima', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Order Pesanan Anda',
                'isi' => 'v_cekouth'
            );
            $this->load->view('v_cekouth', $data, FALSE);
        } else {
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('Y-m-d'),
                // 'nama_depan' => $this->input->post('nama_depan'),
                // 'nama_belakang' => $this->input->post('nama_belakang'),
                'no_tlpn' => $this->session->userdata('no_tlpn'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'paket' => $this->input->post('paket'),
                'expedisi' => $this->input->post('expedisi'),
                'estimasi' => $this->input->post('estimasi'),
                'alamat' => $this->session->userdata('alamat'),
                'kode_pos' => $this->session->userdata('kode_pos'),
                'ongkir' => $this->input->post('ongkir'),
                'berat' => $this->input->post('berat'),
                'grand_total' => $this->input->post('grand_total'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_bayar' => '0',
                'status_order' => '0',
            );
            $this->m_transaksi->simpan_transaksi($data);

            //simpan rinci transaksi
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_produk' => $item['id'],
                    'id_size' => $item['id_size'],
                    'id_diskon' => $item['id_diskon'],
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->m_transaksi->simpan_rinci_transaksi($data_rinci);
            }
            $this->session->set_flashdata('pesan', 'Pesanan Diproses');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
    }
}
