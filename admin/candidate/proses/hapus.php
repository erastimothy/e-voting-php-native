<?php
require_once('../../../config.php');
$id = $_GET['id'];


if(isset($id)){
    $sql = "DELETE from candidates where id='$id'";
    $query = mysqli_query($con,$sql);
    
    $msg = "Berhasil menghapus kandidat!";
    header("location:".$base_url."/admin/candidate/index.php?msg=".$msg);
}else {
    $msg = "Something was wrong!";
    header("location:".$base_url."/admin/candidate/index.php?msg=".$msg);
}

?>