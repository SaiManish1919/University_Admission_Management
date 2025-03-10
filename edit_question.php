<?php include 'dbconn.php'; ?>
<?php include 'tutor_head.php'?>
<?php include 'links.php' ?>

<?php 
  $tutor_course_id = $_GET['tutor_course_id'];
  $course_exam_question_id = $_GET['course_exam_question_id'];
  
 
  $sql = "select * from course_exam_questions where course_exam_question_id='".$course_exam_question_id."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $course_exam_question = $result->fetch_assoc(); 
  } else {
      echo "No question found with the given ID.";
      exit();
  }
?>

<div class="row m-auto">
  <div class="col-md-2"></div>
  <div class="col-md-10">
       <div class="row m-auto">
            <div class="col-md-2"></div>
            <div class="col-md-6 mt-5">
                <div class="card hi mt-5 p-3">
                  <div class="text-center h4">Edit Question</div>
                  <form action="update_question.php" method="post">
                  <input type="hidden" name="tutor_course_id" value="<?php echo $tutor_course_id; ?>">
                  <input type="hidden" name="course_exam_question_id" value="<?php echo $course_exam_question_id ?>">
                  <div class="mt-3">
                      <label for="question_number" class="form-label">Question Number</label>
                      <input type="text" name="question_number" id="question_number" value="<?php echo $course_exam_question['question_number'] ?>" placeholder="Enter Question Number" required class="form-control" readonly>
                  </div>
                  <div class="mt-3">
                      <label for="question" class="form-label">Question</label>
                      <textarea name="question" id="question" placeholder="Enter question" required class="form-control"><?php echo $course_exam_question['question'] ?></textarea>
                  </div>
                  <div class="row">
                      <div class="col-md-6 mt-3">
                          <label for="optionA" class="form-label">Option A</label>
                          <input type="text" name="optionA" id="optionA" value="<?php echo $course_exam_question['optionA'] ?>" placeholder="Enter optionA" required class="form-control">
                      </div>
                      <div class="col-md-6 mt-3">
                          <label for="optionB" class="form-label">Option B</label>
                          <input type="text" name="optionB" id="optionB" value="<?php echo $course_exam_question['optionB'] ?>" placeholder="Enter optionB" required class="form-control">
                      </div>
                      <div class="col-md-6 mt-3">
                          <label for="optionC" class="form-label">Option C</label>
                          <input type="text" name="optionC" id="optionC" value="<?php echo $course_exam_question['optionC'] ?>" placeholder="Enter optionC" required class="form-control">
                      </div>
                      <div class="col-md-6 mt-3">
                          <label for="optionD" class="form-label">Option D</label>
                          <input type="text" name="optionD" id="optionD" value="<?php echo $course_exam_question['optionD'] ?>" placeholder="Enter optionD" required class="form-control">
                      </div>
                  </div>
                  <div class="mt-3">
                      <label for="answer" class="form-label">Correct Answer</label>
                      <select name="answer" id="answer" class="form-control" required>
                          <option value="">Choose Answer</option>
                          <option value="optionA" <?php if($course_exam_question['answer'] == 'optionA') echo 'selected'; ?>>Option A</option>
                          <option value="optionB" <?php if($course_exam_question['answer'] == 'optionB') echo 'selected'; ?>>Option B</option>
                          <option value="optionC" <?php if($course_exam_question['answer'] == 'optionC') echo 'selected'; ?>>Option C</option>
                          <option value="optionD" <?php if($course_exam_question['answer'] == 'optionD') echo 'selected'; ?>>Option D</option>
                      </select>
                  </div>
                  <div class="mt-3">
                      <input type="submit" value="Update Question" class="btn btn-danger w-100">
                  </div>

                  </form>
                </div>
            </div>
       </div>
  </div>
</div>