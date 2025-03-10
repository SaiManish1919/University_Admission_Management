<?php include 'dbconn.php' ?>
<?php include 'head.php'?>
<?php include 'links.php' ?>
<?php SESSION_start(); ?>
<?php 
$email =$_POST['email'];
$password =$_POST['password'];
$sql = "select * from universities where email='".$email."' and password='".$password."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) { 
        $_SESSION["role"] = 'university';
        $_SESSION["university_id"] = $row["university_id"];
        $url = "university_home.php";
        header("Location:".$url);
    }
}else{
    $url = "msg.php?msg=Invalid Login Details&class=text-danger";
    header("Location:".$url);
}
?>
