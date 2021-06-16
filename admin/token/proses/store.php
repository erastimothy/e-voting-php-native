<?php
require_once('../../../config.php');

$randomCB = $_POST['randomCB'];
$token = '';
$timestamps = date('Y-m-d h:i:s',time());
if(isset($randomCB)){
    $token = bin2hex(random_bytes(3));
}else {
    $token = $_POST['token'];
}

//insert data
$sql = "INSERT INTO tokens(token,status,generated_at) VALUES('$token','Generated','$timestamps')";
$query = mysqli_query($con,$sql)or die($sql);

$msg = "Berhasil Mengenerate Token";
header("location:".$base_url."/admin/token/index.php?msg=".$msg);
?>