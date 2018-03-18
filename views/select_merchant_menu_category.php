<form id="form1" action="<?php echo $config->base_url();?>update_merchant_menu_category.html" method="post" onsubmit="return check(this.action);">
<input type="hidden" name="id" value="<?php echo $id;?>">
<table>
	<tr>
		<td valign="top" width="120">Merchant Menu Category</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="merchant_menu_category" placeholder="Merchant Menu Category" value="<?php echo $merchant_menu_category;?>">
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
		var merchant_menu_category	= document.getElementById('form1').merchant_menu_category;

		if(merchant_menu_category.value == ''){
			alert('Merchant Menu Category invalid.');
			merchant_menu_category.focus();
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
	document.getElementById('form1').merchant_menu_category.focus();
</script>