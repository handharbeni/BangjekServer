<?php
class tarif{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		if($field=="nilai"||$field=="date_add"){
			$field = "tarif.".$field;
		}
		
		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			tarif.id_tarif,
			tarif.nilai,
			FROM_UNIXTIME(tarif.date_add) AS date_add,
			tarif.id_frenchise,
			frenchise.nama,
			tarif.id_global_setting,
			global_setting.nama_setting
		FROM
			tarif
		LEFT JOIN
			frenchise ON
			tarif.id_frenchise = frenchise.id_frenchise
		LEFT JOIN
			global_setting ON
			tarif.id_global_setting = global_setting.id_global_setting
		WHERE
			tarif.deleted = '0' AND
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
			tarif.id_tarif,
			tarif.nama_setting
		FROM
			tarif
		WHERE
			tarif.deleted = '0'
		ORDER BY
			tarif.nama ASC";

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
		$id_global_setting	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['id_global_setting']);
		$nilai				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nilai']);
		$id_frenchise		= $_POST['id_frenchise'];
		
		$id_global_setting	= mysqli_real_escape_string($conn,$id_global_setting);
		$nilai				= mysqli_real_escape_string($conn,$nilai);
		$id_frenchise		= mysqli_real_escape_string($conn,$id_frenchise);

		$sql	= "
		INSERT INTO
			tarif(
				id_global_setting,
				nilai,
				id_frenchise
			)
			VALUES(
				'$id_global_setting',
				'$nilai',
				'$id_frenchise'
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			tarif.id_tarif,
			tarif.id_global_setting,
			tarif.nilai,
			tarif.id_frenchise,
			frenchise.nama
		FROM
			tarif
		LEFT JOIN
			frenchise ON
			tarif.id_frenchise = frenchise.id_frenchise
		WHERE
			tarif.id_tarif = '$id'";
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
	function select2($conn,$id,$id_global_setting){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			tarif.id_tarif,
			tarif.id_global_setting,
			tarif.nilai,
			tarif.id_frenchise,
			frenchise.nama
		FROM
			tarif
		LEFT JOIN
			frenchise ON
			tarif.id_frenchise = frenchise.id_frenchise
		WHERE
			tarif.id_frenchise = '$id' AND
			tarif.id_global_setting	= '$id_global_setting'";
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
		$id				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['id']);
		$id_global_setting	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['id_global_setting']);
		$nilai				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nilai']);
		$id_frenchise		= $_POST['id_frenchise'];
		
		$id_global_setting	= mysqli_real_escape_string($conn,$id_global_setting);
		$nilai				= mysqli_real_escape_string($conn,$nilai);
		$id_frenchise		= mysqli_real_escape_string($conn,$id_frenchise);

		$sql	= "
		UPDATE
			tarif
		SET
			id_global_setting	= '$id_global_setting',
			nilai				= '$nilai',
			id_frenchise		= '$id_frenchise'
		WHERE
			id_tarif = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE tarif
		SET
			deleted = '1'
		WHERE
			tarif.id_tarif = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function frenchise($conn,$id_frenchise){
		$sql	= "
		SELECT
			tarif.id_tarif,
			tarif.nilai,
			FROM_UNIXTIME(tarif.date_add) AS date_add,
			tarif.id_frenchise,
			frenchise.nama,
			tarif.id_global_setting,
			global_setting.nama_setting
		FROM
			tarif
		LEFT JOIN
			frenchise ON
			tarif.id_frenchise = frenchise.id_frenchise
		LEFT JOIN
			global_setting ON
			tarif.id_global_setting = global_setting.id_global_setting
		WHERE
			tarif.deleted = '0' AND
			tarif.id_frenchise = '$id_frenchise'";

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
}
$tarif	= new tarif();
?>