<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

	public function simpan_transaksi($data)
	{
		$this->db->insert('transaksi', $data);
	}

	public function simpan_rinci_transaksi($data_rinci)
	{
		$this->db->insert('rinci_transaksi', $data_rinci);
	}

	public function upload_buktibayar($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi', $data);
	}

	public function update_order($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi', $data);
	}

	public function belum_bayar()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
		$this->db->where('status_order=0');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function diproses()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
		$this->db->where('status_order=1');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function dikirim()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
		$this->db->where('status_order=2');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function selesai()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
		$this->db->where('status_order=3');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function pesanan($no_order)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('transaksi.no_order', $no_order);
		return $this->db->get()->result();
	}

	public function pesanan_detail($no_order)
	{
		// $this->db->select('*');
		// $this->db->from('transaksi');
		// $this->db->join('rinci_transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
		// $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
		// $this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
		// $this->db->where('transaksi.no_order', $no_order);
		// return $this->db->get()->result();
		return $this->db->query("SELECT * FROM `transaksi` JOIN rinci_transaksi ON transaksi.no_order=rinci_transaksi.no_order JOIN produk ON rinci_transaksi.id_produk=produk.id_produk JOIN size ON produk.id_produk=size.id_produk JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE transaksi.no_order='" . $no_order . "'")->result();
	}

	public function detail_pesanan($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->get()->row();
	}

	public function rekening()
	{
		$this->db->select('*');
		$this->db->from('rekening');
		return $this->db->get()->result();
	}

	public function info($no_order)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->group_by('pelanggan.id_pelanggan');

		$this->db->where('no_order', $no_order);
		return $this->db->get()->result();
	}

	public function insert_riview()
	{
		$data = array(
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'id_produk' => $this->input->post('id_produk'),
			'nama_pelanggan' => $this->session->userdata('nama_pelanggan'),
			'tanggal' => date('Y-m-d'),
			'isi' => $this->input->post('isi'),
			'status' => 1,
		);
		$this->db->insert('riview', $data);
	}

	public function grafik_pelanggan()
	{

		// return $this->db->query("SELECT COUNT(transaksi.no_order) as qty, nama, month(tgl_order) FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan GROUP BY transaksi.id_pelanggan")->result();
		// $this->db->select_sum('qty');
		// $this->db->select('pelanggan.nama_pelanggan');
		// $this->db->select('rinci_transaksi.qty');
		// $this->db->from('rinci_transaksi');
		// $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
		// $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
		// $this->db->group_by('pelanggan.id_pelanggan');
		// $this->db->order_by('qty', 'desc');

		$this->db->select("COUNT(transaksi.id_pelanggan) as qty, nama_pelanggan");
		$this->db->from("transaksi");
		$this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->group_by('pelanggan.id_pelanggan');
		$this->db->order_by('qty', 'desc');
		return $this->db->get()->result();
	}
	public function grafik_pelanggan_member()
	{

		return $this->db->query("SELECT COUNT(level_member) as qty, level_member FROM pelanggan GROUP BY level_member")->result();
	}

	public function grafik_kelamin()
	{
		return $this->db->query("SELECT SUM(qty) AS jumlah, jenis_kel, CASE WHEN jenis_kel=1 THEN 'perempuan' WHEN jenis_kel=2 THEN 'perempuan' END AS jk FROM rinci_transaksi JOIN transaksi ON transaksi.no_order=rinci_transaksi.no_order JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan GROUP BY pelanggan.jenis_kel")->result();
	}

	public function grafik_produk_laris()
	{
		// $this->db->select_sum('qty');
		// $this->db->select('produk.nama_produk');
		// //$this->db->select('rinci_transaksi.qty');
		// $this->db->from('rinci_transaksi');
		// $this->db->join('warna', 'rinci_transaksi.id_warna = warna.id_warna', 'left');
		// $this->db->join('produk', 'warna.id_produk = produk.id_produk', 'left');
		// $this->db->group_by('rinci_transaksi.id_warna');
		// $this->db->order_by('qty', 'desc');
		return $this->db->query("SELECT SUM(qty) as jlaris, produk.nama_produk FROM `rinci_transaksi` JOIN produk ON produk.id_produk=rinci_transaksi.id_produk JOIN size ON size.id_produk=produk.id_produk ORDER BY qty;")->result();
	}
}

/* End of file M_transaksi.php */
