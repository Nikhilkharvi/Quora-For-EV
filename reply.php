<?php

include 'config.php';

if(isset($_POST['submit'])){
    $qid=$_POST['qid'];
    $reply=strval($_POST['reply']);
    $check=$_POST['check'];
    $stmt = "INSERT INTO reply(qid, reply, ratings) VALUES ($qid,'$reply', $check)";
    if(mysqli_query($conn,$stmt))
    {
        echo "<script>alert('Reply posted.')</script>";
        header("refresh: 0.01; url=home.php");
    }
    else
    {
        echo "<script>alert('Reply not posted.')</script>";
        header("refresh: 0.01; url=home.php");
        mysqli_error($conn);
    }
}

?>