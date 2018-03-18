<?php
class merchant_category{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			merchant_category.id_merchant_category,
			merchant_category.merchant_category,
			merchant_category.max_upload,
			FROM_UNIXTIME(merchant_category.date_add) AS date_add,
			merchant_category.deleted
		FROM
			merchant_category
		WHERE
			merchant_category.deleted = '0' AND
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
			merchant_category.id_merchant_category,
			merchant_category.merchant_category
		FROM
			merchant_category
		WHERE
			merchant_category.deleted = '0'
		ORDER BY
			merchant_category.merchant_category ASC";

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
		$merchant_category	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['merchant_category']);
		$max_upload			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['max_upload']);

		$merchant_category	= mysqli_real_escape_string($conn,$merchant_category);
		$max_upload			= mysqli_real_escape_string($conn,$max_upload);
		$date_add			= date("Y-m-d H:i:s");

		$sql	= "
		INSERT INTO
			merchant_category(
				merchant_category,
				max_upload,
				date_add
			)
			VALUES(
				'$merchant_category',
				'$max_upload',
				unix_timestamp()
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			merchant_category.id_merchant_category,
			merchant_category.merchant_category,
			merchant_category.max_upload,
			merchant_category.date_add,
			merchant_category.deleted
		FROM
			merchant_category
		WHERE
			merchant_category.id_merchant_category = '$id'";
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
		$id					= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['id']);
		$merchant_category	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['merchant_category']);
		$max_upload			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['max_upload']);

		$merchant_category	= mysqli_real_escape_string($conn,$merchant_category);
		$max_upload			= mysqli_real_escape_string($conn,$max_upload);
		$date_add			= date("Y-m-d H:i:s");

		$sql	= "
		UPDATE
			merchant_category
		SET
			merchant_category	= '$merchant_category',
			max_upload			= '$max_upload',
			date_add			= unix_timestamp()
		WHERE
			id_merchant_category = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE merchant_category
		SET
			deleted = '1'
		WHERE
			merchant_category.id_merchant_category = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
}
$merchant_category	= new merchant_category();
?>