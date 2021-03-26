<div class="container-fluid">
<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm">Tambah Barang</i></button>

<table class="table table-bordered mt-3">


	<tr>
		<th>No</th>
		<th>Nama Barang</th>
		<th>Keterangan</th>
		<th>Kategori</th>
		<th>Harga</th>
		<th>Stok</th>
		<th colspan="3" class="text-center">Aksi</th>
	</tr>

<?php $no=1; foreach ($barang as $brg ) :?>

	<tr>
		<td><?= $no++ ?></td>
		<td><?= $brg->nama_brg ?></td>
		<td><?= $brg->keterangan ?></td>
		<td><?= $brg->kategori ?></td>
		<td><?= $brg->harga ?></td>
		<td><?= $brg->stok ?></td>
		<td>
			<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i>
			</div></td>

			<td><?php echo anchor('admin/Data_barang/edit/'.$brg->id_brg, '<div class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i></div>')?></td>

			<td><?php echo anchor('admin/Data_barang/hapus/'.$brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
			
	</tr>
<?php endforeach ;?>

</table>
  </div>


  <!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="<?php echo base_url(). 'admin/Data_barang/tambah_aksi';?>" method="post" enctype="multipart/form-data">

	
		<div class="form-group">
			<label for="">Nama Barang</label>
			<input type="text" name="nama_brg" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Keterangan</label>
			<input type="text" name="keterangan" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Kategori</label>
			<select class="form-control" name="kategori">
				<option>Elektronik</option>
				<option>Pakaian Pria</option>
				<option>Pakaian Wanita</option>
				<option>Pakaian Anak-Anak</option>
				<option>Peralatan Olahraga</option>	
			</select>
		</div>

		<div class="form-group">
			<label for="">Harga</label>
			<input type="text" name="harga" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Stok</label>
			<input type="text" name="stok" class="form-control">
		</div>

		<div class="form-group">
			<label>Upload Gambar</label>
			<input type="file" name="gambar" class="form-control">
		</div>

	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
		<button type="submit" class="btn btn-primary">Simpan</button>
      </div>
	  
	  </form>
	
    </div>
  </div>
</div>
