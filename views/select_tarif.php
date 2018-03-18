<form id="form1" action="<?php echo $config->base_url();?>update_tarif.html" method="post" onsubmit="return check(this.action);">
<input type="hidden" name="id" value="<?php echo $id;?>">
<table>
	<tr>
		<td valign="top" width="120">Nama Setting</td>
		<td valign="top" width="10">:</td>
		<td>
			<select name="id_global_setting">
			
			<?php foreach($show_global_setting as $key=>$show){?>
			
				<option value="<?php echo $show['id_global_setting'];?>" <?php if($id_global_setting==$show['id_global_setting']){echo "Selected";}?>><?php echo $show['nama_setting'];?></option>
			
			<?php }?>
			
			</select>
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
		<td valign="top">Nama</td>
		<td valign="top">:</td>
		<td>
			<select name="id_frenchise">
			
			<?php foreach($show_frenchise as $key=>$show){?>
			
				<option value="<?php echo $show['id_frenchise'];?>" <?php if($id_frenchise==$show['id_frenchise']){echo "Selected";}?>><?php echo $show['nama'];?></option>
			
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
		var nilai			= document.getElementById('form1').nilai;

		if(nilai.value == ''){
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
	document.getElementById('form1').id_global_setting.focus();
</script>