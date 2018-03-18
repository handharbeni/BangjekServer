<html>
<head>
<title>BangJeck | Slider</title>
<link href="<?php echo $config->base_url();?>css/slider.css" rel="stylesheet">
<script src="<?php echo $config->base_url();?>js/jquery-3.2.1.js"></script>
</head>
<body>
<div id="wrapper">
	<table id="slide" cellspacing="0" cellpadding="0">
		<tr>
			<td style="background-image: url(https://dl.dropboxusercontent.com/s/j0c309sy4pk07ek/slide1.png?dl=0);"></td>
			<td style="background-image: url(https://dl.dropboxusercontent.com/s/w9syuo12czbk1yv/slide2.png?dl=0);"></td>
			<td style="background-image: url(https://dl.dropboxusercontent.com/s/uh1uxg3c64g2bij/slide3.png?dl=0);"></td>
			<td style="background-image: url(https://dl.dropboxusercontent.com/s/8lsm7wfi4ojt0ih/slide4.png?dl=0);"></td>
		</tr>
	</table>
</div>
<script>
var position	= 0;	
setInterval(function(){
	if(position<3){
		position++;
		$('#slide').animate({"left":"-"+position+"00%"});
	}else{
		$('#slide').animate({"left":"0px"});
		position	= 0;
	}
},3000);
</script>
</body>
</html>