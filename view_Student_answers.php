<?php include 'dbconn.php'; ?>
<?php include 'links.php' ?>
<?php SESSION_start(); ?>

<?php if(!isset($_SESSION['role'])){
    include 'head.php';
    include 'links.php';
  }elseif($_SESSION["role"]=='admin'){
     include 'admin_head.php';
     include 'links.php';
  }
  elseif($_SESSION["role"]=='tutor'){
    include 'tutor_head.php';
    include 'links.php';
 }elseif($_SESSION["role"]=='student'){
    include 'student_head.php';
    include 'links.php';
 }
 elseif($_SESSION["role"]=='university'){
  include 'university_head.php';
  include 'links.php';
}
?>
<?php
$course_enrollment_id = $_GET['course_enrollment_id'];
$sql = "select * from course_exam_questions where tutor_course_id in (select tutor_course_id from course_enrollments where course_enrollment_id = '".$course_enrollment_id."')";
$course_exam_questions = $conn->query($sql);

$total_questions = 0;
$correct_answers = 0;
$incorrect_answers = 0;



?>

<div class="row mt-3">
    <div class="h4 text-center">View Student Answers</div>
    <div class="col-md-2"></div>
    <div class="col-md-8 hi">
        <div class="mt-1" style="height:600px;overflow:auto">
                <?php foreach($course_exam_questions as $course_exam_question){
                    $total_questions++;

                    $sql2 = "select * from student_answers where course_exam_question_id ='".$course_exam_question['course_exam_question_id']."' and course_enrollment_id in (select course_enrollment_id from course_enrollments where tutor_course_id in (select tutor_course_id from course_exam_questions where course_exam_question_id='".$course_exam_question['course_exam_question_id']."'))";
                    $student_answers = $conn->query($sql2);

                    foreach($student_answers as $student_answer){
                        if($student_answer['status'] == 'Correct'){
                            $correct_answers++;
                        } else {
                            $incorrect_answers++;
                        }
                    ?>
                    <div class="card p-3 mt-2">
                        <div class="col-md-10">
                            <div class="" style="font-size:18px;"><b>Q <?php echo $course_exam_question['question_number']?> )</b> <?php echo $course_exam_question['question']?> </div>
                        </div>
                        <div class="h6 mt-2">Options :</div>
                        <div class="row mt-1">
                            <div class="w-5"></div>
                            <div class="w-80">
                                <div class="">
                                    <div class="" style="font-size:18px;"><b>A)</b> <?php echo $course_exam_question['optionA']?> </div>
                                </div>
                                <div class="">
                                    <div class="" style="font-size:18px;"><b>B )</b> <?php echo $course_exam_question['optionB']?> </div>
                                </div>
                                <div class="">
                                    <div class="" style="font-size:18px;"><b>C )</b> <?php echo $course_exam_question['optionC']?> </div>
                                </div>
                                <div class="">
                                    <div class="" style="font-size:18px;"><b>D )</b> <?php echo $course_exam_question['optionD']?> </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <div class="row">
                            <div class="w-15">Correct Answer : </div>
                                <div class="w-15 h6">
                                    <div class="" style="font-size:18px;"><?php echo $course_exam_question['answer']?> </div>
                                </div>
                                <div class="w-15">Student Answer : </div>
                                <div class="w-15 h6">
                                    <div class="" style="font-size:18px;"><?php echo $student_answer['answer']?> </div>
                                </div>
                                <div class="w-10">Status : </div>
                                <div class="w-15 h6">
                                    <div class="" style="font-size:18px;"><?php echo $student_answer['status']?> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
                
            </div>
        </div>
        <?php
            $percentage = $correct_answers/$total_questions*100;
        ?>
        <div class="card p-3 mt-2">
        <div class="row mt-3">
            <div class="col-md-3 text-center ">
                <h5>Total Questions: <b><?php echo $total_questions; ?></b></h5>
            </div>
            <div class="col-md-3 text-center text-success">
                <h5>Correct Answers: <b><?php echo $correct_answers; ?></b></h5>
            </div>
            <div class="col-md-3 text-center text-danger">
                <h5>Incorrect Answers: <b><?php echo $incorrect_answers; ?></b></h5>
            </div>
            <div class="col-md-3 text-center text-danger">
                <h5>Total Percentage: <b><?php echo $percentage ?>%</b></h5>
            </div>
        </div>
    </div>
</div>

