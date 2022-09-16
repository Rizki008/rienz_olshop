<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array('required' => '%s Mohon untuk diisi!!!'));
        $this->form_validation->set_rules('alamat', 'Alamat Pelanggan', 'required', array('required' => '%s Mohon untuk diisi!!!'));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[pelanggan.email]', array(
            'required' => '%s Mohon untuk diisi!!!',
            'is_unique' => '%s Email Sudah Terdaptar'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|regex_match[/^[A-Z a-z 0-9 _ . \-]+$/]', array(
            'required' => '%s Mohon untuk diisi!!!',
            'max_length' => '%s Password Minimal 8',
            'regex_match' => '%s Password Harus Gabungan Huruf Besar, Angka Dan Hurup Kecil'
        ));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password Pelanggan', 'required|matches[password]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'matches' => '%s Password Tidak Sama !!!'
        ));
        if ($this->form_validation->run() ==  FALSE) {
            $data = array(
                'title' => 'Register Pelanggan',
                'isi'  => 'frontend/pelanggan/v_register'
            );
            $this->load->view('frontend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'alamat' => $this->input->post('alamat'),
            );
            $this->m_auth->register($data);
            $this->session->set_flashdata('pesan', 'Register Berhasi, Silahkan Untuk Login');
            redirect('pelanggan/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array('required' => '%s Mohon untuk diisi!!!'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Mohon untuk diisi!!!'));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login pelanggan',
            'isi'  => 'frontend/pelanggan/v_login'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }
}
