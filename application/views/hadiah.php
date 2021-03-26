<div class="container-fluid">
<div class="row text-center mt-3 ">
	
	<?php foreach ($hadiah as $brg ) : ?>
		
	<div class="card ml-3 mb-3" style="width: 14rem;">
		<div class="card" style="width: 14rem;">
			<img src="<?php echo base_url().'/uploads/'.$brg->hadiah_brg ?>" class="card-img-top"  height="150px" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?php echo $brg->nama_brg ;?></h5>
				<p class="card-text">Point Tukar :  <?php echo $brg->id_poin ;?></p>
				<a href="" class="btn btn-primary">Pilih</a>
			</div>
		</div>		
	
	</div>

	<?php endforeach ;?>

</div>
</div>
