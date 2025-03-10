<?php include 'university_head.php'?>
<?php 
include 'links.php';
include 'dbconn.php'; 
?>

<?php

$tutor_id = $_GET['tutor_id']; 
$sql = "SELECT * FROM tutors WHERE tutor_id = '".$tutor_id."'";
$tutors = $conn->query($sql);

?>
<?php foreach($tutors as $tutor){?>

<div class="row m-auto">
    <div class="col-md-4" style="background-image:url('');height:100vh"></div>
    <div class="col-md-5 mt-5">
        <div class="card container mt-4 p-3">
            <div class="text-center h3">Edit Tutor</div>
            <form action="update_tutor_action.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="tutor_id" value="<?php echo $tutor['tutor_id']; ?>">
                <div class="row m-auto">
                    <div class="col-md-6 mt-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $tutor['name']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="number" name="phone" id="phone" value="<?php echo $tutor['phone']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $tutor['email']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter New Password" class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" name="designation" id="designation" value="<?php echo $tutor['designation']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="experience" class="form-label">Experience</label>
                        <input type="text" name="experience" id="experience" value="<?php echo $tutor['experience']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="profile_picture" class="form-control-label">Choose Picture</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" id="state" value="<?php echo $tutor['state']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" value="<?php echo $tutor['city']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="zipcode" class="form-label">Zipcode</label>
                        <input type="number" name="zipcode" id="zipcode" value="<?php echo $tutor['zipcode']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" required class="form-control"><?php echo $tutor['address']; ?></textarea>
                    </div>
                    <div class="col-md-6 mt-3">
                        <input type="submit" value="Update Tutor" class="btn btn-danger w-100 mt-4 p-2">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
