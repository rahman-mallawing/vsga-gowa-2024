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
		<style>
            
            .container{
                width: 900px;
                margin-left: auto;
                margin-right: auto;
            }
            
            judul{
                text-align: center;
                text-decoration-line: underline;
            }
            
            .foto_part{
                width: 300px;
                display: inline-block;
            }
            
            .data_part{
                width: 580px;
                display: inline-block;
                vertical-align: top;
            }
            
            .foto{
                width: 250px;
                height: 350px;
                margin-left: auto;
                margin-right: auto;
            }
            
            img{
                width: 100%;
                height: 100%;
            }
            
            .control-group{
                padding-bottom: 5px;
            }
            
            .control-label{
                width: 140px;
                display: inline-block;
                font-weight: bold;
                vertical-align: top;
            }
            
            .control-dot{
                width: 5px;
                display: inline-block;
                vertical-align: top;
            }
            
            .control-value{
                width: 420px;
                display: inline-block;
                font-style: oblique;
                text-align: justify;
            }

            .tombol{
                width: 48px;
                color: white;
                margin: 0 2px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                display: inline-block;
                text-align: center;
            }
            
            .lihat{
                background-color: #4CAF50;
            }
            .edit{
                background-color: darkorange;
            }
            .hapus{
                background-color: coral;
            }

            .balik{
                background-color: mediumpurple;
            }
            
            .tambah{
                width: auto;
                padding: 10px 20px;
                background-color: mediumpurple;
                border-radius: 8px;
                font-size: 18pt;
            }


            
        </style>
	</head>
	<body>
		<!-- container -->
        <div class="container">
            <judul>
                <h2>Show Pesanan Wisata</h2>
            </judul>
              
             <?php

								$foto = "wisata.jpg";

								echo "
					                <div class=\"foto_part\">
					                    <div class=\"foto\">
					                        <img src=\"$foto\" alt=\"Wisata Makassar\"/>
					                    </div>
					                </div> <!-- akhir class foto_part -->

					                <div class=\"data_part\">                
					                    <div class=\"control-group\">
					                        <div class=\"control-label\">ID</div>
					                        <div class=\"control-dot\">:</div>
					                        <div class=\"control-value\">" . $data['id'] . "</div>
					                    </div>
					                    <div class=\"control-group\">
					                        <div class=\"control-label\">Nama</div>
					                        <div class=\"control-dot\">:</div>
					                        <div class=\"control-value\">" . $data['nama'] . "</div>
					                    </div>                    
					                    <div class=\"control-group\">
					                        <div class=\"control-label\">Phone</div>
					                        <div class=\"control-dot\">:</div>
					                        <div class=\"control-value\">" . $data['phone'] . "</div>
					                    </div>

					                    <div class=\"control-group\">
					                        <div class=\"control-label\">Jumlah Peserta</div>
					                        <div class=\"control-dot\">:</div>
					                        <div class=\"control-value\">" . $data['jum_peserta'] . "</div>
					                    </div>
					                    <div class=\"control-group\">
					                        <div class=\"control-label\">Jumlah hari</div>
					                        <div class=\"control-dot\">:</div>
					                        <div class=\"control-value\">" . $data['jum_hari'] . "</div>
					                    </div>
					                    <div class=\"control-group\">
					                        <div class=\"control-label\">Akomodasi</div>
					                        <div class=\"control-dot\">:</div>
					                        <div class=\"control-value\">" . $data['akomodasi'] . "</div>
					                    </div>
					                    <div class=\"control-group\">
					                        <div class=\"control-label\">Transportasi</div>
					                        <div class=\"control-dot\">:</div>
					                        <div class=\"control-value\">" . $data['transportasi'] . "</div>
					                    </div>
					                    <div class=\"control-group\">
					                        <div class=\"control-label\">Service/Makanan</div>
					                        <div class=\"control-dot\">:</div>
					                        <div class=\"control-value\">" . $data['service_makanan'] . "</div>
					                    </div>
					                    <div class=\"control-group\">
					                        <div class=\"control-label\">Harga paket</div>
					                        <div class=\"control-dot\">:</div>
					                        <div class=\"control-value\">" . $data['harga_paket'] . "</div>
					                    </div>
					                    <div class=\"control-group\">
					                        <div class=\"control-label\">Total tagihan</div>
					                        <div class=\"control-dot\">:</div>
					                        <div class=\"control-value\">" . $data['total_tagihan'] . "</div>
					                    </div>
					                    <div class=\"control-group\">
					                        <div class='tombol-group'>
                                        <input class='tombol balik' type='button' value='Back'  onclick=\"location.href='view.php';\"'>
                                        <input class='tombol edit' type='button' value='Edit'  onclick=\"location.href='edit.php?id=" . $data["id"]. "';\"'>" . "
					                    </div>
					                </div>";

					                

					               

		?>
                        
        </div>
        <!-- akhir tag container-->
		
        
	</body>
</html>