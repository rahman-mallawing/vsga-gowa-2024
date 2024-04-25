<?php

    
    function check_fields($array,&$no_keys, &$empty_value){
        $fields = array("nama","phone","jum_peserta","jum_hari","harga_paket");
        $result = true;
        foreach ($fields as $key) {
            if (array_key_exists($key, $array)) {
                // Jika kunci ada dalam array, periksa apakah nilainya tidak kosong
                if (empty($array[$key])) {
                    // Jika nilainya  kosong, tambahkan ke array $empty_value
                    $empty_value[] = $key;
                    $result = false;
                } 
            } else {
                // Jika kunci tidak ada dalam array, tambahkan ke array $no_keys
                $no_keys[] = $key;
                $result = false;
            }
        }
        return $result;
    }

    
    function check_field_id($array, $id_field){
		if (array_key_exists($id_field, $array)) {
            return true;
        } else {
            return false;
        }
	}
?>
            
 