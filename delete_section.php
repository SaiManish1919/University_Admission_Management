<?php include 'dbconn.php'; ?>
<?php include 'tutor_head.php'?>
<?php include 'links.php' ?>
<?php 
    $tutor_course_id = $_GET['tutor_course_id'];

    $course_section_id = $_GET['course_section_id'];
    $sql = "delete  from course_sections where course_section_id='".$course_section_id."'"; 
    if($conn->query($sql)==TRUE){
        $url =  "view_tutor_courses.php?tutor_course_id=".$tutor_course_id;
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }

?>