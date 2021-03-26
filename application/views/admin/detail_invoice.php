<div class="container-fluid">
	<h4>Detail <div class="btn btn-success btn-sm">No .Invoice <?php echo $invoice->id ?></div></h4>
	</h4>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>ID Barang</th>
			<th>Nama Produk</th>
			<th>Jumlah Pesanan</th>
			<th>Harga Satuan</th>
			<th>SubTotal</th>
		</tr>

	<?php 
	$total = 0;
	// if(!empty($result) )
	foreach ($pesanan as $psn) :
	$subtotal = $psn->jumlah * $psn->harga;
	$total += $subtotal; 
	?>
	
		<tr align="right">
			<td align="center"><?php echo $psn->id_brg ?></td>
			<td align="center"><?php echo $psn->nama_brg ?></td>
			<td><?php echo $psn->jumlah ?></td>
			<td><?php echo number_format($psn->harga,0,',','.')  ?></td>
			<td><?php echo number_format($subtotal,0,',','.') ?></td>
		</tr>

	<?php endforeach ; ?>

		<tr>
			<td colspan="4" align="right">Grand Total</td>
			<td align="right">Rp. <?php echo number_format($total,0,',','.') ?></td>
		</tr>
		
	</table>

	<a href=" <?php echo base_url('admin/invoice/index') ?>"><div class="btn btn-primary btn-sm">Kembali</div></a>
	


</div>
