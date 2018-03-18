<form id="form1" action="<?php echo $config->base_url();?>update_jenis_transaksi.html" method="post" onsubmit="return check(this.action);">
<input type="hidden" name="id" value="<?php echo $id;?>">
<table>
	<tr>
		<td valign="top" width="120">Nama Jenis</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="nama_jenis" placeholder="Nama Jenis" value="<?php echo $nama_jenis;?>">
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
		var nama_jenis	= document.getElementById('form1').nama_jenis;

		if(nama_jenis.value == ''){
			alert('Nama Jenis invalid.');
			nama_jenis.focus();
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
	document.getElementById('form1').nama_jenis.focus();
</script>