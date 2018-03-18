<?php
class jenis_transaksi{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			jenis_transaksi.id_jenis_transaksi,
			jenis_transaksi.nama_jenis,
			jenis_transaksi.deleted
		FROM
			jenis_transaksi
		WHERE
			jenis_transaksi.deleted = '0' AND
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
			jenis_transaksi.id_jenis_transaksi,
			jenis_transaksi.nama_jenis
		FROM
			jenis_transaksi
		WHERE
			jenis_transaksi.deleted = '0'
		ORDER BY
			jenis_transaksi.nama_jenis ASC";

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
		$nama_jenis	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nama_jenis']);

		$nama_jenis	= mysqli_real_escape_string($conn,$nama_jenis);

		$sql	= "
		INSERT INTO
			jenis_transaksi(
				nama_jenis
			)
			VALUES(
				'$nama_jenis'
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			jenis_transaksi.id_jenis_transaksi,
			jenis_transaksi.nama_jenis,
			jenis_transaksi.deleted
		FROM
			jenis_transaksi
		WHERE
			jenis_transaksi.id_jenis_transaksi = '$id'";
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
		$nama_jenis	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nama_jenis']);

		$nama_jenis	= mysqli_real_escape_string($conn,$nama_jenis);

		$sql	= "
		UPDATE
			jenis_transaksi
		SET
			nama_jenis	= '$nama_jenis'
		WHERE
			id_jenis_transaksi = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE jenis_transaksi
		SET
			deleted = '1'
		WHERE
			jenis_transaksi.id_jenis_transaksi = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
}
$jenis_transaksi	= new jenis_transaksi();
?>