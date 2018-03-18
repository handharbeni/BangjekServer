<form id="form1" action="<?php echo $config->base_url();?>update_kurir.html" method="post" onsubmit="return check(this.action);">
<input type="hidden" name="id" value="<?php echo $id;?>">
<table>
	<tr>
		<td valign="top" width="120">Nama</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="nama" placeholder="Nama" value="<?php echo $nama;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">IMEI</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="IMEI" placeholder="IMEI" value="<?php echo $IMEI;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Notelp</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="notelp" placeholder="Notelp" value="<?php echo $notelp;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Gender</td>
		<td valign="top">:</td>
		<td>
			<select name="id_gender">
			
			<?php foreach($show_gender as $key=>$show){?>
			
				<option value="<?php echo $show['id_gender'];?>" <?php if($id_gender == $show['id_gender']){echo "selected";}?>><?php echo $show['gender'];?></option>
			
			<?php }?>
			
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top" id="precentage">Foto</td>
		<td valign="top">:</td>
		<td>
			<input type="file" name="files[]" placeholder="Foto" id="fileupload">
			<input type="hidden" name="foto" id="foto">
			<div id="progress">
				<div class="progress"></div>
			</div>
		</td>
	</tr>
	<tr>
		<td valign="top">No Ktp</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="no_ktp" placeholder="No Ktp" value="<?php echo $no_ktp;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Jaminan</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="jaminan" placeholder="Jaminan" value="<?php echo $jaminan;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Aktif</td>
		<td valign="top">:</td>
		<td>
			<select name="status">
			
			<?php foreach($show_status_setting as $key=>$show){?>
			
				<option value="<?php echo $show['status'];?>" <?php if($status == $show['status']){echo "selected";}?>><?php echo $show['aktif'];?></option>
			
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
		var nama		= document.getElementById('form1').nama;
		var notelp		= document.getElementById('form1').notelp;
		var id_gender	= document.getElementById('form1').id_gender;
		var no_ktp		= document.getElementById('form1').no_ktp;
		var jaminan		= document.getElementById('form1').jaminan;
		var status		= document.getElementById('form1').status;

		if(nama.value == ''){
			alert('Nama invalid.');
			nama.focus();
			return false;
		}else if(notelp.value == ''){
			alert('Notelp invalid.');
			notelp.focus();
			return false;
		}else if(id_gender.value == ''){
			alert('Gender invalid.');
			id_gender.focus();
			return false;
		}else if(no_ktp.value == ''){
			alert('No Ktp invalid.');
			no_ktp.focus();
			return false;
		}else if(jaminan.value == ''){
			alert('Jaminan invalid.');
			jaminan.focus();
			return false;
		}else if(status.value == ''){
			alert('Aktif invalid.');
			status.focus();
			return false;
		}else{
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
	var url = '<?php echo $config->base_url();?>upload_foto.html';
	$('#fileupload').fileupload({
		url: url,
		dataType: 'json',
		done: function (e, data) {
			$.each(data.result.files, function (index, file) {
				$('#foto').val(file.name);
			});
		},
		progressall: function (e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			if(progress>0){
				$('#progress').show();
				$('#progress .progress').css({"width":progress+"%"});
			}
			$('#precentage').html('Foto ('+progress+'%)');
		}
	}).prop('disabled', !$.support.fileInput)
		.parent().addClass($.support.fileInput ? undefined : 'disabled');
	
	document.getElementById('form1').nama.focus();
</script>