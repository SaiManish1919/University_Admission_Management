<?php SESSION_start(); ?>

<?php include 'dbconn.php'; ?>
<?php include 'student_head.php'?>
<?php include 'links.php' ?>

<?php


$department_id = $_POST['department_id'];
$description = $_POST['description'];
$status = $_POST['status'];
$student_id = $_SESSION['student_id'];


$sql = "insert into applications(description,department_id,student_id,status) values('".$description."','".$department_id."','".$student_id."','Applied')"; 

echo $sql; 
if($conn->query($sql)==TRUE){
    $url =  "msg.php?msg=Applied  Successfully&class=text-success";;
    header("Location:".$url);
}else{
    $url = "msg.php?msg=Something Went Wrong ".$conn->error." &class=text-danger";
    header("Location:".$url);
}
?>