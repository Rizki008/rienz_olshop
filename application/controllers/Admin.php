<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     //Load Dependencies

    // }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'isi' => 'v_admin'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
    }

    //Update one item
    public function update($id = NULL)
    {
    }

    //Delete one item
    public function delete($id = NULL)
    {
    }
}

/* End of file Admin.php */
