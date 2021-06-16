<?php
    require_once('../../../config.php');
    
    $nama = $_POST['nama'];
    $dob = $_POST['dob'];
    $id = $_POST['id'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $chart_color = $_POST['chart_color'];

    $sql = "UPDATE candidates set name='$nama', dob='$dob', visi='$visi', misi='$misi',chart_color='$chart_color' WHERE id = $id";
    $query = mysqli_query($con,$sql);

    $msg = "Berhasil Mengubah Candidate";
    header("location:".$base_url."/admin/candidate/index.php?msg=".$msg);

?>