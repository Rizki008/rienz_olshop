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
		return $this->db->query("SELECT *,transaksi.no_tlpn as hp FROM `transaksi` JOIN rinci_transaksi ON transaksi.no_order=rinci_transaksi.no_order JOIN produk ON rinci_transaksi.id_produk=produk.id_produk JOIN size ON produk.id_produk=size.id_produk JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE transaksi.no_order='" . $no_order . "'")->result();
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
		return $this->db->query("SELECT SUM(qty) AS jumlah, jenis_kel, CASE WHEN jenis_kel=1 THEN 'perempuan' WHEN jenis_kel=2 THEN 'laki-laki' END AS jk FROM rinci_transaksi JOIN transaksi ON transaksi.no_order=rinci_transaksi.no_order JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan GROUP BY pelanggan.jenis_kel")->result();
	}

	public function grafik_produk_laris()
	{
		return $this->db->query("SELECT SUM(qty) as jlaris, produk.nama_produk FROM `rinci_transaksi` JOIN produk ON produk.id_produk=rinci_transaksi.id_produk JOIN size ON size.id_produk=produk.id_produk GROUP BY rinci_transaksi.id_produk ORDER BY qty;")->result();
	}
	public function grafik_kategori_laris()
	{
		return $this->db->query("SELECT SUM(qty) as kategori_laris, kategori.nama_kategori FROM `rinci_transaksi` JOIN produk ON produk.id_produk=rinci_transaksi.id_produk JOIN size ON size.id_produk=produk.id_produk JOIN kategori ON produk.id_kategori=kategori.id_kategori GROUP BY produk.id_kategori ORDER BY qty;")->result();
	}
	public function grafik_produk_merek()
	{
		return $this->db->query("SELECT SUM(qty) as laris, produk.merek FROM `rinci_transaksi` JOIN produk ON produk.id_produk=rinci_transaksi.id_produk JOIN size ON size.id_produk=produk.id_produk GROUP BY produk.merek ORDER BY qty")->result();
	}

	// GRAFIK BARU
	public function bulan()
	{
		$sql = 'SELECT tgl_order FROM `transaksi` GROUP BY tgl_order ORDER BY tgl_order';
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}
	public function produk()
	{
		$sql = 'SELECT nama_produk FROM `rinci_transaksi` LEFT JOIN produk ON produk.id_produk=rinci_transaksi.id_produk GROUP BY rinci_transaksi.id_produk ORDER BY rinci_transaksi.id_produk;';
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}
	public function merek()
	{
		$sql = 'SELECT merek FROM `rinci_transaksi` LEFT JOIN produk ON produk.id_produk=rinci_transaksi.id_produk GROUP BY rinci_transaksi.id_produk ORDER BY rinci_transaksi.id_produk;';
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}
	public function kategori()
	{
		$sql = 'SELECT nama_kategori FROM `kategori` GROUP BY nama_kategori ORDER BY nama_kategori;';
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}
	public function pelanggan()
	{
		$sql = 'SELECT nama_pelanggan FROM `pelanggan` GROUP BY nama_pelanggan ORDER BY nama_pelanggan;';
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}
	public function jeniskelamin()
	{
		$sql = 'SELECT jenis_kel FROM `pelanggan` GROUP BY jenis_kel ORDER BY jenis_kel;';
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}
}

/* End of file M_transaksi.php */
