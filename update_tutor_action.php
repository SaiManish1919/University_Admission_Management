<?php 
include 'university_head.php';
include 'links.php';
include 'dbconn.php'; 
?>
<?php 
    $tutor_id = $_POST['tutor_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];
    $experience = $_POST['experience'];

    $sql = "update tutors set name ='".$name."', phone = '".$phone."', email = '".$email."', state = '".$state."', city = '".$city."', zipcode = '".$zipcode."', address = '".$address."', designation = '".$designation."', experience = '".$experience."' where tutor_id ='".$tutor_id."'";
    if($conn->query($sql)==TRUE){
        $url =  "view_tutor.php";
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
?>