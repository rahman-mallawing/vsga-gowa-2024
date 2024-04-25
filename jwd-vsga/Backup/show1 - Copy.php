<?php

	// baca parameter id yg dikirm di url
	$id = "";
	if(isset($_GET["id"])){
		$id = $_GET["id"];
	}

	// Jika isbn kosong maka keluar
	if($id==""){
		die("Kode ID kosong");
	}

	include("config_db.php");

	$query = 'SELECT * FROM t_pesanan  WHERE  id=:id LIMIT 1;';
	$data;
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt = $conn->prepare($query);
	    $stmt->bindParam(':id', $id);

	    $stmt->execute();
	    $data = $stmt->fetch();
        

	}
	catch(PDOException $e)
	{
	    echo "Gagal baca data: " . $e->getMessage();
	}

?>
<?php  ?>
<html>
	<head>
		<title>Show Pesanan</title>
	</head>
	<body>
		<h2>Pesanan</h2>
        
        <form action="aksi_create_data.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" disabled>
          ID:<br>
		  <input type="text" name="id" value="<?php echo $data['id']; ?>" disabled>
		  <br>
		  Nama:<br>
		  <input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>" disabled>
		  <br>
		  Phone:<br>
		  <input type="text" name="phone" id="phone" value="<?php echo $data['phone']; ?>" disabled>
		  <br>
		  Jumlah Peserta:<br>
		  <input type="text" name="jum_peserta" id="jum_peserta" value="<?php echo $data['jum_peserta']; ?>" disabled>
		  <br>
		  Jumlah Hari:<br>
		  <input type="text" name="jum_hari" id="jum_hari" value="<?php echo $data['jum_hari']; ?>" disabled>
		  <br>
        
          Akomodasi:<br>
            <input type="checkbox" id="akomodasi" name="akomodasi" value="" <?php if($data['akomodasi']=="Y"){echo "checked";} ?> disabled>
          <br>
            
          Transportasi:<br>
            <input type="checkbox" id="transportasi" name="transportasi" value="Transportasi" <?php if($data['transportasi']=="Y"){echo "checked";} ?> disabled>
          <br>
          Service/Makanan:<br>
            <input type="checkbox" id="service_makanan" name="service_makanan" value="Service/Makanan" <?php if($data['service_makanan']=="Y"){echo "checked";} ?> disabled>
          <br>
        
          Harga Paket:<br>
		  <input type="text" name="harga_paket" id="harga_paket" value="<?php echo $data['harga_paket']; ?>" disabled>
		  <br><br>
		  <input type="submit" value="Simpan" hidden>
		</form> 
        
         <br>
         <br>
        
        <a href='view.php'> Kembali</a>
        
	</body>
</html>