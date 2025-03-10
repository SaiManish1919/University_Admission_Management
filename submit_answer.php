<?php 
include 'dbconn.php'; 
SESSION_start(); 

if (!isset($_SESSION['role'])) {
    header("Location: login.php"); 
    exit;
}
$certification_id = $_POST['certification_id'];
$course_enrollment_id = $_POST['course_enrollment_id'];

$sql = "select * from course_exam_questions where tutor_course_id in (
            select  tutor_course_id from course_enrollments 
            where course_enrollment_id = '".$course_enrollment_id."')";
$course_exam_questions = $conn->query($sql);

$total_questions = 0;
$correct_answers = 0;

foreach ($course_exam_questions as $course_exam_question) {
    $total_questions++; 

    $student_answer = trim($_POST['answer'.$course_exam_question['course_exam_question_id']]);
    echo $student_answer;
    $correct_answer = trim($course_exam_question['answer']);
    echo $correct_answer;
    
    if ($student_answer==$correct_answer) {
        $status = "Correct";
        $correct_answers++; 
    } else {
        $status = "Incorrect";
    }

    $sql_insert = "insert into student_answers(answer, status, course_enrollment_id, course_exam_question_id) 
                   VALUES ('".$student_answer."', '".$status."', '".$course_enrollment_id."', '".$course_exam_question['course_exam_question_id']."')";
    
    if ($conn->query($sql_insert) != TRUE) {
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
    }
}
$percentage = $correct_answers/$total_questions*100;
$status = "Failed to Completed";
if($percentage>80){
    $status = 'Completed';
}
$sql = "update certifications set  status= '".$status."' where certification_id = '".$certification_id."' ";
echo $sql;
$conn->query($sql);



$url = "msg.php?msg=Exam Completed Successfully. Correct Answers: $correct_answers out of $total_questions You achieved a  $percentage % in my exam results.&class=text-success";
header("Location:".$url);
?>