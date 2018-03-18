<form id="form1" action="<?php echo $config->base_url();?>update_gender.html" method="post" onsubmit="return check(this.action);">
<input type="hidden" name="id" value="<?php echo $id;?>">
<table>
	<tr>
		<td valign="top" width="120">Gender</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="gender" placeholder="Gender" value="<?php echo $gender;?>">
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
		var gender	= document.getElementById('form1').gender;

		if(gender.value == ''){
			alert('Gender invalid.');
			gender.focus();
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
	document.getElementById('form1').gender.focus();
</script>