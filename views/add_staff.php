<form id="form1" action="<?php echo $config->base_url();?>insert_staff.html" method="post" onsubmit="return check(this.action);">
<table>
	<tr>
		<td valign="top" width="120">Username</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="user_staff" placeholder="Username">
		</td>
	</tr>
	<tr>
		<td valign="top">Nama</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="nama" placeholder="Nama">
		</td>
	</tr>
	<tr>
		<td valign="top">Password</td>
		<td valign="top">:</td>
		<td>
			<input type="password" name="password" placeholder="Password">
		</td>
	</tr>
	<tr>
		<td valign="top">Re:Password</td>
		<td valign="top">:</td>
		<td>
			<input type="password" name="password2" placeholder="Re:Password">
		</td>
	</tr>
	<tr>
		<td valign="top">Notelp</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="notelp" placeholder="Notelp">
		</td>
	</tr>
	<tr>
		<td valign="top">Nama Level</td>
		<td valign="top">:</td>
		<td>
			<select name="id_level">
			
			<?php foreach($show_level as $key=>$show){
				if($show['id_level']!=1){
				?>
			
				<option value="<?php echo $show['id_level'];?>"><?php echo $show['nama_level'];?></option>
			
			<?php }
			}?>
			
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Gender</td>
		<td valign="top">:</td>
		<td>
			<select name="id_gender">
			
			<?php foreach($show_gender as $key=>$show){?>
			
				<option value="<?php echo $show['id_gender'];?>"><?php echo $show['gender'];?></option>
			
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
			<input type="text" name="no_ktp" placeholder="No Ktp">
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
		var nama		= document.getElementById('form1').nama;
		var password	= document.getElementById('form1').password;
		var password2	= document.getElementById('form1').password2;
		var notelp		= document.getElementById('form1').notelp;
		var id_level	= document.getElementById('form1').id_level;
		var id_gender	= document.getElementById('form1').id_gender;
		var foto		= document.getElementById('form1').foto;
		var no_ktp		= document.getElementById('form1').no_ktp;
		var status		= document.getElementById('form1').status;

		if(nama.value == ''){
			alert('Nama invalid.');
			nama.focus();
			return false;
		}else if(password.value == ''){
			alert('Password invalid.');
			password.focus();
			return false;
		}else if(password.value != password2.value){
			alert('Re:Password invalid.');
			password.focus();
			return false;
		}else if(notelp.value == ''){
			alert('Notelp invalid.');
			notelp.focus();
			return false;
		}else if(id_level.value == ''){
			alert('Nama Level invalid.');
			id_level.focus();
			return false;
		}else if(id_gender.value == ''){
			alert('Gender invalid.');
			id_gender.focus();
			return false;
		}else if(foto.value == ''){
			alert('Foto invalid.');
			foto.focus();
			return false;
		}else if(no_ktp.value == ''){
			alert('No Ktp invalid.');
			no_ktp.focus();
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
	document.getElementById('form1').user_staff.focus();
</script>