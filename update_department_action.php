<?php 
include 'university_head.php';
include 'links.php';
include 'dbconn.php'; 
?>
<?php 
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];
    $gpa = $_POST['gpa'];
   

    $sql = "update departments set department_name ='".$department_name."', gpa = '".$gpa."' where department_id ='".$department_id."'";
    if($conn->query($sql)==TRUE){
        $url =  "add_vew_departments.php";
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
?>