<html>
<head>
<title>BangJeck | Panel</title><meta name="theme-color" content="#354052">
<link href="<?php echo $config->base_url();?>css/admin.css" rel="stylesheet">
<link href="<?php echo $config->base_url();?>css/statistic.css" rel="stylesheet"/>
<script src="<?php echo $config->base_url();?>js/jquery-3.2.1.js"></script>
<script src="<?php echo $config->base_url();?>js/jquery.ui.widget.js"></script>
<script src="<?php echo $config->base_url();?>js/jquery.fileupload.js"></script>
<script src="<?php echo $config->base_url();?>js/jquery.base64.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $config->base_url();?>css/jquery.datetimepicker.css"/>
<script src="<?php echo $config->base_url();?>build/jquery.datetimepicker.full.js"></script>
</head>
<body>
<div id="wrapper-dialog">
	<div id="dialog">
		<div id="titlebar">
			<div id="titledialog"><?php if(isset($page_adj)){$title = str_replace("_"," ",$page_adj); echo ucwords($title);}?></div>
			<div id="closedialog">X</div>
		</div>
		<div id="contentdialog"></div>
	</div>
</div>
<div id="wrapper">
	<div id="menu">
		<div class="menu-content separate all-padding">
			<div id="menu-photo" style="background-image: url('<?php echo $_SESSION['foto'];?>');"></div>
			<div id="name"><?php echo isset($_SESSION['nama'])?$_SESSION['nama']:"BangJeck Staff";?></div>
			<center><a href="<?php echo $config->base_url();?>signout.html" onclick="return confirm('Sign Out?');">Sign Out</a></center>
		</div>

		<?php
			$allow_for	= array(1);
			if(in_array($_SESSION['level'],$allow_for)){
		?>

		<div class="menu-content separate vertical-padding category">
			<div class="menu-title">Hidden</div>
			<a href="<?php $config->base_url();?>gender.html">
				<div class="menu-link <?php if($page_adj=="gender"){echo "active-link";}?>">
					Gender
				</div>
			</a>
			<a href="<?php $config->base_url();?>level.html">
				<div class="menu-link <?php if($page_adj=="level"){echo "active-link";}?>">
					Level
				</div>
			</a>
			<a href="<?php $config->base_url();?>status_setting.html">
				<div class="menu-link <?php if($page_adj=="status_setting"){echo "active-link";}?>">
					Status Setting
				</div>
			</a>
		</div>

		<?php }?>

		<div class="menu-content separate vertical-padding category">
			<div class="menu-title">Master</div>

			<?php
				$allow_for	= array(1,2,3);
				if(in_array($_SESSION['level'],$allow_for)){
			?>

			<a href="<?php $config->base_url();?>global_setting.html">
				<div class="menu-link <?php if($page_adj=="global_setting"){echo "active-link";}?>">
					Global Setting
				</div>
			</a>

			<?php }?>
			<?php
				$allow_for	= array(1,2);
				if(in_array($_SESSION['level'],$allow_for)){
			?>

			<a href="<?php $config->base_url();?>jenis_transaksi.html">
				<div class="menu-link <?php if($page_adj=="jenis_transaksi"){echo "active-link";}?>">
					Jenis Transaksi
				</div>
			</a>

			<?php }?>
			<?php
				$allow_for	= array(1,2,3);
				if(in_array($_SESSION['level'],$allow_for)){
			?>

			<a href="<?php $config->base_url();?>kurir.html">
				<div class="menu-link <?php if($page_adj=="kurir"){echo "active-link";}?>">
					Kurir
				</div>
			</a>

			<?php }?>
			<?php
				$allow_for	= array(1,2,3);
				if(in_array($_SESSION['level'],$allow_for)){
			?>
			
			<a href="<?php $config->base_url();?>pelanggan.html">
				<div class="menu-link <?php if($page_adj=="pelanggan"){echo "active-link";}?>">
					Pelanggan
				</div>
			</a>

			<?php }?>
			<?php
				$allow_for	= array(1,2);
				if(in_array($_SESSION['level'],$allow_for)){
			?>

			<a href="<?php $config->base_url();?>staff.html">
				<div class="menu-link <?php if($page_adj=="staff"){echo "active-link";}?>">
					Staff
				</div>
			</a>

			<?php }?>
			<?php
				$allow_for	= array(1,2);
				if(in_array($_SESSION['level'],$allow_for)){
			?>

			<a href="<?php $config->base_url();?>frenchise.html">
				<div class="menu-link <?php if($page_adj=="frenchise"){echo "active-link";}?>">
					Franchies
				</div>
			</a>

			<?php }?>
			<?php
				$allow_for	= array(1,2,3);
				if(in_array($_SESSION['level'],$allow_for)){
			?>

			<a href="<?php $config->base_url();?>tarif.html">
				<div class="menu-link <?php if($page_adj=="tarif"){echo "active-link";}?>">
					Tarif
				</div>
			</a>

			<?php }?>

		</div>
		<div class="menu-content separate vertical-padding category">
			<div class="menu-title">Merchant</div>

			<?php
				$allow_for	= array(1,2,3);
				if(in_array($_SESSION['level'],$allow_for)){
			?>

			<a href="<?php $config->base_url();?>merchant_category.html">
				<div class="menu-link <?php if($page_adj=="merchant_category"){echo "active-link";}?>">
					Category
				</div>
			</a>

			<?php }?>
			<?php
				$allow_for	= array(1,2,3);
				if(in_array($_SESSION['level'],$allow_for)){
			?>

			<a href="<?php $config->base_url();?>merchant.html">
				<div class="menu-link <?php if($page_adj=="merchant"){echo "active-link";}?>">
					Merchant
				</div>
			</a>

			<?php }?>
			<?php
				$allow_for	= array(1,2,3);
				if(in_array($_SESSION['level'],$allow_for)){
			?>

			<a href="<?php $config->base_url();?>merchant_menu_category.html">
				<div class="menu-link <?php if($page_adj=="merchant_menu_category"){echo "active-link";}?>">
					Menu Category
				</div>
			</a>

			<?php }?>
			<?php
				$allow_for	= array(1,2,3);
				if(in_array($_SESSION['level'],$allow_for)){
			?>

			<a href="<?php $config->base_url();?>merchant_menu.html">
				<div class="menu-link <?php if($page_adj=="merchant_menu"){echo "active-link";}?>">
					Menu
				</div>
			</a>

			<?php }?>

		</div>
		<div class="menu-content separate vertical-padding">
			<div class="menu-title">Transaksi</div>
			<a href="<?php $config->base_url();?>transaksi.html">
				<div class="menu-link <?php if($page_adj=="transaksi"){echo "active-link";}?>">
					Transaksi
				</div>
			</a>
			<a href="<?php $config->base_url();?>statistik.html">
				<div class="menu-link <?php if($page_adj=="statistik"){echo "active-link";}?>">
					Statistik
				</div>
			</a>
			<a href="<?php $config->base_url();?>room_chat.html">
				<div class="menu-link <?php if($page_adj=="room_chat"){echo "active-link";}?>">
					Room Chat
				</div>
			</a>

			<?php //require "admin_menu.php";?>

		</div>
	</div>
	<div id="content">
		<div id="widget">
			<div id="main-menu"></div>
			<form id="search" action="#" method="post">
				<input type="text" name="search" placeholder="Search">
			</form>
		</div>
		<div id="main-content">
			<div id="main-title"><?php if(isset($page_adj)){$title = str_replace("_"," ",$page_adj); echo ucwords($title);}?></div>
			<div id="sub-menu">

				<?php
				if(isset($page_adj)){
					if($page_adj=="kurir"){
				?>

				<a href="<?php echo $config->base_url();?>tutup_kurir.html" onclick="return confirm('Anda akan menutup transaksi?');">
					<div class="button">Tutup Transaksi</div>
				</a>

				<?php
					}else if($page_adj=="transaksi"){
				?>

				<a href="#" id="laporan">
					<div class="button">Laporan Transaksi</div>
				</a>
				
				<?php
					}
				}
				?>

				<a href="<?php echo $config->base_url().$page_adj;?>.html">
					<div class="button active-menu">Show</div>
				</a>

				<?php
				if(isset($page_adj)){
					$show_tambah = false;
					switch($page_adj){
						case "global_setting":
							$allow_for	= array(1);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "jenis_transaksi":
							$allow_for	= array(1);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "kurir":
							$allow_for	= array(1,2);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "pelanggan":
							$allow_for	= array(1,2,3);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "staff":
							$allow_for	= array(1,2);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "frenchise":
							$allow_for	= array(1,2);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "tarif":
							$allow_for	= array(1);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "tarif":
							$allow_for	= array(1);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "merchant_category":
							$allow_for	= array(1,2);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "merchant":
							$allow_for	= array(1,2,3);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "merchant_menu":
							$allow_for	= array(1,2,3);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "merchant_menu_category":
							$allow_for	= array(1,2,3);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
						case "transaksi":
							$allow_for	= array(1,2,3);
							if(in_array($_SESSION['level'],$allow_for)){
								$show_tambah	= true;
							}
						break;
					}
					
					if($show_tambah){
				?>

				<div id="tambah">
					<div class="button">Tambah</div>
				</div>

				<?php
					}
				}
				?>

				<a href="#" id="print">
					<div class="button">Print</div>
				</a>
			</div>
			<div style="clear: both;"></div>
		</div>
		<div id="content-table">
			<div id="content-parser">

			<?php
				if(isset($page_adj)){
					require "views/".$page_atr.$page_adj.".php";
				}
			?>

			</div>
		</div>
	</div>
</div>

<?php if(isset($page_adj)){?>

<script>
$(document).ready(function(){
	$('#laporan').click(function(){
		$('#wrapper-dialog').fadeIn('slow');
		$('#titledialog').html('Laporan');
		$('#contentdialog').load('<?php echo $config->base_url();?>laporan_transaksi.html');
	});
	$('#tambah').click(function(){
		$('#wrapper-dialog').fadeIn('slow');
		$('#titledialog').html('Insert <?php if(isset($page_adj)){$title = str_replace("_"," ",$page_adj); echo ucwords($title);}?>');
		$('#contentdialog').load('<?php echo $config->base_url();?>add_<?php echo $page_adj;?>.html');
	});
	$('.ubah').click(function(){
		$('#wrapper-dialog').fadeIn('slow');
		$('#titledialog').html('Update <?php if(isset($page_adj)){$title = str_replace("_"," ",$page_adj); echo ucwords($title);}?>');
		$('#contentdialog').load(this.href);
		return false;
	});
	$('#closedialog').click(function(){
		$('#wrapper-dialog').fadeOut('slow');
	});
	$('#content-table').css({"height":(window.innerHeight-200)+"px"});
	$('.foto').click(function(){
		$('#wrapper-dialog').fadeIn('slow');
		$('#titledialog').html('Foto');
		$('#contentdialog').html('<center><img src="'+this.href+'" height="200px"></center>');
		return false;
	});
	
	var status_main = 0;
	$('#main-menu').click(function(){
		if(status_main==0){
			$('#menu').fadeOut(0,function(){
				$('#content').css({"margin-left":"0px"});
				status_main	= 1;
			});
		}else{
			$('#menu').fadeIn(0,function(){
				$('#content').css({"margin-left":"200px"});
				status_main	= 0;
			});
		}
	});
});
</script>

<?php }?>

</body>
</html>