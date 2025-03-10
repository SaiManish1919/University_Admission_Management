<?php include 'dbconn.php'; ?>
<?php include 'links.php' ?>
<?php SESSION_start(); ?>

<?php if(!isset($_SESSION['role'])){
    include 'head.php';
  }elseif($_SESSION["role"]=='admin'){
     include 'admin_head.php';
  }
  elseif($_SESSION["role"]=='tutor'){
    include 'tutor_head.php';
 }elseif($_SESSION["role"]=='student'){
    include 'student_head.php';
 }
 elseif($_SESSION["role"]=='university'){
  include 'university_head.php';
}
 ?>



<?php
$tutor_course_id = $_GET['tutor_course_id'];
?>
<div class="row m-auto">
  <div class="col-md-1" ></div>
  <div class="col-md-10">
       <div class="row m-auto">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-5">
                <div class="card hi mt-5 p-3">
                  <div class="text-center h4">Add Section</div>
                  <form action="add_section_action.php" method="post">
                    <input type="hidden" name="tutor_course_id" value="<?php echo $tutor_course_id?>">
                        <div class="mt-3">
                          <label for="course_section_name" class="form-label">Section Name</label>
                          <input type="text" name="course_section_name" id="course_section_name" placeholder="Enter section course Name" required class="form-control">
                        </div>
                       <div class="mt-3">
                           <input type="submit"  value="Add Section" class="btn btn-danger w-100">
                        </div>
                  </form>
                </div>
            </div>
       </div>
  </div>
</div>