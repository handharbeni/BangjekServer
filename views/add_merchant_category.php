<form id="form1" action="<?php echo $config->base_url();?>insert_merchant_category.html" method="post" onsubmit="return check(this.action);">
<table>
	<tr>
		<td valign="top" width="120">Merchant Category</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="merchant_category" placeholder="Merchant Category">
		</td>
	</tr>
	<tr>
		<td valign="top">Max Upload</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="max_upload" placeholder="Max Upload">
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
		var merchant_category	= document.getElementById('form1').merchant_category;
		var max_upload			= document.getElementById('form1').max_upload;

		if(merchant_category.value == ''){
			alert('Merchant Category invalid.');
			merchant_category.focus();
			return false;
		}else if(max_upload.value == ''){
			alert('Max Upload invalid.');
			max_upload.focus();
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
	document.getElementById('form1').merchant_category.focus();
</script>