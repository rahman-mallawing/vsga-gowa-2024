<?php

	// baca parameter id yg dikirm di url
	$isbn = "";
	if(isset($_GET["id"])){
		$isbn = $_GET["id"];
	}

	// Jika isbn kosong maka keluar
	if($isbn==""){
		die("Kode ID kosong");
	}

	include("config_db.php");

	$query = 'DELETE FROM t_pesanan  WHERE  id=:id LIMIT 1;';

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt = $conn->prepare($query);
	    $stmt->bindParam(':id', $id);
	    $stmt->execute();
	    echo "Data dengan ID: ".$id." berhasil dihapus! <br />";

	    echo "<br /> <br /> <br />";
	 	echo "Klik untuk kembali ke halaman ";
	 	echo "<a href='view.php'>VIEW</a>";

	}
	catch(PDOException $e)
	{
	    echo "Gagal baca data: " . $e->getMessage();
	}

?>