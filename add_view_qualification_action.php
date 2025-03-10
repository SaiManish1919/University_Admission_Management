
<?php SESSION_start(); ?>
<?php include("student_head.php") ?>
<?php include("dbConn.php") ?>
<?php include("links.php") ?>
<?php 
$qualification_title = $_POST['qualification_title'];
$grade = $_POST['grade'];
$passed_year = $_POST['passed_year'];

$student_id = $_SESSION['student_id'];

$sql = "select * from qualifications where qualification_title='".$qualification_title."' ";
$qualifications = $conn->query($sql);
if($qualifications->num_rows>0){
   $url =  "msg.php?msg=Already Exist&class=text-danger";
   header("Location:".$url);
}else{
    $sql = "insert into qualifications(qualification_title,grade,passed_year,student_id)
    values('".$qualification_title."','".$grade."','".$passed_year."','".$student_id."')"; 
    if($conn->query($sql)==TRUE){
    $url =  "student_profile.php";
    header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
}
?>