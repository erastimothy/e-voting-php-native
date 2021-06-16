<?php
    require_once('../../../config.php');
    
    $token = $_POST['token'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    $sql = "UPDATE tokens set token='$token', status='$status' WHERE id = $id";
    $query = mysqli_query($con,$sql);

    $msg = "Berhasil Mengubah Token";
    header("location:".$base_url."/admin/token/index.php?msg=".$msg);

?>