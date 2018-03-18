<?php
class frenchise extends config{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			frenchise.id_frenchise,
			frenchise.nama,
			frenchise.alamat,
			frenchise.notelp,
			frenchise.no_ktp,
			frenchise.npwp,
			frenchise.foto,
			frenchise.email,
			frenchise.id_gender,
			gender.gender,
			frenchise.longitude,
			frenchise.latitude,
			frenchise.luas,
			FROM_UNIXTIME(frenchise.date_add) AS date_add,
			frenchise.status,
			status_setting.aktif,
			frenchise.deleted
		FROM
			frenchise
		LEFT JOIN
			gender ON
			frenchise.id_gender = gender.id_gender
		LEFT JOIN
			status_setting ON
			frenchise.status = status_setting.status
		WHERE
			frenchise.deleted = '0' AND
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
			frenchise.id_frenchise,
			frenchise.nama
		FROM
			frenchise
		WHERE
			frenchise.deleted = '0'
		ORDER BY
			frenchise.nama ASC";

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
		$alamat		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['alamat']);
		$notelp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['notelp']);
		$no_ktp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['no_ktp']);
		$npwp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['npwp']);
		$foto		= preg_replace("/[^A-Za-z0-9?![:space:]@.-[\(][\)]]/","",$this->base_url()."files/".$_POST['foto']);
		$email		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['email']);
		$id_gender	= $_POST['id_gender'];
		$longitude	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['longitude']);
		$latitude	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['latitude']);
		$luas		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['luas']);
		$status		= $_POST['status'];

		$nama		= mysqli_real_escape_string($conn,$nama);
		$password	= mysqli_real_escape_string($conn,$password);
		$alamat		= mysqli_real_escape_string($conn,$alamat);
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$no_ktp		= mysqli_real_escape_string($conn,$no_ktp);
		$npwp		= mysqli_real_escape_string($conn,$npwp);
		$foto		= mysqli_real_escape_string($conn,$foto);
		$email		= mysqli_real_escape_string($conn,$email);
		$id_gender	= mysqli_real_escape_string($conn,$id_gender);
		$longitude	= mysqli_real_escape_string($conn,$longitude);
		$latitude	= mysqli_real_escape_string($conn,$latitude);
		$luas		= mysqli_real_escape_string($conn,$luas);
		$status		= mysqli_real_escape_string($conn,$status);

		$pengacak	= "f3rry553pth14n4n664r4";
		$password	= md5(md5($pengacak).$pengacak.md5($password));

		$sql	= "
		INSERT INTO
			frenchise(
				nama,
				password,
				alamat,
				notelp,
				no_ktp,
				npwp,
				foto,
				email,
				id_gender,
				longitude,
				latitude,
				luas,
				date_add,
				status
			)
			VALUES(
				'$nama',
				'$password',
				'$alamat',
				'$notelp',
				'$no_ktp',
				'$npwp',
				'$foto',
				'$email',
				'$id_gender',
				'$longitude',
				'$latitude',
				'$luas',
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
			frenchise.id_frenchise,
			frenchise.nama,
			frenchise.alamat,
			frenchise.notelp,
			frenchise.no_ktp,
			frenchise.npwp,
			frenchise.foto,
			frenchise.email,
			frenchise.id_gender,
			gender.gender,
			frenchise.longitude,
			frenchise.latitude,
			frenchise.luas,
			frenchise.date_add,
			frenchise.status,
			status_setting.aktif,
			frenchise.deleted
		FROM
			frenchise
		LEFT JOIN
			gender ON
			frenchise.id_gender = gender.id_gender
		LEFT JOIN
			status_setting ON
			frenchise.status = status_setting.status
		WHERE
			frenchise.id_frenchise = '$id'";
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
		$alamat		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['alamat']);
		$notelp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['notelp']);
		$no_ktp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['no_ktp']);
		$npwp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['npwp']);
		$foto		= preg_replace("/[^A-Za-z0-9?![:space:]@.-[\(][\)]]/","",$this->base_url()."files/".$_POST['foto']);
		$email		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['email']);
		$id_gender	= $_POST['id_gender'];
		$longitude	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['longitude']);
		$latitude	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['latitude']);
		$luas		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['luas']);
		$status		= $_POST['status'];

		$nama		= mysqli_real_escape_string($conn,$nama);
		$password	= mysqli_real_escape_string($conn,$password);
		$alamat		= mysqli_real_escape_string($conn,$alamat);
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$no_ktp		= mysqli_real_escape_string($conn,$no_ktp);
		$npwp		= mysqli_real_escape_string($conn,$npwp);
		$foto		= mysqli_real_escape_string($conn,$foto);
		$email		= mysqli_real_escape_string($conn,$email);
		$id_gender	= mysqli_real_escape_string($conn,$id_gender);
		$longitude	= mysqli_real_escape_string($conn,$longitude);
		$latitude	= mysqli_real_escape_string($conn,$latitude);
		$luas		= mysqli_real_escape_string($conn,$luas);
		$status		= mysqli_real_escape_string($conn,$status);

		$pengacak	= "f3rry553pth14n4n664r4";
		$password	= md5(md5($pengacak).$pengacak.md5($password));

		if(empty($foto)){
			$sql	= "
			UPDATE
				frenchise
			SET
				nama		= '$nama',
				password	= '$password',
				alamat		= '$alamat',
				notelp		= '$notelp',
				no_ktp		= '$no_ktp',
				npwp		= '$npwp',
				email		= '$email',
				id_gender	= '$id_gender',
				longitude	= '$longitude',
				latitude	= '$latitude',
				luas		= '$luas',
				date_add	= unix_timestamp(),
				status		= '$status'
			WHERE
				id_frenchise = '$id'";
		}else{
			$sql	= "
			UPDATE
				frenchise
			SET
				nama		= '$nama',
				password	= '$password',
				alamat		= '$alamat',
				notelp		= '$notelp',
				no_ktp		= '$no_ktp',
				npwp		= '$npwp',
				foto		= '$foto',
				email		= '$email',
				id_gender	= '$id_gender',
				longitude	= '$longitude',
				latitude	= '$latitude',
				luas		= '$luas',
				date_add	= unix_timestamp(),
				status		= '$status'
			WHERE
				id_frenchise = '$id'";
		}

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE frenchise
		SET
			deleted = '1'
		WHERE
			frenchise.id_frenchise = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function showFrenchise($conn,$lat,$lon){
		$sql	= "
		SELECT
			frenchise.id_frenchise,
			frenchise.nama,
			frenchise.latitude,
			frenchise.longitude
		FROM
			frenchise
		WHERE
			frenchise.deleted = '0'
		ORDER BY
			frenchise.nama ASC";

		$result	= $conn->query($sql);
		$id_frenchise	= 1;
		if($result){
			if(!empty($result)){
				while($rec = $result->fetch_assoc()){
					$jarak	= $this->distance($lat,$lon,$rec['latitude'],$rec['longitude'],"K");
					if(is_nan($jarak)){
						$jarak	= 0;
					}
					$jarak	= floor($jarak);
					if($jarak<=36){
						$id_frenchise	= $rec['id_frenchise'];
						
					}
				}
			}
		}
		return $id_frenchise;
	}
	function distance($lat1, $lon1, $lat2, $lon2, $unit) {
		$theta	= $lon1 - $lon2;
		$dist	= sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist	= acos($dist);
		$dist	= rad2deg($dist);
		$miles	= $dist * 60 * 1.1515;
		$unit	= strtoupper($unit);
		
		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}
}
$frenchise	= new frenchise();
?>