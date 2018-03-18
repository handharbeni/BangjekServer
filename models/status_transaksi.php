<?php
class status_transaksi{
	function showSelect($conn){
		$sql	= "
		SELECT
			status_transaksi.status_transaksi,
			status_transaksi.nama_status
		FROM
			status_transaksi
		WHERE
			status_transaksi.deleted = '0'
		ORDER BY
			status_transaksi.status_transaksi ASC";

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
}
$status_transaksi	= new status_transaksi();
?>