<table id="show" border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th width="50">U</th>
		<th width="50">D</th>
		<th width="50">No</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="merchant_menu" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Merchant Menu" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="merchant_menu_category" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Merchant Menu Category" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="photo" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Photo" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="price" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Price" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="discount" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Discount" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="discount_variant" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Discount Variant" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
				<input type="hidden" name="page" value="<?php echo $page;?>" />
				<input type="hidden" name="limit" value="<?php echo $limit;?>" />
				<input type="hidden" name="field" value="description" />
				<input type="hidden" name="order" value="<?php echo $order=="desc"?"asc":"desc";?>" />
				<input type="hidden" name="like" value="<?php echo $like;?>" />
				<input type="submit" value="Description" />
			</form>
		</th>
		<th>
			<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
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
		$zebra = 0;
		foreach($show as $tampil){?>
	
	<tr <?php if($zebra%2==1){echo "class='normal zebra'";}else{echo "class='normal'";}?>>
		<td align=center valign="top"><a href="<?php echo $config->base_url();?>select_merchant_menu/<?php echo $tampil['id_merchant_menu'];?>.html" class="ubah"><img src="<?php echo $config->base_url();?>images/edit.png" class="tools"></a></td>
		<td align=center valign="top"><a href="<?php echo $config->base_url();?>delete_merchant_menu/<?php echo $tampil['id_merchant_menu'];?>.html" onclick="return confirm('Delete <?php echo $tampil['merchant_menu'];?>?');"><img src="<?php echo $config->base_url();?>images/delete.png" class="tools"></a></td>
		<td><?php echo $zebra+1;?>.</td>
		<td valign="top"><div class="text"><?php echo $tampil['merchant_menu'];?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['merchant_menu_category'];?></div></td>
		<td valign="top"><div class="text"><a href="<?php echo $tampil['photo'];?>" class="foto"><?php echo $tampil['photo'];?></a></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['price'],0,',','.');?></div></td>
		<td align="right" valign="top"><div class="text"><?php echo number_format($tampil['discount'],0,',','.');?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['discount_variant']==0?"Percent %":"Value";?></div></td>
		<td valign="top"><div class="text"><?php echo $tampil['description'];?></div></td>
		<td align="center" valign="top"><div class="text"><?php echo $tampil['date_add'];?></div></td>
	</tr>
	
	<?php $zebra++;}?>
	
</table>
<div id="pagination_div">
<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
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
					<option value="merchant_menu" <?php if($field=="merchant_menu"){echo "selected";}?>>Merchant Menu</option>
					<option value="merchant_menu_category" <?php if($field=="merchant_menu_category"){echo "selected";}?>>Merchant Menu Category</option>
					<option value="photo" <?php if($field=="photo"){echo "selected";}?>>Photo</option>
					<option value="price" <?php if($field=="price"){echo "selected";}?>>Price</option>
					<option value="discount" <?php if($field=="discount"){echo "selected";}?>>Discount</option>
					<option value="discount_variant" <?php if($field=="discount_variant"){echo "selected";}?>>Discount Variant</option>
					<option value="description" <?php if($field=="description"){echo "selected";}?>>Description</option>
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
			<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
				
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
			<form action="<?php echo $config->base_url();?>merchant_menu.html" method="post">
				
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