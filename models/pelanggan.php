<?php
class pelanggan{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			pelanggan.id_pelanggan,
			pelanggan.nama,
			pelanggan.IMEI,
			pelanggan.notelp,
			pelanggan.email,
			pelanggan.saldo,
			FROM_UNIXTIME(pelanggan.date_add) AS date_add,
			pelanggan.status,
			status_setting.aktif,
			pelanggan.deleted
		FROM
			pelanggan
		LEFT JOIN
			status_setting ON
			pelanggan.status = status_setting.status
		WHERE
			pelanggan.deleted = '0' AND
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
			pelanggan.id_pelanggan,
			pelanggan.nama
		FROM
			pelanggan
		WHERE
			pelanggan.deleted = '0'
		ORDER BY
			pelanggan.nama ASC";

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
		$password	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['password']);
		$IMEI		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['IMEI']);
		$notelp		= preg_replace("/[^0-9]/","",$_POST['notelp']);
		if(substr($notelp,0,1)=="0"){
			$notelp	= "62".substr($notelp,1,strlen($notelp));
		}
		$email		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['email']);
		$saldo		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['saldo']);
		$status		= $_POST['status'];

		$nama		= mysqli_real_escape_string($conn,$nama);
		$password	= mysqli_real_escape_string($conn,$password);
		$IMEI		= mysqli_real_escape_string($conn,$IMEI);
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$email		= mysqli_real_escape_string($conn,$email);
		$saldo		= mysqli_real_escape_string($conn,$saldo);
		$status		= mysqli_real_escape_string($conn,$status);

		$pengacak	= "f3rry553pth14n4n664r4";
		$password	= md5(md5($pengacak).$pengacak.md5($password));

		$sql	= "
		INSERT INTO
			pelanggan(
				nama,
				password,
				IMEI,
				notelp,
				email,
				saldo,
				date_add,
				status
			)
			VALUES(
				'$nama',
				'$password',
				'$IMEI',
				'$notelp',
				'$email',
				'$saldo',
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
			pelanggan.id_pelanggan,
			pelanggan.nama,
			pelanggan.IMEI,
			pelanggan.token,
			pelanggan.notelp,
			pelanggan.email,
			pelanggan.saldo,
			pelanggan.date_add,
			pelanggan.status,
			status_setting.aktif,
			pelanggan.deleted
		FROM
			pelanggan
		LEFT JOIN
			status_setting ON
			pelanggan.status = status_setting.status
		WHERE
			pelanggan.id_pelanggan = '$id'";
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
		$password	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['password']);
		$IMEI		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['IMEI']);
		$notelp		= preg_replace("/[^0-9]/","",$_POST['notelp']);
		if(substr($notelp,0,1)=="0"){
			$notelp	= "62".substr($notelp,1,strlen($notelp));
		}
		$email		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['email']);
		$saldo		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['saldo']);
		$status		= $_POST['status'];

		$nama		= mysqli_real_escape_string($conn,$nama);
		$password	= mysqli_real_escape_string($conn,$password);
		$IMEI		= mysqli_real_escape_string($conn,$IMEI);
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$email		= mysqli_real_escape_string($conn,$email);
		$saldo		= mysqli_real_escape_string($conn,$saldo);
		$status		= mysqli_real_escape_string($conn,$status);

		$pengacak	= "f3rry553pth14n4n664r4";
		$password	= md5(md5($pengacak).$pengacak.md5($password));

		$sql	= "
		UPDATE
			pelanggan
		SET
			nama		= '$nama',
			password	= '$password',
			IMEI		= '$IMEI',
			notelp		= '$notelp',
			email		= '$email',
			saldo		= '$saldo',
			date_add	= unix_timestamp(),
			status		= '$status'
		WHERE
			id_pelanggan = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE pelanggan
		SET
			deleted = '1'
		WHERE
			pelanggan.id_pelanggan = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function user_login($conn){
		$notelp		= preg_replace("/[^0-9]/","",$_POST['user']);
		if(substr($notelp,0,1)=="0"){
			$notelp	= "62".substr($notelp,1,strlen($notelp));
		}
		$password	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['password']);
		
		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$password	= mysqli_real_escape_string($conn,$password);

		$pengacak	= "f3rry553pth14n4n664r4";
		$password	= md5(md5($pengacak).$pengacak.md5($password));
		
		$sql	= "
		SELECT
			pelanggan.id_pelanggan,
			pelanggan.nama,
			pelanggan.IMEI,
			pelanggan.notelp,
			pelanggan.email,
			pelanggan.saldo,
			pelanggan.status
		FROM
			pelanggan
		WHERE
			pelanggan.deleted = '0' AND
			pelanggan.notelp = '$notelp' AND
			pelanggan.password = '$password'";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				$rec	= $result->fetch_assoc();
				$_SESSION['pelanggan']	= $rec;
			}
		}
	}
	function user_update($conn){
		$nama		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nama']);
		$notelp_new	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['notelp']);
		$email		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['email']);
		$pass_new	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['password_new']);
		
		$notelp		= preg_replace("/[^0-9]/","",$_POST['user']);
		if(substr($notelp,0,1)=="0"){
			$notelp	= "62".substr($notelp,1,strlen($notelp));
		}
		$password	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['password']);

		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$password	= mysqli_real_escape_string($conn,$password);
		$pengacak	= "f3rry553pth14n4n664r4";
		$password	= md5(md5($pengacak).$pengacak.md5($password));

		if(!empty($pass_new)){
			$pass_new	= md5(md5($pengacak).$pengacak.md5($pass_new));
			$tambahan	= ",pelanggan.password	= '$pass_new'";
		}else{
			$pass_new	= $password;
			$tambahan	= "";
		}

		if($this->selectNotelp($conn,$notelp)||($notelp==$notelp_new)){
			$sql	= "
			UPDATE
				pelanggan
			SET
				pelanggan.nama		= '$nama',
				pelanggan.notelp	= '$notelp_new',
				pelanggan.email		= '$email'
				$tambahan
			WHERE
				pelanggan.deleted	= '0' AND
				pelanggan.notelp	= '$notelp' AND
				pelanggan.password	= '$password'
			";
			$result	= $conn->query($sql);
			return $result;
		}else{
			return false;
		}
	}
	function user_insert($conn){
		$nama		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['nama']);
		$notelp		= preg_replace("/[^0-9]/","",$_POST['notelp']);
		if(substr($notelp,0,1)=="0"){
			$notelp	= "62".substr($notelp,1,strlen($notelp));
		}
		$email		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['email']);
		$password	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['password']);
		$IMEI		= "";
		$saldo		= "0";
		$status		= "1";

		$notelp		= mysqli_real_escape_string($conn,$notelp);
		$password	= mysqli_real_escape_string($conn,$password);

		$pengacak	= "f3rry553pth14n4n664r4";
		$password	= md5(md5($pengacak).$pengacak.md5($password));

		if($this->selectNotelp($conn,$notelp)){
			$sql	= "
			INSERT INTO
				pelanggan(
					nama,
					password,
					IMEI,
					notelp,
					email,
					saldo,
					date_add,
					status,
					token
				)
				VALUES(
					'$nama',
					'$password',
					'$IMEI',
					'$notelp',
					'$email',
					'$saldo',
					unix_timestamp(),
					'$status',
					'TIDAK ADA TOKEN'
				)";

			$result	= $conn->query($sql);
			if($result){
				return 1;
			}else{
				return 2;
			}
		}else{
			return 0;
		}
	}
	function selectNotelp($conn,$notelp){
		$notelp		= mysqli_real_escape_string($conn,$notelp);

		$sql	= "
		SELECT
			pelanggan.notelp
		FROM
			pelanggan
		WHERE
			pelanggan.notelp = '$notelp'";
		$result	= $conn->query($sql);
		if($result){
			if($result->num_rows>0){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	function updateToken($conn){
		$id		= isset($_SESSION['pelanggan'])?$_SESSION['pelanggan']['id_pelanggan']:"";
		$token	= $_POST['token'];
		$sql	= "UPDATE pelanggan SET token = '$token' WHERE id_pelanggan = '$id'";
		$result	= $conn->query($sql);
		return $result;
	}
}
$pelanggan	= new pelanggan();
?>