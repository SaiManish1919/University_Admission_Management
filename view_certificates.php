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

 <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="row mt-40 p-5">
        <div class="p-10 card container mt-10">
            <?php 
            $certification_id = $_GET['certification_id'];
            $sql = "select * from certifications where certification_id= '".$certification_id."' ";
            $certifications = $conn->query($sql);
            // echo $sql ;
            ?>
            <div class="text-center h4  mt-10"><b>View Certificates</b></div>
            <table id="mytable" class="table text-center  w-100">
            <thead>     
                <tr>
                <th>Passed Year</th>
                <th>Certificate type</th>
                <th>Certificate</th>
                <th>status</th>
                <?php if($_SESSION['role'] == 'university'){ ?>
                    <th>Action</th>
                <?php } ?>


            </tr>
            </thead>
            <tbody>
                <?php foreach($certifications as $certificate){ 
                    $sql1 = "select * from course_enrollments where application_id in(select application_id from certifications where certification_id = '".$certificate['certification_id']."')";
                    $course_enrollments = $conn->query($sql1);
                    ?>
                    <tr>
                    <td><?php echo $certificate['passed_year']?></td>
                    <td><?php echo $certificate['certificate_type']?></td>

                    <?php  if($certificate['certificate_type']=='Self'){?>
                    <td>
                        <a href="certificates/<?php echo $certificate['certificate']?>">view Certficate</a>
                    </td>
                    <?php } ?>
                    <?php  if($certificate['certificate_type']=='By University'){?>
                        <td>
                            <?php foreach($course_enrollments as $course_enrollment) { ?>
                                <a href="view_Student_answers.php?course_enrollment_id=<?php echo $course_enrollment['course_enrollment_id']?>">View written Exam answers</a>
                            <?php } ?>
                        </td>
                    <?php } ?>
                    <td><?php echo $certificate['status']?></td>
                    <?php if($_SESSION['role'] == 'university'){
                        if($certificate['status']=='Cerficate Uploaded'){?>
                            <td><a href="approve_certficate.php?certification_id=<?php echo $certificate['certification_id']?>" class="btn bg-success text-white  w-100">Approve</a></td>
                            <td><a href="reject_certficate.php?certification_id=<?php echo $certificate['certification_id']?>" class="btn bg-danger text-white  w-100">Reject</a></td>
                    <?php } }?>
                    <tr>
                <?php  }?>
            </tbody>
            </table>
        </div>
    </div>
 </div>