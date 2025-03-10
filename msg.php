<?php include 'dbconn.php'; ?>
<?php include 'links.php' ?>

<?php session_start(); ?>

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
    $msg = $_GET['msg'];
    $class = $_GET['class'];
?>


<div class="row mt-5">
    <div class="col-md-3"></div>

    <div class="col-md-6 hi text-center p-30">
    <div class="h1 <?php echo $class ?>"><?php echo $msg ?></div>
    </div>
    <div class="w-15"></div>
</div>