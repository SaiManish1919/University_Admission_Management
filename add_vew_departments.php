
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


<div class="row  m-auto">
<div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="row m-auto">
    <?php if($_SESSION['role']=='university'){?>
      <div class=""></div>
            <div class="col-md-4 mt-2">
            <div class="card container1 mt-5 p-3">
                <form action="add_view_department_action.php" method="post">
                <div class="text-center h4">Departments</div>
                <div class="mt-3">
                    <label for="department_name" class="form-label">Department Name</label>
                    <input type="text" name="department_name" id="department_name" placeholder="Enter Department Name" required class="form-control">
                </div>
                <div class="mt-3">
                    <label for="gpa" class="form-label">Requirede GPA</label>
                    <input type="number" name="gpa" id="gpa" placeholder="Enter Required GPA for ex: 100%" required class="form-control">
                </div>
                <div class="">
                    <input type="submit" value="Add Department" class="btn btn-danger w-100 mt-3">
                </div>
                </form>
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
                    <th>Delete</th>
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
                            <?php if($_SESSION['role']=='university'){?>
                              <td>
                                <a href="edit_department.php?department_id=<?php echo $department['department_id']?>" class="btn btn-success w-100">Edit</a>
                              </td>
                              <td>
                                <a href="delete_department.php?department_id=<?php echo $department['department_id']?>" class="btn btn-danger w-100">Delete</a>
                              </td>
                            <?php } ?>
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

