<?php

session_start();

if (update_item($_POST, $info)) {
    $_SESSION['info'] = $info;
    header('Location: ../show_all.php');
    exit();
} else {
    die("Operasi UPDATE gagal!");
}

function update_item($array, &$info)
{
    include("field_validator.php");
    if (!check_field_id($array, "id")) {
        die("Kode ID kosong");
    }
    if (!check_fields($array, $no_keys, $empty_value)) {
        die("Kolom filed-filed tidak boleh kosong kosong");
    }
    include("../init/query.php");
    try {
        $conn = create_connection();
        $stmt = $conn->prepare($query_update);
        $jum_peserta = $array["jum_peserta"];
        $jum_hari = $array["jum_hari"];
        $harga_paket = $array["harga_paket"];

        $akomodasi = 'N';
        $transportasi = 'N';
        $service_makanan = 'N';

        if (isset($array['akomodasi'])) {
            $akomodasi = 'Y';
            $total_tagihan = 1000000;
        }
        if (isset($array['transportasi'])) {
            $transportasi = 'Y';
            $total_tagihan = $total_tagihan + 1200000;
        }
        if (isset($array['service_makanan'])) {
            $service_makanan = 'Y';
            $total_tagihan = $total_tagihan + 500000;
        }

        $total_tagihan = $total_tagihan + ($jum_peserta * $jum_hari * $harga_paket);
        $stmt->bindParam(':id', $array["id"]);
        $stmt->bindParam(':nama', $array["nama"]);
        $stmt->bindParam(':phone', $array["phone"]);
        $stmt->bindParam(':jum_peserta', $jum_peserta);
        $stmt->bindParam(':jum_hari', $jum_hari);
        $stmt->bindParam(':akomodasi', $akomodasi);
        $stmt->bindParam(':transportasi', $transportasi);
        $stmt->bindParam(':service_makanan', $service_makanan);
        $stmt->bindParam(':harga_paket', $harga_paket);
        $stmt->bindParam(':total_tagihan', $total_tagihan);
        $stmt->execute();
        $info = array(
            "id" => $array["id"],
            "count" => $stmt->rowCount(),
            "message" => "Query UPDATE berhasil dieksekusi"
        );
        return true;
    } catch (PDOException $e) {
        die("Gagal terhubung: " . $e->getMessage());
    }
}
