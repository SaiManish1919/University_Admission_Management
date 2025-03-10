<?php include 'dbconn.php'; ?>
<?php include 'university_head.php'?>
<?php include 'links.php' ?>
<?php 
    $department_id = $_GET['department_id'];
    $sql = "delete  from departments where department_id='".$department_id."' "; 
    if($conn->query($sql)==TRUE){
        $url = "add_vew_departments.php";
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
?>