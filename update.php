<?php

    include "config.php";

    $id_tugas = $_GET['id_update'];

    if(isset($_POST['btnupdate'])){
        $id = $_POST['id'];
        $judul = $_POST['judul_tugas'];
        $matkul = $_POST['matakuliah'];
        $ket = $_POST['keterangan'];
        $dl = $_POST['deadline'];

        mysqli_query($connection, "update tugas set judul_tugas = '$judul', matakuliah = '$matkul', keterangan = '$ket', deadline = '$dl' where id_tugas = $id");

        header("location:index.php");
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
    <title>Document</title>
</head>
<body>
    <?php
        $hasil = mysqli_query($connection,"select * from tugas where id_tugas = '$id_tugas'");

        foreach($hasil as $hsl){    
    ?>

        <form action="update.php" method="post">
            <input type="hidden" value=<?php echo $hsl['id_tugas']; ?> name="id">
            <table>
                <tr>
                    <td><label for="judul_tugas">Judul Tugas:</label></td>
                    <td><input type="text" id="judul_tugas" name="judul_tugas" value=<?php echo $hsl['judul_tugas'] ?> ></td>
                </tr>
                <tr>
                    <td><label for="matakuliah">Matakuliah:</label></td>
                    <td><input type="text" id="matakuliah" name="matakuliah" value=<?php echo $hsl['matakuliah'] ?> ></td>
                </tr>
                <tr>
                    <td><label for="keterangan">Keterangan:</label></td>
                    <td><textarea id="keterangan" name="keterangan" rows="4" cols="50" value=<?php echo $hsl['keterangan'] ?> ></textarea></td>
                </tr>
                <tr>
                    <td><label for="deadline">Deadline:</label></td>
                    <td><input type="date" id="deadline" name="deadline" value=<?php echo $hsl['deadline'] ?> ></td>
                </tr>
            </table>
            <input type="submit" name="btnupdate" value="Update">
        </form> 


    <?php
        }
    ?>

        
</body>
</html>