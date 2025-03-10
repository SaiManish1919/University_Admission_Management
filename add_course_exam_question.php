<?php include 'dbconn.php'; ?>
<?php include 'links.php'; ?>
<?php SESSION_start(); ?>

<?php 
if(!isset($_SESSION['role'])){
    include 'head.php';
}elseif($_SESSION["role"]=='admin'){
    include 'admin_head.php';
}elseif($_SESSION["role"]=='tutor'){
    include 'tutor_head.php';
}elseif($_SESSION["role"]=='student'){
    include 'student_head.php';
}elseif($_SESSION["role"]=='university'){
    include 'university_head.php';
}

$tutor_course_id = $_GET['tutor_course_id'];

$sql_last_question = "SELECT MAX(question_number) AS last_question_number FROM course_exam_questions WHERE tutor_course_id = '".$tutor_course_id."'";
$result = $conn->query($sql_last_question);
$row = $result->fetch_assoc();
$last_question_number = $row['last_question_number'];

$next_question_number = $last_question_number ? $last_question_number + 1 : 1;
?>

<div class="row m-auto">
  <div class="col-md-2"></div>
  <div class="col-md-10">
       <div class="row m-auto">
            <div class="col-md-2"></div>
            <div class="col-md-6 mt-5">
                <div class="card hi p-3">
                  <div class="text-center h4"><b>Add Question</b></div>
                  <form action="add_course_exam_question_action.php" method="post">
                    <input type="hidden" name="tutor_course_id" value="<?php echo $tutor_course_id; ?>">
                    <input type="hidden" name="question_number" value="<?php echo $next_question_number; ?>">
                    
                    <div class="mt-3">
                        <label for="question_number" class="form-label">Question Number</label>
                        <input type="text" id="question_number_display" value="<?php echo $next_question_number; ?>" readonly class="form-control">
                    </div>
                    
                    <div class="mt-3">
                      <label for="question" class="form-label">Add Question</label>
                      <textarea name="question" id="question" placeholder="Enter question" required class="form-control"></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="optionA" class="form-label">Option A</label>
                            <input type="text" name="optionA" id="optionA" placeholder="Enter option A" required class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="optionB" class="form-label">Option B</label>
                            <input type="text" name="optionB" id="optionB" placeholder="Enter option B" required class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="optionC" class="form-label">Option C</label>
                            <input type="text" name="optionC" id="optionC" placeholder="Enter option C" required class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="optionD" class="form-label">Option D</label>
                            <input type="text" name="optionD" id="optionD" placeholder="Enter option D" required class="form-control">
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <label class="form-label mt-2">Correct Answer</label>
                        <select name="answer" id="answer" class="form-control" required>
                            <option value="">Choose Answer</option>
                            <option value="optionA">A</option>
                            <option value="optionB">B</option>
                            <option value="optionC">C</option>
                            <option value="optionD">D</option>
                        </select>
                    </div>
                    
                   <div class="mt-3">
                       <input type="submit"  value="Add Question" class="btn btn-danger w-100">
                    </div>
                  </form>
                </div>
            </div>
       </div>
  </div>
</div>