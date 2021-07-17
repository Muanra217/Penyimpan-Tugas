<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/style.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title>Register</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4">Register!</h3>
                                    <form action="action_register.php" method="POST">
                                        <div class="form-label-group">
                                            <input type="text" id="fname" name="fname" class="form-control" placeholder="Nama Depan" required autofocus>
                                            <label for="fname">Nama Depan</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Nama Belakang" required autofocus>
                                            <label for="lname">Nama Belakang</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="text" id="uname" name="uname" class="form-control" placeholder="Nama Depan" required autofocus>
                                            <label for="uname">Username</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
                                            <label for="pass">Password</label>
                                        </div>
                                        <button class="btn btn-lg btn-primary btn-block btn-login font-weight-bold mb-2" type="submit" name="register">Daftar</button>
                                        <div class="text-center">
                                        <a class="small" href="login.php">Login</a></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>  
            </div>
        </div>
    </body>
</html>