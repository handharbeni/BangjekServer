<form id="form1" action="<?php echo $config->base_url();?>update_global_setting.html" method="post" onsubmit="return check(this.action);">
<input type="hidden" name="id" value="<?php echo $id;?>">
<table>
	<tr>
		<td valign="top" width="120">Nama Setting</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="nama_setting" placeholder="Nama Setting" value="<?php echo $nama_setting;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Nilai</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="nilai" placeholder="Nilai" value="<?php echo $nilai;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Show To Frenchise</td>
		<td valign="top">:</td>
		<td>
			<select name="show_to_frenchise">
				<option value="1" <?php if($show_to_frenchise==1){echo "Selected";}?>>Ya</option>
				<option value="0" <?php if($show_to_frenchise==0){echo "Selected";}?>>Tidak</option>
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
		var nama_setting	= document.getElementById('form1').nama_setting;
		var nilai			= document.getElementById('form1').nilai;

		if(nama_setting.value == ''){
			alert('Nama Setting invalid.');
			nama_setting.focus();
			return false;
		}else if(nilai.value == ''){
			alert('Nilai invalid.');
			nilai.focus();
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
	document.getElementById('form1').nama_setting.focus();
</script>