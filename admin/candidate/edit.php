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
    
    <!-- Optional JavaScript; -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
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
        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM candidates where id='$id'";
            $query = mysqli_query($con,$sql);
            $candidate = mysqli_fetch_array($query);
        ?>
        <div class="row">
            <div class="accordion col-md-5 d-block mx-auto my-5 " id="accordionPanels">
                <div class="accordion-item ">
                    <h2 class="accordion-header " id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Ubah Data kandidat
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <form action="<?=$base_url;?>/admin/candidate/proses/update.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=$candidate['id'];?>">
                                <div class="form-group mb-3"">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="nama" name="nama" id="nama" placeholder="email@example.com" class="form-control" required value="<?=$candidate['name'];?>">
                                </div>
                                <div class="form-group mb-3"">
                                    <label for="dob" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="dob" id="dob" placeholder="email@example.com" class="form-control" required value="<?=$candidate['dob'];?>">
                                </div>
                                <div class="form-group mb-3"">
                                    <label for="chart_color" class="form-label">Chart Color</label>
                                    <input type="color" name="chart_color" id="chart_color" placeholder="email@example.com" class="form-control form-control-color" required value="<?=$candidate['chart_color'];?>">
                                </div>
                                <div class="form-group mb-3"">
                                    <label for="Visi" class="form-label">Visi</label>
                                    <textarea name="visi">
                                        <?=$candidate['visi'];?>
                                    </textarea>
                                </div>
                                <div class="form-group mb-3"">
                                    <label for="Misi" class="form-label">Misi</label>
                                    <textarea name="misi">
                                        <?=$candidate['misi'];?>
                                    </textarea>
                                </div>
                                
                                <div class="form-action my-3">
                                <button type="submit" class="btn btn-success">Ubah</button>
                                </div>
                                <script>
                                        CKEDITOR.replace('visi');
                                        CKEDITOR.replace('misi');
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


  </body>
</html>