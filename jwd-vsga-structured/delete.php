<?php
	session_start();
	include("action/delete_action.php");
	if (delete_item($_GET, $info)) {
        $_SESSION['info'] = $info;
		header('Location: show_all.php');
     	exit();
    }else{
		die("Operasi hapus gagal!");
	}
?>