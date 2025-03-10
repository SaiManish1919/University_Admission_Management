
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
$application_id = $_GET['application_id'];
$course_id = $_GET['course_id'];

?>
<div class="row m-auto">
  <div class="col-md-1" ></div>
  <div class="col-md-10">
       <div class="row m-auto">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-5">
                <div class="card hi mt-5 p-3">
                  <div class="text-center h4"><b>Add Certificate</div>
                  <form action="add_certificate_action.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="application_id" value="<?php echo $application_id?>">
                    <input type="hidden" name="course_id" value="<?php echo $course_id?>">
                      
                        <div class="mt-3">
                          <label for="passed_year" class="form-label">Passed Year</label>
                          <input type="number" name="passed_year" id="passed_year" placeholder="Eneter year ex: 20xx" required class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="certificate" class="form-control-label">Choose Certificate</label>
                            <input type="file" name="certificate" id="certificate" placeholder="" required class="form-control">
                        </div>
                       <div class="mt-3">
                           <input type="submit"  value="Add Certificate" class="btn btn-danger w-100">
                        </div>
                  </form>
                </div>
            </div>
       </div>
  </div>
</div>