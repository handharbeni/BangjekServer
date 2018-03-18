<?php
session_start();
date_default_timezone_set('Asia/Makassar');
require "config/config.php";
require "config/database.php";
require "models/frenchise.php";
require "models/gender.php";
require "models/global_setting.php";
require "models/invoice_francheis.php";
require "models/jenis_transaksi.php";
require "models/kurir.php";
require "models/level.php";
require "models/merchant.php";
require "models/merchant_category.php";
require "models/merchant_menu.php";
require "models/merchant_menu_category.php";
require "models/pelanggan.php";
require "models/room_chat.php";
require "models/staff.php";
require "models/status_setting.php";
require "models/status_transaksi.php";
require "models/tarif.php";
require "models/transaksi.php";

$menu	= isset($_REQUEST['fsa'])?$_REQUEST['fsa']:'';
switch($menu){
	case "frenchise":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_frenchise";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $frenchise->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "frenchise";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_frenchise":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$data['show_gender']	= $gender->showSelect($conn);
		$data['show_status_setting']	= $status_setting->showSelect($conn);
		extract($data);
		require "views/add_frenchise.php";
	break;
	case "insert_frenchise":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $frenchise->insert($conn);
		echo $result;
	break;
	case "select_frenchise":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $frenchise->select($conn,$id);
		$data['show_gender']	= $gender->showSelect($conn);
		$data['show_status_setting']	= $status_setting->showSelect($conn);
		extract($data);
		require "views/select_frenchise.php";
	break;
	case "update_frenchise":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $frenchise->update($conn);
		echo $result;
	break;
	case "delete_frenchise":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $frenchise->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."frenchise.html');</script>";
	break;

	case "gender":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_gender";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $gender->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "gender";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_gender":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		require "views/add_gender.php";
	break;
	case "insert_gender":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $gender->insert($conn);
		echo $result;
	break;
	case "select_gender":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $gender->select($conn,$id);
		extract($data);
		require "views/select_gender.php";
	break;
	case "update_gender":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $gender->update($conn);
		echo $result;
	break;
	case "delete_gender":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $gender->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."gender.html');</script>";
	break;

	case "global_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"nama_setting";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"asc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $global_setting->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "global_setting";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_global_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		require "views/add_global_setting.php";
	break;
	case "insert_global_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $global_setting->insert($conn);
		echo $result;
	break;
	case "select_global_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $global_setting->select($conn,$id);
		extract($data);
		require "views/select_global_setting.php";
	break;
	case "update_global_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $global_setting->update($conn);
		echo $result;
	break;
	case "delete_global_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $global_setting->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."global_setting.html');</script>";
	break;

	case "jenis_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_jenis_transaksi";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $jenis_transaksi->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "jenis_transaksi";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_jenis_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		require "views/add_jenis_transaksi.php";
	break;
	case "insert_jenis_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $jenis_transaksi->insert($conn);
		echo $result;
	break;
	case "select_jenis_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $jenis_transaksi->select($conn,$id);
		extract($data);
		require "views/select_jenis_transaksi.php";
	break;
	case "update_jenis_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $jenis_transaksi->update($conn);
		echo $result;
	break;
	case "delete_jenis_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $jenis_transaksi->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."jenis_transaksi.html');</script>";
	break;

	case "kurir":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_kurir";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $kurir->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "kurir";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_kurir":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$data['show_gender']	= $gender->showSelect($conn);
		$data['show_status_setting']	= $status_setting->showSelect($conn);
		extract($data);
		require "views/add_kurir.php";
	break;
	case "insert_kurir":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $kurir->insert($conn);
		echo $result;
	break;
	case "select_kurir":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $kurir->select($conn,$id);
		$data['show_gender']	= $gender->showSelect($conn);
		$data['show_status_setting']	= $status_setting->showSelect($conn);
		extract($data);
		require "views/select_kurir.php";
	break;
	case "update_kurir":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $kurir->update($conn);
		echo $result;
	break;
	case "delete_kurir":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $kurir->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."kurir.html');</script>";
	break;
	case "bayar_kurir":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $kurir->bayar($conn,$id);
		$result	= $kurir->terbayar($conn,$id);
		echo "<script>location.replace('".$config->base_url()."kurir.html');</script>";
	break;
	case "tutup_kurir":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $kurir->tutup($conn);
		$result	= $kurir->tutup_kurir($conn);
		echo "<script>location.replace('".$config->base_url()."kurir.html');</script>";
	break;

	case "level":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_level";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $level->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "level";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_level":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		require "views/add_level.php";
	break;
	case "insert_level":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $level->insert($conn);
		echo $result;
	break;
	case "select_level":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $level->select($conn,$id);
		extract($data);
		require "views/select_level.php";
	break;
	case "update_level":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $level->update($conn);
		echo $result;
	break;
	case "delete_level":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $level->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."level.html');</script>";
	break;

	case "merchant":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_merchant";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $merchant->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "merchant";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_merchant":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$data['show_merchant_category']	= $merchant_category->showSelect($conn);
		extract($data);
		require "views/add_merchant.php";
	break;
	case "insert_merchant":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $merchant->insert($conn);
		echo $result;
	break;
	case "select_merchant":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $merchant->select($conn,$id);
		$data['show_merchant_category']	= $merchant_category->showSelect($conn);
		extract($data);
		require "views/select_merchant.php";
	break;
	case "update_merchant":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $merchant->update($conn);
		echo $result;
	break;
	case "delete_merchant":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $merchant->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."merchant.html');</script>";
	break;

	case "merchant_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_merchant_category";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $merchant_category->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "merchant_category";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_merchant_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		require "views/add_merchant_category.php";
	break;
	case "insert_merchant_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $merchant_category->insert($conn);
		echo $result;
	break;
	case "select_merchant_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $merchant_category->select($conn,$id);
		extract($data);
		require "views/select_merchant_category.php";
	break;
	case "update_merchant_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $merchant_category->update($conn);
		echo $result;
	break;
	case "delete_merchant_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $merchant_category->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."merchant_category.html');</script>";
	break;

	case "merchant_menu":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_merchant_menu";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $merchant_menu->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "merchant_menu";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_merchant_menu":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$data['show_merchant_menu_category']	= $merchant_menu_category->showSelect($conn);
		extract($data);
		require "views/add_merchant_menu.php";
	break;
	case "insert_merchant_menu":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $merchant_menu->insert($conn);
		echo $result;
	break;
	case "select_merchant_menu":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $merchant_menu->select($conn,$id);
		$data['show_merchant_menu_category']	= $merchant_menu_category->showSelect($conn);
		extract($data);
		require "views/select_merchant_menu.php";
	break;
	case "update_merchant_menu":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $merchant_menu->update($conn);
		echo $result;
	break;
	case "delete_merchant_menu":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $merchant_menu->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."merchant_menu.html');</script>";
	break;

	case "merchant_menu_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_merchant_menu_category";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $merchant_menu_category->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "merchant_menu_category";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_merchant_menu_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		require "views/add_merchant_menu_category.php";
	break;
	case "insert_merchant_menu_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $merchant_menu_category->insert($conn);
		echo $result;
	break;
	case "select_merchant_menu_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $merchant_menu_category->select($conn,$id);
		extract($data);
		require "views/select_merchant_menu_category.php";
	break;
	case "update_merchant_menu_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $merchant_menu_category->update($conn);
		echo $result;
	break;
	case "delete_merchant_menu_category":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $merchant_menu_category->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."merchant_menu_category.html');</script>";
	break;

	case "pelanggan":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_pelanggan";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $pelanggan->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "pelanggan";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_pelanggan":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$data['show_status_setting']	= $status_setting->showSelect($conn);
		extract($data);
		require "views/add_pelanggan.php";
	break;
	case "insert_pelanggan":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $pelanggan->insert($conn);
		echo $result;
	break;
	case "select_pelanggan":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $pelanggan->select($conn,$id);
		$data['show_status_setting']	= $status_setting->showSelect($conn);
		extract($data);
		require "views/select_pelanggan.php";
	break;
	case "update_pelanggan":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $pelanggan->update($conn);
		echo $result;
	break;
	case "delete_pelanggan":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $pelanggan->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."pelanggan.html');</script>";
	break;

	case "room_chat":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_room";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $room_chat->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "room_chat";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_room_chat":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$data['show_transaksi']	= $transaksi->showSelect($conn);
		$data['show_kurir']	= $kurir->showSelect($conn);
		$data['show_pelanggan']	= $pelanggan->showSelect($conn);
		$data['show_merchant']	= $merchant->showSelect($conn);
		$data['show_status_setting']	= $status_setting->showSelect($conn);
		extract($data);
		require "views/add_room_chat.php";
	break;
	case "insert_room_chat":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $room_chat->insert($conn);
		echo $result;
	break;
	case "select_room_chat":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $room_chat->select($conn,$id);
		$data['show_transaksi']	= $transaksi->showSelect($conn);
		$data['show_kurir']	= $kurir->showSelect($conn);
		$data['show_pelanggan']	= $pelanggan->showSelect($conn);
		$data['show_merchant']	= $merchant->showSelect($conn);
		$data['show_status_setting']	= $status_setting->showSelect($conn);
		extract($data);
		require "views/select_room_chat.php";
	break;
	case "update_room_chat":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $room_chat->update($conn);
		echo $result;
	break;
	case "delete_room_chat":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $room_chat->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."room_chat.html');</script>";
	break;

	case "staff":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"user_staff";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $staff->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "staff";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_staff":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$data['show_level']	= $level->showSelect($conn);
		$data['show_gender']	= $gender->showSelect($conn);
		$data['show_status_setting']	= $status_setting->showSelect($conn);
		extract($data);
		require "views/add_staff.php";
	break;
	case "insert_staff":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $staff->insert($conn);
		echo $result;
	break;
	case "select_staff":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $staff->select($conn,$id);
		$data['show_level']	= $level->showSelect($conn);
		$data['show_gender']	= $gender->showSelect($conn);
		$data['show_status_setting']	= $status_setting->showSelect($conn);
		extract($data);
		require "views/select_staff.php";
	break;
	case "update_staff":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $staff->update($conn);
		echo $result;
	break;
	case "delete_staff":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $staff->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."staff.html');</script>";
	break;

	case "status_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"status";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $status_setting->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "status_setting";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_status_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		require "views/add_status_setting.php";
	break;
	case "insert_status_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $status_setting->insert($conn);
		echo $result;
	break;
	case "select_status_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $status_setting->select($conn,$id);
		extract($data);
		require "views/select_status_setting.php";
	break;
	case "update_status_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $status_setting->update($conn);
		echo $result;
	break;
	case "delete_status_setting":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $status_setting->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."status_setting.html');</script>";
	break;

	case "tarif":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_tarif";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $tarif->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "tarif";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_tarif":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$data['show_global_setting']	= $global_setting->showSelect($conn);
		$data['show_frenchise']			= $frenchise->showSelect($conn);
		extract($data);
		require "views/add_tarif.php";
	break;
	case "insert_tarif":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $tarif->insert($conn);
		echo $result;
	break;
	case "select_tarif":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $tarif->select($conn,$id);
		$data['show_global_setting']	= $global_setting->showSelect($conn);
		$data['show_frenchise']			= $frenchise->showSelect($conn);
		extract($data);
		require "views/select_tarif.php";
	break;
	case "update_tarif":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $tarif->update($conn);
		echo $result;
	break;
	case "delete_tarif":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			if($_SESSION['level']!=1){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $tarif->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."tarif.html');</script>";
	break;

	case "transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$page			= isset($_REQUEST['page'])?$_REQUEST['page']:1;
		$limit			= isset($_REQUEST['limit'])?$_REQUEST['limit']:40;
		$field			= isset($_REQUEST['field'])?$_REQUEST['field']:"id_transaksi";
		$order			= isset($_REQUEST['order'])?$_REQUEST['order']:"desc";
		$like			= isset($_REQUEST['like'])?$_REQUEST['like']:"";
		$data['show']	= $transaksi->show($conn,$page,$limit,$field,$order,$like);
		extract($data);
		$page_adj	= "transaksi";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "add_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$data['show_status_setting']	= $status_setting->showSelect($conn);
		$data['show_jenis_transaksi']	= $jenis_transaksi->showSelect($conn);
		$data['show_pelanggan']			= $pelanggan->showSelect($conn);
		$data['show_kurir']				= $kurir->showSelect($conn);
		$data['show_staff']				= $staff->showSelect($conn);
		$data['show_frenchise']			= $frenchise->showSelect($conn);
		
		$data_global	= $global_setting->select($conn,6);
		if(!empty($data_global)){
			$minggu_lebih	= $data_global['nilai'];
		}else{
			$minggu_lebih	= 0;
		}

		$data_global	= $global_setting->select($conn,7);
		if(!empty($data_global)){
			$minggu	= $data_global['nilai'];
		}else{
			$minggu	= 0;
		}

		$data_global	= $global_setting->select($conn,4);
		if(!empty($data_global)){
			$tarif_pagi	= $data_global['nilai'];
		}else{
			$tarif_pagi	= 0;;
		}

		$data_global	= $global_setting->select($conn,1);
		if(!empty($data_global)){
			$tarif_pagi_lebih	= $data_global['nilai'];
		}else{
			$tarif_pagi_lebih	= 0;
		}
		
		$data_global	= $global_setting->select($conn,5);
		if(!empty($data_global)){
			$tarif_malam	= $data_global['nilai'];
		}else{
			$tarif_malam	= 0;
		}

		$data_global	= $global_setting->select($conn,3);
		if(!empty($data_global)){
			$tarif_malam_lebih	= $data_global['nilai'];
		}else{
			$tarif_malam_lebih	= 0;
		}
		
		$data_global	= $global_setting->select($conn,2);
		if(!empty($data_global)){
			$libur	= $data_global['nilai'];
		}else{
			$libur	= 0;
		}

		extract($data);

		if(date("D")=="Sun"||$libur==1){
			$jarak_maks		= 10;
			$kurang_dari	= $minggu;
			$lebih_dari		= $minggu_lebih;
		}else{
			$pagi	= 0;
			if(date("Hi")>800&&date("Hi")<2100){
				$pagi	= 1;
			}

			if($pagi==1){
				$jarak_maks		= 4;
				$kurang_dari	= $tarif_pagi;
				$lebih_dari		= $tarif_pagi_lebih;
			}else{
				$jarak_maks		= 10;
				$kurang_dari	= $tarif_malam;
				$lebih_dari		= $tarif_malam_lebih;
			}
		}

		require "views/add_transaksi.php";
	break;
	case "insert_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $transaksi->insert($conn);
		echo $result;
	break;
	case "select_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$data	= $transaksi->select($conn,$id);
		$data['show_status_transaksi']	= $status_transaksi->showSelect($conn);
		$data['show_status_setting']	= $status_setting->showSelect($conn);
		$data['show_jenis_transaksi']	= $jenis_transaksi->showSelect($conn);
		$data['show_pelanggan']			= $pelanggan->showSelect($conn);
		$data['show_kurir']				= $kurir->showSelect($conn);
		$data['show_staff']				= $staff->showSelect($conn);
		$data['show_frenchise']			= $frenchise->showSelect($conn);
		
		$data_global	= $global_setting->select($conn,6);
		if(!empty($data_global)){
			$minggu_lebih	= $data_global['nilai'];
		}else{
			$minggu_lebih	= 0;
		}

		$data_global	= $global_setting->select($conn,7);
		if(!empty($data_global)){
			$minggu	= $data_global['nilai'];
		}else{
			$minggu	= 0;
		}

		$data_global	= $global_setting->select($conn,4);
		if(!empty($data_global)){
			$tarif_pagi	= $data_global['nilai'];
		}else{
			$tarif_pagi	= 0;;
		}

		$data_global	= $global_setting->select($conn,1);
		if(!empty($data_global)){
			$tarif_pagi_lebih	= $data_global['nilai'];
		}else{
			$tarif_pagi_lebih	= 0;
		}
		
		$data_global	= $global_setting->select($conn,5);
		if(!empty($data_global)){
			$tarif_malam	= $data_global['nilai'];
		}else{
			$tarif_malam	= 0;
		}

		$data_global	= $global_setting->select($conn,3);
		if(!empty($data_global)){
			$tarif_malam_lebih	= $data_global['nilai'];
		}else{
			$tarif_malam_lebih	= 0;
		}
		
		$data_global	= $global_setting->select($conn,2);
		if(!empty($data_global)){
			$libur	= $data_global['nilai'];
		}else{
			$libur	= 0;
		}

		extract($data);

		if(date("D")=="Sun"||$libur==1){
			$jarak_maks		= 10;
			$kurang_dari	= $minggu;
			$lebih_dari		= $minggu_lebih;
		}else{
			$pagi	= 0;
			if(date("Hi")>800&&date("Hi")<2100){
				$pagi	= 1;
			}

			if($pagi==1){
				$jarak_maks		= 4;
				$kurang_dari	= $tarif_pagi;
				$lebih_dari		= $tarif_pagi_lebih;
			}else{
				$jarak_maks		= 10;
				$kurang_dari	= $tarif_malam;
				$lebih_dari		= $tarif_malam_lebih;
			}
		}
		require "views/select_transaksi.php";
	break;
	case "update_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$result	= $transaksi->update($conn);
		echo $result;
	break;
	case "delete_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$id		= $_REQUEST['param1'];
		$result	= $transaksi->delete($conn,$id);
		echo "<script>location.replace('".$config->base_url()."transaksi.html');</script>";
	break;
	case "laporan_transaksi":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}
		
		$data['status_transaksi']	= $status_transaksi->showSelect($conn);
		$data['show_kurir']			= $kurir->showSelect($conn);
		extract($data);
		require "views/laporan_transaksi.php";
	break;
	case "process_laporan":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$data['show']	= $transaksi->laporan($conn);
		extract($data);
		require "views/laporan_transaksi_print.php";
	break;

	case "upload_foto":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		require('models/UploadHandler.php');
		$upload_handler = new UploadHandler();
	break;
	case "jarak":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}

		$lokasi_ambil	= $_REQUEST['param1'];
		$lokasi_kirim	= $_REQUEST['param2'];

		$lokasi_ambil	= base64_decode($lokasi_ambil);
		$lokasi_kirim	= base64_decode($lokasi_kirim);

		$lokasi_ambil	= str_replace(" ","%20",$lokasi_ambil);
		$lokasi_kirim	= str_replace(" ","%20",$lokasi_kirim);

		$data = @json_decode(file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$lokasi_ambil&destinations=$lokasi_kirim&key=".$config->google_maps_api()));
		if(!empty($data)){
			if($data->rows[0]->elements[0]->status=="NOT_FOUND"){
				echo 0;
			}else{
				$distance = $data->rows[0]->elements[0]->distance->value;
				$distance = ceil($distance / 1000);
				echo $distance;
			}
		}else{
			echo 0;
		}
	break;
	case "harga_perkm":
		$lat			= $_REQUEST['param2'];
		$lon			= $_REQUEST['param3'];
		$id_frenchise	= $frenchise->showFrenchise($conn,$lat,$lon);

		$data_global	= $global_setting->select($conn,6);
		if(!empty($data_global)){
			$minggu_lebih	= $data_global['nilai'];
		}else{
			$minggu_lebih	= 0;
		}

		$data_global	= $global_setting->select($conn,7);
		if(!empty($data_global)){
			$minggu	= $data_global['nilai'];
		}else{
			$minggu	= 0;
		}

		$data_global	= $global_setting->select($conn,4);
		if(!empty($data_global)){
			$tarif_pagi	= $data_global['nilai'];
		}else{
			$tarif_pagi	= 0;;
		}

		$data_global	= $global_setting->select($conn,1);
		if(!empty($data_global)){
			$tarif_pagi_lebih	= $data_global['nilai'];
		}else{
			$tarif_pagi_lebih	= 0;
		}
		
		$data_global	= $global_setting->select($conn,5);
		if(!empty($data_global)){
			$tarif_malam	= $data_global['nilai'];
		}else{
			$tarif_malam	= 0;
		}

		$data_global	= $global_setting->select($conn,3);
		if(!empty($data_global)){
			$tarif_malam_lebih	= $data_global['nilai'];
		}else{
			$tarif_malam_lebih	= 0;
		}
		
		$data_global	= $global_setting->select($conn,2);
		if(!empty($data_global)){
			$libur	= $data_global['nilai'];
		}else{
			$libur	= 0;
		}

		if(date("D")=="Sun"||$libur==1){
			$jarak_maks		= 10;
			$kurang_dari	= $minggu;
			$lebih_dari		= $minggu_lebih;
		}else{
			$pagi	= 0;
			if(date("Hi")>800&&date("Hi")<2100){
				$pagi	= 1;
			}

			if($pagi==1){
				$jarak_maks		= 4;
				$kurang_dari	= $tarif_pagi;
				$lebih_dari		= $tarif_pagi_lebih;
			}else{
				$jarak_maks		= 10;
				$kurang_dari	= $tarif_malam;
				$lebih_dari		= $tarif_malam_lebih;
			}
		}

		if($id_frenchise>1){
			$data_global	= $tarif->select2($conn,$id_frenchise,6);
			if(!empty($data_global)){
				$minggu_lebih	= $data_global['nilai'];
			}else{
				$minggu_lebih	= 0;
			}

			$data_global	= $tarif->select2($conn,$id_frenchise,7);
			if(!empty($data_global)){
				$minggu	= $data_global['nilai'];
			}else{
				$minggu	= 0;
			}

			$data_global	= $tarif->select2($conn,$id_frenchise,4);
			if(!empty($data_global)){
				$tarif_pagi	= $data_global['nilai'];
			}else{
				$tarif_pagi	= 0;;
			}

			$data_global	= $tarif->select2($conn,$id_frenchise,1);
			if(!empty($data_global)){
				$tarif_pagi_lebih	= $data_global['nilai'];
			}else{
				$tarif_pagi_lebih	= 0;
			}
			
			$data_global	= $tarif->select2($conn,$id_frenchise,5);
			if(!empty($data_global)){
				$tarif_malam	= $data_global['nilai'];
			}else{
				$tarif_malam	= 0;
			}

			$data_global	= $tarif->select2($conn,$id_frenchise,3);
			if(!empty($data_global)){
				$tarif_malam_lebih	= $data_global['nilai'];
			}else{
				$tarif_malam_lebih	= 0;
			}
			
			$data_global	= $tarif->select2($conn,$id_frenchise,2);
			if(!empty($data_global)){
				$libur	= $data_global['nilai'];
			}else{
				$libur	= 0;
			}

			if(date("D")=="Sun"||$libur==1){
				$jarak_maks		= 10;
				$kurang_dari	= $minggu;
				$lebih_dari		= $minggu_lebih;
			}else{
				$pagi	= 0;
				if(date("Hi")>800&&date("Hi")<2100){
					$pagi	= 1;
				}

				if($pagi==1){
					$jarak_maks		= 4;
					$kurang_dari	= $tarif_pagi;
					$lebih_dari		= $tarif_pagi_lebih;
				}else{
					$jarak_maks		= 10;
					$kurang_dari	= $tarif_malam;
					$lebih_dari		= $tarif_malam_lebih;
				}
			}
		}
		
		$jarak	= $_REQUEST['param1'];
		if($jarak < $jarak_maks){
			echo $kurang_dari;
		}else{
			echo ($jarak * $lebih_dari);
		}
	break;
	
	case "process":
		$total = $_SESSION['one']+$_SESSION['two'];
		if($_POST['captcha']!=$total){
			echo "<script>alert('Captcha Failed.');location.replace('".$config->base_url()."signin.html');</script>";
		}else{
			$username	= $_POST['username'];
			$password	= $_POST['password'];

			$staff->login($conn,$username,$password);
			if(isset($_SESSION['level'])){
				echo "<script>location.replace('".$config->base_url()."transaksi.html');</script>";
			}else{
				echo "<script>alert('Login Failed.');location.replace('".$config->base_url()."signin.html');</script>";
			}
		}
	break;
	case "image":
		$_SESSION['one'] = rand(0,10);
		$_SESSION['two'] = rand(0,10);
		echo $_SESSION['one']." + ".$_SESSION['two']." = ?";
		// require "views/image.php";
		// $im = imagecreate(120, 30);
		// $bg = imagecolorallocate($im, rand(200,255), rand(200,255), rand(200,255));
		// $textcolor = imagecolorallocate($im, rand(0,100), rand(0,100), rand(0,100));
		// imagestring($im, 5, 16, 8, $_SESSION['one']." + ".$_SESSION['two']." = ?", $textcolor);
		// header('Content-type: image/png');
		// imagepng($im);
		// imagedestroy($im);
	break;
	case "signin":
		require "views/signin.php";
	break;
	case "signout":
		session_destroy();
		echo "<script>location.replace('".$config->base_url()."signin.html');</script>";
	break;
	case "slider":
		if($config->browser2()!=1){
			exit;
		}
		require "views/slider.php";
	break;
	case "process_user_login":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(isset($_SESSION['pelanggan'])){
			$data = array(
				"found"	=> "1",
				"data"	=> $_SESSION['pelanggan']
			);
			echo json_encode($data);
		}else{
			$data = array(
				"found"	=> "0",
				"data"	=> ""
			);
			echo json_encode($data);
		}
	break;
	case "process_update_user":
		if($config->browser()!=1){
			exit;
		}
		if($pelanggan->user_update($conn)){
			$data = array(
				"found"	=> "1"
			);
			echo json_encode($data);
		}else{
			$data = array(
				"found"	=> "0"
			);
			echo json_encode($data);
		}
	break;
	case  "process_insert_user":
		if($config->browser()!=1){
			exit;
		}
		$data = array(
			"found"	=> $pelanggan->user_insert($conn)
		);
		echo json_encode($data);
		// echo $pelanggan->user_insert($conn);
	break;
	case "history":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(isset($_SESSION['pelanggan'])){
			echo json_encode($transaksi->history($conn));
		}else{
			echo json_encode(array("json_history"	=> array()));
		}
	break;
	case "maps":
		if($config->browser2()!=1){
			exit;
		}
		$awal	= $_REQUEST['param1'];
		$akhir	= $_REQUEST['param2'];

		$awal	= str_replace('-','+',$awal);
		$akhir	= str_replace('-','+',$akhir);
		$awal	= str_replace('_','/',$awal);
		$akhir	= str_replace('_','/',$akhir);
		
		$awal	= base64_decode($awal);
		$akhir	= base64_decode($akhir);

		$google_maps_api	= $config->google_maps_api();
		require "views/maps.php";
	break;
	case "jarak_from_app":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(!isset($_SESSION['pelanggan'])){
			echo 0;
			exit;
		}
		$awal	= $_REQUEST['param1'];
		$akhir	= $_REQUEST['param2'];

		$awal	= str_replace('-','+',$awal);
		$akhir	= str_replace('-','+',$akhir);
		$awal	= str_replace('_','/',$awal);
		$akhir	= str_replace('_','/',$akhir);
		
		$awal	= base64_decode($awal);
		$akhir	= base64_decode($akhir);

		// $lokasi_ambil = $awal;
		// $lokasi_kirim = $akhir;

		$lokasi_ambil	= str_replace(" ","%20",$awal);
		$lokasi_kirim	= str_replace(" ","%20",$akhir);
		$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$lokasi_ambil&destinations=$lokasi_kirim&key=".$config->google_maps_api();
		$data = json_decode(file_get_contents($url));
		// print_r($url);
		// print_r($data);
		if(!empty($data)){
			if($data->rows[0]->elements[0]->status=="NOT_FOUND"){
				echo 0;
			}else{
				$distance = $data->rows[0]->elements[0]->distance->value;
				$distance = ceil($distance / 1000);
				echo $distance;
			}
		}else{
			echo 0;
		}
	break;
	case "get_address":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(!isset($_SESSION['pelanggan'])){
			echo 0;
			exit;
		}
		$lat	= $_REQUEST['param1'];
		$lon	= $_REQUEST['param2'];
		$data = @json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&sensor=false"));
		if(!empty($data)){
			if(!empty($data->results)){
				echo $data->results[0]->address_components[0]->long_name;
			}
		}
	break;
	case "transaksi_from_app":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(!isset($_SESSION['pelanggan'])){
			echo 0;
			exit;
		}
		$lat			= $_POST['lat'];
		$lon			= $_POST['lon'];
		$id_frenchise	= $frenchise->showFrenchise($conn,$lat,$lon);
		$result	= $transaksi->insertFromApp($conn,$id_frenchise);
		if($result){
			echo 1;
		}else{
			echo 0;
		}
	break;
	case "batal_pesan":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(!isset($_SESSION['pelanggan'])){
			echo 0;
			exit;
		}
		$kode_transaksi	= $_POST['kode_transaksi']*1;
		$result	= $transaksi->batal($conn,$kode_transaksi);
		if($result){
			echo 1;
		}else{
			echo 0;
		}
	break;
	case "cari":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(!isset($_SESSION['pelanggan'])){
			echo 0;
			exit;
		}
		$id_category	= isset($_POST['category'])?$_POST['category']:"1,2";
		$result	= $merchant_menu->json($conn,$id_category);
		echo json_encode($result);
	break;
	case "merchant_list":
		// if($config->browser()!=1){
			// exit;
		// }
		// $pelanggan->user_login($conn);
		// if(!isset($_SESSION['pelanggan'])){
			// echo 0;
			// exit;
		// }
		$id_category	= isset($_POST['category'])?$_POST['category']:"1,2";
		$result	= $merchant_menu->json_category($conn,$id_category);
		echo json_encode($result);
	break;
	case "gambar":
		if($config->browser2()!=1){
			exit;
		}
		$url	= $_REQUEST['param1'];
		$url	= str_replace('-','+',$url);
		$url	= str_replace('_','/',$url);
		$url	= base64_decode($url);
		require "views/gambar.php";
	break;
	case "still_transaction":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(!isset($_SESSION['pelanggan'])){
			echo 0;
			exit;
		}
		$data	= 0;
		// $data	= $transaksi->still_transaction($conn);
		echo $data;
	break;
	case "jumlah_job":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir($conn);
		if($data=="1"){
			echo $transaksi->jumlah_job($conn);
		}else{
			echo 0;
		}
	break;
	case "job":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir($conn);
		if($data=="1"){
			echo json_encode($transaksi->job($conn));
		}else{
			echo json_encode(array("json_history"	=> array(),"data"=>$data));
		}
	break;
	case "ambil_job":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir($conn);
		if($data=="1"){
			echo $transaksi->ambil_job($conn);
		}else{
			echo 0;
		}
	break;
	case "history_kurir":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir($conn);
		if($data=="1"){
			echo json_encode($transaksi->history_kurir($conn));
		}else{
			echo json_encode(array("json_history"	=> array()));
		}
	break;
	case "batal_pesan_kurir":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir($conn);
		if($data=="1"){
			$kode_transaksi	= $_POST['kode_transaksi']*1;
			$result	= $transaksi->batal_kurir($conn,$kode_transaksi);
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	break;
	case "selesai_pesan_kurir":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir($conn);
		if($data=="1"){
			$kode_transaksi	= $_POST['kode_transaksi']*1;
			$result	= $transaksi->selesai_kurir($conn,$kode_transaksi);
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	break;
	case "get_job_status":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir($conn);
		if($data=="1"){
			$result	= $transaksi->get_job_status($conn);
			if($result>0){
				echo 0;
			}else{
				echo 1;
			}
		}else{
			echo 1;
		}
	break;
	case "ambil_tagihan":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir2($conn);
		if(strlen($_SESSION['id_kurir'])>0){
			echo json_encode($kurir->tagihan($conn));
		}else{
			echo json_encode(array());
		}
	break;
	case "status_history":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(!isset($_SESSION['pelanggan'])){
			echo 0;
			exit;
		}
		echo $transaksi->status_history($conn);
	break;
	case "checknotelp":
		$data	= $kurir->checknotelp($conn);
		if(empty($data)){
			echo "0";
		}else{
			echo "1";
		}
	break;
	case "check_deteksi_google":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}
		$data = $transaksi->latlng($conn,$_REQUEST['param1']);
		if($data!="0,0"){
			$temp	= explode(",",$data);
			if($temp[0]!="0"&&$temp[1]!="0"){
				echo "1";
			}else{
				echo "0";
			}
		}else{
			echo "0";
		}
	break;
	case "statistik":
		if(!isset($_SESSION['level'])){
			header("location:".$config->base_url()."signin.html");
		}else{
			$allow_for	= array(1,2,3);
			if(!in_array($_SESSION['level'],$allow_for)){
				header("location:".$config->base_url()."signin.html");
			}
		}
		$id_frenchise	= 1;
		$data_daily		= $transaksi->getDailySupport($conn,$id_frenchise);
		$data_monthly	= $transaksi->getMonthlySupport($conn,$id_frenchise);
		$data_yearly	= $transaksi->getYearlySupport($conn,$id_frenchise);
		$page_adj	= "statistik";
		$page_atr	= "";
		require "views/admin.php";
	break;
	case "profile_francheis":
		$id_frenchise	= 1;
		$profile		= $frenchise->select($conn,$id_frenchise);
		$dttarif		= $tarif->frenchise($conn,$id_frenchise);
		$data_monthly	= $transaksi->getMonthlySupport($conn,$id_frenchise);

		$selesai		= $transaksi->getTransactionData($conn,3,$id_frenchise);
		$terbayar		= $transaksi->getTransactionData($conn,7,$id_frenchise);

		$invoice_francheis->update($conn,$id_frenchise);
		$income			= $invoice_francheis->getNominal($conn,$id_frenchise);
		$data			= $invoice_francheis->show($conn,$id_frenchise);
		
		require "views/halaman_frenchise.php";
	break;
	case "update_token":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir($conn);
		if($data=="1"){
			if($kurir->updateToken($conn)){
				echo "1";
			}else{
				echo "0";
			}
		}
	break;
	case "update_token2":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(!isset($_SESSION['pelanggan'])){
			echo 0;
			exit;
		}else{
			if($pelanggan->updateToken($conn)){
				echo "1";
			}else{
				echo "0";
			}
		}
	break;
	case "get_chat":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir($conn);
		if($data=="1"){
			$data	= $room_chat->get_chat($conn,$_SESSION['id_kurir'],0);
			$to_user= $pelanggan->select($conn,$data[1]);
			echo json_encode(array('json_chat'=>$data[0],'to_user'=>$to_user['token'],'nama'=>$data[2]));
		}
	break;
	case "get_chat2":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(!isset($_SESSION['pelanggan'])){
			echo 0;
			exit;
		}else{
			$data	= $room_chat->get_chat($conn,$_SESSION['pelanggan']['id_pelanggan'],1);
			$to_user= $kurir->select($conn,$data[1]);
			echo json_encode(array('json_chat'=>$data[0],'to_user'=>$to_user['token'],'nama'=>$data[2]));
		}
	break;
	case "tambah_chat":
		if($config->browser()!=1){
			exit;
		}
		$data	= $kurir->checkkurir($conn);
		if($data=="1"){
			$trans	= $transaksi->select($conn,$_POST['kode']*1);
			$data	= $room_chat->tambah_chat($conn,$trans['id_kurir'],$trans['id_pelanggan']);
			if($data){
				echo 1;
			}else{
				echo 0;
			}
		}
	break;
	case "tambah_chat2":
		if($config->browser()!=1){
			exit;
		}
		$pelanggan->user_login($conn);
		if(!isset($_SESSION['pelanggan'])){
			echo 0;
			exit;
		}else{
			$trans	= $transaksi->select($conn,$_POST['kode']*1);
			$data	= $room_chat->tambah_chat($conn,$trans['id_kurir'],$trans['id_pelanggan']);
			if($data){
				echo 1;
			}else{
				echo 0;
			}
		}
	break;
	case "maintenance_status":
		if($config->browser()!=1){
			exit;
		}
		echo "0";
	break;
	case "maintenance":
		if($config->browser2()!=1){
			exit;
		}
		echo "Sedang Maintenance";
	break;
	case "help_profile":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_profile";
	break;
	case "help_history":
		if($config->browser2()!=1){
			exit;
		}
		echo "
		<b>Bantuan History</b></br>
		<ol>
			<li>History adalah menu yang menunjukaan aktifitas Anda.</li>
			<li>Status transaksi pemesanan bisa dilihat dibawah nomor transaksi.</li>
			<li>Semua data lengkap tertulis di bagian konten isi.</li>
			<li>Total tidak menghitung biaya item.</li>
			<li>Biaya item disebutkan dalam bentuk estimasi biaya.</li>
			<li>Contoh : jika ada harga item semisal Ayam Bakar dengan harga Rp. 25.000,-</li>
			<li>Maka estimasi item adalah Rp. 50.000,- (Rp. 50.000,- adalah uang yang dibawa oleh kurir sebagai pegangan bahwa harga item tidak lebih dari nominal tersebut. nominal estimasi berlaku kelipatan Rp. 50.000,-)</li>
			<li>Ketika item diantar maka, pelanggan hanya akan membayar sesuai biaya item saja yaitu Rp. 25.000,- (tegantung ada atau tidaknya kenaikan harga, dan kami sarankan Pelanggan membayar sesuai struk dari tempat pembelian)</li>
			<li>Setelah harga item didapatkan. maka yang selanjutnya dibayar adalah biaya kirim. biaya kirim merupakan [Total] yang tertera pada detail history.</li>
			<li>Pelanggan : Membayar biaya item + biaya kirim.</li>
			<li>Kurir : Mendapatkan biaya item + biaya kirim.</li>
		</ol>
		";
	break;
	case "help_argo":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_argo";
	break;
	case "help_pesan_makanan":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_pesan_makanan";
	break;
	case "help_belanja":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_belanja";
	break;
	case "help_kurir_dan_kargo":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_kurir_dan_kargo";
	break;
	case "help_food_court_list":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_food_court_list";
	break;
	case "help_permission":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_permission";
	break;
	case "help_pemesanan":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_permission";
	break;
	case "help_item":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_item";
	break;
	case "help_ticket":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_ticket";
	break;
	case "help_job":
		if($config->browser2()!=1){
			exit;
		}
		echo "
		<b>Bantuan Job</b></br>
		<ol>
			<li>Aplikasi ini akan otomatis mencari job</li>
			<li>Biarkan saja aplikasi dalam keaadaan menyala jika Anda ingin mencari job</li>
			<li>Pada awal membuka job, Anda akan diberitahu apakah akun Anda masih aktif atau tidak di menu tagihan.</li>
			<li>Jika status anda [Aktif] maka Anda bisa mengambil job, jika statusnya [Non-Aktif] maka Anda harus menghubungi Customer Service</li>
			<li>Job yang diambil bisa saja diambil oleh driver lain yang lebih dahulu menekan tombol ambil.</li>
			<li>Jika driver lain sudah mengambil, maka Anda harus memilih job lainnya.</li>
			<li>Job baru akan muncul setelah Anda menekan tombol [Ada update job baru]. Disertai suara notifikasi</li>
			<li>History, adalah menu yang menunjukan status job yang Anda kerjakan saat ini.</li>
			<li>Anda hanya bisa menjalankan 1 job dalam satu waktu.</li>
		</ol>
		";
	break;
	case "help_tagihan":
		if($config->browser2()!=1){
			exit;
		}
		echo "
		<b>Bantuan Tagihan</b></br>
		<ol>
			<li>Tagihan adalah menu yang menunjukan status Anda sebagai mitra driver BangJeck.</li>
			<li>Jika status Anda non-Aktif, maka segera hubungi Customer Service, karna Anda tidak akan bisa mengambil job.</li>
			<li>Status Non-Aktif bisa berarti karena Anda belum membayar tagihan, atau Anda dalam masa suspend.</li>
			<li>Akan tetapi jika Anda tidak merasa dalam kondisi tersebut, Anda bisa meminta Customer Service untuk meng[Aktif]kan akun Anda.</li>
		</ol>
		";
	break;
	case "help_chat":
		if($config->browser2()!=1){
			exit;
		}
		echo "help_chat";
	break;
	case "privacy_policy":
		if($config->browser2()!=1){
			exit;
		}
		echo "privacy_policy";
	break;
	case "policy_kurir":
		if($config->browser2()!=1){
			exit;
		}
		echo "privacy_policy";
	break;
	case "test":
		
	break;
	case "isi":
		echo isset($_SESSION['test'])?"ada nih":"ga ada :(";
	break;
	default:
		if(isset($_SESSION['level'])){				
			require "views/admin.php";
		}else{
			header("location:".$config->base_url()."signin.html");
		}
	break;
}
?>