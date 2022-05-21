<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_master_produk');
    }

    public function index()
    {
        $data = array(
            'title' => 'Rienz Olshop',
            'ketegori' => $this->m_master_produk->kategori(),
            'isi' => 'v_home'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }
}
