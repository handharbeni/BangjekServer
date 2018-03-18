<html>
<head>
<title>BangJeck | User Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo $config->base_url();?>css/user_login.css" rel="stylesheet">
<script src="<?php echo $config->base_url();?>js/jquery-3.2.1.js"></script>
</head>
<body>
<div id="wrapper">
	<center>
	<form id="form1" action="<?php echo $config->base_url();?>process_user_login.html" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<td>Nomor Telefon</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="user" placeholder="628xxxxxx">
				</td>
			</tr>
			<tr>
				<td>Password</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="password" placeholder="Password">
				</td>
			</tr>
		</table>
	</form>
	</center>
</div>
<script>
document.getElementById('form1').user.focus();
</script>
</body>
</html>