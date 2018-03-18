<form id="form1" action="<?php echo $config->base_url();?>update_transaksi.html" method="post" onsubmit="return check(this.action);">
<input type="hidden" name="id" value="<?php echo $id;?>">
<table>
	<tr>
		<td valign="top">Jenis Transaksi</td>
		<td valign="top">:</td>
		<td>
			<select name="id_jenis_transaksi">

			<?php foreach($show_jenis_transaksi as $key=>$show){?>
			
				<option value="<?php echo $show['id_jenis_transaksi'];?>" <?php if($id_jenis_transaksi==$show['id_jenis_transaksi']){echo "Selected";}?>><?php echo $show['nama_jenis'];?></option>
			
			<?php }?>
			
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Notelp Pelanggan</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="notelp_pelanggan" placeholder="Notelp Pelanggan" value="<?php echo $notelp;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Nama Kurir</td>
		<td valign="top">:</td>
		<td>
			<select name="id_kurir">
				<option value="">- Bebas -</option>

			<?php foreach($show_kurir as $key=>$show){?>
			
				<option value="<?php echo $show['id_kurir'];?>" <?php if($id_kurir==$show['id_kurir']){echo "Selected";}?>><?php echo $show['nama'];?></option>
			
			<?php }?>
			
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Lokasi Ambil</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="lokasi_ambil" placeholder="Lokasi Ambil" class="ambil_jarak" value="<?php echo $lokasi_ambil;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Keterangan Ambil</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="keterangan_ambil" placeholder="Keterangan Ambil" value="<?php echo $keterangan_ambil;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Lokasi Kirim</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="lokasi_kirim" placeholder="Lokasi Kirim" class="ambil_jarak" value="<?php echo $lokasi_kirim;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Keterangan Kirim</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="keterangan_kirim" placeholder="Keterangan Kirim" value="<?php echo $keterangan_kirim;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Jarak (Km)</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="jarak" placeholder="Jarak" class="ambil_biaya" value="<?php echo $jarak;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Biaya Jarak</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="biaya_jarak" placeholder="Biaya Jarak" class="ambil_biaya" value="<?php echo $biaya_jarak;?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Item</td>
		<td valign="top">:</td>
		<td>
			<textarea name="item" placeholder="Item"><?php echo $item;?></textarea>
		</td>
	</tr>
	<tr>
		<td valign="top">Biaya Item</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="biaya_item" placeholder="Biaya Item" value="<?php echo $biaya_item;?>" min="0" class="ambil_biaya">
		</td>
	</tr>
	<tr>
		<td valign="top">Biaya Dua Kurir</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="biaya_dua_kurir" placeholder="Biaya Dua Kurir" value="<?php echo $biaya_dua_kurir;?>" min="0" class="ambil_biaya">
		</td>
	</tr>
	<tr>
		<td valign="top">Total</td>
		<td valign="top">:</td>
		<td>
			<input type="number" name="total" placeholder="Total" value="<?php echo $total;?>" class="ambil_biaya" readonly>
		</td>
	</tr>
	<tr>
		<td valign="top">Status</td>
		<td valign="top">:</td>
		<td>
			<select name="status">

			<?php foreach($show_status_transaksi as $key=>$show){?>
			
				<option value="<?php echo $show['status_transaksi'];?>" <?php if($status==$show['status_transaksi']){echo "Selected";}?>><?php echo $show['nama_status'];?></option>
			
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
		var id_jenis_transaksi	= document.getElementById('form1').id_jenis_transaksi;
		var lokasi_ambil		= document.getElementById('form1').lokasi_ambil;
		var lokasi_kirim		= document.getElementById('form1').lokasi_kirim;
		var jarak				= document.getElementById('form1').jarak;
		var biaya_jarak			= document.getElementById('form1').biaya_jarak;
		var total				= document.getElementById('form1').total;

		if(id_jenis_transaksi.value == ''){
			alert('Nama Jenis invalid.');
			id_jenis_transaksi.focus();
			return false;
		}else if(lokasi_ambil.value == ''){
			alert('Lokasi Ambil invalid.');
			lokasi_ambil.focus();
			return false;
		}else if(lokasi_kirim.value == ''){
			alert('Lokasi Kirim invalid.');
			lokasi_kirim.focus();
			return false;
		}else if(jarak.value == ''){
			alert('Jarak invalid.');
			jarak.focus();
			return false;
		}else if(biaya_jarak.value == ''){
			alert('Biaya Jarak invalid.');
			biaya_jarak.focus();
			return false;
		}else if(total.value == ''){
			alert('Total invalid.');
			total.focus();
			return false;
		}else{
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
	$('.ambil_biaya').change(function(){
		var jarak			= document.getElementById('form1').jarak;
		var biaya_jarak		= document.getElementById('form1').biaya_jarak;
		var biaya_dua_kurir	= document.getElementById('form1').biaya_dua_kurir;
		var total			= document.getElementById('form1').total;
		biaya_jarak.value = jarak.value<<?php echo $jarak_maks;?>?(<?php echo $kurang_dari;?>):(jarak.value*<?php echo $lebih_dari;?>);
		
		total.value			= (1*biaya_dua_kurir.value) + (1*biaya_jarak.value);
	});
	$('.ambil_jarak').change(function(){
		var lokasi_ambil	= document.getElementById('form1').lokasi_ambil;
		var lokasi_kirim	= document.getElementById('form1').lokasi_kirim;
		var jarak			= document.getElementById('form1').jarak;
		var biaya_jarak		= document.getElementById('form1').biaya_jarak;
		var biaya_dua_kurir	= document.getElementById('form1').biaya_dua_kurir;
		var total			= document.getElementById('form1').total;

		if(lokasi_ambil.value!=""&&lokasi_kirim.value!=""){
			var ambil	= $.base64.encode(lokasi_ambil.value);
			var kirim	= $.base64.encode(lokasi_kirim.value);

			jarak.type	= 'text';
			jarak.value	= 'Mencari Jarak...';
			
			biaya_jarak.type	= 'text';
			biaya_jarak.value	= 'Menghitung biaya...';
			
			$.post("<?php echo $config->base_url();?>jarak/"+ambil+"/"+kirim+".html",function(data){
				jarak.type	= 'number';
				jarak.value	= data;
				
				biaya_jarak.type	= 'number';
				biaya_jarak.value = data<<?php echo $jarak_maks;?>?(<?php echo $kurang_dari;?>):(data*<?php echo $lebih_dari;?>);

				total.value			= (1*biaya_dua_kurir.value) + (1*biaya_jarak.value);
			});
		}
	});
	document.getElementById('form1').status.focus();
</script>