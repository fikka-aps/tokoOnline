<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
	{
		$data['title'] = 'Produk';
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->db->get('produk')->result_array();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('produk', $data);
		$this->load->view('admin/footer', $data);
	}
	public function addProduk()
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $name = $this->input->post('name');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $upload_pict = $_FILES['pict']['name'];
        if ($upload_pict) {
            $config['upload_path'] = './img/produk';
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
            'nama_produk' => $name,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'foto' => $pict_name,
            'stok' => $stok
        ];

        $this->db->insert('produk', $data);
        redirect('produk');
	}
    public function editProduk()
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $desc = $this->input->post('deskripsi');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');

        $upload_pict = $_FILES['pict']['name'];
        if ($upload_pict) {
            $config['upload_path'] = './img/produk';
            $config['allowed_types'] = 'jpg|png|jpeg';
            // $config['max_size'] = '6048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pict')) {
                $pict_name = $this->upload->data('file_name');
                $this->db->set('foto', $pict_name);
            } else {
                echo 'gagal';
            }
        }

        $this->db->set('nama_produk', $name);
        $this->db->set('deskripsi', $desc);
        $this->db->set('harga', $harga);
        $this->db->set('stok', $stok);
        $this->db->where('id_produk', $id);
        $this->db->update('produk');
        redirect('produk');
    }
    public function deleteProduk($id)
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
        redirect('produk');
    }
    public function menunggu_pembayaran()
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->m_toko->belum()->result_array();
        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('menunggu_pembayaran', $data);
		$this->load->view('admin/footer', $data);;
    }
    public function konfirmasi_pembayaran()
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->m_toko->konfirmasi()->result_array();
        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('konfirmasi_pembayaran', $data);
		$this->load->view('admin/footer', $data);;
    }
    public function pesanan_selesai()
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->m_toko->pesanan_selesai()->result_array();
        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('pesanan_selesai', $data);
		$this->load->view('admin/footer', $data);;
    }
    public function pengiriman()
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->m_toko->pengiriman()->result_array();
        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('pengiriman', $data);
		$this->load->view('admin/footer', $data);;
    }
    public function dikirim()
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->m_toko->dikirim()->result_array();
        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('dikirim', $data);
		$this->load->view('admin/footer', $data);;
    }
    public function bayar($id)
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->where('id_penjualan', $id);
        $this->db->set('status','Menunggu Pengiriman');
        $this->db->update('penjualan');
        redirect('konfirmasi_pembayaran');
    }
    public function resi()
    {
        $data['admin'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $resi=$this->input->post('resi');
        $id=$this->input->post('id');
        $this->db->where('id_penjualan', $id);
        $this->db->set('status','Dikirim');
        $this->db->set('resi',$resi);
        $this->db->update('penjualan');
        redirect('pengiriman');
    }
}