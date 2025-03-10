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
    $sql = "select * from tutor_courses where tutor_id='".$_SESSION['tutor_id']."'";
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
                            <a href="view_tutor_courses.php?tutor_course_id=<?php echo $tutor_course['tutor_course_id']?>">
                            <div class="" >
                                <img src="pics/<?php echo $tutor_course['picture']?>" class="card-img" style="height:200px;">
                            </div>
                            <div class="h3 text-center mt-3"><?php echo $tutor_course['tutor_course_title']?> Course</div></a>
                            <?php if($_SESSION['role'] =='tutor'){ ?>
                                <div class="">
                                    <a href="view_enrollment.php?tutor_course_id=<?php echo $tutor_course['tutor_course_id'] ?>" class="btn btn-danger">View Enrols</a>
                                </div>
                                <div class="text-center text-danger">
                                    <a href="delete_tutor_course.php?tutor_course_id=<?php echo $tutor_course['tutor_course_id'] ?>" class="mt-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill mt-2" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                        </svg>
                                    </a>
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

