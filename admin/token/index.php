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
    $crud_token_nav = 'active'; 
    $data_master_nav = 'active'; 
    include('../../navbar.php') ?>

    <!-- Content -->
    <div class="container-fluid">
        
        <div class="row">
            <div class="accordion col-md-5 d-block mx-auto my-5 " id="accordionPanels">
                <div class="accordion-item ">
                    <h2 class="accordion-header " id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Generate Token Baru
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <form action="<?=$base_url;?>/admin/token/proses/store.php" method="post" enctype="multipart/form-data">
                                <div class="form-group mb-3"">
                                    <label for="token" class="form-label">Token (Custom) </label>
                                    <input type="token" name="token" minlength="2" maxlength="10" id="token" placeholder="must be unique !" class="form-control" required>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="randomCB" name="randomCB" >
                                    <label class="form-check-label" for="randomCB">
                                        I prefer auto generate!
                                    </label>
                                </div>

                                <script>
                                $("#randomCB").click(function() {
                                    $("#token").attr('disabled', this.checked);
                                })
                                </script>
                                
                                <div class="form-action my-3">
                                    <button type="submit" class="btn btn-success">Generate</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 d-block mx-auto">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Token</th>
                            <th>Status</th>
                            <th>Status Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * from tokens";
                            $no = 1;
                            $query = mysqli_query($con,$sql);

                            while($token = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td ><?=$no++;?></td>
                            <td <?php if($token['status'] == "Used") echo 'style="text-decoration: line-through;"' ?>>
                            <?=$token['token'];?></td>
                            <td><?=$token['status'];?></td>
                            <td>
                                <?php
                                    echo $token['status'] == "Used" ? $token['used_at'] :  $token['generated_at'];
                                ?>
                            </td>
                            <td>
                                <a href="<?=$base_url;?>/admin/token/edit.php?id=<?=$token['id'];?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" onclick="del('<?=$token['id'];?>','<?=$base_url;?>/admin/token/proses/hapus.php?id=')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                                <script>
                                    function del(id,url){
                                        if(confirm("Yakin ingin menghapusnya ? ")){
                                            window.location.href = url+id;
                                        }
                                    }
                                </script>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


  </body>
</html>