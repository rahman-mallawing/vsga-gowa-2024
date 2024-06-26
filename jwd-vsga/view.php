<html>
    <head>
        <title>View Data Pesanan</title>
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
            
            
            
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            
            tr:nth-child(even) {
                background-color: floralwhite;
            }

            tr:hover{
                background-color:greenyellow;
            }
            
            .tombol-group{
                width: 200px;
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
            
            .tambah{
                width: 180px;
                padding: 10px 20px;
                background-color: mediumpurple;
                border-radius: 8px;
                font-size: 16pt;
            }
            
        </style>
    </head>
    <body>
        <!-- container -->
        <div class="container">
            <judul>
                <h2>View Data Pesanan</h2>
            </judul>
                        
            
            <?php
                include("config_db.php");
                $query = 'SELECT * FROM t_pesanan';
                try {
                    echo "<br /> <br />";
                     echo "<a href='create_data.php' class='tombol tambah'>Tambah Pesanan</a>";
                     echo "<br /> <br /> <br />";
                    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $data = $conn->query($query);
                    
                    if(empty($data)){
                        echo "<h2>Data kosong</h2>";
                    }else{
                        echo "
                        
                        <table>
                            <tr>
                                <th>Nama</th>
                                <th>Phone</th>
                                <th>Jum Peserta</th>
                                <th>Jumlah Hari</th>
                                <th>Akomodasi</th>
                                <th>Transportasi</th>
                                <th>Service/Makanan</th>
                                <th>Harga Paket</th>
                                <th>Total Tagihan</th>
                                <th>Aksi</th>
                            </tr>";
                    }
                    
                    
                    while ($row = $data->fetch()){
                        echo "
                            <tr>
                                <td>" . $row["nama"] . "</td>
                                <td>" . $row["phone"] . "</td>
                                <td>" . $row["jum_peserta"] . "</td>
                                <td>" . $row["jum_hari"] . "</td>
                                <td>" . $row["akomodasi"] . "</td>
                                <td>" . $row["transportasi"] . "</td>
                                <td>" . $row["service_makanan"] . "</td>
                                <td>" . $row["harga_paket"] . "</td>
                                <td>" . $row["total_tagihan"] . "</td>
                                <td>
                                    <div class='tombol-group'>
                                        <input class='tombol lihat' type='button' value='Lihat'  onclick=\"location.href='show.php?id=" . $row["id"] . "';\"'>
                                        <input class='tombol edit' type='button' value='Edit'  onclick=\"location.href='edit.php?id=" . $row["id"]. "';\"'>";
                        
                        
                        $confirm = "onclick=\"return confirm('Apakah anda yakin hapus?');\"";
		                echo "<a href='delete_data.php?id=" . $row["id"] . "' class='tombol hapus'" . $confirm . " >delete</a>";
                        echo "
                                    </div>
                                </td>
                            </tr>";
                    }
                }
                catch(PDOException $e)
                {
                    echo "Gagal terhubung: " . $e->getMessage();
                }
            ?>
            
            
            
            
            
        </div>
        <!-- akhir tag container-->
    </body>
</html>