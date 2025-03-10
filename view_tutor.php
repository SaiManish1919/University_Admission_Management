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
if($_SESSION['role']=='university'){
    $sql = "select * from tutors where university_id='".$_SESSION['university_id']."' ";
    }elseif($_SESSION['role']=='tutor'){
        $sql = "select * from tutors where tutor_id='".$_SESSION['tutor_id']."' ";
    }
    // echo $sql;
    $tutors = $conn ->query($sql);    
?>



<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <div class="row">
        <?php foreach($tutors as $tutor){ ?>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="h5 text-center text-danger mt-2"><?php echo $tutor['name']?></div><hr>
                            <div class="text-center" >
                                <img src="pics/<?php echo $tutor['profile_picture']?>" class="img img-bordered mt-10" style="width:180px; height:180px;">
                            </div>
                            <div class="text-center mt-10 h6">
                                <div class="mt-2"><?php echo $tutor['email']?></div>
                                <div class="mt-2"><?php echo $tutor['phone']?></div>
                                <div class="mt-2"><?php echo $tutor['designation']?> Designation</div>
                                <div class="mt-2"><?php echo $tutor['experience']?> Experience</div>
                                <div class="mt-2"><?php echo $tutor['state']?>(State), <?php echo $tutor['city']?>(city)</div>
                                <div class="mt-2"><?php echo $tutor['zipcode']?></div>
                                <div class="mt-2"><?php echo $tutor['address']?></div>
                            </div>
                            <div class="row p-2">
                                <?php if($_SESSION['role']=='university'){?>
                                <div class="col-md-6">
                                    <a href="delete_tutor.php?tutor_id=<?php echo $tutor['tutor_id']?>" class="btn btn-danger w-100" style="font-size:70%">Delete</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="edit_tutor.php?tutor_id=<?php echo $tutor['tutor_id']?>" class="btn btn-primary w-100" style="font-size:70%">Edit</a>
                                </div>
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
        </div>
    </div>
</div>



