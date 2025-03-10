<?php 
include 'dbconn.php'; 
include 'links.php'; 
SESSION_start(); 

if(!isset($_SESSION['role'])){
    include 'head.php';
    include 'links.php';
} elseif($_SESSION["role"] == 'admin'){
    include 'admin_head.php';
    include 'links.php';
} elseif($_SESSION["role"] == 'tutor'){
    include 'tutor_head.php';
    include 'links.php';
} elseif($_SESSION["role"] == 'student'){
    include 'student_head.php';
    include 'links.php';
} elseif($_SESSION["role"] == 'university'){
    include 'university_head.php';
    include 'links.php';
}
?>

<?php 
$certification_id = $_GET['certification_id'];
$course_enrollment_id = $_GET['course_enrollment_id'];
$sql = "select * FROM course_exam_questions where tutor_course_id in 
        (select tutor_course_id from course_enrollments where course_enrollment_id = '".$course_enrollment_id."')";
$course_exam_questions = $conn->query($sql);
?>

<div class="row mt-5">
    <div class="w-15"></div>
    <div class="w-80 card hi">
    <form action="submit_answer.php" method="post">
        <input type="hidden" name="course_enrollment_id" value="<?php echo $course_enrollment_id; ?>">
        <input type="hidden" name="certification_id" value="<?php echo $certification_id; ?>">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <div class="">
                    <input type="submit" value="Submit" class="btn btn-success w-100 mt-2">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="w-100">
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3"></div>

                    <div class="mt-1" style="height:650px; overflow:auto">
                        <div class="h3 mt-2"><b>Questions</b></div>

                        <?php foreach ($course_exam_questions as $course_exam_question) { ?>
                            <div class="card p-3 mt-2">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="" style="font-size:18px;">
                                            <b>Q <?php echo $course_exam_question['question_number']; ?> )</b> 
                                            <?php echo $course_exam_question['question']; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="h6 mt-2">Options :</div>
                                <div class="row">
                                    <div class="w-100">
                                        <div class="">
                                            <input type="radio" name="answer<?php echo $course_exam_question['course_exam_question_id']; ?>" id="answerA<?php echo $course_exam_question['course_exam_question_id']; ?>" value="optionA" class="mt-2">  
                                            <label for="answerA<?php echo $course_exam_question['course_exam_question_id']; ?>" class="h6">A) <?php echo $course_exam_question['optionA']; ?></label>
                                        </div>
                                        <div class="">
                                            <input type="radio" name="answer<?php echo $course_exam_question['course_exam_question_id']; ?>" id="answerB<?php echo $course_exam_question['course_exam_question_id']; ?>" value="optionB" class="mt-2">
                                            <label for="answerB<?php echo $course_exam_question['course_exam_question_id']; ?>" class="h6">B) <?php echo $course_exam_question['optionB']; ?></label>
                                        </div>
                                        <div class="">
                                            <input type="radio" name="answer<?php echo $course_exam_question['course_exam_question_id']; ?>" id="answerC<?php echo $course_exam_question['course_exam_question_id']; ?>" value="optionC" class="mt-2">
                                            <label for="answerC<?php echo $course_exam_question['course_exam_question_id']; ?>" class="h6">C) <?php echo $course_exam_question['optionC']; ?></label>
                                        </div>
                                        <div class="">
                                            <input type="radio" name="answer<?php echo $course_exam_question['course_exam_question_id']; ?>" id="answerD<?php echo $course_exam_question['course_exam_question_id']; ?>" value="optionD" class="mt-2">
                                            <label for="answerD<?php echo $course_exam_question['course_exam_question_id']; ?>" class="h6">D) <?php echo $course_exam_question['optionD']; ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>