<?php
require_once('../../../config.php');
$id = $_GET['id'];


if(isset($id)){
    $sql = "DELETE from tokens where id='$id'";
    $query = mysqli_query($con,$sql);

    $msg = "Berhasil menghapus token!";
    header("location:".$base_url."/admin/token/index.php?msg=".$msg);
}else {
    $msg = "Something was wrong!";
    header("location:".$base_url."/admin/token/index.php?msg=".$msg);
}

?>