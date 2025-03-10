<?php include 'dbconn.php' ?>
<?php include 'head.php'?>
<?php include 'links.php' ?>
<?php SESSION_start(); ?>
<?php 
$email =$_POST['email'];
$password =$_POST['password'];
$sql = "select * from students where email='".$email."' and password='".$password."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) { 
        $_SESSION["role"] = 'student';
        $_SESSION["student_id"] = $row["student_id"];
        $_SESSION["gpa"] = $row["gpa"];
        $url = "student_home.php";
        header("Location:".$url);
    }
}else{
    $url = "msg.php?msg=Invalid Login Details&class=text-danger";
    header("Location:".$url);
}
?>
