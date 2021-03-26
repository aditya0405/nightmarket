<?php

class kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_kategori');
	}

	public function elektronik()
	{
		$data['elektronik'] = $this->model_kategori->data_elektronik()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kategori/elektronik',$data);
		$this->load->view('templates/footer');
	}

	public function pakaian_pria()
	{
		$data['pakaian_pria'] = $this->model_kategori->data_pakaian_pria()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kategori/pakaian_pria',$data);
		$this->load->view('templates/footer');
	}

	public function pakaian_wanita()
	{
		$data['pakaian_wanita'] = $this->model_kategori->data_pakaian_wanita()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kategori/pakaian_wanita',$data);
		$this->load->view('templates/footer');
	}

	public function pakaian_anak_anak()
	{
		$data['pakaian_anak_anak'] = $this->model_kategori->data_pakaian_anak_anak()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kategori/pakaian_anak_anak',$data);
		$this->load->view('templates/footer');
	}

	public function peralatan_olahraga()
	{
		$data['peralatan_olahraga'] = $this->model_kategori->data_peralatan_olahraga()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kategori/peralatan_olahraga',$data);
		$this->load->view('templates/footer');
	}
	
	
}

?>
