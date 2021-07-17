<?php 
    $host = "localhost";
    $namauser = "root";
    $password = "";
    $namadatabase = "pegas";

    // membangun koneksi
    $connection = mysqli_connect($host,$namauser,$password,$namadatabase);
    // memeriksa koneksi
    if (!$connection) { 
        die("Connection failed: " . mysqli_connect_error()); 
    }
?>