<form id="form1" action="<?php echo $config->base_url();?>insert_level.html" method="post" onsubmit="return check(this.action);">
<table>
	<tr>
		<td valign="top" width="120">Nama Level</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="nama_level" placeholder="Nama Level">
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
		var nama_level	= document.getElementById('form1').nama_level;

		if(nama_level.value == ''){
			alert('Nama Level invalid.');
			nama_level.focus();
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
	document.getElementById('form1').nama_level.focus();
</script>