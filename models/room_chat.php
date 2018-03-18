<?php
class room_chat{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			room_chat.id_room,
			room_chat.id_transaksi,
			transaksi.status,
			room_chat.id_kurir,
			kurir.nama,
			room_chat.id_pelanggan,
			pelanggan.nama,
			room_chat.id_merchant,
			merchant.name,
			room_chat.isi_chat,
			FROM_UNIXTIME(room_chat.date_add) AS date_add,
			room_chat.status,
			status_setting.aktif,
			room_chat.deleted
		FROM
			room_chat
		LEFT JOIN
			transaksi ON
			room_chat.id_transaksi = transaksi.id_transaksi
		LEFT JOIN
			kurir ON
			room_chat.id_kurir = kurir.id_kurir
		LEFT JOIN
			pelanggan ON
			room_chat.id_pelanggan = pelanggan.id_pelanggan
		LEFT JOIN
			merchant ON
			room_chat.id_merchant = merchant.id_merchant
		LEFT JOIN
			status_setting ON
			room_chat.status = status_setting.status
		WHERE
			room_chat.deleted = '0' AND
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
			room_chat.id_room,
			room_chat.id_transaksi
		FROM
			room_chat
		WHERE
			room_chat.deleted = '0'
		ORDER BY
			room_chat.id_transaksi ASC";

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
		$id_transaksi	= $_POST['id_transaksi'];
		$id_kurir		= $_POST['id_kurir'];
		$id_pelanggan	= $_POST['id_pelanggan'];
		$id_merchant	= $_POST['id_merchant'];
		$isi_chat		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['isi_chat']);
		$status			= $_POST['status'];

		$id_transaksi	= mysqli_real_escape_string($conn,$id_transaksi);
		$id_kurir		= mysqli_real_escape_string($conn,$id_kurir);
		$id_pelanggan	= mysqli_real_escape_string($conn,$id_pelanggan);
		$id_merchant	= mysqli_real_escape_string($conn,$id_merchant);
		$isi_chat		= mysqli_real_escape_string($conn,$isi_chat);
		$status			= mysqli_real_escape_string($conn,$status);

		$sql	= "
		INSERT INTO
			room_chat(
				id_transaksi,
				id_kurir,
				id_pelanggan,
				id_merchant,
				isi_chat,
				date_add,
				status
			)
			VALUES(
				'$id_transaksi',
				'$id_kurir',
				'$id_pelanggan',
				'$id_merchant',
				'$isi_chat',
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
			room_chat.id_room,
			room_chat.id_transaksi,
			transaksi.status,
			room_chat.id_kurir,
			kurir.nama,
			room_chat.id_pelanggan,
			pelanggan.nama,
			room_chat.id_merchant,
			merchant.name,
			room_chat.isi_chat,
			room_chat.date_add,
			room_chat.status,
			status_setting.aktif,
			room_chat.deleted
		FROM
			room_chat
		LEFT JOIN
			transaksi ON
			room_chat.id_transaksi = transaksi.id_transaksi
		LEFT JOIN
			kurir ON
			room_chat.id_kurir = kurir.id_kurir
		LEFT JOIN
			pelanggan ON
			room_chat.id_pelanggan = pelanggan.id_pelanggan
		LEFT JOIN
			merchant ON
			room_chat.id_merchant = merchant.id_merchant
		LEFT JOIN
			status_setting ON
			room_chat.status = status_setting.status
		WHERE
			room_chat.id_room = '$id'";
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
		$id_transaksi	= $_POST['id_transaksi'];
		$id_kurir		= $_POST['id_kurir'];
		$id_pelanggan	= $_POST['id_pelanggan'];
		$id_merchant	= $_POST['id_merchant'];
		$isi_chat		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['isi_chat']);
		$status			= $_POST['status'];

		$id_transaksi	= mysqli_real_escape_string($conn,$id_transaksi);
		$id_kurir		= mysqli_real_escape_string($conn,$id_kurir);
		$id_pelanggan	= mysqli_real_escape_string($conn,$id_pelanggan);
		$id_merchant	= mysqli_real_escape_string($conn,$id_merchant);
		$isi_chat		= mysqli_real_escape_string($conn,$isi_chat);
		$status			= mysqli_real_escape_string($conn,$status);

		$sql	= "
		UPDATE
			room_chat
		SET
			id_transaksi	= '$id_transaksi',
			id_kurir		= '$id_kurir',
			id_pelanggan	= '$id_pelanggan',
			id_merchant		= '$id_merchant',
			isi_chat		= '$isi_chat',
			date_add		= unix_timestamp(),
			status			= '$status'
		WHERE
			id_room = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE room_chat
		SET
			deleted = '1'
		WHERE
			room_chat.id_room = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function get_chat($conn,$sebagai,$jenis){
		// $id		= mysqli_real_escape_string($conn,$_POST['id_transaksi']);
		$kode			= $_POST['kode']*1;
		$id_transaksi	= mysqli_real_escape_string($conn,$kode);

		$sql	= "
		SELECT
			room_chat.id_room,
			room_chat.id_transaksi AS kode,
			transaksi.status,
			room_chat.id_kurir,
			kurir.nama AS nama_krurir,
			room_chat.id_pelanggan,
			pelanggan.nama AS nama_pelanggan,
			room_chat.id_merchant,
			merchant.name,
			room_chat.penulis,
			room_chat.isi_chat,
			FROM_UNIXTIME(room_chat.date_add) AS date_add,
			room_chat.status,
			status_setting.aktif,
			room_chat.deleted
		FROM
			room_chat
		LEFT JOIN
			transaksi ON
			room_chat.id_transaksi = transaksi.id_transaksi
		LEFT JOIN
			kurir ON
			room_chat.id_kurir = kurir.id_kurir
		LEFT JOIN
			pelanggan ON
			room_chat.id_pelanggan = pelanggan.id_pelanggan
		LEFT JOIN
			merchant ON
			room_chat.id_merchant = merchant.id_merchant
		LEFT JOIN
			status_setting ON
			room_chat.status = status_setting.status
		WHERE
			room_chat.deleted = '0' AND
			room_chat.id_transaksi = '$id_transaksi'";

		$result	= $conn->query($sql);
		$record	= array();
		$id		= 0;
		$nama_dia = "";
		if($result){
			if(!empty($result)){
				while($rec = $result->fetch_assoc()){
					$nama	= "";
					if($jenis==0){
						$nama	= $rec['nama_krurir'];
						$id		= $rec['id_pelanggan'];
					}else if($jenis==1){
						$nama	= "Pelanggan";
						$id		= $rec['id_kurir'];
					}else{
						$nama	= "BangJeck";
					}
					
					if($rec['penulis']==0){
						$nama_dia = $rec['nama_krurir'];
					}else if($rec['penulis']==1){
						$nama_dia = "Pelanggan";
					}else{
						$nama_dia = "BangJeck";
					}

					$record[]	= array(
						'kode'		=> $rec['kode'],
						'nama'		=> $nama_dia,
						'konten'	=> $rec['isi_chat'],
						'tanggal'	=> $rec['date_add']
					);
				}
			}
		}
		return array($record,$id,$nama);
	}
	function tambah_chat($conn,$id_kurir,$id_pelanggan){
		$id_transaksi	= $_POST['kode']*1;
		$id_merchant	= 0;
		$penulis		= $_POST['penulis'];
		$isi_chat		= $_POST['isi_chat'];
		$status			= 0;

		$id_transaksi	= mysqli_real_escape_string($conn,$id_transaksi);
		$id_kurir		= mysqli_real_escape_string($conn,$id_kurir);
		$id_pelanggan	= mysqli_real_escape_string($conn,$id_pelanggan);
		$id_merchant	= mysqli_real_escape_string($conn,$id_merchant);
		$penulis		= mysqli_real_escape_string($conn,$penulis);
		$isi_chat		= mysqli_real_escape_string($conn,$isi_chat);
		$status			= mysqli_real_escape_string($conn,$status);

		$sql	= "
		INSERT INTO
			room_chat(
				id_transaksi,
				id_kurir,
				id_pelanggan,
				id_merchant,
				penulis,
				isi_chat,
				date_add,
				status
			)
			VALUES(
				'$id_transaksi',
				'$id_kurir',
				'$id_pelanggan',
				'$id_merchant',
				'$penulis',
				'$isi_chat',
				unix_timestamp(),
				'$status'
			)";

		$result	= $conn->query($sql);
		return $result;
	}
}
$room_chat	= new room_chat();
?>