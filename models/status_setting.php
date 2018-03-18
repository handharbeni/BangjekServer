<?php
class status_setting{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			status_setting.status,
			status_setting.aktif,
			status_setting.deleted
		FROM
			status_setting
		WHERE
			status_setting.deleted = '0' AND
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
			status_setting.status,
			status_setting.aktif
		FROM
			status_setting
		WHERE
			status_setting.deleted = '0'
		ORDER BY
			status_setting.aktif ASC";

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
		$aktif	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['aktif']);

		$aktif	= mysqli_real_escape_string($conn,$aktif);

		$sql	= "
		INSERT INTO
			status_setting(
				aktif
			)
			VALUES(
				'$aktif'
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			status_setting.status,
			status_setting.aktif,
			status_setting.deleted
		FROM
			status_setting
		WHERE
			status_setting.status = '$id'";
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
		$id		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['id']);
		$aktif	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['aktif']);

		$aktif	= mysqli_real_escape_string($conn,$aktif);

		$sql	= "
		UPDATE
			status_setting
		SET
			aktif	= '$aktif'
		WHERE
			status = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE status_setting
		SET
			deleted = '1'
		WHERE
			status_setting.status = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
}
$status_setting	= new status_setting();
?>