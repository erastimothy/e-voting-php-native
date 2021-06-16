<?php
  require_once('../config.php');
  if(isset($_GET['msg'])){
    echo '<script>alert("'.$_GET['msg'].'")</script>';
  }

  //check login
  session_start();
  if(isset($_SESSION['isLogin'])){
      header("location:../hasil.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php
    include('../navbar.php') ?>
    <!-- Content -->
    <div class="container-fluid">

        <div class="card d-flex col-md-3 mx-auto bg-light my-5">
            <div class="card-header">Login</div>
            <div class="card-body">
            <form action="../proses/loginProses.php" method="post">
                <div class="form-group mb-3"">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="email@example.com" class="form-control" required>
                </div>
                
                <div class="form-group mb-3"">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="your password" class="form-control" required>
                </div>

                <div class="form-action d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Login</button>
                
                </div>
                
            </form>
            </div>
        </div>

    </div>


    <!-- Optional JavaScript; -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </body>
  <script>
  </script>
</html>