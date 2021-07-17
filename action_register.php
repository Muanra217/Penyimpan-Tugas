<?php 
    include "config.php";

    if (isset($_POST['register'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        mysqli_query($connection, "insert into akun(nama_depan,nama_belakang,username,email,password) values ('$fname','$lname','$uname','$email','$pass')");

        header('location:login.php');
    }

?>