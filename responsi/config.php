<?php
    $config =  mysqli_connect('localhost', 'root', '', 'db_responsi');
    if (!$config) {
        die('Gagal terhubung ke MySQLi :' . mysqli_connect_error());
    }

?>