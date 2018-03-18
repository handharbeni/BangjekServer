<!DOCTYPE html>
<html lang="en">
<head>
<title>BangJeck Panel</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo $config->base_url();?>css/login.css" rel="stylesheet">
</head>
<body>
<center>
<div id="outwrap" style="background-image: url('<?php echo $config->base_url();?>/images/wallpaper<?php echo rand(1,6);?>.png');"></div>
<div style="width: 100%;height: 100px; clear: both;position: relative;"></div>
<div id="wrapper">
	<form id="form1" action="<?php echo $config->base_url();?>process.html" method="post" onsubmit="return check();">
	<table>
		<tr>
			<td id="logo" height="75" colspan="3"></td>
		</tr>
		<tr>
			<td width="100">Username</td>
			<td width="20">:</td>
			<td>
				<input type="text" name="username">
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td>
				<input type="password" name="password">
			</td>
		</tr>
		<tr>
			<td colspan="2"></td>
			<td>
				<?php					$_SESSION['one'] = rand(0,10);					$_SESSION['two'] = rand(0,10);					echo $_SESSION['one']." + ".$_SESSION['two']." = ?";				?>
			</td>
		</tr>
		<tr>
			<td>Captcha</td>
			<td>:</td>
			<td>
				<input type="text" name="captcha" autocomplete="off">
			</td>
		</tr>
		<tr>
			<td colspan="2"></td>
			<td>
				<input type="submit" value="Login">
			</td>
		</tr>
	</table>
	</form>
</div>
</center>
<script>
	function check(){
		var username	= document.getElementById('form1').username;
		var password	= document.getElementById('form1').password;
		var captcha		= document.getElementById('form1').captcha;
		
		if(username.value==''){
			alert('Username invalid');
			username.focus();
			return false;
		}else{
			if(password.value==''){
				alert('Password invalid');
				password.focus();
				return false;
			}else{
				if(captcha.value==''){
					alert('Captcha invalid');
					captcha.focus();
					return false;
				}else{
					return true;
				}
			}
		}
	}
	
	document.getElementById('form1').username.focus();
</script>
</body>
</html>