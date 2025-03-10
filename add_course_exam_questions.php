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
$tutor_course_id = $_GET['tutor_course_id'];
$sql1 = "select * from course_exam_questions where tutor_course_id='".$tutor_course_id."' ";
$course_exam_questions = $conn->query($sql1);
?>
<div class="row mt-5">
    <div class="w-15"></div>
    <div class="w-80 card hi">
        <div class="row">
            <div class="w-100">
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                    <?php if($_SESSION['role']=='tutor'){?>

                        <div class="mt-3">
                        <a href="add_course_exam_question.php?tutor_course_id=<?php echo $tutor_course_id ?>" class="btn btn-primary p-3 w-100">Add Questions</a>
                        </div>
                    <?php } ?> 

                    </div>
                    <div class="h3 MT-2"><B>Questions</div></B>

                    <div class="mt-1" style="height:650px;overflow:auto" >
                        <?php
                       
                        ?>

                        <?php foreach($course_exam_questions as $course_exam_question){?>

                        <div class="card p-3 mt-2" >
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="" style="font-size:18px;"><b>Q <?php echo $course_exam_question['question_number']?> )</b> <?php echo $course_exam_question['question']?> </div>
                                </div>
                                <?php if($_SESSION['role']=='tutor'){?>

                                    <div class="col-md-1">
                                        <a href="delete_question.php?course_exam_question_id=<?php echo $course_exam_question['course_exam_question_id']?>&tutor_course_id=<?php echo $tutor_course_id ?>" class="btn btn-danger" style="font-size:70%">Delete</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="edit_question.php?course_exam_question_id=<?php echo $course_exam_question['course_exam_question_id']?>&tutor_course_id=<?php echo $tutor_course_id ?>" class="btn btn-primary" style="font-size:70%">Edit</a>
                                    </div>
                                <?php } ?> 
                            <div class="h6 mt-2">Options :</div>
                                <div class="row mt-1">
                                    <div class="w-5"></div>
                                    <div class="w-80">
                                        <div class="row">
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
                                </div>
                            </div><hr>
                            <div class="">
                                <div class="row">
                                <div class="w-8 h5">Answer : </div>
                                <div class="w-80">
                                <div class="" style="font-size:18px;"></b><?php echo $course_exam_question['answer']?> </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
