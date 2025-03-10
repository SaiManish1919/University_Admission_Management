<?php include 'dbconn.php'; ?>
<?php include 'links.php' ?>
<?php include 'student_head.php'; ?>
<?php SESSION_start(); ?>
<?php 
    $certificate_type = 'By University';
    $tutor_course_id = $_GET['tutor_course_id'];
    $application_id = $_GET['application_id'];
    $course_id = $_GET['course_id'];

    
    $sql = "insert into course_enrollments(application_id,tutor_course_id)values('".$application_id."', '".$tutor_course_id."')";
    echo $sql;
    if($conn->query($sql)==TRUE){
        $sql1 = "insert into certifications(application_id,course_id,certificate_type,status,certificate,passed_year)values('".$application_id."', '".$course_id."','".$certificate_type."','Course Enrolled','','')"; 
        echo $sql1;
        if($conn->query($sql1)==TRUE){
            $url =  "msg.php?msg=Course Enrolled  Successfully&class=text-success";
            header("Location:".$url);
        }else{
            $url = "msg.php?msg=Something Went Wrong&class=text-danger";
            // header("Location:".$url);
        }
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        // header("Location:".$url);
    } 
    
?>
