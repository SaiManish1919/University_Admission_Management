<?php include 'dbconn.php'; ?>
<?php include 'tutor_head.php'?>
<?php include 'links.php' ?>
<?php 
$tutor_course_id = $_POST['tutor_course_id'];
$course_exam_question_id = $_POST['course_exam_question_id'];
$question_number = $_POST['question_number'];
$question = $_POST['question'];
$optionA = $_POST['optionA'];
$optionB = $_POST['optionB'];
$optionC = $_POST['optionC'];
$optionD = $_POST['optionD'];
$answer = $_POST['answer'];

  $sql = "update course_exam_questions set question_number='".$question_number."',question='".$question."',optionA='".$optionA."',optionB='".$optionB."',optionC='".$optionC."',optionD='".$optionD."',answer='".$answer."'   where course_exam_question_id='".$course_exam_question_id."'";
  if($conn->query($sql)==TRUE){
    $url = "add_course_exam_questions.php?tutor_course_id=".$tutor_course_id;
    header("Location:".$url);
}else{
    $url = "msg.php?msg=Something Went Wrong&class=text-danger";
    header("Location:".$url);
}
?>