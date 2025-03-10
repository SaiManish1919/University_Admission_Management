
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
    $sql3 = "select * from courses where  department_id = '".$department_id."'";
    $courses = $conn ->query($sql3);
?> 
<div class="row mt-5">
    <div class="col-md-2">
        <div class="row">
          
        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-8"></div>
            <?php if($_SESSION['role']=='university'){?>

            <div class="col-md-3 card">
                <a href="add_course.php?department_id=<?php echo $department_id?>" class="btn btn-danger w-100 text-white p-2">Add Course</a>
            </div>
            <?php } ?>

        </div>

        <div class="text-center text-danger h4 mt-3"><b>View courses</div></b>
        <div class="row">
            <?php foreach($courses as $course){ 
                $sql2 = "select * from departments where department_id= '".$course['department_id']."'";
                $departments = $conn->query($sql2);
            ?>
                <div class="col-md-3  mt-1">
                    <div class="card p-3">
                        <div class="" >
                            <img src="pics/<?php echo $course['picture']?>" class="card-img" style="height:200px;">
                            <div class="text-center h5 mt-2"><?php echo $course['course_name']?> Course</div>
                            <?php foreach($departments as $department){ 
                                $sql3 = "select * from applications where department_id= '".$department['department_id']."'";
                                $applications = $conn->query($sql3);
                            // echo $sql3
                            ?>
                                <div class="teXt-center"><?php echo $department['department_name']?> Department</div>
                            <?php } ?>
                            <?php if($_SESSION['role']=='tutor'){?>
                                <a href="add_tutor_course.php?course_id=<?php echo $course['course_id']?>" class="btn bg-primary text-white w-100">ADD</a>
                            <?php } ?>
                           
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>

