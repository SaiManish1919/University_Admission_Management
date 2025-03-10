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


if($_SESSION['role']=='student'){
    $sql = "select * from applications where student_id='".$_SESSION['student_id']."' ";
    }elseif($_SESSION['role']=='university'){
        $sql = "select * from applications where  department_id in (select department_id from departments where university_id='".$_SESSION['university_id']."' )";
    }
    // echo $sql;
    $applications = $conn ->query($sql);   
    
    if ($_SESSION['role'] == 'student') {
        $sql = "SELECT * FROM applications WHERE student_id = '" . $_SESSION['student_id'] . "'";
        $total_sql = "SELECT COUNT(*) AS total_count FROM applications WHERE student_id = '" . $_SESSION['student_id'] . "'";
        $approved_sql = "SELECT COUNT(*) AS approved_count FROM applications WHERE student_id = '" . $_SESSION['student_id'] . "' AND status = 'Approved'";
        $rejected_sql = "SELECT COUNT(*) AS rejected_count FROM applications WHERE student_id = '" . $_SESSION['student_id'] . "' AND status = 'Rejected'";
    } elseif ($_SESSION['role'] == 'university') {
        $sql = "SELECT * FROM applications WHERE department_id IN (SELECT department_id FROM departments WHERE university_id = '" . $_SESSION['university_id'] . "')";
        $total_sql = "SELECT COUNT(*) AS total_count FROM applications WHERE department_id IN (SELECT department_id FROM departments WHERE university_id = '" . $_SESSION['university_id'] . "')";
        $approved_sql = "SELECT COUNT(*) AS approved_count FROM applications WHERE department_id IN (SELECT department_id FROM departments WHERE university_id = '" . $_SESSION['university_id'] . "') AND status = 'Approved'";
        $rejected_sql = "SELECT COUNT(*) AS rejected_count FROM applications WHERE department_id IN (SELECT department_id FROM departments WHERE university_id = '" . $_SESSION['university_id'] . "') AND status = 'Rejected'";
    }
    
    $total_count = $conn->query($total_sql)->fetch_assoc()['total_count'];
    $approved_count = $conn->query($approved_sql)->fetch_assoc()['approved_count'];
    $rejected_count = $conn->query($rejected_sql)->fetch_assoc()['rejected_count'];
    
    
?>

<div class="row mt-5">
    <div class="col-md-4 text-center container1">
        <div class="h4 p-2  text-danger"><b>Total Applications: <?php echo $total_count; ?></b></div>
    </div>
    <div class="col-md-4 text-center container1">
        <div class="h4 p-2  text-success"><b>Approved Applications: <?php echo $approved_count; ?></b></div>
    </div>
    <div class="col-md-4 text-center container1">
    <div class="h4 p-2  text-danger"><b>Rejected Applications: <?php echo $rejected_count; ?></b></div>
    </div>
</div>

<div class="row mt-50">
    <div class="col-md-3"></div>
    <div class="col-md-6 mt-5 card  p-3">
    <?php foreach($applications as $application){ ?>
        <div class="row">
            <?php 
            $sql1 = "select * from departments where  department_id = '".$application['department_id']."'";
            $departments = $conn ->query($sql1);
            $sql2 = "select * from students  where  student_id = '".$application['student_id']."'";
            $students = $conn ->query($sql2);
            $sql2 = "select * from certifications  where  application_id = '".$application['application_id']."'";
            $certifications = $conn ->query($sql2);
            ?>
            <div class="col-md-8">
                <div class="h6 mt-2">Application registered on <b><?php echo $application['date']?></b></div>
                <div class="h6 mt-2">The application status stands as <b><?php echo $application['status']?></b></div>
                <?php foreach($departments as $department){ ?>
                    <div class="h6 mt-2">Application submitted to the <b><?php echo $department['department_name']?></b> Department</div>
                    <?php foreach($students as $student){ ?>
                        <div class="h6 mt-2">Name of the student <b><?php echo $student['first_name']?> <?php echo $student['last_name']?></b></div>
                        <div class="h6 mt-2">Student's email account <b><?php echo $student['email']?></b></div>
                        <div class="h6 mt-2">Contact number <b><?php echo $student['phone']?></b></div>
                    <?php 
                        $sql3 = " select count(*) as course_count from courses where department_id = '".$department['department_id']."' ";
                        $courses = $conn ->query($sql3);
                        $courseData = $courses->fetch_assoc();
                        $courseCount = $courseData['course_count'];
                    ?>
                    <div class="h6 mt-2">Total courses in the department: <b><?php echo $courseCount; ?></b></div>

                    <?php
                        $sql4 = " select count(*) as completed_certificates from certifications where status='Completed' and application_id = '".$application['application_id']."' and course_id in(select course_id from courses where department_id = '".$department['department_id']."')" ;
                        // echo $sql4 ;
                        $certificates = $conn ->query($sql4);
                        $certificateData = $certificates->fetch_assoc();
                        $completedCertificates = $certificateData['completed_certificates'];
                    ?>
                    <div class="h6 mt-2">Completed certificates: <b><?php echo $completedCertificates; ?></b></div>
                <?php }} ?>
            </div>

            <div class="col-md-3 mt-3">
                <a href="student_profile.php?application_id=<?php echo $application['application_id']?>" class="btn bg-success text-white">View Students Deatils</a>
                <?php if($_SESSION['role']=='student'){
                    if($application['status'] != 'Dropped'){?>
                        <a href="drop_admission.php?application_id=<?php echo $application['application_id']?>" class="btn bg-danger text-white w-100 mt-3">Drop Application</a>
                <?php }} ?>
                <a href="view_courses.php?department_id=<?php echo $department['department_id']?>&application_id=<?php echo $application['application_id']?>" class="btn bg-danger text-white w-100 mt-3">prerequisites</a>
            </div>
            <?php 
                if($_SESSION['role']=='university'){
                    if($courseCount == $completedCertificates){ 
                        if($application['status']!='Approved'){?>
                    <div class="col-md-2 mt-3">
                        <?php if($application['status']!='Rejected'){?>
                            <a href="approve_admission.php?application_id=<?php echo $application['application_id']?>" class="btn bg-success text-white w-100">Approve</a>
                        <?php } ?>
                    </div>
                        <?php if($application['status']!='Rejected'){?>
                        <div class="col-md-2 mt-3">
                            <a href="reject_admission.php?application_id=<?php echo $application['application_id']?>" class="btn bg-danger text-white w-100">Reject</a>
                        </div>
                        <?php } ?>
                    <?php } ?>
            <?php }} ?>
            <?php
            if($courseCount == $completedCertificates){ ?>
                <div class="h6 text-success">Student has to complete <?php echo $courseCount; ?> Pre Requisites Courses and student has to completed <?php echo $completedCertificates; ?> courses</div>
            <?php }else { ?>
                <div class="h6 text-danger">Student has to complete <?php echo $courseCount; ?> Pre Requisites Courses and student has to completed <?php echo $completedCertificates; ?> courses</div>
           <?php } ?>
            <div class="col-md-12">
                <div class="h6 mt-2"><b>Description: </b></div>
                <div class=""><?php echo $application['description']?></div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    <?php }?>
    </div>
</div>
