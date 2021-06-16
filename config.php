<?php
    //
    $title = "E - Voting";
    $con = mysqli_connect('localhost' ,'root','','e_voting') or die ("ERROR CONNECTION");
    $path = '/php/e_voting';
    $base_url = 'http://'.$_SERVER['SERVER_NAME'] . $path;

?>