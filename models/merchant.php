<?php
class merchant extends config{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			merchant.id_merchant,
			merchant.name,
			merchant.address,
			merchant.email,
			merchant.phone,
			merchant.photo,
			merchant.description,
			merchant.IMEI1,
			merchant.IMEI2,
			merchant.lat,
			merchant.lon,
			merchant.open_at,
			merchant.close_at,
			merchant.open_status,
			merchant.max_menu,
			merchant.point,
			merchant.id_merchant_category,
			merchant_category.merchant_category,
			merchant.join_date,
			merchant.valid_status,
			merchant.deleted
		FROM
			merchant
		LEFT JOIN
			merchant_category ON
			merchant.id_merchant_category = merchant_category.id_merchant_category
		WHERE
			merchant.deleted = '0' AND
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
			merchant.id_merchant,
			merchant.name
		FROM
			merchant
		WHERE
			merchant.deleted = '0'
		ORDER BY
			merchant.name ASC";

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
		$name					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['name']);
		$address				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['address']);
		$email					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['email']);
		$phone					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['phone']);
		$photo					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$this->base_url()."files/".$_POST['photo']);
		$description			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['description']);
		$IMEI1					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['IMEI1']);
		$IMEI2					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['IMEI2']);
		$lat					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['lat']);
		$lon					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['lon']);
		$open_at				= $_POST['open_at'];
		$close_at				= $_POST['close_at'];
		$open_status			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['open_status']);
		$max_menu				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['max_menu']);
		$point					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['point']);
		$id_merchant_category	= $_POST['id_merchant_category'];
		$join_date				= $_POST['join_date'];
		$valid_status			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['valid_status']);

		$name					= mysqli_real_escape_string($conn,$name);
		$address				= mysqli_real_escape_string($conn,$address);
		$email					= mysqli_real_escape_string($conn,$email);
		$phone					= mysqli_real_escape_string($conn,$phone);
		$photo					= mysqli_real_escape_string($conn,$photo);
		$description			= mysqli_real_escape_string($conn,$description);
		$IMEI1					= mysqli_real_escape_string($conn,$IMEI1);
		$IMEI2					= mysqli_real_escape_string($conn,$IMEI2);
		$lat					= mysqli_real_escape_string($conn,$lat);
		$lon					= mysqli_real_escape_string($conn,$lon);
		$open_at				= mysqli_real_escape_string($conn,$open_at);
		$close_at				= mysqli_real_escape_string($conn,$close_at);
		$open_status			= mysqli_real_escape_string($conn,$open_status);
		$max_menu				= mysqli_real_escape_string($conn,$max_menu);
		$point					= mysqli_real_escape_string($conn,$point);
		$id_merchant_category	= mysqli_real_escape_string($conn,$id_merchant_category);
		$join_date				= mysqli_real_escape_string($conn,$join_date);
		$valid_status			= mysqli_real_escape_string($conn,$valid_status);

		$sql	= "
		INSERT INTO
			merchant(
				name,
				address,
				email,
				phone,
				photo,
				description,
				IMEI1,
				IMEI2,
				lat,
				lon,
				open_at,
				close_at,
				open_status,
				max_menu,
				point,
				id_merchant_category,
				join_date,
				valid_status
			)
			VALUES(
				'$name',
				'$address',
				'$email',
				'$phone',
				'$photo',
				'$description',
				'$IMEI1',
				'$IMEI2',
				'$lat',
				'$lon',
				'$open_at',
				'$close_at',
				'$open_status',
				'$max_menu',
				'$point',
				'$id_merchant_category',
				'$join_date',
				'$valid_status'
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			merchant.id_merchant,
			merchant.name,
			merchant.address,
			merchant.email,
			merchant.phone,
			merchant.photo,
			merchant.description,
			merchant.IMEI1,
			merchant.IMEI2,
			merchant.lat,
			merchant.lon,
			merchant.open_at,
			merchant.close_at,
			merchant.open_status,
			merchant.max_menu,
			merchant.point,
			merchant.id_merchant_category,
			merchant_category.merchant_category,
			merchant.join_date,
			merchant.valid_status,
			merchant.deleted
		FROM
			merchant
		LEFT JOIN
			merchant_category ON
			merchant.id_merchant_category = merchant_category.id_merchant_category
		WHERE
			merchant.id_merchant = '$id'";
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
		$id						= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['id']);
		$name					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['name']);
		$address				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['address']);
		$email					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['email']);
		$phone					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['phone']);
		$photo					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$this->base_url()."files/".$_POST['photo']);
		$description			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['description']);
		$IMEI1					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['IMEI1']);
		$IMEI2					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['IMEI2']);
		$lat					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['lat']);
		$lon					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['lon']);
		$open_at				= $_POST['open_at'];
		$close_at				= $_POST['close_at'];
		$open_status			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['open_status']);
		$max_menu				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['max_menu']);
		$point					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['point']);
		$id_merchant_category	= $_POST['id_merchant_category'];
		$join_date				= $_POST['join_date'];
		$valid_status			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['valid_status']);

		$name					= mysqli_real_escape_string($conn,$name);
		$address				= mysqli_real_escape_string($conn,$address);
		$email					= mysqli_real_escape_string($conn,$email);
		$phone					= mysqli_real_escape_string($conn,$phone);
		$photo					= mysqli_real_escape_string($conn,$photo);
		$description			= mysqli_real_escape_string($conn,$description);
		$IMEI1					= mysqli_real_escape_string($conn,$IMEI1);
		$IMEI2					= mysqli_real_escape_string($conn,$IMEI2);
		$lat					= mysqli_real_escape_string($conn,$lat);
		$lon					= mysqli_real_escape_string($conn,$lon);
		$open_at				= mysqli_real_escape_string($conn,$open_at);
		$close_at				= mysqli_real_escape_string($conn,$close_at);
		$open_status			= mysqli_real_escape_string($conn,$open_status);
		$max_menu				= mysqli_real_escape_string($conn,$max_menu);
		$point					= mysqli_real_escape_string($conn,$point);
		$id_merchant_category	= mysqli_real_escape_string($conn,$id_merchant_category);
		$join_date				= mysqli_real_escape_string($conn,$join_date);
		$valid_status			= mysqli_real_escape_string($conn,$valid_status);

		$sql	= "
		UPDATE
			merchant
		SET
			name					= '$name',
			address					= '$address',
			email					= '$email',
			phone					= '$phone',
			photo					= '$photo',
			description				= '$description',
			IMEI1					= '$IMEI1',
			IMEI2					= '$IMEI2',
			lat						= '$lat',
			lon						= '$lon',
			open_at					= '$open_at',
			close_at				= '$close_at',
			open_status				= '$open_status',
			max_menu				= '$max_menu',
			point					= '$point',
			id_merchant_category	= '$id_merchant_category',
			join_date				= '$join_date',
			valid_status			= '$valid_status'
		WHERE
			id_merchant = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE merchant
		SET
			deleted = '1'
		WHERE
			merchant.id_merchant = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
}
$merchant	= new merchant();
?>