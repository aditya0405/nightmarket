<?php 

	class Invoice extends CI_Controller {
		public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_invoice');
	}

		public function index()
		{
			$data['invoice'] = $this->model_invoice->tampil_data();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/invoice',$data);
			$this->load->view('templates_admin/footer');


			if($this->session->userdata('role_id') != '1'){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Username atau password anda salah !!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('auth/login');			}
		}
		
		public function detail($id_invoice)
		{
			// $data = array(
			// 	'invoice' => $this->model_invoice->ambil_id_invoice($id_invoice),
			// 	'pesanan' => $this->model_invoice->ambil_id_pesanan($id_invoice)
			// );

			$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
			$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
			// Print_r($data); 
			// exit();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/detail_invoice',$data);
			$this->load->view('templates_admin/footer');
 		}
	}

?>
