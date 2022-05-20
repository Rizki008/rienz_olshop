<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master_produk extends CI_Controller
{

    public function kategori()
    {
        $data = array(
            'title' => 'Data Kategori',
            'isi' => 'backend/kategori/v_kategori'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function add_kategori()
    {

        if ($this->form_validation->run() == TRUE) {
            
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload()){
                $error = array('error' => $this->upload->display_errors());
            }
            else{
                $data = array('upload_data' => $this->upload->data());
                echo "success";
            }
            
        } else {
            # code...
        }
    }
}
