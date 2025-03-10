<?php 
include 'admin_head.php';
include 'links.php';
include 'dbconn.php'; 
?>
<?php 
    $university_id = $_POST['university_id'];
    $university_name = $_POST['university_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $address = $_POST['address'];

    $sql = "update universities set university_name ='".$university_name."', phone = '".$phone."', email = '".$email."', state = '".$state."', city = '".$city."', zipcode = '".$zipcode."', address = '".$address."' where university_id ='".$university_id."'";
    if($conn->query($sql)==TRUE){
        $url =  "view_university.php";
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
?>