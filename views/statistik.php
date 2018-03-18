<div id="panel_statistic">

	<?php
		$title = "BangJeck";
		$day_of_month = date("t");
		
		$max = 0;
		for($day = 1; $day <= $day_of_month; $day++){
			if(!isset($data_daily[$day])){
				$data_daily[$day] = 0;
			}
			
			$daily[$day] = $data_daily[$day];
			if($daily[$day]>$max){
				$max = $daily[$day];
			}
		}
		
		$date = date("d-m-Y");
		$nameOfDay = date('D', strtotime($date));
		
		$day = date("d");
		$sun = $day;
		switch($nameOfDay){
			case "Mon":
				$sun = $sun + 6;
			break;
			case "Tue":
				$sun = $sun + 5;
			break;
			case "Wed":
				$sun = $sun + 4;
			break;
			case "Thu":
				$sun = $sun + 3;
			break;
			case "Fri":
				$sun = $sun + 2;
			break;
			case "Sat":
				$sun = $sun + 1;
			break;
		}
		$sun = $sun%7;
		
		$maxWeek = 0;
		$weekke = 1;
		$weekly	= array();
		for($day = 1; $day <= $day_of_month; $day++){
			if(!isset($weekly[$weekke])){
				$weekly[$weekke]=0;
			}
			$weekly[$weekke] += $daily[$day];
			if($day==$sun||$day==$sun+7||$day==$sun+14||$day==$sun+21||$day==$sun+28){
				if($weekly[$weekke]>$maxWeek){
					$maxWeek = $weekly[$weekke];
				}
				$weekke++;
			}
		}
		
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
		
		$maxYear = 0;
		$year = date("Y");
		for($y = $year-5; $y <= $year; $y++){
			if(!isset($data_yearly[$y])){
				$data_yearly[$y]	= 0;
			}
			
			$yearly[$y] = $data_yearly[$y];
			if($yearly[$y]>$maxYear){
				$maxYear = $yearly[$y];
			}
		}
	?>

	<div style="clear: both"></div>
	<div id="daily">
		<b>Daily <?php echo $title;?></b><br />
		<table>
			<tr>

				<?php
					for($day = 1; $day<= $day_of_month; $day++){
						if(($daily[$day] * 210)==0){
							$height = 0;
						}else{
							$height	= $daily[$day] * 200 / $max;
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
					<div class="brick <?php echo $color;?>" style="height: <?php echo $height;?>px;<?php if($color=="red"){echo "color: white;";}?>">
						<div class="brick_text"><?php echo number_format($daily[$day],0,',','.');?></div>
					</div>
				</td>

				<?php }?>

			</tr>
			<tr>

				<?php for($day = 1; $day<= $day_of_month; $day++){?>

				<td align="center" height="20"><?php echo $day;?></td>

				<?php }?>

			</tr>
		</table>
	</div>
	<div id="weekly">
		<b>Weekly <?php echo $title;?></b><br />
		<table>
			<tr>

				<?php
					$weekke = 1;
					foreach($weekly as $tampil){
						if(($tampil * 210)==0){
							$height = 0;
						}else{
							$height	= $tampil * 200 / $maxWeek;
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
					<div class="brick <?php echo $color;?>" style="height: <?php echo $height;?>px;<?php if($color=="red"){echo "color: white;";}?>">
						<div class="brick_text"><?php echo number_format($tampil,0,',','.');?></div>
					</div>
				</td>

				<?php
						$weekke++;
					}
				?>

			</tr>
			<tr>

				<?php
					$weekke = 1;
					foreach($weekly as $tampil){
				?>

				<td align="center" height="20"><?php echo $weekke;?></td>

				<?php
						$weekke++;
					}
				?>

			</tr>
		</table>
	</div>
	<div id="monthly">
		<b>Monthly <?php echo $title;?></b><br />
		<table>
			<tr>

				<?php
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
					<div class="brick <?php echo $color;?>" style="height: <?php echo $height;?>px;<?php if($color=="red"){echo "color: white;";}?>">
						<div class="brick_text"><?php echo number_format($monthly[$month],0,',','.');?></div>
					</div>
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
	</div>
	<div style="clear: both;"></div>
	<div id="yearly">
		<b>Yearly <?php echo $title;?></b><br />
		<table>
			<tr>

				<?php
					for($y = $year-5; $y <= $year; $y++){
						if(($yearly[$y] * 210)==0){
							$height = 0;
						}else{
							$height	= $yearly[$y] * 200 / $maxYear;
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
					<div class="brick <?php echo $color;?>" style="height: <?php echo $height;?>px;<?php if($color=="red"){echo "color: white;";}?>">
						<div class="brick_text"><?php echo number_format($yearly[$y],0,',','.');?></div>
					</div>
				</td>

				<?php }?>

			</tr>
			<tr>

				<?php
					for($y = $year-5; $y <= $year; $y++){
				?>

				<td align="center" height="20"><?php echo $y;?></td>

				<?php
					}
				?>

			</tr>
		</table>
	</div>
	<div id="legend">
		<b>Legend</b><br />
		<table border="0">
			<tr>
				<td width="30" height="30px">
					<div class="green" style="width: 50px; height:20px;"></div>
				</td>
				<td style="text-indent: 16px;">High</td>
			</tr>
			<tr>
				<td height="30px">
					<div class="yellow" style="width: 50px; height:20px;"></div>
				</td>
				<td style="text-indent: 16px;">Average</td>
			</tr>
			<tr>
				<td height="30px">
					<div class="red" style="width: 50px; height:20px;"></div>
				</td>
				<td style="text-indent: 16px;">Low</td>
			</tr>
		</table>
	</div>
	<script>
		$('.brick').show('slow');
	</script>
	<div style="clear: both;"></div>
</div>