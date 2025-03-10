<?php include 'dbconn.php'; ?>
<?php include 'university_head.php';?>
<?php include 'links.php'; ?>
<?php 

$application_id = $_GET['application_id'];
$sql = "select * from applications  where application_id='".$application_id."'";

$results = $conn->query($sql);
foreach($results as $result){
    $sql = "update applications set status='Approved' where application_id='".$application_id."'";
    if($conn->query($sql)==TRUE){
        $url =  "view_application.php";
        header("Location:".$url);
        }else{
        $url = "msg.php?msg=Something Went Wrong&class=text-danger";
        header("Location:".$url);
    }
}
?>

 