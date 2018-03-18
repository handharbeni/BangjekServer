<?php
class invoice_francheis{
	function show($conn,$id_francheis){
		$date	= date("Y-m");

		$sql	= "
		SELECT
			invoice_francheis.tanggal,
			invoice_francheis.nominal,
			invoice_francheis.id_frenchise,
			frenchise.nama,
			invoice_francheis.status,
			FROM_UNIXTIME(invoice_francheis.date_add) AS date_add
		FROM
			invoice_francheis
		LEFT JOIN
			frenchise ON
			invoice_francheis.id_frenchise = frenchise.id_frenchise
		WHERE
			invoice_francheis.deleted = '0' AND
			invoice_francheis.tanggal = '$date'
		";

		$result	= $conn->query($sql);
		$record	= array();
		if($result){
			if($result->num_rows>0){
				while($rec = $result->fetch_assoc()){
					$record[]	= $rec;
				}
			}else{
				$this->insert($conn,$id_francheis);
			}
		}
		return $record;
	}
	function insert($conn,$id_francheis){
		$tanggal	= date("Y-m");
		$nominal	= $this->getNominal($conn,$id_francheis);

		$sql		= "INSERT INTO invoice_francheis(tanggal,nominal,id_frenchise,date_add) VALUES('$tanggal','$nominal','$id_francheis',unix_timestamp())";
		$result		= $conn->query($sql);
	}
	function update($conn,$id_francheis){
		$tanggal	= date("Y-m");
		$nominal	= $this->getNominal($conn,$id_francheis);

		$sql		= "UPDATE invoice_francheis SET nominal='$nominal' WHERE id_frenchise = '$id_francheis' AND tanggal='$tanggal'";
		$result		= $conn->query($sql);
	}
	function getNominal($conn,$id_francheis){
		if($id_frenchise==1){
			$tambahan	= "+ transaksi.untuk_bangjeck";
		}else{
			$tambahan	= "";
		}
		$search1	= date("Y-m");

		$sql	= "
		SELECT
			SUM(transaksi.untuk_frenchise $tambahan) AS nominal
		FROM
			transaksi
		WHERE
			transaksi.id_frenchise	= '$id_francheis' AND
			transaksi.deleted = '0' AND
			transaksi.status = '7' AND
			SUBSTR(FROM_UNIXTIME(date_add),1,7) = '$search1'";

		$result	= $conn->query($sql);
		$record	= 0;
		if($result){
			if(!empty($result)){
				$rec	= $result->fetch_assoc();
				$record	= $rec['nominal'];
			}
		}
		return $record;
	}
}
$invoice_francheis	= new invoice_francheis();
?>