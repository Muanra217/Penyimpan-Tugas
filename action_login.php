<?php

include "config.php";

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $result = mysqli_query($connection, "select*from akun where username = '$uname'");

    if (mysqli_num_rows($result) > 0){
        foreach ($result as $q) {
            if (!password_verify($pass, $q['password'])) {
                header("location:login.php");
            } else {
                session_Start();
                $_SESSION['username'] = $uname;
                $_SESSION['nama_depan'] = $q['nama_depan'];
                $_SESSION['nama_belakang'] = $q['nama_belakang'];

                header("location:index.php");
            }
        }
    } else {
        header("location:login.php");
    }
}