<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
        $this->db->group_by('size.id_produk');
        return $this->db->get()->result();
    }

    public function produk_baru()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
        $this->db->group_by('produk.id_produk');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    public function detail_produk($id)
    {
        // $this->db->select('*');
        // $this->db->from('produk');
        // $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        // $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        // $this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
        // $this->db->where('produk.id_produk', $id_produk);
        // return $this->db->get()->row();
        $data['size'] = $this->db->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori JOIN size ON produk.id_produk=size.id_produk JOIN diskon ON produk.id_produk=diskon.id_produk WHERE produk.id_produk='" . $id . "'")->result();
        $data['produk'] = $this->db->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori JOIN size ON produk.id_produk=size.id_produk JOIN diskon ON produk.id_produk=diskon.id_produk WHERE produk.id_produk='" . $id . "'")->row();
        return $data;
    }
    public function gambar_produk($id)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_produk', $id);
        return $this->db->get()->result();
    }

    public function produk_bagus()
    {
        $this->db->select('*');
        $this->db->select('produk.images, produk.nama_produk, size.harga');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
        $this->db->group_by('rinci_transaksi.id_produk');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    public function related_produk($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
        $this->db->where(array('produk.id_produk !='), $id);
        $this->db->limit(4);
        return $this->db->get()->result();
    }

    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }

    public function kategori_produk()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function produk_kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
        $this->db->where('produk.id_kategori', $id_kategori);
        $this->db->group_by('produk.id_produk');
        return $this->db->get()->result();
    }

    public function diskon()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
        $this->db->where('diskon>=1 and stock>=1');
        $this->db->group_by('produk.id_produk');
        return $this->db->get()->result();
    }

    public function produk_diskon()
    {
        $this->db->from('produk');
        $this->db->where('is_available', 1);
        $this->db->order_by('diskon', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row();
    }
}
