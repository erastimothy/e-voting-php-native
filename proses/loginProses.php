<?php

require ('../config.php');
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users where email = '$email'";
$query = mysqli_query($con,$sql);

if(mysqli_num_rows($query) == 0 ){
    $msg = "Email tidak terdaftar";
    header("location:../admin/index.php?msg=".$msg);
}else {
    $user = mysqli_fetch_assoc($query);
    if(password_verify($password,$user['password'])){
        session_start();
        $_SESSION['isLogin'] = true;
        $_SESSION['user'] = $user;

        header("location: ../hasil.php");
    }else {
        $msg = "Password salah!";
        header("location:../admin/index.php?msg=".$msg);
    }
}



?>