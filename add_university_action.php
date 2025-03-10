<?php session_start(); ?>

<?php include 'dbconn.php'; ?>
<?php include 'admin_head.php'?>
<?php include 'links.php' ?>
<?php 
    $university_name = $_POST['university_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $address = $_POST['address'];

   

    $target_path = $target_path.basename($_FILES['picture']['name']);   
    echo $target_path;
    if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {  
        echo "File uploaded successfully!";  
    } else{  
        echo "Sorry, file not uploaded, please try again!";  
    }  
    $picture = $_FILES["picture"]["name"];
    
    $sql = "insert into universities(university_name,email,phone,password,state,city,zipcode,address,picture) 
    values('".$university_name."','".$email."', '".$phone."', '".$password."', '".$state."','".$city."','".$zipcode."','".$address."','".$picture."')"; 
    if($conn->query($sql)==TRUE){
        $url =  "msg.php?msg=University Added Successfully&class=text-success";;
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
?>