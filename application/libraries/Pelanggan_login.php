<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->pelanggan_login($email, $password);

        if ($cek) {
            $id_pelanggan = $cek->id_pelanggan;
            $nama_pelanggan = $cek->nama_pelanggan;
            $email = $cek->email;
            $password = $cek->password;
            $alamat = $cek->alamat;
            $no_tlpn = $cek->no_tlpn;
            $kode_pos = $cek->kode_pos;
            $point = $cek->point;
            $level_member = $cek->level_member;

            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->ci->session->set_userdata('password', $password);
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('alamat', $alamat);
            $this->ci->session->set_userdata('no_tlpn', $no_tlpn);
            $this->ci->session->set_userdata('kode_pos', $kode_pos);
            $this->ci->session->set_userdata('point', $point);
            $this->ci->session->set_userdata('level_member', $level_member);

            redirect('home');
        } else {
            $this->ci->session->set_flashdata('error', 'Email atau Password Error');
            redirect('pelanggan/login');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('email') == '') {
            $this->ci->session->set_flashdata('error', 'Anda belum Login!!!');
            redirect('pelanggan/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('nama_pelanggan');
        $this->ci->session->unset_userdata('password');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('alamat');
        $this->ci->session->unset_userdata('no_tlpn');
        $this->ci->session->unset_userdata('kode_pos');
        $this->ci->session->unset_userdata('point');
        $this->ci->session->unset_userdata('level_member');
        $this->ci->session->set_flashdata('pesan', 'Berhasil Logout!!!');
        redirect('pelanggan/login');
    }
}
