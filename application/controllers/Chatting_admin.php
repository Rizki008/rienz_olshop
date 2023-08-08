<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chatting_admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_chatting');
	}

	public function pesan($id_pelanggan)
	{
		$this->form_validation->set_rules('pesan', 'Pesan', 'required', array(
			'pesan' => ' %s pesan harus diisi!!!'
		));

		$data = array(
			'title' => 'Pesan Masuk',
			'pesan' => $this->m_chatting->view_chatting($id_pelanggan),
			'isi' => 'backend/chatting/v_chatting'
		);
		$this->load->view('backend/v_wrapper.php', $data, FALSE);
	}

	public function send()
	{
		$data = array(
			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'admin_send' => $this->input->post('pesan'),
			'pelanggan_send' => '0'
		);
		$this->db->insert('chatting', $data);
		redirect('chatting_admin/pesan/' . $data['id_pelanggan']);
	}
}
