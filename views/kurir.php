<table id="show" border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th width="50">U</th>
		<th width="50">D</th>
		<th width="50">Bayar</th>
		<th width="50">No</th>
		<th>
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="nama" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Nama" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="tagihan_kurir" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Tagihan" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="aktif" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Aktif" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="notelp" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Notelp" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="IMEI" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="IMEI" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="gender" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Gender" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="foto" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Foto" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="no_ktp" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="No Ktp" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="jaminan" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Jaminan" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
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
		$tagihan_kurir	= 0;
		foreach($show as $tampil){
			$tagihan_kurir	+= $tampil['tagihan_kurir'];
	?>
	
	<tr <?php if($zebra%2==1){echo "class='normal zebra'";}else{echo "class='normal'";}?>>
		<td align=center valign="top"><a href="<?php echo $config->base_url();?>select_kurir/<?php echo $tampil['id_kurir'];?>.html" class="ubah"><img src="<?php echo $config->base_url();?>images/edit.png" class="tools"></a></td>
		<td align=center valign="top">

		<?php
			$allow_for	= array(1);
			if(in_array($_SESSION['level'],$allow_for)){
		?>

		<a href="<?php echo $config->base_url();?>delete_kurir/<?php echo $tampil['id_kurir'];?>.html" onclick="return confirm('Delete <?php echo $tampil['nama'];?>?');"><img src="<?php echo $config->base_url();?>images/delete.png" class="tools"></a>

		<?php }?>

		</td>
		<td align=center valign="top"><a href="<?php echo $config->base_url();?>bayar_kurir/<?php echo $tampil['id_kurir'];?>.html" onclick="return confirm('Membayar tagihan <?php echo $tampil['nama'];?>?');"><img src="<?php echo $config->base_url();?>images/pay.png" class="tools"></a></td>
		<td><?php echo $zebra+1;?>.</td>
		<td valign="top"><div class="text"><?php echo $tampil['nama'];?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['tagihan_kurir'],0,',','.');?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['aktif'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['notelp'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['IMEI'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['gender'];?></div></td>
		<td valign="top"><div class="text"><a href="<?php echo $tampil['foto'];?>" class="foto"><?php echo $tampil['foto'];?></a></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['no_ktp'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['jaminan'];?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['date_add'];?></div></td>
	</tr>
	
	<?php $zebra++;}?>

	<tr <?php if($zebra%2==1){echo "class='normal zebra'";}else{echo "class='normal'";}?>>
		<td colspan="5"></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tagihan_kurir,0,',','.');?></div></td>
		<td colspan="7"></td>
	</tr>
</table>
<div id="pagination_div">
<form action="<?php echo $config->base_url();?>kurir.html" method="post">
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
					<option value="nama" <?php if($field=="nama"){echo "selected";}?>>Nama</option>
					<option value="IMEI" <?php if($field=="IMEI"){echo "selected";}?>>IMEI</option>
					<option value="notelp" <?php if($field=="notelp"){echo "selected";}?>>Notelp</option>
					<option value="gender" <?php if($field=="gender"){echo "selected";}?>>Gender</option>
					<option value="foto" <?php if($field=="foto"){echo "selected";}?>>Foto</option>
					<option value="no_ktp" <?php if($field=="no_ktp"){echo "selected";}?>>No Ktp</option>
					<option value="jaminan" <?php if($field=="jaminan"){echo "selected";}?>>Jaminan</option>
					<option value="date_add" <?php if($field=="date_add"){echo "selected";}?>>Date Add</option>
					<option value="aktif" <?php if($field=="aktif"){echo "selected";}?>>Aktif</option>
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
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				
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
			<form action="<?php echo $config->base_url();?>kurir.html" method="post">
				
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
</table></div>