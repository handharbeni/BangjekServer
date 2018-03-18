<?php
class kurir extends config{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			kurir.id_kurir,
			kurir.nama,
			(
				SELECT
					SUM(transaksi.untuk_bangjeck+transaksi.untuk_frenchise)
				FROM
					transaksi
				WHERE
					transaksi.id_transaksi >= 54249 AND
					transaksi.deleted = 0 AND
					transaksi.id_kurir = kurir.id_kurir AND
					transaksi.status IN (2,3,6)
			) AS tagihan_kurir,
			kurir.notelp,
			kurir.IMEI,
			kurir.id_gender,
			gender.gender,
			kurir.foto,
			kurir.no_ktp,
			kurir.jaminan,
			FROM_UNIXTIME(kurir.date_add) AS date_add,
			kurir.status,
			status_setting.aktif,
			kurir.deleted
		FROM
			kurir
		LEFT JOIN
			gender ON
			kurir.id_gender = gender.id_gender
		LEFT JOIN
			status_setting ON
			kurir.status = status_setting.status
		WHERE
			kurir.deleted = '0' AND
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
			kurir.id_kurir,
			kurir.nama
		FROM
			kurir
		WHERE
			kurir.deleted = '0'
		ORDER BY
			kurir.nama ASC";

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
		$IMEI		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['IMEI']);
		// $password	= $_POST['password'];
		$notelp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['notelp']);
		$id_gender	= $_POST['id_gender'];
		$foto		= preg_replace("/[^A-Za-z0-9?![:space:]@.-[\(][\)]]/","",$this->base_url()."files/".$_POST['foto']);
		$no_ktp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['no_ktp']);
		$jaminan	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['jaminan']);
		$status		= $_POST['status'];

		$nama		= mysqli_real_escape_string($conn,$nama);
		// $password	= mysqli_real_escape_string($conn,$password);
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$id_gender	= mysqli_real_escape_string($conn,$id_gender);
		$foto		= mysqli_real_escape_string($conn,$foto);
		$no_ktp		= mysqli_real_escape_string($conn,$no_ktp);
		$jaminan	= mysqli_real_escape_string($conn,$jaminan);
		$status		= mysqli_real_escape_string($conn,$status);

		// $pengacak	= "f3rry553pth14n4n664r4";
		// $password	= md5(md5($pengacak).$pengacak.md5($password));

		$sql	= "
		INSERT INTO
			kurir(
				nama,
				IMEI,
				notelp,
				id_gender,
				foto,
				no_ktp,
				jaminan,
				date_add,
				status
			)
			VALUES(
				'$nama',
				'$IMEI',
				'$notelp',
				'$id_gender',
				'$foto',
				'$no_ktp',
				'$jaminan',
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
			kurir.id_kurir,
			kurir.nama,
			kurir.IMEI,
			kurir.token,
			kurir.notelp,
			kurir.id_gender,
			gender.gender,
			kurir.foto,
			kurir.no_ktp,
			kurir.jaminan,
			kurir.date_add,
			kurir.status,
			status_setting.aktif,
			kurir.deleted
		FROM
			kurir
		LEFT JOIN
			gender ON
			kurir.id_gender = gender.id_gender
		LEFT JOIN
			status_setting ON
			kurir.status = status_setting.status
		WHERE
			kurir.id_kurir = '$id'";
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
		$IMEI		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['IMEI']);
		// $password	= $_POST['password'];
		$notelp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['notelp']);
		$id_gender	= $_POST['id_gender'];
		$foto		= preg_replace("/[^A-Za-z0-9?![:space:]@.-[\(][\)]]/","",$this->base_url()."files/".$_POST['foto']);
		$no_ktp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['no_ktp']);
		$jaminan	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['jaminan']);
		$status		= $_POST['status'];

		$nama		= mysqli_real_escape_string($conn,$nama);
		// $password	= mysqli_real_escape_string($conn,$password);
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$id_gender	= mysqli_real_escape_string($conn,$id_gender);
		$foto		= mysqli_real_escape_string($conn,$foto);
		$no_ktp		= mysqli_real_escape_string($conn,$no_ktp);
		$jaminan	= mysqli_real_escape_string($conn,$jaminan);
		$status		= mysqli_real_escape_string($conn,$status);

		// $pengacak	= "f3rry553pth14n4n664r4";
		// $password	= md5(md5($pengacak).$pengacak.md5($password));

		if(empty($foto)){
			$sql	= "
			UPDATE
				kurir
			SET
				nama		= '$nama',
				IMEI		= '$IMEI',
				notelp		= '$notelp',
				id_gender	= '$id_gender',
				no_ktp		= '$no_ktp',
				jaminan		= '$jaminan',
				date_add	= unix_timestamp(),
				status		= '$status'
			WHERE
				id_kurir = '$id'";
		}else{
			$sql	= "
			UPDATE
				kurir
			SET
				nama		= '$nama',
				IMEI		= '$IMEI',
				notelp		= '$notelp',
				id_gender	= '$id_gender',
				foto		= '$foto',
				no_ktp		= '$no_ktp',
				jaminan		= '$jaminan',
				date_add	= unix_timestamp(),
				status		= '$status'
			WHERE
				id_kurir = '$id'";
		}

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE kurir
		SET
			deleted = '1'
		WHERE
			kurir.id_kurir = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function bayar($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE kurir
		SET
			status = '1'
		WHERE
			kurir.id_kurir = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function terbayar($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE transaksi
		SET
			status = '7'
		WHERE
			transaksi.id_kurir = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function tutup($conn){
		$sql	= "
		UPDATE transaksi
		SET
			status = '6'
		WHERE
			status IN (2,3)";

		$result	= $conn->query($sql);
		return $result;
	}
	function tutup_kurir($conn){
		$sql	= "
		UPDATE kurir
		SET
			status = '2'";

		$result	= $conn->query($sql);
		return $result;
	}
	function checknotelp($conn){
		$notelp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['notelp']);
		$notelp		= mysqli_real_escape_string($conn,$notelp);

		$sql	= "
		SELECT
			kurir.notelp
		FROM
			kurir
		WHERE
			kurir.notelp = '$notelp'";
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
	function checkkurir($conn){
		$notelp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['notelp']);
		$IMEI		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['IMEI']);
		
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$IMEI		= mysqli_real_escape_string($conn,$IMEI);

		$sql	= "
		SELECT
			kurir.id_kurir,
			kurir.status
		FROM
			kurir
		WHERE
			kurir.notelp = '$notelp' AND
			kurir.IMEI = '$IMEI'";
		$result	= $conn->query($sql);
		$record	= "2";
		if($result){
			if(!empty($result)){
				$rec	= $result->fetch_assoc();
				$record	= $rec['status'];
				$_SESSION['id_kurir']	= $rec['id_kurir'];
			}
		}
		return $record;
	}
	function checkkurir2($conn){
		$notelp		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['notelp']);
		$IMEI		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['IMEI']);
		
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$IMEI		= mysqli_real_escape_string($conn,$IMEI);

		$sql	= "
		SELECT
			kurir.id_kurir,
			kurir.status
		FROM
			kurir
		WHERE
			kurir.notelp = '$notelp' AND
			kurir.IMEI = '$IMEI'";
		$result	= $conn->query($sql);
		if($result){
			if(!empty($result)){
				$rec	= $result->fetch_assoc();
				$record	= $rec['status'];
				$_SESSION['id_kurir']	= $rec['id_kurir'];
			}
		}
		return $record;
	}
	function tagihan($conn){
		$sql	= "
		SELECT
			kurir.nama,
			(
				SELECT
					SUM(transaksi.untuk_bangjeck+transaksi.untuk_frenchise)
				FROM
					transaksi
				WHERE
					transaksi.id_transaksi >= 54249 AND
					transaksi.deleted = 0 AND
					transaksi.id_kurir = kurir.id_kurir AND
					transaksi.status IN (2,3,6)
			) AS tagihan_kurir,
			gender.gender,
			status_setting.aktif
		FROM
			kurir
		LEFT JOIN
			gender ON
			kurir.id_gender = gender.id_gender
		LEFT JOIN
			status_setting ON
			kurir.status = status_setting.status
		WHERE
			kurir.deleted = '0' AND
			kurir.id_kurir = '".$_SESSION['id_kurir']."' ";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				$rec	= $result->fetch_assoc();
				$record	= array(
					'nama'			=> $rec['nama'],
					'gender'		=> $rec['gender'],
					'aktif'			=> $rec['aktif'],
					'tagihan_kurir'	=> number_format($rec['tagihan_kurir'],0,',','.')
				);
			}
		}
		return $record;
	}
	function updateToken($conn){
		$id		= isset($_SESSION['id_kurir'])?$_SESSION['id_kurir']:"";
		$token	= $_POST['token'];
		$sql	= "UPDATE kurir SET token = '$token' WHERE id_kurir = '$id'";
		$result	= $conn->query($sql);
		return $result;
	}
}
$kurir	= new kurir();
?>