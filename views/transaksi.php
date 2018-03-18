<table id="show" border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th width="50">U</th>
		<th width="50">D</th>
		<th width="50">No</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="id_transaksi" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Kode Transaksi" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="nama_status" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Status" />
			</form>
		</th>
		<th width="100">
			Selama
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="nama_jenis" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Jenis Transaksi" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="frenchise.nama" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Nama Francheis" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="pelanggan.nama" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Nama Pelanggan" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="kurir.nama" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Nama Kurir" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="staff.nama" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Nama Staff" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="lokasi_ambil" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Lokasi Ambil" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="keterangan_ambil" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Keterangan Ambil" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="lokasi_kirim" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Lokasi Kirim" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="keterangan_kirim" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Keterangan Kirim" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="jarak" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Jarak" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="biaya_jarak" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Biaya Jarak" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="item" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Item" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="biaya_item" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Biaya Item" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="biaya_dua_kurir" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Biaya Dua Kurir" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="total" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Total" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="untuk_kurir" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Untuk Kurir" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="untuk_frenchise" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Untuk Francheis" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="untuk_bangjeck" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Untuk Bangjeck" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="date_add" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Date Add" />
			</form>
		</th>
	</tr>
	
	<?php
		$zebra	= 0;
		$total	= 0;
		$untuk_kurir		= 0;
		$untuk_frenchise	= 0;
		$untuk_bangjeck		= 0;
		$lebihdari20menit	= 0;
		foreach($show as $tampil){
			$total				+= $tampil['total'];
			$untuk_kurir		+= $tampil['untuk_kurir'];
			$untuk_frenchise	+= $tampil['untuk_frenchise'];
			$untuk_bangjeck		+= $tampil['untuk_bangjeck'];
			
			$color	= "#000000";
			if($tampil['status']==1){
				$color	= "red";
			}else if($tampil['status']==2){
				$color	= "orange";
			}else if($tampil['status']==3){
				$color	= "green";
			}
			
			$before = $tampil['selama'];
			$now = time();

			$selama	= "";
			$diff = $now - $before;
			if( 1 > $diff ){
			} else {
				$w = $diff / 86400 / 7;
				$d = $diff / 86400 % 7;
				$h = $diff / 3600 % 24;
				$m = $diff / 60 % 60; 
				$s = $diff % 60;

				if($h<10){
					$h	= "0".$h;
				}
				if($m<10){
					$m	= "0".$m;
				}

				$selama	= $h.":".$m;
				if($m>20&&$tampil['nama_status']=="Belum Diambil"){
					$lebihdari20menit	= 1;
				}
			}
			if($tampil['nama_status']!="Belum Diambil"){
				$selama	= "";
			}
	?>
	
	<tr <?php if($zebra%2==1){echo "class='normal zebra'";}else{echo "class='normal'";}?>>
		<td align=center valign="top"><a href="<?php echo $config->base_url();?>select_transaksi/<?php echo $tampil['id_transaksi'];?>.html" class="ubah"><img src="<?php echo $config->base_url();?>images/edit.png" class="tools"></a></td>
		<td align=center valign="top">

		<?php
			$allow_for	= array(1,2);
			if(in_array($_SESSION['level'],$allow_for)){
		?>

		<a href="<?php echo $config->base_url();?>delete_transaksi/<?php echo $tampil['id_transaksi'];?>.html" onclick="return confirm('Delete <?php echo $transaksi->kodeTransaksi($tampil['id_transaksi']);?>?');"><img src="<?php echo $config->base_url();?>images/delete.png" class="tools"></a>

		<?php }?>

		</td>
		<td><?php echo $zebra+1;?>.</td>
		<td align="center" valign="top"><div class="text"><?php echo $transaksi->kodeTransaksi($tampil['id_transaksi']);?></div></td>
		<td align="center" valign="top"><div class="text" style="color: <?php echo $color;?>"><?php echo $tampil['nama_status'];?></div></td>
		<td valign="top" align="center"><?php echo $selama;?></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama_jenis'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama_frenchise'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama_pelanggan'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama_kurir'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama_staff'];?></div></td>
		<td valign="top"><textarea rows="1" readonly><?php echo $tampil['lokasi_ambil'];?></textarea></td>
		<td valign="top"><textarea rows="1" readonly><?php echo $tampil['keterangan_ambil'];?></textarea></td>
		<td valign="top"><textarea rows="1" readonly><?php echo $tampil['lokasi_kirim'];?></textarea></td>
		<td valign="top"><textarea rows="1" readonly><?php echo $tampil['keterangan_kirim'];?></textarea></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['jarak'],0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['biaya_jarak'],0,',','.');?></div></td>
		<td valign="top"><textarea rows="1" readonly><?php echo $tampil['item'];?></textarea></td>
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
		<td colspan="19"></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($total,0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($untuk_kurir,0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($untuk_frenchise,0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($untuk_bangjeck,0,',','.');?></div></td>
		<td align="center" valign="top"></td>
	</tr>
</table>
<div id="pagination_div">
<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
	<table id="pagination" cellspacing="0">
		<tr>
			<td>
				Page : <input type="number" name="page" value="<?php echo $page;?>" maxlength="3"/>
			</td>
			<td>
				Limit : 
				<select name="limit">
					<option value="1" <?php if($limit==1){echo "selected";}?>>1</option>
					<option value="10" <?php if($limit==10){echo "selected";}?>>10</option>
					<option value="40" <?php if($limit==40){echo "selected";}?>>40</option>
					<option value="100" <?php if($limit==100){echo "selected";}?>>100</option>
				</select>
			</td>
			<td>
				Field : 
				<select name="field">
					<option value="id_transaksi" <?php if($field=="id_transaksi"){echo "selected";}?>>Kode Transaksi</option>
					<option value="nama_status" <?php if($field=="nama_status"){echo "selected";}?>>Status</option>
					<option value="nama_jenis" <?php if($field=="nama_jenis"){echo "selected";}?>>Jenis Transaksi</option>
					<option value="frenchise.nama" <?php if($field=="frenchise.nama"){echo "selected";}?>>Nama Francheis</option>
					<option value="pelanggan.nama" <?php if($field=="pelanggan.nama"){echo "selected";}?>>Nama Pelanggan</option>
					<option value="kurir.nama" <?php if($field=="kurir.nama"){echo "selected";}?>>Nama Kurir</option>
					<option value="staff.nama" <?php if($field=="staff.nama"){echo "selected";}?>>Nama Staff</option>
					<option value="lokasi_ambil" <?php if($field=="lokasi_ambil"){echo "selected";}?>>Lokasi Ambil</option>
					<option value="keterangan_ambil" <?php if($field=="keterangan_ambil"){echo "selected";}?>>Keterangan Ambil</option>
					<option value="lokasi_kirim" <?php if($field=="lokasi_kirim"){echo "selected";}?>>Lokasi Kirim</option>
					<option value="keterangan_kirim" <?php if($field=="keterangan_kirim"){echo "selected";}?>>Keterangan Kirim</option>
					<option value="jarak" <?php if($field=="jarak"){echo "selected";}?>>Jarak</option>
					<option value="biaya_jarak" <?php if($field=="biaya_jarak"){echo "selected";}?>>Biaya Jarak</option>
					<option value="item" <?php if($field=="item"){echo "selected";}?>>Item</option>
					<option value="biaya_item" <?php if($field=="biaya_item"){echo "selected";}?>>Biaya Item</option>
					<option value="biaya_dua_kurir" <?php if($field=="biaya_dua_kurir"){echo "selected";}?>>Biaya Dua Kurir</option>
					<option value="total" <?php if($field=="total"){echo "selected";}?>>Total</option>
					<option value="untuk_kurir" <?php if($field=="untuk_kurir"){echo "selected";}?>>Untuk Kurir</option>
					<option value="untuk_frenchise" <?php if($field=="untuk_frenchise"){echo "selected";}?>>Untuk Francheis</option>
					<option value="untuk_bangjeck" <?php if($field=="untuk_bangjeck"){echo "selected";}?>>Untuk Bangjeck</option>
					<option value="date_add" <?php if($field=="date_add"){echo "selected";}?>>Date Add</option>
				</select>
				<input type="hidden" name="order" value="desc" />
			</td>
			<td>
				Like : 
				<input type="text" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Search" />
			</td>
	</table>
</form>
<table id="prevnext" cellspacing="0">
	<tr>
		<td>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				
				<?php
					$temp	= $page-1;
					if($temp<=1){
						$temp	= 1;
					}
				?>
				
				<input type="hidden" name="page" value="<?php echo $temp;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="<?php echo $field;?>" />
				<input type="hidden" name="order" value="<?php echo $order;?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Previous" />
			</form>
		</td>
		<td>
			<form action="<?php echo $config->base_url();?>transaksi.html" method="post">
				
				<?php
					$temp	= $page+1;
				?>
				
				<input type="hidden" name="page" value="<?php echo $temp;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="<?php echo $field;?>" />
				<input type="hidden" name="order" value="<?php echo $order;?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Next" />
			</form>
		</td>
	</tr>
</table>
</div>
<script>

<?php if($lebihdari20menit==1){?>

	alert('Job belum diambil lebih dari 20 menit. Customer Service diminta menyebarkan di grub. agar job cepat di proses.');

<?php }?>

</script>