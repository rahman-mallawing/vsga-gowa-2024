<?php

	$query_read = 'SELECT * FROM t_pesanan';
	$query_read_item = 'SELECT * FROM t_pesanan  WHERE  id=:id LIMIT 1;';
	$query_delete = 'DELETE FROM t_pesanan  WHERE  id=:id LIMIT 1;';
	$query_insert = 'INSERT INTO t_pesanan (nama, phone, jum_peserta, jum_hari, akomodasi, transportasi, service_makanan, harga_paket, total_tagihan) 
						VALUES (:nama, :phone, :jum_peserta, :jum_hari, :akomodasi, :transportasi, :service_makanan, :harga_paket, :total_tagihan);';
	$query_update = 'UPDATE t_pesanan 
						SET nama = :nama, 
							phone = :phone, 
							jum_peserta = :jum_peserta, 
							jum_hari = :jum_hari, 
							akomodasi = :akomodasi, 
							transportasi = :transportasi, 
							service_makanan = :service_makanan, 
							harga_paket = :harga_paket, 
							total_tagihan = :total_tagihan 
						WHERE id = :id;';

	function create_connection(){
		include("config_db.php");
		$conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}

	

?>