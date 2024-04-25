<html>
	<head>
		<title>Create - Form Input</title>
	</head>
	<body>

		<h2>HTML Forms</h2>

		<form action="aksi_create_data.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
		  Nama:<br>
		  <input type="text" name="nama" id="nama" >
		  <br>
		  Phone:<br>
		  <input type="text" name="phone" id="phone" >
		  <br>
		  Jumlah Peserta:<br>
		  <input type="text" name="jum_peserta" id="jum_peserta" >
		  <br>
		  Jumlah Hari:<br>
		  <input type="text" name="jum_hari" id="jum_hari">
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
		  <input type="text" name="harga_paket" id="harga_paket" >
		  <br>
          Total Tagihan:<br>
		  <input type="text" name="total_tagihan" >
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