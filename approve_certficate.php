<?php include("university_head.php") ?>
<?php include("dbConn.php") ?>
<?php 

$certification_id = $_GET['certification_id'];
$sql = "select * from certifications where certification_id='".$certification_id."'";
$certifications = $conn->query($sql);
foreach($certifications as $certification){
    $sql = "update certifications set status='Completed' where certification_id='".$certification_id."'";
    if($conn->query($sql)==TRUE){
      $url =  "view_certificates.php?certification_id=".$certification_id;
      header("Location:".$url);
     }else{
      $url = "msg.php?msg=Something Went Wrong&color=text-danger";
      header("Location:".$url);
     }
   
}
?>