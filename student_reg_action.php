<?php SESSION_start(); ?>

<?php include 'dbconn.php'; ?>
<?php include 'head.php'?>
<?php include 'links.php' ?>
<?php 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $gpa = $_POST['gpa'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $address = $_POST['address'];

    $target_path = "pics/";


    $target_path = $target_path.basename($_FILES['image']['name']);   
    echo $target_path;
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {  
        echo "File uploaded successfully!";  
    } else{  
        echo "Sorry, file not uploaded, please try again!";  
    }  
    $image = $_FILES["image"]["name"];
    
    $sql = "insert into students(first_name,last_name,email,phone,password,state,city,zipcode,address,image,gpa) 
    values('".$first_name."', '".$last_name."', '".$email."', '".$phone."', '".$password."', '".$state."','".$city."','".$zipcode."','".$address."','".$image."','".$gpa."')"; 
    if($conn->query($sql)==TRUE){
        $url =  "msg.php?msg=Student Register Successfully&class=text-success";;
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
?>
