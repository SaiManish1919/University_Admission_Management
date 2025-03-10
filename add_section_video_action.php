<?php include 'dbconn.php' ?>
<?php include 'tutor_head.php'?>
<?php include 'links.php' ?>
<?php 
    $tutor_course_id = $_POST['tutor_course_id'];


    $course_section_id = $_POST['course_section_id'];
    $video_title = $_POST['video_title'];
    $duration = $_POST['duration'];

    $target_path = "pics/";
    $target_path = $target_path.basename($_FILES['video']['name']);   
    echo $target_path;
    if(move_uploaded_file($_FILES['video']['tmp_name'], $target_path)) {  
        echo "File uploaded successfully!";  
    } else{  
        echo "Sorry, file not uploaded, please try again!";  
    }  
    $video = $_FILES["video"]["name"];

    $sql = "insert into section_videos(video_title,duration,video,course_section_id) values('".$video_title."', '".$duration."', '".$video."', '".$course_section_id."')"; 
    if($conn->query($sql)==TRUE){
        $url =  "view_tutor_courses.php?tutor_course_id=".$tutor_course_id;
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    } 
?>