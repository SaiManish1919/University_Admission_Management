
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
$sql = "SELECT * FROM departments WHERE department_id = '".$department_id."'";
$departments = $conn->query($sql);

?>


<div class="row  m-auto">
<div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="row m-auto">
        <?php if($_SESSION['role']=='university'){?>
        <div class="col-md-4 mt-5">
        <div class="card p-4">
            <?php foreach($departments as $department){?>
                <h3 class="text-center">Edit Department</h3>
                <form action="update_department_action.php" method="post">
                    <input type="hidden" name="department_id" value="<?php echo $department['department_id']; ?>">
                    <div class="mt-3">
                        <label for="department_name" class="form-label">Department Name</label>
                        <input type="text" name="department_name" id="department_name" value="<?php echo $department['department_name']; ?>" required class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="gpa" class="form-label">Required GPA</label>
                        <input type="number" step="0.01" name="gpa" id="gpa" value="<?php echo $department['gpa']; ?>" required class="form-control">
                    </div>
                    <div class="mt-3">
                        <input type="submit" value="Update Department" class="btn btn-primary w-100">
                    </div>
                </form>
            <?php } ?>
        </div>
            
        
        </div>
        <?php } ?>
        <?php if($_SESSION['role']!='university'){?>
        <div class="col-md-2"></div>
        <?php } ?>
          <div class="col-md-8 mt-2">
            <div class="row mt-40 p-5">
            <div class="p-10 card container mt-10">
                <?php 
                    $sql = "select * from departments where university_id='".$_SESSION['university_id']."' ";
                    $departments = $conn ->query($sql);    
                ?>
                <!-- $university_id = $_GET['university_id'];
                $sql = "select * from departments where university_id = '".$university_id."'";
                $departments = $conn->query($sql);
                ?> -->
                <div class="text-center h4  mt-10"><b>View Departments</b></div>
                <table id="mytable" class="table text-center  w-100">
                <thead>     
                    <tr>
                    <th>S.no</th>
                    <th>Department Name</th>
                    <th>Minimum Required GPA</th>
                    <th>Action</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($departments as $department){ 
                      ?>
                        <tr>
                            <td><?php echo $department['department_id']?></td>
                            <td><?php echo $department['department_name']?></td>
                            <td><?php echo $department['gpa']?> %</td>
                            <td><a href="add_view_courses.php?department_id=<?php echo $department['department_id']?>" class="btn bg-danger text-white">view courses</a></td>
                            <td>
                              <a href="edit_department.php?department_id=<?php echo $department['department_id']?>" class="btn btn-success w-100">Edit</a>
                            </td>
                        <tr>

                    <?php  }?>
                </tbody>
                </table>
            </div>
            </div>
          </div>
    </div>
  </div>
</div>

