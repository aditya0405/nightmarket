<?php

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Model_barang');

		if($this->session->userdata('role_id') != '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Username atau password anda salah !!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
			redirect('auth/login');			}

	}
	
	public function tambah_ke_keranjang($id)
	{
		$barang = $this->Model_barang->find($id);
		$data = array(
			'id'      => $barang->id_brg,
			'qty'     => 1,
			'price'   => $barang->harga,
			'name'    => $barang->nama_brg
			
	);
	
	$this->cart->insert($data);	
	redirect('Welcome');
	}

	public function detail_keranjang()
	{
		$data['barang'] = $this->Model_barang->tampildata()->result();
		// $data['barang'] = $this->Model_barang->tampildata();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('keranjang');
		$this->load->view('templates/footer');	
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('Welcome');
	}

	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');	
	}

	public function proses_pesanan()
	{	
		$is_processed = $this->model_invoice->index();
		if($is_processed){

			$this->cart->destroy();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('proses_pesanan');
		$this->load->view('templates/footer');	
		} else {
			echo "Maaf , Pesananan Gagal di proses !1";
		}

		
	}
	
	public function detail($id_brg)
	{
		$data['barang'] = $this->Model_barang->detail_brg($id_brg);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_barang', $data);
		$this->load->view('templates/footer');	
	}

	
}


?>
