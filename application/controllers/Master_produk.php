<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master_produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_master_produk');
    }

    public function kategori()
    {
        $data = array(
            'title' => 'Data Kategori',
            'kategori' => $this->m_master_produk->kategori(),
            'isi' => 'backend/kategori/v_kategori'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function add_kategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'Kategori Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));

        if ($this->form_validation->run() == TRUE) {

            $config['upload_path'] = './assets/kategori';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '5000';
            $this->upload->initialize($config);
            $field_name = "gambar";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah Kategori',
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'backend/kategori/v_add'
                );
                $this->load->view('backend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/kategori' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_kategori' => $this->input->post('nama_kategori'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_master_produk->add_kategori($data);
                $this->session->set_flashdata('pesan', 'Kategori Berhasil Ditambah');
                redirect('master_produk/kategori');
            }
        }
        $data = array(
            'title' => 'Tambah Kategori',
            'isi' => 'backend/kategori/v_add'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
    public function edit_kategori($id_kategori = null)
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array('required' => '%s Mohon Untuk Diisi'));

        if ($this->form_validation->run() == TRUE) {

            $config['upload_path'] = './assets/kategori';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '5000';
            $this->upload->initialize($config);
            $field_name = "gambar";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Kategori',
                    'kategori' => $this->m_master_produk->detail_kategori($id_kategori),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'backend/kategori/v_edit'
                );
                $this->load->view('backend/v_wrapper', $data, FALSE);
            } else {
                //hapus gambar dari folder
                $kategori = $this->m_master_produk->detail_kategori($id_kategori);
                if ($kategori->gambar !== "") {
                    unlink('./assets/kategori/' . $kategori->gambar);
                }

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/kategori/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_kategori' => $id_kategori,
                    'nama_kategori' => $this->input->post('nama_kategori'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_master_produk->edit_kategori($data);
                $this->session->set_flashdata('pesan', 'Kategori Berhasil Ditambah');
                redirect('master_produk/kategori');
            }
            $data = array(
                'id_kategori' => $id_kategori,
                'nama_kategori' => $this->input->post('nama_kategori'),
            );
            $this->m_master_produk->edit_kategori($data);
            $this->session->set_flashdata('pesan', 'Kategori Berhasil Ditambah');
            redirect('master_produk/kategori');
        }
        $data = array(
            'title' => 'Edit Kategori',
            'kategori' => $this->m_master_produk->detail_kategori($id_kategori),
            'isi' => 'backend/kategori/v_edit'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function delete_kategori($id_kategori = null)
    {
        //hapus dari folder
        $kategori = $this->m_master_produk->detail_kategori($id_kategori);
        if ($kategori->gambar !== "") {
            unlink('./assets/kategori/' . $kategori->gambar);
        }
        $data = array(
            'id_kategori' => $id_kategori,
        );
        $this->m_master_produk->hapus_kategori($data);
        $this->session->set_flashdata('pesan', 'Kategori Berhasil Dihapus');
        redirect('master_produk/kategori');
    }
}
