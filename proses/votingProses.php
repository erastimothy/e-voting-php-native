<?php
require_once('../config.php');

$token = $_POST['token'];

if(isset($token)){
    $sql = "SELECT * FROM tokens WHERE token = '$token' and status != 'used'";
    $query = mysqli_query($con,$sql) or die('ERROR TOKEN');
    $n = mysqli_num_rows($query);
    if($n>0){
        $data = mysqli_fetch_array($query);
        $token_id = $data['id'];
        $candidate_id = $_POST['candidate'];
        $timestamps = date('Y-m-d h:i:s',time());

        //insert votes
        $sql = "INSERT INTO votes(token_id,candidate_id,voted_at) VALUES($token_id,$candidate_id,'$timestamps')";
        $query = mysqli_query($con, $sql);

        //update token
        $sql = "UPDATE tokens set status='Used', used_at='$timestamps' WHERE id = $token_id";
        $query = mysqli_query($con,$sql);

        $msg = "Berhasil melakukan vote !";
        header("location:../index.php?msg=".$msg);

    }else{
        $msg = "Token tidak valid atau sudah digunakan!";
        header("location:../index.php?msg=".$msg);
    }
}else{
    $msg = "Something was wrong !";
    header("location:../index.php?msg=".$msg);
}

// SELECT candidates.name, count(votes.id) as 'total' FROM votes
// JOIN candidates on candidates.id = votes.candidate_id
// GROUP BY votes.candidate_id
?>