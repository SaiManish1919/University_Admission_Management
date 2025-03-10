<?php include 'dbconn.php'; ?>
<?php include 'links.php' ?>
<?php SESSION_start(); ?>

<?php if(!isset($_SESSION['role'])){
    include 'head.php';
    include 'links.php';
  }elseif($_SESSION["role"]=='admin'){
     include 'admin_head.php';
     include 'links.php';
  }
  elseif($_SESSION["role"]=='tutor'){
    include 'tutor_head.php';
    include 'links.php';
 }elseif($_SESSION["role"]=='student'){
    include 'student_head.php';
    include 'links.php';
 }
 elseif($_SESSION["role"]=='university'){
  include 'university_head.php';
  include 'links.php';
}
 ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    $(document).ready(function(){
        $("#display_video").hide();
    });

    function openVideo(video) {
        console.log("./pics/" + video);
        $("#display_video_src").attr("src", "./pics/" + video);
        $("#display_video").show();  
        $("#display_video")[0].load();  
        $("#display_video")[0].play();  
    }
</script>

<?php 

if($_SESSION['role']=='tutor'){
    $tutor_id = $_SESSION['tutor_id'];
    $tutor_course_id = $_GET['tutor_course_id'];
    $sql = "select * from tutor_courses where  tutor_id='".$tutor_id."' and tutor_course_id = '".$tutor_course_id."'";
}elseif($_SESSION['role'] =='student'){
    $certification_id = $_GET['certification_id'];
    $course_enrollment_id = $_GET['course_enrollment_id'];
    $tutor_course_id = $_GET['tutor_course_id'];
    $sql = "select * from tutor_courses where tutor_course_id = '".$tutor_course_id."'";
}

$tutor_courses = $conn ->query($sql);
?>
<?php foreach ($tutor_courses as $tutor_course) {?>
<div class="row mt-5">
    <div class="w-15"></div>
    <div class="w-80 card hi">
        <div class="row">
        <div class=""></div>
            <div class="w-60">
                <div class="row">
                    <div class="w-30">
                    <div class="" >
                        <img src="pics/<?php echo $tutor_course['picture']?>" class="img img-bordered mt-10" style="width:220px; height:150px;">
                    </div>
                    </div>
                    <div class="w-40">
                    <div class="h3 mt-3"><?php echo $tutor_course['tutor_course_title']?> Course</div>
                        <?php if($_SESSION['role']=='tutor'){?>
                        <div class="mt-3 ">
                            <a href="add_course_exam_questions.php?tutor_course_id=<?php echo $tutor_course['tutor_course_id'] ?>" class="btn w-50  mt-15 btn-danger p-3">Questions</a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="w-30">
                        
                    </div>
                </div>
                <div class="row mt-5">
                <video id="display_video" style="width:100%" controls>
                    <source src="" id="display_video_src" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
                <?php if($_SESSION['role']=='student'){?>

                <div class="row mt-5 p-2">
                    <div class="card p-3">
                    If you complete the course, then click here to write the exam.
                    <div class="mt-3 w-50 ">
                        <a href="write_exam.php?course_enrollment_id=<?php echo $course_enrollment_id ?>&certification_id=<?php echo $certification_id ?>" class="btn w-50  mt-2  btn-success">Write Exam</a>
                    </div>

                    </div>
                </div>
                <?php } ?>
            </div>
           
            <div class="w-40">
                <div class="row">
                <div class="col-md-6"></div>

                    <div class="col-md-6">
                    <?php if($_SESSION['role']=='tutor'){?>
                            <div class="mt-3">
                                <a href="add_section.php?tutor_course_id=<?php echo $tutor_course['tutor_course_id']?>" class="btn btn-primary  w-100">Add Section</a>
                            </div>
                    <?php } ?> 
                    </div>
                    <div class="mt-1" style="height:600px;overflow:auto" >
                        <?php
                        $sql1 = "select * from course_sections where tutor_course_id='".$tutor_course['tutor_course_id']."'";
                        $course_sections = $conn->query($sql1);
    
                        ?>
                            <?php foreach($course_sections as $course_section){?>
                            <div class="card p-3 mt-2" >
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="h5"><?php echo $course_section['course_section_name']?></div>
                                </div>
                                <?php if($_SESSION['role']=='tutor'){?>

                                    <div class="col-md-2">
                                        <a href="delete_section.php?course_section_id=<?php echo $course_section['course_section_id']?>&tutor_course_id=<?php echo $tutor_course['tutor_course_id']?>" class="btn btn-danger" style="font-size:70%">Delete</a>
                                    </div>
                        
                                    <div class="col-md-2">
                                        <a href="edit_section.php?course_section_id=<?php echo $course_section['course_section_id']?>&tutor_course_id=<?php echo $tutor_course['tutor_course_id']?>" class="btn btn-primary" style="font-size:70%">Edit</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="add_section_video.php?course_section_id=<?php echo $course_section['course_section_id']?>&tutor_course_id=<?php echo $tutor_course['tutor_course_id'] ?>" class="btn btn-primary" style="font-size:70%">Add Video</a>
                                    </div>
                                <?php } ?>
                            </div><hr>
                            <?php 
                               $sql2 = "select * from section_videos where course_section_id='".$course_section['course_section_id']."'";
                               $section_videos = $conn->query($sql2);
                            ?>
                            <?php foreach($section_videos as $section_video){?>
                            <div class="row mt-1">
                                <div class="col-md-1 mt-3 h6"><?php echo $section_video['section_video_id']?>.</div>
                                <div class="col-md-6 mt-2">
                                    <div class="">
                                        <button class="btn btn-danger w-100" onclick="openVideo('<?php echo $section_video['video']; ?>')">Play</button>
                                    </div>
                                </div>
                                <div class="col-md-5 mt-1" >
                                    <div><?php echo $section_video['video_title']?> </div>
                                    <div>Duration : <?php echo $section_video['duration']?></div>
                                </div><hr>
                            </div>
                            <?php } ?>
                        </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>