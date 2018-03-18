<?php
class gender{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			gender.id_gender,
			gender.gender,
			gender.deleted
		FROM
			gender
		WHERE
			gender.deleted = '0' AND
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
			gender.id_gender,
			gender.gender
		FROM
			gender
		WHERE
			gender.deleted = '0'
		ORDER BY
			gender.gender ASC";

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
		$gender	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['gender']);

		$gender	= mysqli_real_escape_string($conn,$gender);

		$sql	= "
		INSERT INTO
			gender(
				gender
			)
			VALUES(
				'$gender'
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			gender.id_gender,
			gender.gender,
			gender.deleted
		FROM
			gender
		WHERE
			gender.id_gender = '$id'";
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
		$gender	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['gender']);

		$gender	= mysqli_real_escape_string($conn,$gender);

		$sql	= "
		UPDATE
			gender
		SET
			gender	= '$gender'
		WHERE
			id_gender = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE gender
		SET
			deleted = '1'
		WHERE
			gender.id_gender = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
}
$gender	= new gender();
?>