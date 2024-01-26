<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_toko extends CI_Model
{
    public function belum_dibayar($id)
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('produk', 'penjualan.id_produk = produk.id_produk');
        $this->db->where('id_user', $id);
        $this->db->where('status', 'Belum Dibayar');
        $query = $this->db->get();
        return $query;
    }
    public function menunggu_konfirmasi($id)
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('produk', 'penjualan.id_produk = produk.id_produk');
        $this->db->where('id_user', $id);
        $this->db->where('status', 'Menunggu Konfirmasi Pembayaran');
        $query = $this->db->get();
        return $query;
    }
    public function selesai($id)
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('produk', 'penjualan.id_produk = produk.id_produk');
        $this->db->where('id_user', $id);
        $this->db->where('status', 'Pesanan Selesai');
        $query = $this->db->get();
        return $query;
    }
    public function belum()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('produk', 'penjualan.id_produk = produk.id_produk');
        $this->db->join('user', 'penjualan.id_user = user.id_user');
        $this->db->where('status', 'Belum Dibayar');
        $query = $this->db->get();
        return $query;
    }
    public function konfirmasi()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('produk', 'penjualan.id_produk = produk.id_produk');
        $this->db->join('user', 'penjualan.id_user = user.id_user');
        $this->db->where('status', 'Menunggu Konfirmasi Pembayaran');
        $query = $this->db->get();
        return $query;
    }
    public function pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('produk', 'penjualan.id_produk = produk.id_produk');
        $this->db->join('user', 'penjualan.id_user = user.id_user');
        $this->db->where('status', 'Pesanan Selesai');
        $query = $this->db->get();
        return $query;
    }
    public function pengiriman()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('produk', 'penjualan.id_produk = produk.id_produk');
        $this->db->join('user', 'penjualan.id_user = user.id_user');
        $this->db->where('status', 'Menunggu Pengiriman');
        $query = $this->db->get();
        return $query;
    }
    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->join('produk', 'penjualan.id_produk = produk.id_produk');
        $this->db->join('user', 'penjualan.id_user = user.id_user');
        $this->db->where('status', 'Dikirim');
        $query = $this->db->get();
        return $query;
    }
    public function data_produk($keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_produk', $keyword);
        }
        return $this->db->get('produk')->result_array();
    }
    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('user');
    }
    public function bayar($id)
    {
        $this->db->where('id_penjualan', $id);
        $this->db->set('status','Pesanan Selesai');
        return $this->db->update('penjualan');
    }
    public function delete_promo($id)
    {
        $this->db->where('id_promo', $id);
        return $this->db->delete('promo');
    }
    public function edit_user($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ];
        $this->db->set('name', $data['name']);
        $this->db->where('id_user', $id);
        $this->db->update('user');
    }
    public function detail_data($id)
    {
        $query = $this->db->get_where('bimbel', array('bimbel_id' => $id))->row_array();
        return $query;
    }
    public function detail_promo($id)
    {
        $this->db->select('*');
        $this->db->from('promo');
        $this->db->join('bimbel', 'bimbel.bimbel_id = promo.id_bimbel');
        $query = $this->db->get_where('', array('id_promo' => $id))->row_array();
        return $query;
    }
    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_data');
        if (!empty($keyword)) {
            $this->db->like('nama_barang', $keyword);
        }
        return $this->db->get()->result_array();
    }
    
}
