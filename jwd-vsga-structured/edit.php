<?php

include("action/show_action.php");
$data = read_item($_GET);

?>
<?php  ?>
<html>
	<head>
		<title>Form Edit</title>
	</head>
	<body>
		<h2>HTML Forms - Edit Pesanan</h2>
        
        <form action="action/update_action.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
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
		  <input type="text" name="jum_peserta" id="jum_peserta" value="<?php echo $data['jum_peserta']; ?>">
		  <br>
		  Jumlah Hari:<br>
		  <input type="text" name="jum_hari" id="jum_hari" value="<?php echo $data['jum_hari']; ?>">
		  <br>
        
      Pilih fasilitas wisata:<br>
          <input type="checkbox" id="akomodasi" name="akomodasi" value="" <?php if($data['akomodasi']=="Y"){echo "checked";} ?>>
          <label for="akomodasi">Akomodasi</label><br>
          <input type="checkbox" id="transportasi" name="transportasi" value="" <?php if($data['transportasi']=="Y"){echo "checked";} ?>>
          <label for="transportasi">Transportasi</label><br>
          <input type="checkbox" id="service_makanan" name="service_makanan" value="" <?php if($data['service_makanan']=="Y"){echo "checked";} ?>>
          <label for="service_makanan">Service/Makanan</label><br>
          
        
          Harga Paket:<br>
		  <input type="text" name="harga_paket" id="harga_paket" value="<?php echo $data['harga_paket']; ?>">
		  <br><br>
		  <input type="submit" value="Simpan">
		</form> 
        
        
	</body>
	<script>
        function validateForm() {
            var nama = document.getElementById('nama').value;
            var phone = document.getElementById('phone').value;
            var jum_peserta = document.getElementById('jum_peserta').value;
            var jum_hari = document.getElementById('jum_hari').value;
            var harga_paket = document.getElementById('harga_paket').value;
            
            if (nama == '' ) {
                alert('Nama tidak boleh kosong!');
                return false;
            }
            if (phone == '') {
                alert('Phone tidak boleh kosong!');
                return false;
            }
            if (jum_peserta == '') {
                alert('Jumlah peserta tidak boleh kosong!');
                return false;
            }
            if (jum_hari == '') {
                alert('Jumlah hari tidak boleh kosong!');
                return false;
            }
            if (harga_paket == '') {
                alert('Harga paket tidak boleh kosong!');
                return false;
            }
            return true;
        }
    </script>
</html>