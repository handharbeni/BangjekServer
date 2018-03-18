<?php
class level{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			level.id_level,
			level.nama_level,
			level.deleted
		FROM
			level
		WHERE
			level.deleted = '0' AND
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
			level.id_level,
			level.nama_level
		FROM
			level
		WHERE
			level.deleted = '0'
		ORDER BY
			level.nama_level ASC";

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
		$nama_level	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nama_level']);

		$nama_level	= mysqli_real_escape_string($conn,$nama_level);

		$sql	= "
		INSERT INTO
			level(
				nama_level
			)
			VALUES(
				'$nama_level'
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			level.id_level,
			level.nama_level,
			level.deleted
		FROM
			level
		WHERE
			level.id_level = '$id'";
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
		$id			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['id']);
		$nama_level	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nama_level']);

		$nama_level	= mysqli_real_escape_string($conn,$nama_level);

		$sql	= "
		UPDATE
			level
		SET
			nama_level	= '$nama_level'
		WHERE
			id_level = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE level
		SET
			deleted = '1'
		WHERE
			level.id_level = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
}
$level	= new level();
?>