<?php include 'dbconn.php'; ?>
<?php include 'student_head.php'?>
<?php include 'links.php' ?>
<?php 
    $application_id = $_POST['application_id'];
    $certificate_type = $_POST['certificate_type'];
    $course_id = $_POST['course_id'];
    $passed_year = $_POST['passed_year'];

    $target_path = $target_path.basename($_FILES['certificate']['name']);   
    echo $target_path;
    if(move_uploaded_file($_FILES['certificate']['tmp_name'], $target_path)) {  
        echo "File uploaded successfully!";  
    } else{  
        echo "Sorry, file not uploaded, please try again!";  
    }  
    $certificate = $_FILES["certificate"]["name"];
    $sql = "insert into certifications(application_id,course_id,passed_year,status,certificate,certificate_type)values('".$application_id."', '".$course_id."', '".$passed_year."', 'Cerficate Uploaded', '".$certificate."','Self')"; 
    if($conn->query($sql)==TRUE){
        $url =  "msg.php?msg=Certificate Successfully&class=text-success";
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    } 
?>