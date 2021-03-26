<div class="container-fluid">
	<h4>Keranjang Belanja</h4>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Sub-Total</th>
		</tr>

		<?php $no=1; foreach ($this->cart->contents() as $items) :?>

			<tr>
				<td><?= $no++ ?></td>
				<td><?= $items['name'] ?></td>
				<td><?= $items['qty'] ?></td>
				<td align="right">Rp. <?= number_format($items['price'], 0, ',', '.') ?></td>
				<td align="right">Rp. <?= number_format($items['subtotal'])  ?></td>
			</tr>
			
			<?php endforeach ; ?>
			<tr>
				<td align="right" colspan="5">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
			</tr>
	</table>

			<div align="right">
				<a href="<?php echo base_url('dashboard/hapus_keranjang') ?>">
					<div class="btn sn btn-danger">Hapus Keranjang</div>
				</a>
				<a href="<?php echo base_url('Welcome') ?>">
					<div class="btn sn btn-primary">Lanjutkan Belanja</div>
				</a>
				<a href="<?php echo base_url('dashboard/pembayaran') ?>">
					<div class="btn sn btn-success">Pembayaran</div>
				</a>
			</div>

</div>
