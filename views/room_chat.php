<table id="show" border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th width="50">U</th>
		<th width="50">D</th>
		<th width="50">No</th>
		<th>
			<form action="<?php echo $config->base_url();?>room_chat.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="status" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Status" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>room_chat.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="nama" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Nama" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>room_chat.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="nama" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Nama" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>room_chat.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="name" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Name" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>room_chat.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="isi_chat" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Isi Chat" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>room_chat.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="date_add" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Date Add" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>room_chat.html" method="post">
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
		<td align=center valign="top"><a href="<?php echo $config->base_url();?>select_room_chat/<?php echo $tampil['id_room'];?>.html" class="ubah"><img src="<?php echo $config->base_url();?>images/edit.png" class="tools"></a></td>
		<td align=center valign="top"><a href="<?php echo $config->base_url();?>delete_room_chat/<?php echo $tampil['id_room'];?>.html" onclick="return confirm('Delete <?php echo $tampil['id_transaksi'];?>?');"><img src="<?php echo $config->base_url();?>images/delete.png" class="tools"></a></td>
		<td><?php echo $zebra+1;?>.</td>
		<td valign="top"><div class="text"><?php echo $tampil['status'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['nama'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['name'];?></div></td>
		<td valign="top"><textarea rows="1" readonly><?php echo $tampil['isi_chat'];?></textarea></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['date_add'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['aktif'];?></div></td>
	</tr>
	
	<?php $zebra++;}?>
	
</table>
<div id="pagination_div">
<form action="<?php echo $config->base_url();?>room_chat.html" method="post">
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
					<option value="status" <?php if($field=="status"){echo "selected";}?>>Status</option>
					<option value="nama" <?php if($field=="nama"){echo "selected";}?>>Nama</option>
					<option value="nama" <?php if($field=="nama"){echo "selected";}?>>Nama</option>
					<option value="name" <?php if($field=="name"){echo "selected";}?>>Name</option>
					<option value="isi_chat" <?php if($field=="isi_chat"){echo "selected";}?>>Isi Chat</option>
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
			<form action="<?php echo $config->base_url();?>room_chat.html" method="post">
				
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
			<form action="<?php echo $config->base_url();?>room_chat.html" method="post">
				
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