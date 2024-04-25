<?php

	// baca parameter id yg dikirm di url
	$id = "";
	if(isset($_GET["id"])){
		$isbn = $_GET["id"];
	}

	// Jika isbn kosong maka keluar
	if($isbn==""){
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
		<title>Form Edit</title>
	</head>
	<body>
		<h2>HTML Forms</h2>
        
        <form action="aksi_create_data.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
          ID:<br>
		  <input type="text" name="id" value="<?php echo $data['id']; ?>" >
		  <br>
		  Nama:<br>
		  <input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>" >
		  <br>
		  Phone:<br>
		  <input type="text" name="phone" id="phone" value="<?php echo $data['phone']; ?>">
		  <br>
		  Jumlah Peserta:<br>
		  <input type="text" name="jum_peserta" id="jum_peserta" value="<?php echo $data['id']; ?>">
		  <br>
		  Jumlah Hari:<br>
		  <input type="text" name="jum_hari" id="jum_hari" value="<?php echo $data['id']; ?>">
		  <br>
        
          Akomodasi:<br>
            <input type="checkbox" id="akomodasi" name="akomodasi" value="Akomodasi">
          <br>
            
          Transportasi:<br>
            <input type="checkbox" id="transportasi" name="transportasi" value="Transportasi">
          <br>
          Service/Makanan:<br>
            <input type="checkbox" id="service_makanan" name="service_makanan" value="Service/Makanan">
          <br>
        
          Harga Paket:<br>
		  <input type="text" name="harga_paket" id="harga_paket" value="<?php echo $data['id']; ?>">
		  <br><br>
		  <input type="submit" value="Simpan">
		</form> 
        
        
		<form action="aksi_update_data.php" method="post" enctype="multipart/form-data">
		  <input type="text" name="isbn_old" value="<?php echo $data['isbn']; ?>" hidden >
		  ISBN:<br>
		  <input type="text" name="isbn" value="<?php echo $data['isbn']; ?>" >
		  <br>
		  Cover:<br>
		  <input type="file" name="gambar" >
		  <br>
		  Judul:<br>
		  <input type="text" name="judul" value="<?php echo $data['judul']; ?>">
		  <br>
		  Deskripsi:<br>
		  <textarea rows="4" cols="50" name="deskripsi"><?php echo $data['deskripsi']; ?></textarea>
		  <br><br>
		  <input type="submit" value="Update">
		</form> 
	</body>
</html>