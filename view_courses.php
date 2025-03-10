
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
$department_id = $_GET['department_id'];
$sql = "select * from courses where  department_id = '".$department_id."'";
$courses = $conn ->query($sql);
?>
<div class="row mt-3">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <div class="text-center text-danger h4 mt-1"><b>View courses</div></b>
        <div class="row">
            <?php foreach($courses as $course){ 
                $sql2 = "select * from departments where department_id= '".$course['department_id']."'";
                $departments = $conn->query($sql2);
                $sql3 = "select * from certifications where  course_id = '".$course['course_id']."' and application_id ='".$application_id."'";
                $certifications = $conn ->query($sql3);
            ?>
                <div class="col-md-3  mt-1">
                    <div class="card p-3">
                        <div class="" >
                            <img src="pics/<?php echo $course['picture']?>" class="card-img" style="height:200px;">
                            <div class="text-center h5 mt-2"><?php echo $course['course_name']?> Course</div>
                            <?php foreach($departments as $department){ ?>
                                <div class="teXt-center"><?php echo $department['department_name']?> Department</div>
                            <?php } ?>
                            <?php if($certifications->num_rows > 0){ ?>
                                <?php foreach($certifications as $certification){
                                    if($certification['status']=='Course Enrolled'){ 
                                        $sql4 = "select * from tutor_courses where  course_id = '".$certification['course_id']."' and tutor_course_id in(select tutor_course_id from course_enrollments where application_id= '".$application_id."' )";
                                        // echo $sql4;
                                        $tutor_courses = $conn ->query($sql4);
                                        ?>
                                        <?php foreach($tutor_courses as $tutor_course){ 
                                            $sql5 = "select * from course_enrollments where application_id= '".$application_id."' and  tutor_course_id='".$tutor_course['tutor_course_id']."' ";
                                            $course_enrollments = $conn ->query($sql5);
                                            ?>
                                             <?php foreach($course_enrollments as $course_enrollment){ ?>
                                                <a href="view_tutor_courses.php?tutor_course_id=<?php echo $tutor_course['tutor_course_id']?>&course_enrollment_id=<?php echo $course_enrollment['course_enrollment_id']?>&certification_id=<?php echo $certification['certification_id'] ?> " class="btn bg-danger text-white mt-1 w-100">Go To Course</a>
                                            <?php } ?>

                                        <?php } ?>
                                    <?php }else{ ?>
                                        <a href="view_certificates.php?certification_id=<?php echo $certification['certification_id']?>" class="btn bg-success text-white mt-1 w-100"><?php echo $certification['status']?></a>
                                    <?php } ?>
                                <?php } ?>
                            <?php }else { 
                                ?>
                                <div class="text-center h5 mt-2"> <a href="add_certificate.php?course_id=<?php echo $course['course_id']?>&application_id=<?php echo $application_id ?>">Upload Certificate</a></div>
                                <div class="text-center h5 mt-2"><a href="view_tutor_course.php?course_id=<?php echo $course['course_id']?>&application_id=<?php echo $application_id ?>"> View Tutor Courses</a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>


