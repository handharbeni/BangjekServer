<?php
class staff extends config{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			staff.user_staff,
			staff.nama,
			staff.password,
			staff.notelp,
			staff.id_level,
			level.nama_level,
			staff.id_gender,
			gender.gender,
			staff.foto,
			staff.no_ktp,
			FROM_UNIXTIME(staff.date_add) AS date_add,
			staff.status,
			status_setting.aktif,
			staff.deleted
		FROM
			staff
		LEFT JOIN
			level ON
			staff.id_level = level.id_level
		LEFT JOIN
			gender ON
			staff.id_gender = gender.id_gender
		LEFT JOIN
			status_setting ON
			staff.status = status_setting.status
		WHERE
			staff.deleted = '0' AND
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
			staff.user_staff,
			staff.nama
		FROM
			staff
		WHERE
			staff.deleted = '0'
		ORDER BY
			staff.nama ASC";

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
		$nama		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nama']);
		$password	= $_POST['password'];
		$notelp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['notelp']);
		$id_level	= $_POST['id_level'];
		$id_gender	= $_POST['id_gender'];
		$foto		= preg_replace("/[^A-Za-z0-9?![:space:]@.-[\(][\)]]/","",$this->base_url()."files/".$_POST['foto']);
		$no_ktp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['no_ktp']);
		$status		= $_POST['status'];

		$user_staff	= mysqli_real_escape_string($conn,$_POST['user_staff']);
		$nama		= mysqli_real_escape_string($conn,$nama);
		$password	= mysqli_real_escape_string($conn,$password);
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$id_level	= mysqli_real_escape_string($conn,$id_level);
		$id_gender	= mysqli_real_escape_string($conn,$id_gender);
		$foto		= mysqli_real_escape_string($conn,$foto);
		$no_ktp		= mysqli_real_escape_string($conn,$no_ktp);
		$status		= mysqli_real_escape_string($conn,$status);

		$pengacak	= "f3rry553pth14n4n664r4";
		$password	= md5(md5($pengacak).$pengacak.md5($password));
		
		$sql	= "
		INSERT INTO
			staff(
				user_staff,
				nama,
				password,
				notelp,
				id_level,
				id_gender,
				foto,
				no_ktp,
				date_add,
				status
			)
			VALUES(
				'$user_staff',
				'$nama',
				'$password',
				'$notelp',
				'$id_level',
				'$id_gender',
				'$foto',
				'$no_ktp',
				unix_timestamp(),
				'$status'
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			staff.user_staff,
			staff.nama,
			staff.password,
			staff.notelp,
			staff.id_level,
			level.nama_level,
			staff.id_gender,
			gender.gender,
			staff.foto,
			staff.no_ktp,
			staff.date_add,
			staff.status,
			status_setting.aktif,
			staff.deleted
		FROM
			staff
		LEFT JOIN
			level ON
			staff.id_level = level.id_level
		LEFT JOIN
			gender ON
			staff.id_gender = gender.id_gender
		LEFT JOIN
			status_setting ON
			staff.status = status_setting.status
		WHERE
			staff.user_staff = '$id'";
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
		$nama		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nama']);
		$password	= $_POST['password'];
		$notelp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['notelp']);
		$id_level	= $_POST['id_level'];
		$id_gender	= $_POST['id_gender'];
		$foto		= preg_replace("/[^A-Za-z0-9?![:space:]@.-[\(][\)]]/","",$this->base_url()."files/".$_POST['foto']);
		$no_ktp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['no_ktp']);
		$status		= $_POST['status'];

		$user_staff	= mysqli_real_escape_string($conn,$_POST['user_staff']);
		$nama		= mysqli_real_escape_string($conn,$nama);
		$password	= mysqli_real_escape_string($conn,$password);
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$id_level	= mysqli_real_escape_string($conn,$id_level);
		$id_gender	= mysqli_real_escape_string($conn,$id_gender);
		$foto		= mysqli_real_escape_string($conn,$foto);
		$no_ktp		= mysqli_real_escape_string($conn,$no_ktp);
		$status		= mysqli_real_escape_string($conn,$status);

		$pengacak	= "f3rry553pth14n4n664r4";
		$password	= md5(md5($pengacak).$pengacak.md5($password));

		if(empty($foto)){
			$sql	= "
			UPDATE
				staff
			SET
				user_staff	= '$user_staff',
				nama		= '$nama',
				password	= '$password',
				notelp		= '$notelp',
				id_level	= '$id_level',
				id_gender	= '$id_gender',
				no_ktp		= '$no_ktp',
				date_add	= unix_timestamp(),
				status		= '$status'
			WHERE
				user_staff = '$id'";
		}else{
			$sql	= "
			UPDATE
				staff
			SET
				user_staff	= '$user_staff',
				nama		= '$nama',
				password	= '$password',
				notelp		= '$notelp',
				id_level	= '$id_level',
				id_gender	= '$id_gender',
				foto		= '$foto',
				no_ktp		= '$no_ktp',
				date_add	= unix_timestamp(),
				status		= '$status'
			WHERE
				user_staff = '$id'";
		}

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE staff
		SET
			deleted = '1'
		WHERE
			staff.user_staff = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function login($conn,$username,$password){
		$username	= mysqli_real_escape_string($conn,$username);
		$password	= mysqli_real_escape_string($conn,$password);

		$pengacak	= "f3rry553pth14n4n664r4";
		$password	= md5(md5($pengacak).$pengacak.md5($password));

		$sql	= "
		SELECT
			staff.user_staff,
			staff.nama,
			staff.foto,
			staff.id_level
		FROM
			staff
		WHERE
			staff.deleted = '0' AND
			staff.user_staff = '$username' AND
			staff.password = '$password' AND
			staff.status = '1'";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				$rec	= $result->fetch_assoc();
				$_SESSION['level']		= $rec['id_level'];
				$_SESSION['user_staff']	= $rec['user_staff'];
				$_SESSION['nama']		= $rec['nama'];
				$_SESSION['foto']		= $rec['foto'];
			}
		}
		return $record;
	}
}
$staff	= new staff();
?>