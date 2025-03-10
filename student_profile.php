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
if($_SESSION['role']=='university'){
    $application_id = $_GET['application_id'];
    $sql = "select * from students where student_id in(select student_id from applications where application_id='".$application_id."')";
    }elseif($_SESSION['role']=='student'){
        $student_id = $_SESSION['student_id'];
        $sql = "select * from students where student_id='".$student_id."' ";
    }
    // echo $sql;
    $students = $conn ->query($sql);    
?>

<?php 
if($_SESSION['role']=='university'){
    $application_id = $_GET['application_id'];
    $sql = "select * from qualifications where student_id in(select student_id from students where student_id in(select student_id from applications where application_id='".$application_id."'))";
    }elseif($_SESSION['role']=='student'){
        $student_id = $_SESSION['student_id'];
        $sql = "select * from qualifications where student_id='".$student_id."' ";
    }
    // echo $sql;
    $qualifications = $conn ->query($sql);    
?>
<!-- <?php 

    // $student_id = $_SESSION['student_id'];
    // $sql = "select * from students where student_id='".$student_id."' ";
    // $students = $conn->query($sql);
    // $sql2 = "select * from qualifications where student_id='".$student_id."' ";
    // $qualifications = $conn->query($sql2);
?> -->


<?php foreach ($students as $student) {?>
<div class="row mt-3">
    <div class="col-md-3"></div>
    <div class="col-md-6 p-10 mt-30 card container1">
        <div class="row p-20">
            <div class="text-center h4">Profile</div><hr>
            <div class="col-md-3">
            <div class="" >
                <img src="pics/<?php echo $student['image']?>" class="img img-bordered mt-10" style="width:180px; height:180px;">
            </div>
            </div>
            <div class="col-md-6 mt-10">
                <div class="h5"><?php echo $student['first_name']?> <?php echo $student['last_name']?></div>
                <div class="mt-2"><?php echo $student['email']?></div>
                <div class="mt-2"><?php echo $student['phone']?></div>
                <div class="mt-2"><?php echo $student['state']?>(State), <?php echo $student['city']?>(city)</div>
                <div class="mt-2"><?php echo $student['zipcode']?></div>
                <div class="mt-2"><?php echo $student['address']?></div>
            </div>
            <?php if($_SESSION['role']=='student'){?>

            <div class="col-md-3">
                <a href="add_vew_qualification.php?student_id=<?php echo $student['student_id']?>" class="btn mt-10 btn-danger">Add Qualification</a>
            </div>
            <?php } ?>

        </div>
        <div class="row">
            <div class="mt-3">
                <?php 
                
                ?>
                <div class="text-center h4">Qualifications</div>
                <table id="mytable" class="table text-center  w-100">
                <thead>     
                    <tr>
                    <th>S.no</th>
                    <th>Qualification Title</th>
                    <th>Grade</th>
                    <th>Passed Year</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($qualifications as $qualification){ ?>
                        <tr>
                            <td><?php echo $qualification['qualification_id']?></td>
                            <td><?php echo $qualification['qualification_title']?></td>
                            <td><?php echo $qualification['grade']?></td>
                            <td><?php echo $qualification['passed_year']?></td>
                        <tr>
                    <?php  }?>
                </tbody>
                </table>
            </div>

            </div>
    </div>
    <div class="w-30"></div>
</div>
<?php }?>



