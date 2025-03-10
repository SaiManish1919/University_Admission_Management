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
    $sql = "select * from universities";
    $universities = $conn ->query($sql);    
?>


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <div class="row">
            <?php foreach($universities as $university){ 
                // $sql = "select * from departments where university_id='".$university['university_id']."' ";
                // $departments = $conn ->query($sql);    
            ?>
                <div class="col-md-4  mt-5">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-20">
                                <div class="h5 text-center text-danger"><?php echo $university['university_name']?> University</div>
                                <div class="" >
                                    <img src="pics/<?php echo $university['picture']?>" class="img img-bordered mt-10" style="width:100%; height:200px;">
                                </div>
                                <div class="text-center mt-10 h6">
                                    <div class="mt-2"><?php echo $university['email']?></div>
                                    <div class="mt-2"><?php echo $university['phone']?></div>
                                    <div class="mt-2"><?php echo $university['state']?>(State), <?php echo $university['city']?>(city)</div>
                                    <div class="mt-2"><?php echo $university['zipcode']?></div>
                                    <div class="mt-2"><?php echo $university['address']?></div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <?php if($_SESSION['role']=='admin'){?>
                                <div class="col-md-6">
                                    <a href="delete_university.php?university_id=<?php echo $university['university_id']?>" class="btn btn-danger w-100" style="font-size:70%">Delete</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="edit_university.php?university_id=<?php echo $university['university_id']?>" class="btn btn-primary w-100" style="font-size:70%">Edit</a>
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

