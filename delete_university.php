<?php include 'dbconn.php'; ?>
<?php include 'admin_head.php'?>
<?php include 'links.php' ?>
<?php 
    $university_id = $_GET['university_id'];
    $sql = "delete  from universities where university_id='".$university_id."' "; 
    if($conn->query($sql)==TRUE){
        $url = "view_university.php";
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }

?>