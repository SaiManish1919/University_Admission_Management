<?php SESSION_start(); ?>

<?php include 'dbconn.php'; ?>
<?php include 'university_head.php'?>
<?php include 'links.php' ?>
<?php 
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
   
   
    $university_id = $_SESSION['university_id'];
    $target_path = "pics/";
    $target_path = $target_path.basename($_FILES['profile_picture']['name']);   
    echo $target_path;
    if(move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_path)) {  
        echo "File uploaded successfully!";  
    } else{  
        echo "Sorry, file not uploaded, please try again!";  
    }  
    $profile_picture = $_FILES["profile_picture"]["name"];



    
    $sql = "insert into tutors(name,email,phone,password,state,city,zipcode,address,designation,experience,profile_picture,university_id) 
    values('".$name."', '".$email."', '".$phone."', '".$password."', '".$state."','".$city."','".$zipcode."','".$address."','".$designation."','".$experience."','".$profile_picture."','".$university_id."')"; 
    if($conn->query($sql)==TRUE){
        $url =  "msg.php?msg=Tutor Added Successfully&class=text-success";;
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
?>
