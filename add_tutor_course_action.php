<?php SESSION_start(); ?>

<?php include 'dbconn.php'; ?>
<?php include 'tutor_head.php'?>
<?php include 'links.php' ?>

<?php

$tutor_course_title = $_POST['tutor_course_title'];

$course_id = $_POST['course_id'];
$tutor_id = $_SESSION['tutor_id'];

$target_path = $target_path.basename($_FILES['picture']['name']);   
echo $target_path;
if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
$picture = $_FILES["picture"]["name"];


$sql = "insert into tutor_courses(tutor_course_title,course_id,tutor_id,picture) values('".$tutor_course_title."','".$course_id."','".$tutor_id."','".$picture."')"; 

echo $sql; 
if($conn->query($sql)==TRUE){
    $url =  "msg.php?msg=Tutor Course Added Successfully&class=text-success";;
    header("Location:".$url);
}else{
    $url = "msg.php?msg=Something Went Wrong ".$conn->error." &class=text-danger";
    header("Location:".$url);
}
?>