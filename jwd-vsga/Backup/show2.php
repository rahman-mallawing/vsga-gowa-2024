<html>
    <head>
        <title>Show Data Buku</title>
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
            
            .biodata_part{
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
            
        </style>
    </head>
    <body>
        <!-- container -->
        <div class="container">
            <judul>
                <h2>Show Data Buku</h2>
            </judul>
            
            <?php
                include("Buku.php");
                $isbn = $_GET["isbn"];
                $buku = new Buku($isbn, "blum ada judul");
                $foto = "stephen.jpg";
            
                echo "
                <div class=\"foto_part\">
                    <div class=\"foto\">
                        <img src=\"$foto\" alt=\"Foto Profil\"/>
                    </div>
                </div> <!-- akhir class foto_part -->
                <div class=\"biodata_part\">                
                    <div class=\"control-group\">
                        <div class=\"control-label\">ISBN</div>
                        <div class=\"control-dot\">:</div>
                        <div class=\"control-value\">$buku->isbn</div>
                    </div>
                    <div class=\"control-group\">
                        <div class=\"control-label\">Judul</div>
                        <div class=\"control-dot\">:</div>
                        <div class=\"control-value\">$buku->judul</div>
                    </div>
                </div>";
                        
                        
            ?>
                        
        </div>
        <!-- akhir tag container-->
    </body>
</html>