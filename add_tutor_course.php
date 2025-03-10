<?php SESSION_start(); ?>

<?php include 'dbconn.php'; ?>
<?php include 'tutor_head.php'?>
<?php include 'links.php' ?>

<?php 

 $course_id = $_GET['course_id'];

 $sql = "select * from courses where course_id='".$course_id."'";
 
    
?>

<div class="row  m-auto">
<div class="col-md-2" style="background-image:url('');height:100vh"></div>
  <div class="col-md-10">
    <div class="row m-auto">
      <div class="col-md-4"></div>
            <div class="col-md-4 mt-5">
            <div class="card container1 mt-5 p-3">
                <form action="add_tutor_course_action.php" enctype="multipart/form-data" method="post">
                <input type="hidden" name="course_id" value="<?php echo $course_id ?>" >
                
                <div class="text-center h4">Add Tutor Course</div>
                <div class="mt-3">
                    <label for="tutor_course_title" class="form-label">Tutor Course Title</label>
                    <input type="text" name="tutor_course_title" id="tutor_course_title" placeholder="Enter Tutor course Title" required class="form-control">
                </div>
                <div class="mt-3">
                    <label for="picture" class="form-control-label">Choose hospital Picture</label>
                    <input type="file" name="picture" id="picture" placeholder="" required class="form-control">
                </div>
                <div class="btn">
                    <input type="submit" value="Add Tutoe Course" class="btn btn-danger w-100 mt-3">
                </div>
                </form>
            </div>
        </div>
          <div class="col-md-">
            
            
          </div>
    </div>
  </div>
</div>
