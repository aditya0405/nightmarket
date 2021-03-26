<?php 

class Data_barang extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Model_barang');

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Username atau password anda salah !!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
			redirect('auth/login');			}
	}

	public function index()
	{	
			$this->load->model('Model_barang');

			$data['barang'] = $this->Model_barang->tampildata()->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_barang',$data);
			$this->load->view('templates_admin/footer');

	}

		public function tambah_aksi()
		{
			$this->load->model('Model_barang');

			$nama_brg  		= $this->input->post('nama_brg');
			$keterangan  	= $this->input->post('keterangan');
			$kategori  		= $this->input->post('kategori');
			$harga  		= $this->input->post('harga');
			$stok  			= $this->input->post('stok');
			$gambar 		= $_FILES['gambar']['name'];
			
			if($gambar = ''){}else{
				$config ['upload_path'] = './uploads/';
				$config ['allowed_types'] = 'jpg|jpeg|png|gif';

				$this->load->library('upload',$config);
				// $this->upload->initialize($config);
				if(!$this->upload->do_upload('gambar')){
					// echo "Gambar gagal di upload";
					echo $this->upload->display_errors();
					die();
				} else {
					$gambar = $this->upload->data('file_name');
					
			}
		}

		$data = array(
			'nama_brg'   => $nama_brg,
			'keterangan' => $keterangan,
			'kategori' 	 => $kategori,
			'harga' 	 => $harga,
			'stok' 		 => $stok,
			'gambar' 	=> $gambar

		);

		$this->Model_barang->tambah_barang($data,'tb_barang');
		redirect('admin/Data_barang/index');
	}

	public function edit($id)
	{		
		

		$where = array('id_brg' => $id);
		$data['barang'] = $this->Model_barang->edit_barang($where,'tb_barang')->result();
		$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/edit_barang',$data);
			$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		$id				= $this->input->post('id_brg');
		$nama_brg		= $this->input->post('nama_brg');
		$keterangan		= $this->input->post('keterangan');
		$kategori		= $this->input->post('kategori');
		$harga			= $this->input->post('harga');
		$stok			= $this->input->post('stok');

		$data = array(

			'nama_brg'  => $nama_brg,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'harga'  => $harga,
			'stok' => $stok

		);

		$where = array(
			'id_brg' => $id
		);

		$this->Model_barang->update_data($where, $data,'tb_barang');
		 redirect('admin/Data_barang/index');
	}

	public function hapus($id)
	{
		$where = array('id_brg' => $id);

		$this->Model_barang->hapus_data($where,'tb_barang');
		
		redirect('admin/Data_barang/index');
	}

}
?>
