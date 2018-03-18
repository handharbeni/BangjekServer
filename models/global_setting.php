<?php
class global_setting{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			global_setting.id_global_setting,
			global_setting.nama_setting,
			global_setting.nilai,
			global_setting.show_to_frenchise,
			FROM_UNIXTIME(global_setting.date_add) AS date_add,
			global_setting.deleted
		FROM
			global_setting
		WHERE
			global_setting.deleted = '0' AND
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
			global_setting.id_global_setting,
			global_setting.nama_setting
		FROM
			global_setting
		WHERE
			global_setting.show_to_frenchise = 1 AND
			global_setting.deleted = '0'
		ORDER BY
			global_setting.nama_setting ASC";

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
		$nama_setting		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nama_setting']);
		$nilai				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nilai']);
		$show_to_frenchise	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['show_to_frenchise']);

		$nama_setting		= mysqli_real_escape_string($conn,$nama_setting);
		$nilai				= mysqli_real_escape_string($conn,$nilai);
		$show_to_frenchise	= mysqli_real_escape_string($conn,$show_to_frenchise);

		$sql	= "
		INSERT INTO
			global_setting(
				nama_setting,
				nilai,
				show_to_frenchise,
				date_add
			)
			VALUES(
				'$nama_setting',
				'$nilai',
				'$show_to_frenchise',
				unix_timestamp()
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			global_setting.id_global_setting,
			global_setting.nama_setting,
			global_setting.nilai,
			global_setting.show_to_frenchise,
			global_setting.date_add,
			global_setting.deleted
		FROM
			global_setting
		WHERE
			global_setting.id_global_setting = '$id'";
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
		$nama_setting		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nama_setting']);
		$nilai				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nilai']);
		$show_to_frenchise	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['show_to_frenchise']);

		$nama_setting		= mysqli_real_escape_string($conn,$nama_setting);
		$nilai				= mysqli_real_escape_string($conn,$nilai);
		$show_to_frenchise	= mysqli_real_escape_string($conn,$show_to_frenchise);

		$sql	= "
		UPDATE
			global_setting
		SET
			nama_setting		= '$nama_setting',
			nilai				= '$nilai',
			show_to_frenchise	= '$show_to_frenchise',
			date_add			= unix_timestamp()
		WHERE
			id_global_setting = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE global_setting
		SET
			deleted = '1'
		WHERE
			global_setting.id_global_setting = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
}
$global_setting	= new global_setting();
?>