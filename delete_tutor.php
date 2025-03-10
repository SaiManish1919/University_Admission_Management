<?php include 'dbconn.php'; ?>
<?php include 'university_head.php'?>
<?php include 'links.php' ?>
<?php 
    $tutor_id = $_GET['tutor_id'];
    $sql = "delete  from tutors where tutor_id='".$tutor_id."' "; 
    if($conn->query($sql)==TRUE){
        $url = "view_tutor.php";
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }

?>