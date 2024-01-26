<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function home()
	{
		$data['title'] = 'Home';
		$data['produk'] = $this->db->get('produk')->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('home', $data);
		$this->load->view('template/footer', $data);
	}
    public function detail($id)
	{
		$data['title'] = 'Detail';
		$data['produk'] = $this->db->get_where('produk', array('id_produk' => $id))->row_array();
		$this->load->view('detail', $data);
	}
    public function pesanan()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Pesanan';
		$id_user = $this->session->userdata('id_user');
		$data['belum_bayar'] = $this->m_toko->belum_dibayar($id_user)->result_array();
		$data['menunggu_konfirmasi'] = $this->m_toko->menunggu_konfirmasi($id_user)->result_array();
        $data['pengiriman'] = $this->m_toko->pengiriman()->result_array();
        $data['dikirim'] = $this->m_toko->dikirim()->result_array();
		$data['selesai'] = $this->m_toko->selesai($id_user)->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('pesanan', $data);
		$this->load->view('template/footer', $data);
	}
	public function bayarProduk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id = $this->input->post('id');

        $upload_pict = $_FILES['pict']['name'];
        if ($upload_pict) {
            $config['upload_path'] = './img/bukti';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pict')) {
                $pict_name = $this->upload->data('file_name');
            } else {
                echo 'gagal';
            }
        }
		$data = [
            'bukti' => $pict_name,
            'id_penjualan' => $id,
        ];

        $this->db->insert('penjualan', $data);
        redirect('pesanan');
    }
	public function beliProduk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_user = $this->session->userdata('id_user');
        $id_produk = $this->input->post('id');

        $harga = $this->input->post('harga');
        $jumlah = $this->input->post('jumlah');
        $status = 'belum dibayar';
        $total = $jumlah * $harga ;
        $date = date('Y-m-d');  


		$data = [
            'id_produk' => $id_produk,
            'id_user' => $id_user,
            'tanggal_pembelian' => $date,
            'total' => $total,
            'jumlah' => $jumlah,
            'status' => $status,
        ];

        $this->db->insert('penjualan', $data);
        redirect('pesanan');
    }
    public function buktiBayar()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id = $this->input->post('id');
        $status = 'Menunggu Konfirmasi Pembayaran';
        $upload_pict = $_FILES['pict']['name'];
        if ($upload_pict) {
            $config['upload_path'] = './img/bukti';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pict')) {
                $pict_name = $this->upload->data('file_name');
                $this->db->set('bukti', $pict_name);
            } else {
                echo 'gagal';
            }
        }
		$this->db->set('status', $status);

        $this->db->where('id_penjualan', $id);
        $this->db->update('penjualan');
        redirect('pesanan');
    }
    public function produk_search()
	{
		$data['title'] = 'Product';
		if ($this->input->post('search')) {
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = null;
		}

		$data['produk'] = $this->m_toko->data_produk($data['keyword']);
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('home', $data);
		$this->load->view('template/footer', $data);
	}
    public function diterima($id)
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->where('id_penjualan', $id);
        $this->db->set('status','Pesanan Selesai');
        $this->db->update('penjualan');
        redirect('pesanan');
    }
}