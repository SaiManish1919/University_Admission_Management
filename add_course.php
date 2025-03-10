
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
$department_id = $_GET['department_id'];
?>

<div class="row  m-auto">
<div class="text-center h4 mt-2"><b>Add Courses</b></div>

    <div class="col-md-2"></div>
    <div class="col-md-10">

        <div class="row m-auto">
            <div class="col-md-3"></div>
            <?php if($_SESSION['role']=='university'){?>
            <div class="col-md-4">
                <div class="card container1 mt-5 p-3">
                    <form action="add_view_course_action.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="department_id" value="<?php echo $department_id ?>">
                        <div class="text-center h5"><b>Add Course</b></div>
                        <div class="mt-3">
                            <label for="course_name" class="form-label">Course Name</label>
                            <input type="text" name="course_name" id="course_name" placeholder="Enter Course Name" required class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="picture" class="form-control-label">Choose  Picture</label>
                            <input type="file" name="picture" id="picture" placeholder="" required class="form-control">
                        </div>

                        <div class="">
                            <input type="submit" value="Add Course" class="btn btn-danger w-100 mt-3">
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

