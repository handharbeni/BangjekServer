<table id="show" border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th width="50">U</th>
		<th width="50">D</th>
		<th width="50">No</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="name" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Name" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="address" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Address" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="email" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Email" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="phone" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Phone" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="photo" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Photo" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="description" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Description" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="IMEI1" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="IMEI1" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="IMEI2" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="IMEI2" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="lat" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Lat" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="lon" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Lon" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="open_at" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Open At" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="close_at" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Close At" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="open_status" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Open Status" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="max_menu" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Max Menu" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="point" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Point" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="merchant_category" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Merchant Category" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="join_date" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Join Date" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="valid_status" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Valid Status" />
			</form>
		</th>
	</tr>
	
	<?php
		$zebra = 0;
		foreach($show as $tampil){?>
	
	<tr <?php if($zebra%2==1){echo "class='normal zebra'";}else{echo "class='normal'";}?>>
		<td align=center valign="top"><a href="<?php echo $config->base_url();?>select_merchant/<?php echo $tampil['id_merchant'];?>.html" class="ubah"><img src="<?php echo $config->base_url();?>images/edit.png" class="tools"></a></td>
		<td align=center valign="top">
		
		<?php
			$allow_for	= array(1,2);
			if(in_array($_SESSION['level'],$allow_for)){
		?>
			<a href="<?php echo $config->base_url();?>delete_merchant/<?php echo $tampil['id_merchant'];?>.html" onclick="return confirm('Delete <?php echo $tampil['name'];?>?');"><img src="<?php echo $config->base_url();?>images/delete.png" class="tools"></a>

		<?php }?>

		</td>
		<td><?php echo $zebra+1;?>.</td>
		<td valign="top"><div class="text"><?php echo $tampil['name'];?></div></td>
		<td valign="top"><textarea rows="1" readonly><?php echo $tampil['address'];?></textarea></td>
		<td valign="top"><div class="text"><?php echo $tampil['email'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['phone'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['photo'];?></div></td>
		<td valign="top"><textarea rows="1" readonly><?php echo $tampil['description'];?></textarea></td>
		<td valign="top"><div class="text"><?php echo $tampil['IMEI1'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['IMEI2'];?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo $tampil['lat'];?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo $tampil['lon'];?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['open_at'];?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['close_at'];?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['open_status']==1?"Open":"Close";?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['max_menu'],0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['point'],0,',','.');?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['merchant_category'];?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['join_date'];?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['valid_status']==1?"Aktif":"Non-Aktif";?></div></td>
	</tr>
	
	<?php $zebra++;}?>
	
</table>
<div id="pagination_div">
<form action="<?php echo $config->base_url();?>merchant.html" method="post">
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
					<option value="name" <?php if($field=="name"){echo "selected";}?>>Name</option>
					<option value="address" <?php if($field=="address"){echo "selected";}?>>Address</option>
					<option value="email" <?php if($field=="email"){echo "selected";}?>>Email</option>
					<option value="phone" <?php if($field=="phone"){echo "selected";}?>>Phone</option>
					<option value="photo" <?php if($field=="photo"){echo "selected";}?>>Photo</option>
					<option value="description" <?php if($field=="description"){echo "selected";}?>>Description</option>
					<option value="IMEI1" <?php if($field=="IMEI1"){echo "selected";}?>>IMEI1</option>
					<option value="IMEI2" <?php if($field=="IMEI2"){echo "selected";}?>>IMEI2</option>
					<option value="lat" <?php if($field=="lat"){echo "selected";}?>>Lat</option>
					<option value="lon" <?php if($field=="lon"){echo "selected";}?>>Lon</option>
					<option value="open_at" <?php if($field=="open_at"){echo "selected";}?>>Open At</option>
					<option value="close_at" <?php if($field=="close_at"){echo "selected";}?>>Close At</option>
					<option value="open_status" <?php if($field=="open_status"){echo "selected";}?>>Open Status</option>
					<option value="max_menu" <?php if($field=="max_menu"){echo "selected";}?>>Max Menu</option>
					<option value="point" <?php if($field=="point"){echo "selected";}?>>Point</option>
					<option value="merchant_category" <?php if($field=="merchant_category"){echo "selected";}?>>Merchant Category</option>
					<option value="join_date" <?php if($field=="join_date"){echo "selected";}?>>Join Date</option>
					<option value="valid_status" <?php if($field=="valid_status"){echo "selected";}?>>Valid Status</option>
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
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				
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
			<form action="<?php echo $config->base_url();?>merchant.html" method="post">
				
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