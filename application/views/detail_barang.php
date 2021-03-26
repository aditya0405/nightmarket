<div class="container-fluid">
<div class="card">
  <div class="card-header">
    Detail Produk
  </div>
  <div class="card-body">
    <div class="row">

	<?php foreach ($barang as $brg) :?>

		<div class="col-md-4">
			<img src="<?php echo base_url().'/uploads/'. $brg->gambar ?>" alt="" class="card-img">
		</div>
		<div class="col-md-8">
			<table class="table">
				<tr>
					<td>Nama Produk</td>
					<td><strong><?php echo $brg->nama_brg ?> </strong></td>
				</tr>

				<tr>
					<td>Keterangan</td>
					<td><strong><?php echo $brg->keterangan ?> </strong></td>
				</tr>

				<tr>
					<td>Kategori</td>
					<td><strong><?php echo $brg->kategori ?> </strong></td>
				</tr>
				<tr>
					<td>Stok</td>
					<td><strong><?php echo $brg->stok ?> </strong></td>
				</tr>

				<tr>
					<td>Harga</td>
					<td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg->harga,0,',','.')  ?></div></strong></td>
				</tr>
				
				<tr>
					<td><?php echo anchor('dashboard/tambah_ke_keranjang/'. $brg->id_brg,'<div class="btn btn-primary btn-sm">Tambah Keranjang</div>')?>
					<a href=" <?php echo base_url('dashboard/index') ?>"><div class="btn btn-danger btn-sm">Kembali</div></a>
				</td>
				</tr>
				
			</table>
		</div>
	</div>
	<?php endforeach ; ?>
	
  </div>
</div>
</div>
