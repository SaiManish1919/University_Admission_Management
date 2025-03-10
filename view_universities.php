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
    $sql = "select * from universities";
    }elseif($_SESSION['role']=='tutor'){
        $sql = "select * from universities where university_id in(select university_id from tutors where tutor_id='".$_SESSION['tutor_id']."')";
    }elseif($_SESSION['role']=='university'){
        $sql = "select * from universities where  university_id='".$_SESSION['university_id']."'";
    }elseif($_SESSION['role']=='admin'){
        $sql = "select * from universities";
    }
    $universities = $conn ->query($sql);    
?>
<div class="text-center text-danger mt-2 h4"> <b>View University</b></div>


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <div class="row">
            <?php foreach($universities as $university){ 
                $sql = "select * from departments where university_id='".$university['university_id']."' ";
                $departments = $conn ->query($sql);    
            ?>
                <div class="col-md-6  mt-2">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="p-20">
                                <div class="h5 text-center text-danger"><?php echo $university['university_name']?> University</div>
                                <div class="" >
                                    <img src="pics/<?php echo $university['picture']?>" class="img img-bordered mt-10" style="width:100%; height:180px;">
                                </div>
                                <div class="text-center mt-10 h6">
                                    <div class="mt-2"><?php echo $university['email']?></div>
                                    <div class="mt-2"><?php echo $university['phone']?></div>
                                    <div class="mt-2"><?php echo $university['state']?>(State), <?php echo $university['city']?>(city)</div>
                                    <div class="mt-2"><?php echo $university['zipcode']?></div>
                                    <div class="mt-2"><?php echo $university['address']?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 ">
                        <div class="h5 text-center text-danger mt-4">Departments</div>

                        <table id="mytable" class="table text-center  w-100"><hr>
                        
                        <tbody>
                            <?php foreach($departments as $department){ 
                            ?>
                                <tr>
                                    <td><?php echo $department['department_name']?></td>
                                    <td>Minimum Required GPA <?php echo $department['gpa']?>% </td>
                                    
                                        <td><a href="add_view_courses.php?department_id=<?php echo $department['department_id']?>" class="btn bg-danger text-white">prerequisites</a></td>
                                    <?php if($_SESSION['role']=='student'){
                                        $sql = "select * from applications where department_id = '".$department['department_id']."' and student_id = '".$_SESSION['student_id']."'";
                                        $applications = $conn ->query($sql);
                                            if ($applications->num_rows > 0) { 
                                                foreach($applications as $application){ ?>
                                                <td><a href="view_application.php?department_id=<?php echo $department['department_id']?>"><?php echo $application['status'] ?></a></td>
                                        <?php  }
                                            }else{ ?>
                                            <?php if ($_SESSION['gpa']>=$department['gpa']) { ?>
                                                <td><a href="application.php?department_id=<?php echo $department['department_id']?>" class="btn bg-danger text-white">Apply</a></td>
                                             <?php }else{ ?>
                                                <td><div class="text-danger mt-2">Not Eligble</div></td>
                                            <?php } ?>

                                            <?php } ?>
                                    <?php } ?>
                                   
                                <tr>

                            <?php  }?>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
           
            <?php }?>

        </div>
    </div>
</div>

