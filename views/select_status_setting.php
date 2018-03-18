<form id="form1" action="<?php echo $config->base_url();?>update_status_setting.html" method="post" onsubmit="return check(this.action);">
<input type="hidden" name="id" value="<?php echo $id;?>">
<table>
	<tr>
		<td valign="top" width="120">Aktif</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="aktif" placeholder="Aktif" value="<?php echo $aktif;?>">
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
		var aktif	= document.getElementById('form1').aktif;

		if(aktif.value == ''){
			alert('Aktif invalid.');
			aktif.focus();
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
	document.getElementById('form1').aktif.focus();
</script>