<?php include 'dbconn.php'; ?>
<?php include 'tutor_head.php'?>
<?php include 'links.php' ?>
<?php 
    $tutor_course_id = $_GET['tutor_course_id'];
    $course_exam_question_id = $_GET['course_exam_question_id'];
    $sql = "delete  from course_exam_questions where course_exam_question_id='".$course_exam_question_id."' and tutor_course_id='".$tutor_course_id."'"; 
    if($conn->query($sql)==TRUE){
        $url = "add_course_exam_questions.php?tutor_course_id=".$tutor_course_id;
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }

?>