<?php
class merchant_menu extends config{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			merchant_menu.id_merchant_menu,
			merchant_menu.merchant_menu,
			merchant_menu.id_merchant_menu_category,
			merchant_menu_category.merchant_menu_category,
			merchant_menu.photo,
			merchant_menu.price,
			merchant_menu.discount,
			merchant_menu.discount_variant,
			merchant_menu.description,
			FROM_UNIXTIME(merchant_menu.date_add) AS date_add,
			merchant_menu.deleted
		FROM
			merchant_menu
		LEFT JOIN
			merchant_menu_category ON
			merchant_menu.id_merchant_menu_category = merchant_menu_category.id_merchant_menu_category
		WHERE
			merchant_menu.deleted = '0' AND
			$field LIKE '%$like%'
		ORDER BY
			".$field." ".$order."
		LIMIT ".$start.",".$limit;

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				while($rec = $result->fetch_assoc()){
					$record[]	= $rec;
				}
			}
		}
		return $record;
	}
	function showSelect($conn){
		$sql	= "
		SELECT
			merchant_menu.id_merchant_menu,
			merchant_menu.merchant_menu
		FROM
			merchant_menu
		WHERE
			merchant_menu.deleted = '0'
		ORDER BY
			merchant_menu.merchant_menu ASC";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				while($rec = $result->fetch_assoc()){
					$record[]	= $rec;
				}
			}
		}
		return $record;
	}
	function insert($conn){
		$merchant_menu				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['merchant_menu']);
		$id_merchant_menu_category	= $_POST['id_merchant_menu_category'];
		$photo						= preg_replace("/[^A-Za-z0-9?![:space:]@.-[\(][\)]]/","",$this->base_url()."files/".$_POST['photo']);
		$price						= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['price']);
		$discount					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['discount']);
		$discount_variant			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['discount_variant']);
		$description				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['description']);

		$merchant_menu				= mysqli_real_escape_string($conn,$merchant_menu);
		$id_merchant_menu_category	= mysqli_real_escape_string($conn,$id_merchant_menu_category);
		$photo						= mysqli_real_escape_string($conn,$photo);
		$price						= mysqli_real_escape_string($conn,$price);
		$discount					= mysqli_real_escape_string($conn,$discount);
		$discount_variant			= mysqli_real_escape_string($conn,$discount_variant);
		$description				= mysqli_real_escape_string($conn,$description);

		$sql	= "
		INSERT INTO
			merchant_menu(
				merchant_menu,
				id_merchant_menu_category,
				photo,
				price,
				discount,
				discount_variant,
				description,
				date_add
			)
			VALUES(
				'$merchant_menu',
				'$id_merchant_menu_category',
				'$photo',
				'$price',
				'$discount',
				'$discount_variant',
				'$description',
				unix_timestamp()
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			merchant_menu.id_merchant_menu,
			merchant_menu.merchant_menu,
			merchant_menu.id_merchant_menu_category,
			merchant_menu_category.merchant_menu_category,
			merchant_menu.photo,
			merchant_menu.price,
			merchant_menu.discount,
			merchant_menu.discount_variant,
			merchant_menu.description,
			merchant_menu.date_add,
			merchant_menu.deleted
		FROM
			merchant_menu
		LEFT JOIN
			merchant_menu_category ON
			merchant_menu.id_merchant_menu_category = merchant_menu_category.id_merchant_menu_category
		WHERE
			merchant_menu.id_merchant_menu = '$id'";
		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				$rec	= $result->fetch_assoc();
				$record	= $rec;
			}
		}
		return $record;
	}
	function update($conn){
		$id							= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['id']);
		$merchant_menu				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['merchant_menu']);
		$id_merchant_menu_category	= $_POST['id_merchant_menu_category'];
		$photo						= preg_replace("/[^A-Za-z0-9?![:space:]@.-[\(][\)]]/","",$this->base_url()."files/".$_POST['photo']);
		$price						= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['price']);
		$discount					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['discount']);
		$discount_variant			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['discount_variant']);
		$description				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['description']);

		$merchant_menu				= mysqli_real_escape_string($conn,$merchant_menu);
		$id_merchant_menu_category	= mysqli_real_escape_string($conn,$id_merchant_menu_category);
		$photo						= mysqli_real_escape_string($conn,$photo);
		$price						= mysqli_real_escape_string($conn,$price);
		$discount					= mysqli_real_escape_string($conn,$discount);
		$discount_variant			= mysqli_real_escape_string($conn,$discount_variant);
		$description				= mysqli_real_escape_string($conn,$description);

		$sql	= "
		UPDATE
			merchant_menu
		SET
			merchant_menu				= '$merchant_menu',
			id_merchant_menu_category	= '$id_merchant_menu_category',
			photo						= '$photo',
			price						= '$price',
			discount					= '$discount',
			discount_variant			= '$discount_variant',
			description					= '$description',
			date_add					= unix_timestamp()
		WHERE
			id_merchant_menu = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE merchant_menu
		SET
			deleted = '1'
		WHERE
			merchant_menu.id_merchant_menu = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function json($conn,$id_category){
		$cari	= isset($_POST['cari'])?$_POST['cari']:"";

		$sql	= "
		SELECT
			merchant_menu.merchant_menu,
			merchant_menu.price,
			merchant_menu.photo,
			merchant.id_merchant
		FROM
			merchant_menu
		LEFT JOIN
			merchant ON
			merchant_menu.id_merchant = merchant.id_merchant
		WHERE
			merchant_menu.deleted = '0' AND
			merchant_menu.merchant_menu LIKE '%$cari%' AND
			merchant_menu.id_merchant_menu_category IN($id_category)
		ORDER BY
			merchant_menu.id_merchant_menu DESC";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				while($rec = $result->fetch_assoc()){
					$photo	= base64_encode($rec['photo']);
					$photo	= str_replace('+','-',$photo);
					$photo	= str_replace('/','_',$photo);
					$record[]	= array(
						'merchant_menu'	=> $rec['merchant_menu'],
						'price'	=> "Rp. ".number_format($rec['price'],0,',','.'),
						'photo'	=> $photo,
						'id_merchant'	=> $rec['id_merchant']
					);
				}
			}
		}
		$record	= array('json_menu'=>$record);
		return $record;
	}
	function json_category($conn,$id_category){
		$id_merchant	= isset($_POST['id_merchant'])?$_POST['id_merchant']:"";
		
		$sql	= "
		SELECT
			merchant_menu.merchant_menu,
			merchant_menu.price,
			merchant_menu.photo,
			merchant_menu.id_merchant_menu,
			merchant.id_merchant,
			merchant.name,
			merchant.address
		FROM
			merchant_menu
		LEFT JOIN
			merchant ON
			merchant_menu.id_merchant = merchant.id_merchant
		WHERE
			merchant_menu.deleted = '0' AND
			merchant_menu.id_merchant = '$id_merchant' AND
			merchant_menu.id_merchant_menu_category IN($id_category)
		ORDER BY
			merchant_menu.id_merchant_menu DESC";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				while($rec = $result->fetch_assoc()){
					$photo	= base64_encode($rec['photo']);
					$photo	= str_replace('+','-',$photo);
					$photo	= str_replace('/','_',$photo);
					$record[]	= array(
						'merchant_menu'	=> $rec['merchant_menu'],
						'price'	=> "Rp. ".number_format($rec['price'],0,',','.'),
						'photo'	=> $photo,
						'id_menu'	=> $rec['id_merchant_menu'],
						'name'		=> $rec['name'],
						'address'	=> $rec['address']
					);
				}
			}
		}
		$record	= array('json_menu'=>$record);
		return $record;
	}
	
}
$merchant_menu	= new merchant_menu();
?>