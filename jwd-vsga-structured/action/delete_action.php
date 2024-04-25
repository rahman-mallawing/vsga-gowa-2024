<?php

function delete_item($array, &$info)
{
    include("field_validator.php");
    if (!check_field_id($array, "id")) {
        die("Kode ID kosong");
    }
    include("init/query.php");
    try {
        $conn = create_connection();
        $stmt = $conn->prepare($query_delete);
        $stmt->bindParam(':id', $array["id"]);
        $stmt->execute();
        $info = array(
            "id" => $array["id"],
            "count" => $stmt->rowCount(),
            "message" => "Query delete berhasil dieksekusi"
          );
        return true;
    } catch (PDOException $e) {
        die("Gagal terhubung: " . $e->getMessage());
    }
}
