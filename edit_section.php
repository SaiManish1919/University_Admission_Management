<?php include 'dbconn.php'; ?>
<?php include 'tutor_head.php'?>
<?php include 'links.php' ?>
<?php 
  $tutor_course_id = $_GET['tutor_course_id'];
  $course_section_id = $_GET['course_section_id'];
  $sql = "select * from course_sections where course_section_id='".$course_section_id."'";
  $course_sections = $conn->query($sql);
?>
<?php foreach($course_sections as $course_section){?>
<div class="row m-auto">
  <div class="col-md-1" ></div>
  <div class="col-md-10">
       <div class="row m-auto ">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-5">
                <div class="card hi mt-5 p-3">
                  <div class="text-center h4">Edit Section</div>
                  <form action="update_section.php">
                  <input type="hidden" name="tutor_course_id" value="<?php echo $tutor_course_id?>">
                  <input type="hidden" name="course_section_id" value="<?php echo $course_section_id?>">
                        <div class="mt-3">
                          <label for="course_section_name" class="form-label">Section Name</label>
                          <input type="text" name="course_section_name" id="course_section_name" placeholder="Enter section course Name" required class="form-control">
                        </div>
                       <div class="mt-3">
                           <input type="submit"  value="Update Section" class="btn btn-danger w-100">
                        </div>
                  </form>
                </div>
            </div>
       </div>
  </div>
</div>
<?php } ?>