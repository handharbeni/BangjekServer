<!DOCTYPE html>
<html lang="en">
<head>
<title>BangJeck</title>
<meta name="theme-color" content="#154360">
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo $config->base_url();?>css/frenchise.css" rel="stylesheet"/>
</head>
<body><div class="title">BangJeck Francheise <?php echo $profile['nama'];?></div>
<table width="100%" id="profile">
	<tr>
		<td valign="top" width="100">Alamat</td>
		<td valign="top" width="10">:</td>
		<td><?php echo $profile['alamat'];?></td>
	</tr>
	<tr>
		<td valign="top">Notelp</td>
		<td valign="top">:</td>
		<td><?php echo $profile['notelp'];?></td>
	</tr>
	<tr>
		<td valign="top">NPWP</td>
		<td valign="top">:</td>
		<td><?php echo $profile['npwp'];?></td>
	</tr>
	<tr>
		<td valign="top">No KTP</td>
		<td valign="top">:</td>
		<td><?php echo $profile['no_ktp'];?></td>
	</tr>
	<tr>
		<td valign="top">Email</td>
		<td valign="top">:</td>
		<td><?php echo $profile['email'];?></td>
	</tr>
	<tr>
		<td valign="top">Lokasi</td>
		<td valign="top">:</td>
		<td><?php echo $profile['latitude'].",".$profile['longitude'];?></td>
	</tr>
	<tr>
		<td valign="top">Sejauh</td>
		<td valign="top">:</td>
		<td><?php echo $profile['luas'];?> Km</td>
	</tr>
	<tr>
		<td valign="top">Status</td>
		<td valign="top">:</td>
		<td><?php echo $profile['aktif'];?></td>
	</tr>
</table>
<?php if(!empty($dttarif)){?><div class="title">Tarif Francheise <?php echo $profile['nama'];?></div>
<table id="tarif" cellpadding="5px">
	<tr>
		<th>Setting</th>
		<th width="100">Nilai</th>
	</tr>

	<?php
		$i = 0;
		foreach($dttarif as $tampil){
	?>

	<tr <?php if($i%2==1){echo "class=\"zebra\"";}?>>
		<td><?php echo $tampil['nama_setting'];?></td>
		<td valign="top" align ="right"><?php echo number_format($tampil['nilai'],0,',','.');?></td>
	</tr>

	<?php $i++;}?>

</table><?php }?>
<div class="title background_blue">Statistik Bulanan Francheise <?php echo $profile['nama'];?></div>
<div id="monthly">
	<table>
		<tr>

			<?php
				$nameOfMonth = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Des');
				$maxMonth = 0;
				for($month = 1; $month <= count($nameOfMonth); $month++){
					if(!isset($data_monthly[$month])){
						$data_monthly[$month] = 0;
					}
					
					$monthly[$month] = $data_monthly[$month];
					if($monthly[$month]>$maxMonth){
						$maxMonth = $monthly[$month];
					}
				}

				for($month = 1; $month <= count($nameOfMonth); $month++){
					if(($monthly[$month] * 210)==0){
						$height = 0;
					}else{
						$height	= $monthly[$month] * 200 / $maxMonth;
					}
					
					if($height > 140){
						$color	= "green";
					}else if($height > 70){
						$color	= "yellow";
					}else{
						$color	= "red";
					}
			?>

			<td align="center" valign="bottom" width="40">
				<div class="brick <?php echo $color;?>" style="height: <?php echo $height;?>px">
					<div class="brick_text"><?php echo number_format($monthly[$month],0,',','.');?></div>
				</div>
				<?php if($height==0){echo $height;}?>
			</td>

			<?php }?>

		</tr>
		<tr>

			<?php
				foreach($nameOfMonth as $tampil){
			?>

			<td align="center" height="20"><?php echo $tampil;?></td>

			<?php
				}
			?>

		</tr>
	</table>
</div><div style="clear:both;"></div><div id="pendapatan">
	<div class="title">Pendapatan Bulan Ini</div>	<div id="nominal"><?php echo "Rp.".number_format($income,0,',','.');?></div></div><div id="record">	<div class="title">Invoice <?php echo $profile['nama'];?></div>	<table width="100%" cellpadding="5px">		<tr>			<th>Tanggal</th>			<th width="100">Nominal</th>			<th width="100">Dibayar</th>		</tr>		<?php			$i = 0;			foreach($data as $tampil){		?>		<tr <?php if($i%2==1){echo "class=\"zebra\"";}else{echo"style=\"background: #ffffff;\"";}?>>			<td><?php echo $tampil['tanggal'];?></td>			<td valign="top" align="right"><?php echo number_format($tampil['nominal'],0,',','.');?></td>			<td align="center"><?php echo $tampil['status']==0?"Belum":"Sudah";?></td>		</tr>		<?php $i++;}?>	</table></div>
</body>
</html>