<div class="container-fluid">
<div id="carouselExampleControls" class="carousel " data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url() ?>/assets/img/slider1.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url() ?>/assets/img/slider2.jpeg" class="d-block w-100" alt="...">
    </div>
    
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	<div class="row text-center mt-3 ">
	
		<?php foreach ($elektronik as $brg ) : ?>
			
		<div class="card ml-3 mb-3" style="width: 14rem;">
		<img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top">
		<div class="card-body">
			<h5 class="card-title mb-1"><?php echo $brg->nama_brg ;?></h5>
			<small><?php echo  $brg->keterangan; ?></small><br>
				<span class="badge badge-pill badge-success mb-2">Rp. <?php echo number_format($brg->harga, 0,',','.') ?></span><br>
			<!-- <a href="#" class="btn btn-sm btn-primary">Tambah Keranjang</a> -->
			<?php echo anchor('dashboard/tambah_ke_keranjang/'. $brg->id_brg,'<div class="btn btn-primary btn-sm">Tambah Keranjang</div>')?> 
			<?php echo anchor('dashboard/detail/'. $brg->id_brg,'<div class="btn btn-success btn-sm">Detail</div>')?> 
			<!-- <a href="#" class="btn btn-sm btn-success">Detail</a> -->
		</div>
		</div>

		<?php endforeach ;?>

	</div>
</div>
