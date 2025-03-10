
<?php SESSION_start(); ?>
<?php include("university_head.php") ?>
<?php include("dbConn.php") ?>
<?php include("links.php") ?>
<?php 
$course_name = $_POST['course_name'];
$department_id = $_POST['department_id'];

$target_path = $target_path.basename($_FILES['picture']['name']);   
echo $target_path;
if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
$picture = $_FILES["picture"]["name"];

$sql = "select * from courses where course_name='".$course_name."' ";
$departments = $conn->query($sql);
if($departments->num_rows>0){
   $url =  "msg.php?msg=Already Exist&class=text-danger";
   header("Location:".$url);
}else{
    $sql = "insert into courses(course_name,department_id,picture)
    values('".$course_name."','".$department_id."','".$picture."')"; 
    if($conn->query($sql)==TRUE){
    $url =  "add_view_courses.php?department_id=".$department_id;
    header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
}
?>