<form id="form1" action="<?php echo $config->base_url();?>update_merchant.html" method="post" onsubmit="return check(this.action);">
<input type="hidden" name="id" value="<?php echo $id;?>">
<table>
	<tr>
		<td valign="top" width="120">Name</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="name" placeholder="Name" value="<?php echo $name;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Address</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="address" placeholder="Address" value="<?php echo $address;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Email</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Phone</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="phone" placeholder="Phone" value="<?php echo $phone;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Photo</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="photo" placeholder="Photo" value="<?php echo $photo;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Description</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="description" placeholder="Description" value="<?php echo $description;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">IMEI1</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="IMEI1" placeholder="IMEI1" value="<?php echo $IMEI1;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">IMEI2</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="IMEI2" placeholder="IMEI2" value="<?php echo $IMEI2;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Lat</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="lat" placeholder="Lat" value="<?php echo $lat;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Lon</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="lon" placeholder="Lon" value="<?php echo $lon;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Open At</td>
		<td valign="top">:</td>
		<td>
			<input type="time" name="open_at" placeholder="Open At" value="<?php echo $open_at;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Close At</td>
		<td valign="top">:</td>
		<td>
			<input type="time" name="close_at" placeholder="Close At" value="<?php echo $close_at;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Open Status</td>
		<td valign="top">:</td>
		<td>
			<select name="open_status">
				<option value="0" <?php if($open_status==0){echo "Selected";}?>>Close</option>
				<option value="1" <?php if($open_status==1){echo "Selected";}?>>Open</option>
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Max Menu</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="max_menu" placeholder="Max Menu" value="<?php echo $max_menu;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Point</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="point" placeholder="Point" value="<?php echo $point;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Merchant Category</td>
		<td valign="top">:</td>
		<td>
			<select name="id_merchant_category">
			
			<?php foreach($show_merchant_category as $key=>$show){?>
			
				<option value="<?php echo $show['id_merchant_category'];?>" <?php if($id_merchant_category == $show['id_merchant_category']){echo "selected";}?>><?php echo $show['merchant_category'];?></option>
			
			<?php }?>
			
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Join Date</td>
		<td valign="top">:</td>
		<td>
			<input type="date" name="join_date" placeholder="Join Date" value="<?php echo $join_date;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Valid Status</td>
		<td valign="top">:</td>
		<td>
			<select name="valid_status">
				<option value="0" <?php if($valid_status==0){echo "Selected";}?>>Non-Active</option>
				<option value="1" <?php if($valid_status==1){echo "Selected";}?>>Active</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="right">
			<input type="submit" value="Submit">
		</td>
	</tr>
</table>
</form>
<script>
	function check(action){
		var name					= document.getElementById('form1').name;
		var address					= document.getElementById('form1').address;
		var email					= document.getElementById('form1').email;
		var phone					= document.getElementById('form1').phone;
		var photo					= document.getElementById('form1').photo;
		var description				= document.getElementById('form1').description;
		var IMEI1					= document.getElementById('form1').IMEI1;
		var IMEI2					= document.getElementById('form1').IMEI2;
		var lat						= document.getElementById('form1').lat;
		var lon						= document.getElementById('form1').lon;
		var open_at					= document.getElementById('form1').open_at;
		var close_at				= document.getElementById('form1').close_at;
		var open_status				= document.getElementById('form1').open_status;
		var max_menu				= document.getElementById('form1').max_menu;
		var point					= document.getElementById('form1').point;
		var id_merchant_category	= document.getElementById('form1').id_merchant_category;
		var join_date				= document.getElementById('form1').join_date;
		var valid_status			= document.getElementById('form1').valid_status;

		if(name.value == ''){
			alert('Name invalid.');
			name.focus();
			return false;
		}else if(address.value == ''){
			alert('Address invalid.');
			address.focus();
			return false;
		}else if(email.value == ''){
			alert('Email invalid.');
			email.focus();
			return false;
		}else if(phone.value == ''){
			alert('Phone invalid.');
			phone.focus();
			return false;
		}else if(photo.value == ''){
			alert('Photo invalid.');
			photo.focus();
			return false;
		}else if(description.value == ''){
			alert('Description invalid.');
			description.focus();
			return false;
		}else if(IMEI1.value == ''){
			alert('IMEI1 invalid.');
			IMEI1.focus();
			return false;
		}else if(IMEI2.value == ''){
			alert('IMEI2 invalid.');
			IMEI2.focus();
			return false;
		}else if(lat.value == ''){
			alert('Lat invalid.');
			lat.focus();
			return false;
		}else if(lon.value == ''){
			alert('Lon invalid.');
			lon.focus();
			return false;
		}else if(open_at.value == ''){
			alert('Open At invalid.');
			open_at.focus();
			return false;
		}else if(close_at.value == ''){
			alert('Close At invalid.');
			close_at.focus();
			return false;
		}else if(open_status.value == ''){
			alert('Open Status invalid.');
			open_status.focus();
			return false;
		}else if(max_menu.value == ''){
			alert('Max Menu invalid.');
			max_menu.focus();
			return false;
		}else if(point.value == ''){
			alert('Point invalid.');
			point.focus();
			return false;
		}else if(id_merchant_category.value == ''){
			alert('Merchant Category invalid.');
			id_merchant_category.focus();
			return false;
		}else if(join_date.value == ''){
			alert('Join Date invalid.');
			join_date.focus();
			return false;
		}else if(valid_status.value == ''){
			alert('Valid Status invalid.');
			valid_status.focus();
			return false;
		}else {
			var datastring	= $("#form1").serialize();
			$.ajax({
				type: "POST",
				url: action,
				data: datastring,
				success: function(data) {
					if(data=="1"){
						location.replace(window.location.href);
					}else{
						alert('Error');
					}
				}
			});
			return false;
		}
	}
	document.getElementById('form1').name.focus();
</script>