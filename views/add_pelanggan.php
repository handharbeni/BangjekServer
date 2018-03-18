<form id="form1" action="<?php echo $config->base_url();?>insert_pelanggan.html" method="post" onsubmit="return check(this.action);">
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
		<td valign="top">IMEI</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="IMEI" placeholder="IMEI">
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
		<td valign="top">Email</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="email" placeholder="Email">
		</td>
	</tr>
	<tr>
		<td valign="top">Saldo</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="saldo" placeholder="Saldo">
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
		var IMEI		= document.getElementById('form1').IMEI;
		var notelp		= document.getElementById('form1').notelp;
		var email		= document.getElementById('form1').email;
		var saldo		= document.getElementById('form1').saldo;
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
		}else if(IMEI.value == ''){
			alert('IMEI invalid.');
			IMEI.focus();
			return false;
		}else if(notelp.value == ''){
			alert('Notelp invalid.');
			notelp.focus();
			return false;
		}else if(email.value == ''){
			alert('Email invalid.');
			email.focus();
			return false;
		}else if(saldo.value == ''){
			alert('Saldo invalid.');
			saldo.focus();
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
	document.getElementById('form1').nama.focus();
</script>