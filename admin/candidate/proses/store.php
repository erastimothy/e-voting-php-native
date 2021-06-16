<?php
require_once('../../../config.php');

$dir = '../../../assets/images/';
$photoName = rand(0,1000).basename($_FILES["photo"]["name"]);
$photo = $dir . $photoName;
$name = $_POST['nama'];
$dob = $_POST['dob'];
$visi = $_POST['visi'];
$misi = $_POST['misi'];
$chart_color = $_POST['chart_color'];

//upload photo;
if(isset($_FILES['photo']['tmp_name'])){
    move_uploaded_file($_FILES["photo"]["tmp_name"], $photo);
}

//insert data
$sql = "INSERT INTO candidates VALUES ('','$name','$dob','$photoName','$visi','$misi','$chart_color')";
$query = mysqli_query($con,$sql)or die($sql);

$msg = "Berhasil menambah Data";
header("location:".$base_url."/admin/candidate/index.php?msg=".$msg);
?>