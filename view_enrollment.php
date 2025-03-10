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
 $sql = "select* from course_enrollments where tutor_course_id='".$tutor_course_id."'";
 $course_enrollments = $conn ->query($sql);   
 ?>
 <div class="row mt-3">
   <div class="h4 text-center text-danger">View Enrollments</div>
   <div class="col-md-2"></div>
   <?php foreach($course_enrollments as $course_enrollment) {
       
      // echo $sql2; 
      ?>
   <div class="col-md-3 card p-3">
      <div class="row">
            <div class="">Date of Enrol <b><?php echo $course_enrollment['date']?></b></div>
            <div class="mt-2">
               Enrolment Current Status <b><?php echo $course_enrollment['status']?></b>
            </div>
            <?php 
            $sql2 = "select * from students where student_id in(select student_id from applications where application_id in(select application_id from course_enrollments where course_enrollment_id = '".$course_enrollment['course_enrollment_id']."'))";
            $students = $conn ->query($sql2); 
            // echo $sql2;
            ?>
            <?php foreach($students as $student){ ?>
               <div class=" mt-2">Student Details :</div>
               <div class="mt-1">
                  <div class="">Name Of the Student  <b><?php echo $student['first_name']?> <?php echo $student['last_name']?></b></div>
                  <div class="">Student Phone Number <b><?php echo $student['phone']?></b></div>
                  <div class="">Studet Email  Address <b><?php echo $student['email']?></b></div>
               </div>
            <?php }  ?>
            <div class="mt-2">
               <a href="view_Student_answers.php?course_enrollment_id=<?php echo $course_enrollment['course_enrollment_id']?>" class="btn btn-success w-100 p2 mt-2">View written Exam answers</a>
            </div>
      </div>
   </div>
   <?php }  ?>

 </div>