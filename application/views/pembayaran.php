<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="btn-sm btn btn-success">
			<?php 
				$grand_total = 0;
				if($keranjang =$this->cart->contents())
				{
					foreach ($keranjang as $item)
					{
						$grand_total = $grand_total + $item['subtotal'];
					}
					echo "<h5>Total belanja anda Rp. " .number_format($grand_total,0,',','.');
				 
			?>
		</div><br><br>
		<h4>Input Alamat Pengiriman dan Pembayaran</h4>
		
		<form action="<?php echo base_url() ?>dashboard/proses_pesanan" method="post">
			<div class="form-group">
				<label for="">Nama lengkap</label>
				<input type="text" name="nama" placeholder="Nama lengkap" class="form-control">
			</div>	

			<div class="form-group">
				<label for="">Alamat lengkap</label>
				<input type="text" name="alamat" placeholder="Alamat lengkap" class="form-control">
			</div>	

			<div class="form-group">
				<label for="">No Telp</label>
				<input type="text" name="no_telp" placeholder="No Telepon" class="form-control">
			</div>	 

			<div class="form-group" >
				<label for="">Jasa Pengiriman</label>
				<select class="form-control">
					<option value="">JNE</option>
					<option value="">TIKI</option>
					<option value="">POS Indonesia</option>
					<option value="">Gojek</option>
					<option value="">Grab</option>
				</select>
			</div>

			<div class="form-group">
				<label for="">Pilih Bank</label>
				<select class="form-control">
					<option value="">BCA -  12345678</option>
					<option value="">BNI - 12345678</option>
					<option value="">BRI - 12345678</option>
					<option value="">MANDIRI - 12345678</option>
				</select>
			</div>	

				<button type="submit" class="btn btn-primary btn-sm mb-3">Pesan</button>
		</form>
	<?php 				
	} else {
		echo "<h4>keranjang belanja anda kosong";
	}
	?>
	</div>

		<div class="col-md-2"></div>
	</div>
</div>
