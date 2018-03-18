<table border="1" cellspacing="0">
	<tr>
		<th width="50">No</th>
		<th>Kode Transaksi</th>
		<th>Status</th>
		<th>Jenis Transaksi</th>
		<th>Nama Frenchise</th>
		<th>Nama Pelanggan</th>
		<th>Nama Kurir</th>
		<th>Nama Staff</th>
		<th>Lokasi Ambil</th>
		<th>Keterangan Ambil</th>
		<th>Lokasi Kirim</th>
		<th>Keterangan Kirim</th>
		<th>Jarak</th>
		<th>Biaya Jarak</th>
		<th>Item</th>
		<th>Biaya Item</th>
		<th>Biaya Dua Kurir</th>
		<th>Total</th>
		<th>Untuk Kurir</th>
		<th>Untuk Frenchise</th>
		<th>Untuk Bangjeck</th>
		<th>Date Add</th>
	</tr>

	<?php
		$zebra	= 0;
		$total	= 0;
		$untuk_kurir		= 0;
		$untuk_frenchise	= 0;
		$untuk_bangjeck		= 0;
		foreach($show as $tampil){
			$total				+= $tampil['total'];
			$untuk_kurir		+= $tampil['untuk_kurir'];
			$untuk_frenchise	+= $tampil['untuk_frenchise'];
			$untuk_bangjeck		+= $tampil['untuk_bangjeck'];
	?>
	
	<tr <?php if($zebra%2==1){echo "class='normal zebra'";}else{echo "class='normal'";}?>>
		<td><?php echo $zebra+1;?>.</td>
		<td align="center" valign="top"><div class="text"><?php echo $transaksi->kodeTransaksi($tampil['id_transaksi']);?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['nama_status'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama_jenis'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama_frenchise'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama_pelanggan'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama_kurir'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama_staff'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['lokasi_ambil'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['keterangan_ambil'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['lokasi_kirim'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['keterangan_kirim'];?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['jarak'],0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['biaya_jarak'],0,',','.');?></div></td>
		<td valign="top"><?php echo $tampil['item'];?></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['biaya_item'],0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['biaya_dua_kurir'],0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['total'],0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['untuk_kurir'],0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['untuk_frenchise'],0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['untuk_bangjeck'],0,',','.');?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['date_add'];?></div></td>
	</tr>
	
	<?php $zebra++;}?>

	<tr <?php if($zebra%2==1){echo "class='normal zebra'";}else{echo "class='normal'";}?>>
		<td colspan="17"></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($total,0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($untuk_kurir,0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($untuk_frenchise,0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($untuk_bangjeck,0,',','.');?></div></td>
		<td align="center" valign="top"></td>
	</tr>
</table>