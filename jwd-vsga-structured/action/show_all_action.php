<?php
    
    function read_all(){
		include("init/query.php");
                try {
                    $conn = create_connection();
                    $data = $conn->query($query_read);
                    return $data;                    
                }
                catch(PDOException $e)
                {
                    die("Gagal terhubung: " . $e->getMessage());
                }
	}
?>
            
 