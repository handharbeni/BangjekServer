<?php
class merchant_menu_category{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			merchant_menu_category.id_merchant_menu_category,
			merchant_menu_category.merchant_menu_category,
			FROM_UNIXTIME(merchant_menu_category.date_add) AS date_add,
			merchant_menu_category.deleted
		FROM
			merchant_menu_category
		WHERE
			merchant_menu_category.deleted = '0' AND
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
			merchant_menu_category.id_merchant_menu_category,
			merchant_menu_category.merchant_menu_category
		FROM
			merchant_menu_category
		WHERE
			merchant_menu_category.deleted = '0'
		ORDER BY
			merchant_menu_category.merchant_menu_category ASC";

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
		$merchant_menu_category	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['merchant_menu_category']);

		$merchant_menu_category	= mysqli_real_escape_string($conn,$merchant_menu_category);

		$sql	= "
		INSERT INTO
			merchant_menu_category(
				merchant_menu_category,
				date_add
			)
			VALUES(
				'$merchant_menu_category',
				unix_timestamp()
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			merchant_menu_category.id_merchant_menu_category,
			merchant_menu_category.merchant_menu_category,
			merchant_menu_category.date_add,
			merchant_menu_category.deleted
		FROM
			merchant_menu_category
		WHERE
			merchant_menu_category.id_merchant_menu_category = '$id'";
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
		$merchant_menu_category	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['merchant_menu_category']);

		$merchant_menu_category	= mysqli_real_escape_string($conn,$merchant_menu_category);
		$date_add				= date("Y-m-d H:i:s");

		$sql	= "
		UPDATE
			merchant_menu_category
		SET
			merchant_menu_category	= '$merchant_menu_category',
			date_add				= unix_timestamp()
		WHERE
			id_merchant_menu_category = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE merchant_menu_category
		SET
			deleted = '1'
		WHERE
			merchant_menu_category.id_merchant_menu_category = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
}
$merchant_menu_category	= new merchant_menu_category();
?>