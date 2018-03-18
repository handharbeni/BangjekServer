<?php
class transaksi{
	function show($conn,$page,$limit,$field,$order,$like){
		$page	= mysqli_real_escape_string($conn,$page);
		$limit	= mysqli_real_escape_string($conn,$limit);
		$field	= mysqli_real_escape_string($conn,$field);
		$order	= mysqli_real_escape_string($conn,$order);

		$like	= mysqli_real_escape_string($conn,$like);

		$start	= $page*$limit-$limit;
		$sql	= "
		SELECT
			transaksi.id_transaksi,
			transaksi.status,
			status_transaksi.nama_status,
			transaksi.id_jenis_transaksi,
			jenis_transaksi.nama_jenis,
			transaksi.id_pelanggan,
			pelanggan.nama AS nama_pelanggan,
			transaksi.id_kurir,
			kurir.nama AS nama_kurir,
			transaksi.user_staff,
			staff.nama AS nama_staff,
			transaksi.lokasi_ambil,
			transaksi.keterangan_ambil,
			transaksi.lokasi_kirim,
			transaksi.keterangan_kirim,
			transaksi.jarak,
			transaksi.biaya_jarak,
			transaksi.item,
			transaksi.biaya_item,
			transaksi.biaya_dua_kurir,
			transaksi.total,
			transaksi.id_frenchise,
			frenchise.nama AS nama_frenchise,
			transaksi.untuk_kurir,
			transaksi.untuk_frenchise,
			transaksi.untuk_bangjeck,
			FROM_UNIXTIME(transaksi.date_add) AS date_add,
			transaksi.date_add AS selama,
			transaksi.deleted
		FROM
			transaksi
		LEFT JOIN
			status_transaksi ON
			transaksi.status = status_transaksi.status_transaksi
		LEFT JOIN
			jenis_transaksi ON
			transaksi.id_jenis_transaksi = jenis_transaksi.id_jenis_transaksi
		LEFT JOIN
			pelanggan ON
			transaksi.id_pelanggan = pelanggan.id_pelanggan
		LEFT JOIN
			kurir ON
			transaksi.id_kurir = kurir.id_kurir
		LEFT JOIN
			staff ON
			transaksi.user_staff = staff.user_staff
		LEFT JOIN
			frenchise ON
			transaksi.id_frenchise = frenchise.id_frenchise
		WHERE
			transaksi.deleted = '0' AND
			$field LIKE '%$like%'
		ORDER BY
			FIELD(transaksi.status,1,2,3,6,7,4,5),
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
			transaksi.id_transaksi,
			transaksi.status
		FROM
			transaksi
		WHERE
			transaksi.deleted = '0'
		ORDER BY
			transaksi.status ASC";

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
	function selectPelanggan($conn,$notelp){
		$notelp		= preg_replace("/[^0-9]/","",$notelp);
		if(substr($notelp,0,1)=="0"){
			$notelp	= "62".substr($notelp,1,strlen($notelp));
		}

		$sql	= "
		SELECT
			pelanggan.id_pelanggan
		FROM
			pelanggan
		WHERE
			pelanggan.notelp = '$notelp'";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if($result->num_rows>0){
				$rec	= $result->fetch_assoc();
				$record	= $rec;
				return $record['id_pelanggan'];
			}else{
				return $this->insertPelanggan($conn,$notelp);
			}
		}else{
			return $this->insertPelanggan($conn,$notelp);
		}
	}
	function selectMaxPelanggan($conn){
		$sql	= "
		SELECT
			MAX(pelanggan.id_pelanggan) AS maks
		FROM
			pelanggan";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				$rec	= $result->fetch_assoc();
				$record	= $rec;
				return $record['maks'];
			}else{
				return "1";
			}
		}else{
			return "1";
		}
	}
	function insertPelanggan($conn,$notelp){
		if(substr($notelp,0,1)=="0"){
			$notelp	= "62".substr($notelp,1,strlen($notelp));
		}
		$nama		= $notelp;
		$password	= $notelp;
		$IMEI		= "";
		$email		= "";
		$saldo		= "0";
		$status		= "0";

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
		$result	= $this->selectMaxPelanggan($conn);
		return $result;
	}
	function insert($conn){
		$status				= 1;
		$id_jenis_transaksi	= $_POST['id_jenis_transaksi'];
		$id_pelanggan		= $this->selectPelanggan($conn,$_POST['notelp_pelanggan']);
		$id_kurir			= $_POST['id_kurir'];
		if(!empty($id_kurir)){
			$status	= 2;
		}
		$user_staff			= $_SESSION['user_staff'];
		$lokasi_ambil		= preg_replace("/[^A-Za-z0-9?![:space:]@.,-]/","",$_POST['lokasi_ambil']);
		$keterangan_ambil	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['keterangan_ambil']);
		$lokasi_kirim		= preg_replace("/[^A-Za-z0-9?![:space:]@.,-]/","",$_POST['lokasi_kirim']);
		$keterangan_kirim	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['keterangan_kirim']);
		$jarak				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['jarak']);
		$biaya_jarak		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['biaya_jarak']);
		$item				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['item']);
		$biaya_item			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['biaya_item']);
		$biaya_dua_kurir	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['biaya_dua_kurir']);
		$total				= $biaya_jarak+$biaya_dua_kurir;
		$id_frenchise		= 1;
		$untuk_kurir		= $total * 0.8;
		$untuk_frenchise	= $total * 0.16;
		$untuk_bangjeck		= $total * 0.04;

		$status				= mysqli_real_escape_string($conn,$status);
		$id_jenis_transaksi	= mysqli_real_escape_string($conn,$id_jenis_transaksi);
		$id_pelanggan		= mysqli_real_escape_string($conn,$id_pelanggan);
		$id_kurir			= mysqli_real_escape_string($conn,$id_kurir);
		$user_staff			= mysqli_real_escape_string($conn,$user_staff);
		$lokasi_ambil		= mysqli_real_escape_string($conn,$lokasi_ambil);
		$keterangan_ambil	= mysqli_real_escape_string($conn,$keterangan_ambil);
		$lokasi_kirim		= mysqli_real_escape_string($conn,$lokasi_kirim);
		$keterangan_kirim	= mysqli_real_escape_string($conn,$keterangan_kirim);
		$jarak				= mysqli_real_escape_string($conn,$jarak);
		$biaya_jarak		= mysqli_real_escape_string($conn,$biaya_jarak);
		$item				= mysqli_real_escape_string($conn,$item);
		$biaya_item			= mysqli_real_escape_string($conn,$biaya_item);
		$biaya_dua_kurir	= mysqli_real_escape_string($conn,$biaya_dua_kurir);
		$total				= mysqli_real_escape_string($conn,$total);
		$id_frenchise		= mysqli_real_escape_string($conn,$id_frenchise);
		$untuk_kurir		= mysqli_real_escape_string($conn,$untuk_kurir);
		$untuk_frenchise	= mysqli_real_escape_string($conn,$untuk_frenchise);
		$untuk_bangjeck		= mysqli_real_escape_string($conn,$untuk_bangjeck);

		$sql	= "
		INSERT INTO
			transaksi(
				status,
				id_jenis_transaksi,
				id_pelanggan,
				id_kurir,
				user_staff,
				lokasi_ambil,
				keterangan_ambil,
				lokasi_kirim,
				keterangan_kirim,
				jarak,
				biaya_jarak,
				item,
				biaya_item,
				biaya_dua_kurir,
				total,
				id_frenchise,
				untuk_kurir,
				untuk_frenchise,
				untuk_bangjeck,
				date_add
			)
			VALUES(
				'$status',
				'$id_jenis_transaksi',
				'$id_pelanggan',
				'$id_kurir',
				'$user_staff',
				'$lokasi_ambil',
				'$keterangan_ambil',
				'$lokasi_kirim',
				'$keterangan_kirim',
				'$jarak',
				'$biaya_jarak',
				'$item',
				'$biaya_item',
				'$biaya_dua_kurir',
				'$total',
				'$id_frenchise',
				'$untuk_kurir',
				'$untuk_frenchise',
				'$untuk_bangjeck',
				unix_timestamp()
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function select($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		SELECT
			transaksi.id_transaksi,
			transaksi.status,
			status_transaksi.nama_status,
			transaksi.id_jenis_transaksi,
			jenis_transaksi.nama_jenis,
			transaksi.id_pelanggan,
			pelanggan.notelp,
			pelanggan.nama,
			transaksi.id_kurir,
			kurir.nama,
			transaksi.user_staff,
			staff.nama,
			transaksi.lokasi_ambil,
			transaksi.keterangan_ambil,
			transaksi.lokasi_kirim,
			transaksi.keterangan_kirim,
			transaksi.jarak,
			transaksi.biaya_jarak,
			transaksi.item,
			transaksi.biaya_item,
			transaksi.biaya_dua_kurir,
			transaksi.total,
			transaksi.id_frenchise,
			frenchise.nama,
			transaksi.untuk_kurir,
			transaksi.untuk_frenchise,
			transaksi.untuk_bangjeck,
			transaksi.date_add,
			transaksi.deleted
		FROM
			transaksi
		LEFT JOIN
			status_transaksi ON
			transaksi.status = status_transaksi.status_transaksi
		LEFT JOIN
			jenis_transaksi ON
			transaksi.id_jenis_transaksi = jenis_transaksi.id_jenis_transaksi
		LEFT JOIN
			pelanggan ON
			transaksi.id_pelanggan = pelanggan.id_pelanggan
		LEFT JOIN
			kurir ON
			transaksi.id_kurir = kurir.id_kurir
		LEFT JOIN
			staff ON
			transaksi.user_staff = staff.user_staff
		LEFT JOIN
			frenchise ON
			transaksi.id_frenchise = frenchise.id_frenchise
		WHERE
			transaksi.id_transaksi = '$id'";
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
		$status				= $_POST['status'];
		$id_jenis_transaksi	= $_POST['id_jenis_transaksi'];
		$id_pelanggan		= $this->selectPelanggan($conn,$_POST['notelp_pelanggan']);
		$id_kurir			= $_POST['id_kurir'];

		$user_staff			= $_SESSION['user_staff'];
		$lokasi_ambil		= preg_replace("/[^A-Za-z0-9?![:space:]@.,-]/","",$_POST['lokasi_ambil']);
		$keterangan_ambil	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['keterangan_ambil']);
		$lokasi_kirim		= preg_replace("/[^A-Za-z0-9?![:space:]@.,-]/","",$_POST['lokasi_kirim']);
		$keterangan_kirim	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['keterangan_kirim']);
		$jarak				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['jarak']);
		$biaya_jarak		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['biaya_jarak']);
		$item				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['item']);
		$biaya_item			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['biaya_item']);
		$biaya_dua_kurir	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['biaya_dua_kurir']);
		$total				= $biaya_jarak+$biaya_dua_kurir;
		$id_frenchise		= 1;
		$untuk_kurir		= $total * 0.8;
		$untuk_frenchise	= $total * 0.16;
		$untuk_bangjeck		= $total * 0.04;

		$status				= mysqli_real_escape_string($conn,$status);
		$id_jenis_transaksi	= mysqli_real_escape_string($conn,$id_jenis_transaksi);
		$id_pelanggan		= mysqli_real_escape_string($conn,$id_pelanggan);
		$id_kurir			= mysqli_real_escape_string($conn,$id_kurir);
		$user_staff			= mysqli_real_escape_string($conn,$user_staff);
		$lokasi_ambil		= mysqli_real_escape_string($conn,$lokasi_ambil);
		$keterangan_ambil	= mysqli_real_escape_string($conn,$keterangan_ambil);
		$lokasi_kirim		= mysqli_real_escape_string($conn,$lokasi_kirim);
		$keterangan_kirim	= mysqli_real_escape_string($conn,$keterangan_kirim);
		$jarak				= mysqli_real_escape_string($conn,$jarak);
		$biaya_jarak		= mysqli_real_escape_string($conn,$biaya_jarak);
		$item				= mysqli_real_escape_string($conn,$item);
		$biaya_item			= mysqli_real_escape_string($conn,$biaya_item);
		$biaya_dua_kurir	= mysqli_real_escape_string($conn,$biaya_dua_kurir);
		$total				= mysqli_real_escape_string($conn,$total);
		$id_frenchise		= mysqli_real_escape_string($conn,$id_frenchise);
		$untuk_kurir		= mysqli_real_escape_string($conn,$untuk_kurir);
		$untuk_frenchise	= mysqli_real_escape_string($conn,$untuk_frenchise);
		$untuk_bangjeck		= mysqli_real_escape_string($conn,$untuk_bangjeck);

		$sql	= "
		UPDATE
			transaksi
		SET
			status				= '$status',
			id_jenis_transaksi	= '$id_jenis_transaksi',
			id_pelanggan		= '$id_pelanggan',
			id_kurir			= '$id_kurir',
			user_staff			= '$user_staff',
			lokasi_ambil		= '$lokasi_ambil',
			keterangan_ambil	= '$keterangan_ambil',
			lokasi_kirim		= '$lokasi_kirim',
			keterangan_kirim	= '$keterangan_kirim',
			jarak				= '$jarak',
			biaya_jarak			= '$biaya_jarak',
			item				= '$item',
			biaya_item			= '$biaya_item',
			biaya_dua_kurir		= '$biaya_dua_kurir',
			total				= '$total',
			id_frenchise		= '$id_frenchise',
			untuk_kurir			= '$untuk_kurir',
			untuk_frenchise		= '$untuk_frenchise',
			untuk_bangjeck		= '$untuk_bangjeck',
			date_add			= unix_timestamp()
		WHERE
			id_transaksi = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function delete($conn,$id){
		$id		= mysqli_real_escape_string($conn,$id);

		$sql	= "
		UPDATE transaksi
		SET
			deleted = '1'
		WHERE
			transaksi.id_transaksi = '$id'";

		$result	= $conn->query($sql);
		return $result;
	}
	function kodeTransaksi($nilai){
		$panjang	= strlen($nilai);
		$nol		= "";

		for($i=0;$i<10-$panjang;$i++){
			$nol.="0";
		}
		return $nol.$nilai;
	}
	function laporan($conn){
		$mulai				= $_POST['mulai'];
		$berakhir			= $_POST['berakhir'];
		$status_transaksi	= $_POST['status_transaksi'];
		$id_kurir			= $_POST['id_kurir'];
		
		$mulai				= mysqli_real_escape_string($conn,$mulai);
		$berakhir			= mysqli_real_escape_string($conn,$berakhir);
		$status_transaksi	= mysqli_real_escape_string($conn,$status_transaksi);
		$id_kurir			= mysqli_real_escape_string($conn,$id_kurir);
		
		$mulai		= strtotime($mulai);
		$berakhir	= strtotime($berakhir);
		$tambahan1	= "";
		$tambahan2	= "";

		if(!empty($status_transaksi)){
			$tambahan1	=	"transaksi.status = '$status_transaksi' AND";
		}
		if(!empty($id_kurir)){
			$tambahan2	=	"transaksi.id_kurir = '$id_kurir' AND";
		}

		
		$sql	= "
		SELECT
			transaksi.id_transaksi,
			transaksi.status,
			status_transaksi.nama_status,
			transaksi.id_jenis_transaksi,
			jenis_transaksi.nama_jenis,
			transaksi.id_pelanggan,
			pelanggan.nama AS nama_pelanggan,
			transaksi.id_kurir,
			kurir.nama AS nama_kurir,
			transaksi.user_staff,
			staff.nama AS nama_staff,
			transaksi.lokasi_ambil,
			transaksi.keterangan_ambil,
			transaksi.lokasi_kirim,
			transaksi.keterangan_kirim,
			transaksi.jarak,
			transaksi.biaya_jarak,
			transaksi.item,
			transaksi.biaya_item,
			transaksi.biaya_dua_kurir,
			transaksi.total,
			transaksi.id_frenchise,
			frenchise.nama AS nama_frenchise,
			transaksi.untuk_kurir,
			transaksi.untuk_frenchise,
			transaksi.untuk_bangjeck,
			FROM_UNIXTIME(transaksi.date_add) AS date_add,
			transaksi.deleted
		FROM
			transaksi
		LEFT JOIN
			status_transaksi ON
			transaksi.status = status_transaksi.status_transaksi
		LEFT JOIN
			jenis_transaksi ON
			transaksi.id_jenis_transaksi = jenis_transaksi.id_jenis_transaksi
		LEFT JOIN
			pelanggan ON
			transaksi.id_pelanggan = pelanggan.id_pelanggan
		LEFT JOIN
			kurir ON
			transaksi.id_kurir = kurir.id_kurir
		LEFT JOIN
			staff ON
			transaksi.user_staff = staff.user_staff
		LEFT JOIN
			frenchise ON
			transaksi.id_frenchise = frenchise.id_frenchise
		WHERE
			transaksi.deleted = '0' AND
			$tambahan1
			$tambahan2
			transaksi.date_add BETWEEN $mulai AND $berakhir
		ORDER BY
			transaksi.id_transaksi DESC";

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
	function history($conn){
		$id		= isset($_SESSION['pelanggan']['id_pelanggan'])?$_SESSION['pelanggan']['id_pelanggan']:"";
		$sql	= "
		SELECT
			transaksi.id_transaksi AS kode_transaksi,
			status_transaksi.nama_status AS status,
			jenis_transaksi.nama_jenis AS jenis_transaksi,
			kurir.nama AS nama_kurir,
			transaksi.lokasi_ambil,
			transaksi.keterangan_ambil,
			transaksi.lokasi_kirim,
			transaksi.keterangan_kirim,
			transaksi.jarak,
			transaksi.biaya_jarak,
			transaksi.item,
			transaksi.biaya_item,
			transaksi.biaya_dua_kurir,
			transaksi.total,
			FROM_UNIXTIME(transaksi.date_add) AS tanggal
		FROM
			transaksi
		LEFT JOIN
			status_transaksi ON
			transaksi.status = status_transaksi.status_transaksi
		LEFT JOIN
			jenis_transaksi ON
			transaksi.id_jenis_transaksi = jenis_transaksi.id_jenis_transaksi
		LEFT JOIN
			pelanggan ON
			transaksi.id_pelanggan = pelanggan.id_pelanggan
		LEFT JOIN
			kurir ON
			transaksi.id_kurir = kurir.id_kurir
		LEFT JOIN
			staff ON
			transaksi.user_staff = staff.user_staff
		LEFT JOIN
			frenchise ON
			transaksi.id_frenchise = frenchise.id_frenchise
		WHERE
			transaksi.deleted = '0' AND
			pelanggan.id_pelanggan = '".$id."'
		ORDER BY
			transaksi.id_transaksi DESC
		LIMIT 0,100";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				while($rec = $result->fetch_assoc()){
					$record[]	= array(
						'kode_transaksi'	=> $this->kodeTransaksi($rec['kode_transaksi']),
						'status'			=> $rec['status'],
						'jenis_transaksi'	=> $rec['jenis_transaksi'],
						'nama_kurir'		=> empty($rec['nama_kurir'])?"-":$rec['nama_kurir'],
						'lokasi_ambil'		=> $rec['lokasi_ambil'],
						'keterangan_ambil'	=> $rec['keterangan_ambil'],
						'lokasi_kirim'		=> $rec['lokasi_kirim'],
						'keterangan_kirim'	=> $rec['keterangan_kirim'],
						'jarak'				=> number_format($rec['jarak'],0,',','.')." Km",
						'biaya_jarak'		=> number_format($rec['biaya_jarak'],0,',','.'),
						'item'				=> $rec['item'],
						'biaya_item'		=> number_format($rec['biaya_item'],0,',','.'),
						'biaya_dua_kurir'	=> number_format($rec['biaya_dua_kurir'],0,',','.'),
						'total'				=> number_format($rec['total'],0,',','.'),
						'tanggal'			=> $rec['tanggal']
					);
				}
			}
		}
		$record	= array(
			"json_history"	=> $record
		);
		return $record;
	}
	function insertFromApp($conn,$id_frenchise){
		$status				= 1;
		$jenis_transaksi	= $_POST['jenis_transaksi'];
		switch($jenis_transaksi){
			case "Ojek Argo":
				$id_jenis_transaksi	= 1;
			break;
			case "Pesan Makanan":
				$id_jenis_transaksi	= 2;
			break;
			case "Belanja":
				$id_jenis_transaksi	= 3;
			break;
			case "Kurir Kargo":
				$id_jenis_transaksi	= 4;
			break;
			case "Food Court":
				$id_jenis_transaksi	= 5;
			break;
			case "Tiket":
				$id_jenis_transaksi	= 6;
			break;
		}
		$id_pelanggan		= $this->selectPelanggan($conn,$_POST['user']);
		$id_kurir			= 0;
		$user_staff			= "";
		$lokasi_ambil		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['lokasi_ambil']);
		$keterangan_ambil	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['keterangan_ambil']);
		$lokasi_kirim		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['lokasi_kirim']);
		$keterangan_kirim	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['keterangan_kirim']);
		$jarak				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['jarak']);
		$biaya_jarak		= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['biaya_jarak']);
		$item				= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['item']);
		$biaya_item			= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['biaya_item']);
		$biaya_dua_kurir	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['biaya_dua_kurir']);
		$total				= $biaya_jarak+$biaya_dua_kurir;
		$untuk_kurir		= $total * 0.8;
		$untuk_frenchise	= $total * 0.16;
		$untuk_bangjeck		= $total * 0.04;

		$status				= mysqli_real_escape_string($conn,$status);
		$id_jenis_transaksi	= mysqli_real_escape_string($conn,$id_jenis_transaksi);
		$id_pelanggan		= mysqli_real_escape_string($conn,$id_pelanggan);
		$id_kurir			= mysqli_real_escape_string($conn,$id_kurir);
		$user_staff			= mysqli_real_escape_string($conn,$user_staff);
		$lokasi_ambil		= mysqli_real_escape_string($conn,$lokasi_ambil);
		$keterangan_ambil	= mysqli_real_escape_string($conn,$keterangan_ambil);
		$lokasi_kirim		= mysqli_real_escape_string($conn,$lokasi_kirim);
		$keterangan_kirim	= mysqli_real_escape_string($conn,$keterangan_kirim);
		$jarak				= mysqli_real_escape_string($conn,$jarak);
		$biaya_jarak		= mysqli_real_escape_string($conn,$biaya_jarak);
		$item				= mysqli_real_escape_string($conn,$item);
		$biaya_item			= mysqli_real_escape_string($conn,$biaya_item);
		$biaya_dua_kurir	= mysqli_real_escape_string($conn,$biaya_dua_kurir);
		$total				= mysqli_real_escape_string($conn,$total);
		$id_frenchise		= mysqli_real_escape_string($conn,$id_frenchise);
		$untuk_kurir		= mysqli_real_escape_string($conn,$untuk_kurir);
		$untuk_frenchise	= mysqli_real_escape_string($conn,$untuk_frenchise);
		$untuk_bangjeck		= mysqli_real_escape_string($conn,$untuk_bangjeck);

		$sql	= "
		INSERT INTO
			transaksi(
				status,
				id_jenis_transaksi,
				id_pelanggan,
				id_kurir,
				user_staff,
				lokasi_ambil,
				keterangan_ambil,
				lokasi_kirim,
				keterangan_kirim,
				jarak,
				biaya_jarak,
				item,
				biaya_item,
				biaya_dua_kurir,
				total,
				id_frenchise,
				untuk_kurir,
				untuk_frenchise,
				untuk_bangjeck,
				date_add
			)
			VALUES(
				'$status',
				'$id_jenis_transaksi',
				'$id_pelanggan',
				'$id_kurir',
				'$user_staff',
				'$lokasi_ambil',
				'$keterangan_ambil',
				'$lokasi_kirim',
				'$keterangan_kirim',
				'$jarak',
				'$biaya_jarak',
				'$item',
				'$biaya_item',
				'$biaya_dua_kurir',
				'$total',
				'$id_frenchise',
				'$untuk_kurir',
				'$untuk_frenchise',
				'$untuk_bangjeck',
				unix_timestamp()
			)";

		$result	= $conn->query($sql);
		return $result;
	}
	function batal($conn,$id){
		$id				= mysqli_real_escape_string($conn,$id);
		$id_pelanggan	= $_SESSION['pelanggan']['id_pelanggan'];

		$sql	= "
		UPDATE transaksi
		SET
			status = '4'
		WHERE
			transaksi.id_transaksi = '$id' AND
			transaksi.id_pelanggan = '$id_pelanggan' AND
			status = '1'";

		$result	= $conn->query($sql);
		return $result;
	}
	function still_transaction($conn){
		$id		= $_SESSION['pelanggan']['id_pelanggan'];
		$sql	= "
		SELECT
			COUNT(*) AS jumlah
		FROM
			transaksi
		WHERE
			status <= 2 AND
			id_pelanggan	= '$id'";
		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if($result->num_rows>0){
				$rec	= $result->fetch_assoc();
				return $rec['jumlah'];
			}else{
				return -1;
			}
		}else{
			return -1;
		}
	}
	function job($conn){
		$sql	= "
		SELECT
			transaksi.id_transaksi AS kode_transaksi,
			status_transaksi.nama_status AS status,
			jenis_transaksi.nama_jenis AS jenis_transaksi,
			kurir.nama AS nama_kurir,
			transaksi.lokasi_ambil,
			transaksi.keterangan_ambil,
			transaksi.lokasi_kirim,
			transaksi.keterangan_kirim,
			transaksi.jarak,
			transaksi.biaya_jarak,
			transaksi.item,
			transaksi.biaya_item,
			transaksi.biaya_dua_kurir,
			transaksi.total,
			FROM_UNIXTIME(transaksi.date_add) AS tanggal
		FROM
			transaksi
		LEFT JOIN
			status_transaksi ON
			transaksi.status = status_transaksi.status_transaksi
		LEFT JOIN
			jenis_transaksi ON
			transaksi.id_jenis_transaksi = jenis_transaksi.id_jenis_transaksi
		LEFT JOIN
			pelanggan ON
			transaksi.id_pelanggan = pelanggan.id_pelanggan
		LEFT JOIN
			kurir ON
			transaksi.id_kurir = kurir.id_kurir
		LEFT JOIN
			staff ON
			transaksi.user_staff = staff.user_staff
		LEFT JOIN
			frenchise ON
			transaksi.id_frenchise = frenchise.id_frenchise
		WHERE
			transaksi.deleted = '0' AND
			transaksi.status = '1' AND
			transaksi.id_kurir = '0'
		ORDER BY
			transaksi.id_transaksi DESC
		LIMIT 0,100";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				while($rec = $result->fetch_assoc()){
					$record[]	= array(
						'kode_transaksi'	=> $this->kodeTransaksi($rec['kode_transaksi']),
						'status'			=> $rec['status'],
						'jenis_transaksi'	=> $rec['jenis_transaksi'],
						'nama_kurir'		=> empty($rec['nama_kurir'])?"-":$rec['nama_kurir'],
						'lokasi_ambil'		=> $rec['lokasi_ambil'],
						'keterangan_ambil'	=> $rec['keterangan_ambil'],
						'lokasi_kirim'		=> $rec['lokasi_kirim'],
						'keterangan_kirim'	=> $rec['keterangan_kirim'],
						'jarak'				=> number_format($rec['jarak'],0,',','.')." Km",
						'biaya_jarak'		=> number_format($rec['biaya_jarak'],0,',','.'),
						'item'				=> $rec['item'],
						'biaya_item'		=> number_format($rec['biaya_item'],0,',','.'),
						'biaya_dua_kurir'	=> number_format($rec['biaya_dua_kurir'],0,',','.'),
						'total'				=> number_format($rec['total'],0,',','.'),
						'tanggal'			=> $rec['tanggal'],
						'latlng'			=> $this->latlng($conn,$rec['lokasi_ambil'])
					);
				}
			}
		}
		$record	= array(
			"json_history"	=> $record
		);
		return $record;
	}
	function latlng($conn,$address){
		$data	= $this->selectFromGPS($conn,$address);
		if($data[0]!=0&&$data[1]!=0){
			return $data[0].",".$data[1];
		}else{
			$prepAddr	= str_replace(' ','+',$address);
			$geocode	= file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDaS4PxsXY7mk0TUzcDa8jhel1UVwLi7bc&sensor=false');
			$output		= json_decode($geocode);
			if(!empty($output->results)){
				$latitude	= $output->results[0]->geometry->location->lat;
				$longitude	= $output->results[0]->geometry->location->lng;
				$address	= strtolower($address);
				$this->insertToGPS($conn,$address,$latitude,$longitude);
				return $latitude.",".$longitude;
			}else{
				return "0,0";
			}
		}
	}
	function selectFromGPS($conn,$address){
		$address	= strtolower($address);

		$sql	="
		SELECT
			latitude,
			longitude
		FROM
			gps_location
		WHERE
			address = '$address'
		LIMIT 1";
		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if($result->num_rows>0){
				$rec	= $result->fetch_assoc();
				return array($rec['latitude'],$rec['longitude']);
			}else{
				return array(0,0);
			}
		}else{
			return array(0,0);
		}
	}
	function insertToGPS($conn,$address,$latitude,$longitude){
		$sql	="INSERT INTO gps_location(address,latitude,longitude,date_add) VALUES('$address','$latitude','$longitude',unix_timestamp())";
		$conn->query($sql);
	}
	function jumlah_job($conn){
		$sql	="
		SELECT
			COUNT(id_transaksi) AS jumlah
		FROM
			transaksi
		WHERE
			transaksi.deleted = '0' AND
			transaksi.status = '1' AND
			transaksi.id_kurir = '0'";
		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if($result->num_rows>0){
				$rec	= $result->fetch_assoc();
				return $rec['jumlah'];
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	function ambil_job($conn){
		$id_transaksi	= preg_replace("/[^A-Za-z0-9?![:space:]@.-]/","",$_POST['kode_transaksi']);
		$id_transaksi	= $id_transaksi * 1;
		$id_transaksi	= mysqli_real_escape_string($conn,$id_transaksi);

		$sql	= "
		SELECT
			transaksi.status
		FROM
			transaksi
		WHERE
			transaksi.id_transaksi = '$id_transaksi' AND
			transaksi.status = '1'";
		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){

				if($result->num_rows>0){
					$sql	="
					UPDATE
						transaksi
					SET
						id_kurir = '".$_SESSION['id_kurir']."',
						status = '2'
					WHERE
						transaksi.id_transaksi = '$id_transaksi' AND
						transaksi.status = '1'";
					$result	= $conn->query($sql);
					if($result){
						return 1;
					}else{
						return 0;
					}
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	function history_kurir($conn){
		$id		= isset($_SESSION['id_kurir'])?$_SESSION['id_kurir']:"";

		$sql	= "
		SELECT
			transaksi.id_transaksi AS kode_transaksi,
			status_transaksi.nama_status AS status,
			jenis_transaksi.nama_jenis AS jenis_transaksi,
			kurir.nama AS nama_kurir,
			transaksi.lokasi_ambil,
			transaksi.keterangan_ambil,
			transaksi.lokasi_kirim,
			transaksi.keterangan_kirim,
			transaksi.jarak,
			transaksi.biaya_jarak,
			transaksi.item,
			transaksi.biaya_item,
			transaksi.biaya_dua_kurir,
			transaksi.total,
			FROM_UNIXTIME(transaksi.date_add) AS tanggal
		FROM
			transaksi
		LEFT JOIN
			status_transaksi ON
			transaksi.status = status_transaksi.status_transaksi
		LEFT JOIN
			jenis_transaksi ON
			transaksi.id_jenis_transaksi = jenis_transaksi.id_jenis_transaksi
		LEFT JOIN
			pelanggan ON
			transaksi.id_pelanggan = pelanggan.id_pelanggan
		LEFT JOIN
			kurir ON
			transaksi.id_kurir = kurir.id_kurir
		LEFT JOIN
			staff ON
			transaksi.user_staff = staff.user_staff
		LEFT JOIN
			frenchise ON
			transaksi.id_frenchise = frenchise.id_frenchise
		WHERE
			transaksi.id_transaksi >= 54249 AND
			transaksi.deleted = '0' AND
			transaksi.id_kurir = '".$id."'
		ORDER BY
			transaksi.id_transaksi DESC
		LIMIT 0,20";
		
		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				while($rec = $result->fetch_assoc()){
					$record[]	= array(
						'kode_transaksi'	=> $this->kodeTransaksi($rec['kode_transaksi']),
						'status'			=> $rec['status'],
						'jenis_transaksi'	=> $rec['jenis_transaksi'],
						'nama_kurir'		=> empty($rec['nama_kurir'])?"-":$rec['nama_kurir'],
						'lokasi_ambil'		=> $rec['lokasi_ambil'],
						'keterangan_ambil'	=> $rec['keterangan_ambil'],
						'lokasi_kirim'		=> $rec['lokasi_kirim'],
						'keterangan_kirim'	=> $rec['keterangan_kirim'],
						'jarak'				=> number_format($rec['jarak'],0,',','.')." Km",
						'biaya_jarak'		=> number_format($rec['biaya_jarak'],0,',','.'),
						'item'				=> $rec['item'],
						'biaya_item'		=> number_format($rec['biaya_item'],0,',','.'),
						'biaya_dua_kurir'	=> number_format($rec['biaya_dua_kurir'],0,',','.'),
						'total'				=> number_format($rec['total'],0,',','.'),
						'tanggal'			=> $rec['tanggal']
					);
				}
			}
		}
		$record	= array(
			"json_history"	=> $record
		);
		return $record;
	}
	function batal_kurir($conn,$id){
		$id			= mysqli_real_escape_string($conn,$id);
		$id_kurir	= $_SESSION['id_kurir'];

		$sql	= "
		UPDATE transaksi
		SET
			status = '1',
			id_kurir = '0'
		WHERE
			transaksi.id_transaksi = '$id' AND
			transaksi.id_kurir = '$id_kurir' AND
			status = '2'";
		$result	= $conn->query($sql);
		return $result;
	}
	function selesai_kurir($conn,$id){
		$id			= mysqli_real_escape_string($conn,$id);
		$id_kurir	= $_SESSION['id_kurir'];

		$sql	= "
		UPDATE transaksi
		SET
			status = '3'
		WHERE
			transaksi.id_transaksi = '$id' AND
			transaksi.id_kurir = '$id_kurir' AND
			status = '2'";
		$result	= $conn->query($sql);
		return $result;
	}
	function get_job_status($conn){
		$id_kurir	= $_SESSION['id_kurir'];

		$sql	="
		SELECT
			COUNT(id_transaksi) AS jumlah
		FROM
			transaksi
		WHERE
			transaksi.deleted = '0' AND
			transaksi.status = '2' AND
			transaksi.id_kurir = '$id_kurir'
		ORDER BY
			transaksi.id_transaksi DESC
		LIMIT 1";
		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if($result->num_rows>0){
				$rec	= $result->fetch_assoc();
				return $rec['jumlah'];
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	function status_history($conn){
		$kode	= mysqli_real_escape_string($conn,$_POST['kode']);
		$status	= mysqli_real_escape_string($conn,$_POST['status']);

		$kode	= $kode*1;
		
		$sql	= "
		SELECT
			transaksi.status
		FROM
			transaksi
		WHERE
			transaksi.deleted = '0' AND
			transaksi.id_transaksi = '$kode'";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if($result->num_rows>0){
				$rec	= $result->fetch_assoc();
				if($rec['status']!=$status){
					if($status==1&&$rec['status']==2){
						return 1;
					}else if($status==2&&$rec['status']==1){
						return 2;
					}else{
						return 0;
					}
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	function distance($address){
		$prepAddr = str_replace(' ','+',$address);
		$geocode =file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
		$output = json_decode($geocode);
		$latitude = $output->results[0]->geometry->location->lat;
		$longitude = $output->results[0]->geometry->location->lng;
		return $latitude.",".$longitude;
	}
	function getDailySupport($conn,$id_frenchise){
		$id	= mysqli_real_escape_string($conn,$id_frenchise);
		$search1	= date("Y-m");

		$sql	= "
		SELECT
			SUBSTR(FROM_UNIXTIME(date_add),9,2) AS day,
			COUNT(id_transaksi) AS amount
		FROM transaksi
		WHERE
			id_frenchise = '$id' AND
			SUBSTR(FROM_UNIXTIME(date_add),1,7) = '$search1' AND
			status > 0
		GROUP BY SUBSTR(FROM_UNIXTIME(date_add),1,10)";
		$result	= $conn->query($sql);
		$data	= array();
		if ($result->num_rows > 0){
			while($rec = $result->fetch_assoc()){
				$index	= $rec['day'];
				if($index[0]==0){
					$index	= str_replace("0","",$index);
				}
				
				$data[$index] = $rec['amount'];
			}
		}
		return $data;
	}
	function getMonthlySupport($conn,$id_frenchise){
		$id	= mysqli_real_escape_string($conn,$id_frenchise);
		$search1	= date("Y");

		$sql	= "
		SELECT
			SUBSTR(FROM_UNIXTIME(date_add),6,2) AS month,
			COUNT(id_transaksi) AS amount
		FROM
			transaksi
		WHERE
			id_frenchise = '$id' AND
			SUBSTR(FROM_UNIXTIME(date_add),1,4) = '$search1' AND
			status > 0
		GROUP BY SUBSTR(FROM_UNIXTIME(date_add),1,7)";
		$result	= $conn->query($sql);
		$data	= array();
		if ($result->num_rows > 0){
			while($rec = $result->fetch_assoc()){
				$index	= $rec['month'];
				if($index[0]==0){
					$index	= str_replace("0","",$index);
				}
				
				$data[$index] = $rec['amount'];
			}
		}
		return $data;
	}
	function getYearlySupport($conn,$id_frenchise){
		$id	= mysqli_real_escape_string($conn,$id_frenchise);

		$sql	= "
		SELECT
			SUBSTR(FROM_UNIXTIME(date_add),1,4) AS year,
			COUNT(id_transaksi) AS amount
		FROM
			transaksi
		WHERE
			id_frenchise = '$id' AND
			status > 0
		GROUP BY year";
		$result	= $conn->query($sql);
		$data	= array();
		if ($result->num_rows > 0){
			while($rec = $result->fetch_assoc()){
				$index	= $rec['year'];
				$data[$index] = $rec['amount'];
			}
		}
		return $data;
	}
	function infromasiFrenchise($id_frenchise){
		$sql	= "
		SELECT
			
		FROM
			transaksi
		WHERE
			transaksi.id_frenchise	= '$id_frenchise' AND
			transaksi.deleted = '0'";

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
	function getTransactionData($conn,$status,$id_frenchise){
		if($id_frenchise==1){
			$tambahan	= "+ transaksi.untuk_bangjeck";
		}else{
			$tambahan	= "";
		}
		$search1	= date("Y-m");

		$sql	= "
		SELECT
			COUNT(id_transaksi) AS jumlah,
			SUM(transaksi.untuk_frenchise $tambahan) AS nominal
		FROM
			transaksi
		WHERE
			transaksi.id_frenchise	= '$id_frenchise' AND
			transaksi.deleted = '0' AND
			status = '$status' AND
			SUBSTR(FROM_UNIXTIME(date_add),1,7) = '$search1'";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if(!empty($result)){
				$rec = $result->fetch_assoc();
				$record['jumlah']	= $rec['jumlah'];
				$record['nominal']	= $rec['nominal'];
			}
		}
		return $record;
	}
}
$transaksi	= new transaksi();
?>