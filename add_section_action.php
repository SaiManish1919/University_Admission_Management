<?php include 'dbconn.php'; ?>
<?php include 'tutor_head.php'?>
<?php include 'links.php' ?>
<?php 
    $tutor_course_id = $_POST['tutor_course_id'];
    echo $tutor_course_id;
    $course_section_name = $_POST['course_section_name'];

    $sql = "insert into course_sections(course_section_name,tutor_course_id)values('".$course_section_name."', '".$tutor_course_id."')"; 
    if($conn->query($sql)==TRUE){
        $url =  "view_tutor_courses.php?tutor_course_id=".$tutor_course_id."";
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    } 
?>