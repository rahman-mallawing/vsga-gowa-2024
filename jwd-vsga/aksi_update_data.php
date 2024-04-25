<?php
	//error_reporting(0);
	
	echo "<h2>Halaman Aksi UPDATE Data</h2>";
	// deklarasikan variabel data
	$id; $nama; $phone; $jum_peserta; $jum_hari; $harga_paket; $total_tagihan; $akomodasi; $transportasi; $service_makanan;

	//var_dump($_POST);
	
	// periksa input ID 
	if(isset($_POST["id"])){
		$id = $_POST["id"];
	}else{
		die("Gagal proses ID kosong!<br />");
	}
	// periksa input Nama 
	if(isset($_POST["nama"])){
		$nama = $_POST["nama"];
	}else{
		die("Gagal proses Nama kosong!<br />");
	}
	// periksa input PHONE 
	if(isset($_POST["phone"])){
		$phone = $_POST["phone"];
	}else{
		die("Gagal proses Phone kosong!<br />");
	}
	// periksa input Jumlah Peserta 
	if(isset($_POST["jum_peserta"])){
		$jum_peserta = $_POST["jum_peserta"];
	}else{
		die("Gagal proses Jumlah Peserta kosong!<br />");
	}

    // periksa input Jumlah Hari 
	if(isset($_POST["jum_hari"])){
		$jum_hari = $_POST["jum_hari"];
	}else{
		die("Gagal proses Jumlah Hari kosong!<br />");
	}

    // Cek masing-masing checkbox satu per satu
	$total_tagihan = 0;
    $akomodasi = 'N'; 
    $transportasi = 'N'; 
    $service_makanan = 'N';

        if(isset($_POST['akomodasi'])) {
            $akomodasi = 'Y'; 
            $total_tagihan = 1000000;
        }
        if(isset($_POST['transportasi'])) {
            $transportasi = 'Y'; 
            $total_tagihan = $total_tagihan + 1200000;
        }
        if(isset($_POST['service_makanan'])) {
            $service_makanan = 'Y';
            $total_tagihan = $total_tagihan + 500000;
        }

    // periksa input Harga Paket 
	if(isset($_POST["harga_paket"])){
		$harga_paket = $_POST["harga_paket"];
	}else{
		die("Gagal proses Harga paket kosong!<br />");
	}

	// periksa input Nama tidak boleh kosong
	if($nama == ""){
		die("Nama tidak boleh kosong!<br />");
	}

	// periksa input Phone tidak boleh kosong
	if($phone == ""){
		die("Phone tidak boleh kosong!<br />");
	}

	// periksa input Jumlah Peserta tidak boleh kosong
	if($jum_peserta == ""){
		die("Jumlah Peserta tidak boleh kosong!<br />");
	}

	/* 
		Selanjutnya proses menyimpan dimulai dari sini
	 	proses simpan dilakukan dgn menggunakan 
	 	fungsi update_data yang mengembalikan true jika berhasil
	*/

	 if(update_data($id, $nama, $phone, $jum_peserta, $jum_hari, $akomodasi, $transportasi, $service_makanan, $harga_paket, $total_tagihan, $pesan_error)){
	 	// jika berhasil simpan data
	 	echo "Data berhasil diperbaharui!<br />";
        echo "Klik untuk kembali ke halaman ";
        echo "<a href='view.php'>VIEW</a>"; 

	 }else{
	 	// jika gagal simpan
	 	die($pesan_error . "<br />");
	 }

    // fungsi untuk menambah data
	function update_data($id, $nama, $phone, $jum_peserta, $jum_hari, $akomodasi, $transportasi, $service_makanan, $harga_paket, $total_tagihan, &$info_error){
		include("config_db.php");

		$query = 'UPDATE t_pesanan 
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

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $total_tagihan = $total_tagihan + ($jum_peserta * $jum_hari * $harga_paket);

		    $stmt = $conn->prepare($query);
		    $stmt->bindParam(':id', $id);
		    $stmt->bindParam(':nama', $nama);
		    $stmt->bindParam(':phone', $phone);
		    $stmt->bindParam(':jum_peserta', $jum_peserta);
		    $stmt->bindParam(':jum_hari', $jum_hari);
            $stmt->bindParam(':akomodasi', $akomodasi);
		    $stmt->bindParam(':transportasi', $transportasi);
		    $stmt->bindParam(':service_makanan', $service_makanan);
		    $stmt->bindParam(':harga_paket', $harga_paket);
		    $stmt->bindParam(':total_tagihan', $total_tagihan);
		    $stmt->execute();
		    return true;
		}
		catch(PDOException $e)
		{
			// jika terjadi error maka kita set error info
			$info_error = "Gagal update data: " . $e->getMessage();
            
            
            
			return false;
		}
	}


?>