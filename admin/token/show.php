<?php
  require_once('../../config.php');
  if(isset($_GET['msg'])){
    echo '<script>alert("'.$_GET['msg'].'")</script>';
  }
  session_start();
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
    $crud_candidate_nav = 'active'; 
    $data_master_nav = 'active'; 
    include('../../navbar.php') ?>

    <!-- Content -->
    <div class="container-fluid">
        <div class="row mx-2 my-4">
            <?php
                $id = $_GET['id'];
                $sql = "select * from candidates WHERE id = '$id'";
                $query = mysqli_query($con,$sql);
                $data = mysqli_fetch_array($query)

            ?>
            <div class="col-md-4 mb-4  mx-auto d-flex">
                <div class="card shadow p-3 mb-5 bg-body rounded border border-2">
                <img src="<?=$base_url;?>/assets/images/<?=$data['photo'];?>" class="p-3 rounded mx-auto img-sm img-fluid" alt="candidate photo">
                <div class="card-body ">
                    <h5 class="card-title text-center"><?=$data['name'];?></h5>
                    <p class="card-text">
                    <h5 class="bg-info p-1 mt-5 text-center text-white">Visi</h5>
                    <span><?=$data['visi'];?></span>

                    <h5 class="bg-success p-1 mt-5 text-center text-white">Misi</h5>
                    <span><?=$data['misi'];?></span>
                    </p>
                    <a href="<?=$base_url;?>/admin/candidate/index.php"  class="btn btn-primary" >Back</a>
                </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Optional JavaScript; -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </body>
 
  <style>
    .img-sm{
      max-height: 400px;
      width: auto;
    }
  </style>
</html>