<form id="form1" action="<?php echo $config->base_url();?>insert_frenchise.html" method="post" onsubmit="return check(this.action);">
<table>
	<tr>
		<td valign="top" width="120">Nama</td>
		<td valign="top" width="10">:</td>
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
		<td valign="top">Alamat</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="alamat" placeholder="Alamat">
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
		<td valign="top">No Ktp</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="no_ktp" placeholder="No Ktp">
		</td>
	</tr>
	<tr>
		<td valign="top">Npwp</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="npwp" placeholder="Npwp">
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
		<td valign="top">Email</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="email" placeholder="Email">
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
		<td valign="top">Latitude</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="latitude" placeholder="Latitude">
		</td>
	</tr>
	<tr>
		<td valign="top">Longitude</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="longitude" placeholder="Longitude">
		</td>
	</tr>
	<tr>
		<td valign="top">Luas</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="luas" placeholder="Luas">
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
		var alamat		= document.getElementById('form1').alamat;
		var notelp		= document.getElementById('form1').notelp;
		var no_ktp		= document.getElementById('form1').no_ktp;
		var npwp		= document.getElementById('form1').npwp;
		var foto		= document.getElementById('form1').foto;
		var email		= document.getElementById('form1').email;
		var id_gender	= document.getElementById('form1').id_gender;
		var longitude	= document.getElementById('form1').longitude;
		var latitude	= document.getElementById('form1').latitude;
		var luas		= document.getElementById('form1').luas;
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
		}else if(alamat.value == ''){
			alert('Alamat invalid.');
			alamat.focus();
			return false;
		}else if(notelp.value == ''){
			alert('Notelp invalid.');
			notelp.focus();
			return false;
		}else if(no_ktp.value == ''){
			alert('No Ktp invalid.');
			no_ktp.focus();
			return false;
		}else if(npwp.value == ''){
			alert('Npwp invalid.');
			npwp.focus();
			return false;
		}else if(foto.value == ''){
			alert('Foto invalid.');
			foto.focus();
			return false;
		}else if(email.value == ''){
			alert('Email invalid.');
			email.focus();
			return false;
		}else if(id_gender.value == ''){
			alert('Gender invalid.');
			id_gender.focus();
			return false;
		}else if(longitude.value == ''){
			alert('Longitude invalid.');
			longitude.focus();
			return false;
		}else if(latitude.value == ''){
			alert('Latitude invalid.');
			latitude.focus();
			return false;
		}else if(luas.value == ''){
			alert('Luas invalid.');
			luas.focus();
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
	
	document.getElementById('form1').nama.focus();
	document.getElementById('form1').nama.focus();
</script>