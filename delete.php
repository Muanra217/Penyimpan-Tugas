<?php

include "config.php";

$id_tugas = $_GET['id'];

mysqli_query($connection, "delete from tugas where id_tugas= $id_tugas ");

header("location:index.php");

?>