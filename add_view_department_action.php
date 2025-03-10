
<?php SESSION_start(); ?>
<?php include("university_head.php") ?>
<?php include("dbConn.php") ?>
<?php include("links.php") ?>
<?php 
$department_name = $_POST['department_name'];
$gpa = $_POST['gpa'];

$university_id = $_SESSION['university_id'];

$sql = "select * from departments where department_name='".$department_name."' ";
$departments = $conn->query($sql);
if($departments->num_rows>0){
   $url =  "msg.php?msg=Already Exist&class=text-danger";
   header("Location:".$url);
}else{
    $sql = "insert into departments(department_name,gpa,university_id)
    values('".$department_name."','".$gpa."','".$university_id."')"; 
    if($conn->query($sql)==TRUE){
    $url =  "add_vew_departments.php";
    header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
}
?>