<form id="form1" action="<?php echo $config->base_url();?>insert_room_chat.html" method="post" onsubmit="return check(this.action);">
<table>
	<tr>
		<td valign="top" width="120">Status</td>
		<td valign="top" width="10">:</td>
		<td>
			<select name="id_transaksi">
			
			<?php foreach($show_transaksi as $key=>$show){?>
			
				<option value="<?php echo $show['id_transaksi'];?>"><?php echo $show['status'];?></option>
			
			<?php }?>
			
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Nama</td>
		<td valign="top">:</td>
		<td>
			<select name="id_kurir">
			
			<?php foreach($show_kurir as $key=>$show){?>
			
				<option value="<?php echo $show['id_kurir'];?>"><?php echo $show['nama'];?></option>
			
			<?php }?>
			
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Nama</td>
		<td valign="top">:</td>
		<td>
			<select name="id_pelanggan">
			
			<?php foreach($show_pelanggan as $key=>$show){?>
			
				<option value="<?php echo $show['id_pelanggan'];?>"><?php echo $show['nama'];?></option>
			
			<?php }?>
			
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Name</td>
		<td valign="top">:</td>
		<td>
			<select name="id_merchant">
			
			<?php foreach($show_merchant as $key=>$show){?>
			
				<option value="<?php echo $show['id_merchant'];?>"><?php echo $show['name'];?></option>
			
			<?php }?>
			
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Isi Chat</td>
		<td valign="top">:</td>
		<td>
			<textarea name="isi_chat" placeholder="Isi Chat"></textarea>
		</td>
	</tr>
	<tr>
		<td valign="top">Aktif</td>
		<td valign="top">:</td>
		<td>
			<select name="status">
			
			<?php foreach($show_status_setting as $key=>$show){?>
			
				<option value="<?php echo $show['status'];?>"><?php echo $show['aktif'];?></option>
			
			<?php }?>
			
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
		var id_transaksi	= document.getElementById('form1').id_transaksi;
		var id_kurir		= document.getElementById('form1').id_kurir;
		var id_pelanggan	= document.getElementById('form1').id_pelanggan;
		var id_merchant		= document.getElementById('form1').id_merchant;
		var isi_chat		= document.getElementById('form1').isi_chat;
		var status			= document.getElementById('form1').status;

		if(id_transaksi.value == ''){
			alert('Status invalid.');
			id_transaksi.focus();
			return false;
		}else if(id_kurir.value == ''){
			alert('Nama invalid.');
			id_kurir.focus();
			return false;
		}else if(id_pelanggan.value == ''){
			alert('Nama invalid.');
			id_pelanggan.focus();
			return false;
		}else if(id_merchant.value == ''){
			alert('Name invalid.');
			id_merchant.focus();
			return false;
		}else if(isi_chat.value == ''){
			alert('Isi Chat invalid.');
			isi_chat.focus();
			return false;
		}else if(status.value == ''){
			alert('Aktif invalid.');
			status.focus();
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
	document.getElementById('form1').id_transaksi.focus();
</script>