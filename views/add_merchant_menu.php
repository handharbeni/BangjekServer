<form id="form1" action="<?php echo $config->base_url();?>insert_merchant_menu.html" method="post" onsubmit="return check(this.action);">
<table>
	<tr>
		<td valign="top" width="120">Merchant Menu</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="merchant_menu" placeholder="Merchant Menu">
		</td>
	</tr>
	<tr>
		<td valign="top">Merchant Menu Category</td>
		<td valign="top">:</td>
		<td>
			<select name="id_merchant_menu_category">
			
			<?php foreach($show_merchant_menu_category as $key=>$show){?>
			
				<option value="<?php echo $show['id_merchant_menu_category'];?>"><?php echo $show['merchant_menu_category'];?></option>
			
			<?php }?>
			
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top" id="precentage">Foto</td>
		<td valign="top">:</td>
		<td>
			<input type="file" name="files[]" placeholder="Foto" id="fileupload">
			<input type="hidden" name="photo" id="foto">
			<div id="progress">
				<div class="progress"></div>
			</div>
		</td>
	</tr>
	<tr>
		<td valign="top">Price</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="price" placeholder="Price">
		</td>
	</tr>
	<tr>
		<td valign="top">Discount</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="discount" placeholder="Discount">
		</td>
	</tr>
	<tr>
		<td valign="top">Discount Variant</td>
		<td valign="top">:</td>
		<td>
			<select name="discount_variant">
				<option value="0">Percent (%)</option>
				<option value="1">Value</option>
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Description</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="description" placeholder="Description">
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
		var merchant_menu				= document.getElementById('form1').merchant_menu;
		var id_merchant_menu_category	= document.getElementById('form1').id_merchant_menu_category;
		var photo						= document.getElementById('form1').photo;
		var price						= document.getElementById('form1').price;
		var discount					= document.getElementById('form1').discount;
		var discount_variant			= document.getElementById('form1').discount_variant;
		var description					= document.getElementById('form1').description;

		if(merchant_menu.value == ''){
			alert('Merchant Menu invalid.');
			merchant_menu.focus();
			return false;
		}else if(id_merchant_menu_category.value == ''){
			alert('Merchant Menu Category invalid.');
			id_merchant_menu_category.focus();
			return false;
		}else if(photo.value == ''){
			alert('Photo invalid.');
			photo.focus();
			return false;
		}else if(price.value == ''){
			alert('Price invalid.');
			price.focus();
			return false;
		}else if(discount.value == ''){
			alert('Discount invalid.');
			discount.focus();
			return false;
		}else if(discount_variant.value == ''){
			alert('Discount Variant invalid.');
			discount_variant.focus();
			return false;
		}else if(description.value == ''){
			alert('Description invalid.');
			description.focus();
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
	document.getElementById('form1').merchant_menu.focus();
</script>