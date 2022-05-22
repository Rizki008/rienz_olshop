<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_master_produk extends CI_Model
{
    //kategori
    public function kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }
    public function detail_kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }
    public function add_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function edit_kategori($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('kategori', $data);
    }
    public function hapus_kategori($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('kategori');
    }

    //produk
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->order_by('id_produk', 'desc');
        return $this->db->get()->result();
    }
    public function id_produk()
    {
        return $this->db->query('SELECT max(id_produk) as id FROM produk')->row();
    }
    public function detail_produk($id_produk)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->row();
    }
    public function add_produk($data)
    {
        $this->db->insert('produk', $data);
    }
    public function edit_produk($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
    }
    public function delete_produk($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk');
    }

    //diskon
    public function diskon()
    {
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->join('produk', 'diskon.id_produk = diskon.id_produk', 'left');
        $this->db->order_by('id_diskon', 'desc');
        return $this->db->get()->result();
    }
    public function add_diskon($data)
    {
        $this->db->insert('diskon', $data);
    }
    public function edit_diskon($data)
    {
        $this->db->where('id_diskon', $data['id_diskon']);
        $this->db->update('diskon', $data);
    }
    public function delete_diskon($data)
    {
        $this->db->where('id_diskon', $data['id_diskon']);
        $this->db->delete('diskon');
    }

    //size data produk
    public function size($id_produk)
    {
        $this->db->select('*');
        $this->db->from('size');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->where('produk.id_produk', $id_produk);
        $data['size'] = $this->db->get()->result();
        $data['produk'] = $this->db->get_where('produk', array('id_produk' => $id_produk))->row();
        return $data;
    }
    public function add_size($data)
    {
        $this->db->insert('size', $data);
    }
    public function edit_size($data)
    {
        $this->db->where('id_size', $data['id_size']);
        $this->db->update('size', $data);
    }
    public function delete_size($data)
    {
        $this->db->where('id_size', $data['id_size']);
        $this->db->delete('size');
    }
}
