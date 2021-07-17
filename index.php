<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        header("location:login.php");
    }

    include "config.php";

    if (isset($_POST['btnsubmit'])){
        $judul = $_POST['judul_tugas'];
        $matkul = $_POST['matakuliah'];
        $ket = $_POST['keterangan'];
        $dl = $_POST['deadline'];

        mysqli_query($connection, "insert into tugas(judul_tugas,matakuliah,keterangan,deadline) values ('$judul','$matkul','$ket',CAST('$dl' AS DATE))");
    }

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
    <title>Penyimpan Tugas</title>
</head>
<body>

    <!-- nav -->
    <nav class="navbar fixed-top navbar-light" style="background-color: #e3f2fd;">
        <div class="logo"><a href="#sambut">Pe<span>gas.</span></a></div>
        <a href="logout.php"><button type="button" class="btn btn-outline-primary">Logout</button></a>
    </nav>

    <!--jumbotron -->
    <section class="home" id="home">
    </section>

    <!--about -->
    <div class="tentang" id="sambut">
        <div class="container">
            <p class="title">Halo, <?php echo $_SESSION['nama_depan']." ".$_SESSION['nama_belakang']; ?>! Selamat Datang!</p>
            <section class="about" id="about">
                <div class="row">
                        <div class="col-sm-6 column left">
                            <img src="assets/book.jpg" alt="book" class="img-fluid">
                        </div>
                        <div class="col-sm-6 column right">
                            <div class="h4">Tentang website ini:</div>
                            <p>Pegas atau penyimpan tugas aplikasi berbasis website yang digunakan untuk menyimpan tugas. Banyak mahasiswa - mahasiswa entah dari tingkat apa pun sering kali lupa akan tugasnya. Oleh karena itu tujuan dari website ini adalah untuk catatan untuk menyimpan tugas secara singkat dan jelas agar lebih mudah jika para mahasiswa ingin mencatat tugas sehingga bisa mengatur waktu.</p>
                        </div>
                </div>
            </section>
        </div>
    </div>

    <!--Input-->
    <div class="input">
        <form action="index.php" method="post" class="container">
            <p class="title">Silahkan Masukkan Tugas Anda!</p>
            <div class="form-group">
                <label for="judul_tugas">Judul Tugas:</label>
                <input type="text" class="form-control" id="judul_tugas" name="judul_tugas" placeholder="Judul Tugas" required>
            </div>
            <div class="form-group">
                <label for="matakuliah">Matakuliah:</label>
                <input type="text" class="form-control" id="matakuliah" name="matakuliah" placeholder="Matakuliah">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Batas Akhir:</label>
                <input type="date" class="tanggal" id="deadline" name="deadline" value="<?php $dl = date('Y-m-d', strtotime($dl)); ?>" required>
            </div>
            <input type="submit" class="btn btn-primary" name="btnsubmit" value="Submit">
        </form>
    </div>
    
    <!--tampil data-->
    <div class="data">
        <div class="container">
            <?php 
                $hasil = mysqli_query($connection, "select*from tugas");
                foreach($hasil as $row){
            ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['judul_tugas']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['matakuliah']; ?></h6>
                                <p class="card-text"><?php echo $row['keterangan']; ?></p>
                                <p class="card-text">Batas akhir: <?php echo $row['deadline']; ?></p>
                                <a href="index.php?id_update=<?php echo $row['id_tugas']; ?>" class="btn btn-primary">Update</a>
                                <a href="delete.php?id=<?php echo $row['id_tugas']; ?>" onclick="return confirm('Anda yakin ingin menghapusnya ?')" class="btn btn-primary">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
        </div>
    </div>

    <!--update-->
    <div class="update">
        <?php
            $hasil = mysqli_query($connection,"select * from tugas where id_tugas = '$id_tugas'");

            foreach($hasil as $hsl){    
        ?>

            <form action="index.php" method="post" class="container">
            <p class="title">Update Tugas yang anda pilih!</p>
                <input type="hidden" value=<?php echo $hsl['id_tugas']; ?> name="id">
                    <div class="form-group">
                        <label for="judul_tugas">Judul Tugas:</label>
                        <input type="text" class="form-control" id="judul_tugas" name="judul_tugas" value=<?php echo $hsl['judul_tugas'] ?> autofocus>
                    </div>
                    <div class="form-group">
                        <label for="matakuliah">Matakuliah:</label>
                        <input type="text" class="form-control" id="matakuliah" name="matakuliah" value=<?php echo $hsl['matakuliah'] ?> >
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="4" cols="50" value=<?php echo $hsl['keterangan'] ?> ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="deadline">Deadline:</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" value=<?php echo $hsl['deadline'] ?> >
                    </div>
                <input type="submit" class="btn btn-primary" name="btnupdate" value="Update">
            </form> 

        <?php
            }
        ?>
    </div>


    <!--footer-->
    <footer>
        <span>Created By <a href="https://www.linkedin.com/in/muanra217/" target="_blank">Muanra</a> | 2021 All rights reserved.</span>
    </footer>
    <!--back to top-->
    <a href="#" class="ignielToTop"></a>
</body>
</html>