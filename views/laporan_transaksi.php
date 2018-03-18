<form id="form1" action="<?php echo $config->base_url();?>process_laporan.html" target="_blank" method="post">
<table>
	<tr>
		<td valign="top" width="120">Tanggal Mulai</td>
		<td valign="top" width="10">:</td>
		<td>
			<input type="text" name="mulai" placeholder="Tanggal Mulai" class="date" value="<?php echo date("Y/m/d");?> 00:00">
		</td>
	</tr>
	<tr>
		<td valign="top">Tanggal berakhir</td>
		<td valign="top">:</td>
		<td>
			<input type="text" name="berakhir" placeholder="Tanggal Berakhir" class="date" value="<?php echo date("Y/m/d H:i");?>">
		</td>
	</tr>
	<tr>
		<td valign="top">Status Transaksi</td>
		<td valign="top">:</td>
		<td>
			<select name="status_transaksi">
				<option value="">- Semua -</option>

			<?php
				foreach($status_transaksi as $show){
			?>

				<option value="<?php echo $show['status_transaksi'];?>"><?php echo $show['nama_status'];?></option>

			<?php }?>

			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Nama Kurir</td>
		<td valign="top">:</td>
		<td>
			<select name="id_kurir">
				<option value="">- Semua -</option>

			<?php foreach($show_kurir as $key=>$show){?>
			
				<option value="<?php echo $show['id_kurir'];?>"><?php echo $show['nama'];?></option>
			
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
$('.date').datetimepicker({
	changeMonth: true,
	changeYear: true
});
</script>