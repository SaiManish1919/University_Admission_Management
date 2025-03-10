<?php SESSION_start(); ?>

<?php include 'dbconn.php'; ?>
<?php include 'student_head.php'?>
<?php include 'links.php' ?>

<?php 

 $department_id = $_GET['department_id'];

 $sql = "select * from departments where department_id='".$department_id."'";
 
    
?>

<div class="row  m-auto">
  <div class="col-md-12">
    <div class="row m-auto">
      <div class="col-md-2"></div>
            <div class="col-md-8 mt-5">
            <div class="card container1 mt-5 p-3">
                <form action="application_action.php" enctype="multipart/form-data" method="post">
                <input type="hidden" name="department_id" value="<?php echo $department_id ?>" >
                
                <div class="text-center h4"><b>Application form</b></div>
                <div class="mt-3">
                    <label for="description" class="form-label h6">Description</label>
                    <textarea name="description" id="description" placeholder="Enter Description" required class="form-control p-3"></textarea>
                </div>
                <div class="btn">
                    <input type="submit" value="Apply" class="btn btn-danger w-100 mt-3">
                </div>
                </form>
            </div>
        </div>
          <div class="col-md-">
            
            
          </div>
    </div>
  </div>
</div>
