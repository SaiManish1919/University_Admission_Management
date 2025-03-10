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

    $application_id = $_GET['application_id'];
    $course_id = $_GET['course_id'];
    $sql = "select * from tutor_courses where  course_id='".$course_id."'";
    $tutor_courses = $conn ->query($sql);
?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10 mt-5">
        <div class="row">
            <?php foreach ($tutor_courses as $tutor_course) {
                $sql2 = "select * from course_enrollments where tutor_course_id= '".$tutor_course['tutor_course_id']."'";
                $course_enrollments = $conn->query($sql2);
                // echo  $sql2;
            ?>
                    <div class="col-md-3">
                    <div class="card p-3">
                            <div class="" >
                                <img src="pics/<?php echo $tutor_course['picture']?>" class="card-img" style="height:200px;">
                            </div>
                            <div class="h3 text-center mt-3"><?php echo $tutor_course['tutor_course_title']?> Course</div>
                            <?php if($_SESSION['role'] =='tutor'){ ?>
                                <div class="">
                                    <a href="view_enrollment.php?tutor_course_id=<?php echo $tutor_course['tutor_course_id'] ?>" class="btn btn-danger">View Enrols</a>
                                </div>
                            <?php } ?>
                            <?php if($_SESSION['role'] =='student'){ ?>
                                <div class="">
                                    <a href="course_enrollment.php?tutor_course_id=<?php echo $tutor_course['tutor_course_id'] ?>&application_id=<?php echo $application_id ?>&course_id=<?php echo $course_id ?>" class="btn btn-danger">Enrol Now</a>
                                </div>
                            <?php } ?>
                    </div>
                    </div>
                
             <?php } ?>
        </div>
    </div>
</div>

