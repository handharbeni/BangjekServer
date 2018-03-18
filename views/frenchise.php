<table id="show" border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th width="50">U</th>
		<th width="50">D</th>
		<th width="50">No</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="nama" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Nama" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="alamat" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Alamat" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="notelp" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Notelp" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="no_ktp" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="No Ktp" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="npwp" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Npwp" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="foto" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Foto" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="email" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Email" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="gender" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Gender" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="latitude" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Latitude" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="longitude" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Longitude" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="luas" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Luas" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="date_add" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Date Add" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="aktif" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Aktif" />
			</form>
		</th>
	</tr>
	
	<?php
		$zebra = 0;
		foreach($show as $tampil){?>
	
	<tr <?php if($zebra%2==1){echo "class='normal zebra'";}else{echo "class='normal'";}?>>
		<td align=center valign="top"><a href="<?php echo $config->base_url();?>select_frenchise/<?php echo $tampil['id_frenchise'];?>.html" class="ubah"><img src="<?php echo $config->base_url();?>images/edit.png" class="tools"></a></td>
		<td align=center valign="top">

		<?php
			$allow_for	= array(1);
			if(in_array($_SESSION['level'],$allow_for)){
		?>

		<a href="<?php echo $config->base_url();?>delete_frenchise/<?php echo $tampil['id_frenchise'];?>.html" onclick="return confirm('Delete <?php echo $tampil['nama'];?>?');"><img src="<?php echo $config->base_url();?>images/delete.png" class="tools"></a>

		<?php }?>

		</td>
		<td><?php echo $zebra+1;?>.</td>
		<td valign="top"><div class="text"><?php echo $tampil['nama'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['alamat'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['notelp'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['no_ktp'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['npwp'];?></div></td>
		<td valign="top"><div class="text"><a href="<?php echo $tampil['foto'];?>" class="foto"><?php echo $tampil['foto'];?></a></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['email'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['gender'];?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo $tampil['latitude'];?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo $tampil['longitude'];?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo $tampil['luas'];?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['date_add'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['aktif'];?></div></td>
	</tr>
	
	<?php $zebra++;}?>
	
</table>
<div id="pagination_div">
<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
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
					<option value="alamat" <?php if($field=="alamat"){echo "selected";}?>>Alamat</option>
					<option value="notelp" <?php if($field=="notelp"){echo "selected";}?>>Notelp</option>
					<option value="no_ktp" <?php if($field=="no_ktp"){echo "selected";}?>>No Ktp</option>
					<option value="npwp" <?php if($field=="npwp"){echo "selected";}?>>Npwp</option>
					<option value="foto" <?php if($field=="foto"){echo "selected";}?>>Foto</option>
					<option value="email" <?php if($field=="email"){echo "selected";}?>>Email</option>
					<option value="gender" <?php if($field=="gender"){echo "selected";}?>>Gender</option>
					<option value="longitude" <?php if($field=="longitude"){echo "selected";}?>>Longitude</option>
					<option value="latitude" <?php if($field=="latitude"){echo "selected";}?>>Latitude</option>
					<option value="luas" <?php if($field=="luas"){echo "selected";}?>>Luas</option>
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
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				
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
			<form action="<?php echo $config->base_url();?>frenchise.html" method="post">
				
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