
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><?=$title;?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?=$kandidat;?>" href="<?=$base_url;?>/index.php">Kandidat</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link <?=$hasil;?>" href="<?=$base_url;?>/hasil.php">Hasil</a>
          </li>
          
        </ul>
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <?php
            if(!isset($_SESSION['isLogin'])){
            ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=$base_url;?>/admin/index.php">Login</a>
            </li>
            <?php
            }else {
            ?>
            <li class="nav-item dropdown">
              <a class="mx-3 nav-link dropdown-toggle <?=$data_master_nav;?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Data Master
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item <?=$crud_candidate_nav;?>" href="<?=$base_url;?>/admin/candidate/index.php">CRUD Kandidat</a></li>
                <li><a class="dropdown-item <?=$crud_token_nav;?>" href="<?=$base_url;?>/admin/token/index.php">CRUD Token</a></li>
              </ul>
            </li> 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle <?=$user_nav;?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['user']['name'];?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <!-- <li><hr class="dropdown-divider"></li> -->
                <li ><a class="dropdown-item" href="<?=$base_url;?>/admin/logout.php">Logout</a></li>
            </ul>
            </li> 

            <?php } ?>

        </ul>
      </div>
    </div>
  </nav>