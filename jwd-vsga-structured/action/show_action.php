<?php

function read_item($array)
{
    include("field_validator.php");
    if (!check_field_id($array, "id")) {
        die("Kode ID kosong");
    }
    include("init/query.php");
    try {
        $conn = create_connection();
        $stmt = $conn->prepare($query_read_item);
        $stmt->bindParam(':id', $array["id"]);

        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    } catch (PDOException $e) {
        die("Gagal terhubung: " . $e->getMessage());
    }
}
