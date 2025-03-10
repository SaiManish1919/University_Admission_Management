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
$course_section_id = $_GET['course_section_id'];
$tutor_course_id = $_GET['tutor_course_id'];

?>
<div class="row m-auto">
<div class="col-md-2" style="background-image:url('');height:100vh"></div>

  <div class="col-md-10">
       <div class="row m-auto">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-5">
                <div class="card hi mt-5 p-3">
                  <div class="text-center h4">Add  Video</div>
                  <form action="add_section_video_action.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="course_section_id" value="<?php echo $course_section_id?>">
                    <input type="hidden" name="tutor_course_id" value="<?php echo $tutor_course_id?>">

                      <div class="mt-3">
                            <label for="video_title" class="form-label">Video Title</label>
                            <input type="text" name="video_title" id="video_title" placeholder="Enter  Video Title" required class="form-control">
                        </div>
                        <div class="input mt-3">
                            <labe>Add Video</labe>
                            <input type="file" name="video" id="video" class="form-control" placeholder="choose video" required>
                        </div>
                        <div class="mt-3">
                          <label for="duration" class="form-label">Duration</label>
                          <input type="text" name="duration" id="duration" placeholder="Enter Duration" required class="form-control">
                        </div>
                       <div class="mt-3">
                           <input type="submit"  value="Add Video" class="btn btn-danger w-100">
                        </div>
                  </form>
                </div>
            </div>
       </div>
  </div>
</div>