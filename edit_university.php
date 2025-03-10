<?php 
include 'admin_head.php';
include 'links.php';
include 'dbconn.php'; 

$university_id = $_GET['university_id']; 
$sql = "SELECT * FROM universities WHERE university_id = '".$university_id."'";
$universities = $conn->query($sql);
?>
<?php foreach($universities as $university){?>
<div class="row m-auto">
    <div class="col-md-4" style="background-image:url('');height:100vh"></div>
    <div class="col-md-5 mt-5">
        <div class="card container mt-4 p-3">
            <div class="text-center h3">Edit University</div>
            <form action="update_university_action.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="university_id" value="<?php echo $university['university_id']; ?>">
                <div class="row m-auto">
                    <div class="col-md-6 mt-3">
                        <label for="university_name" class="form-label">University Name</label>
                        <input type="text" name="university_name" id="university_name" value="<?php echo $university['university_name']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="number" name="phone" id="phone" value="<?php echo $university['phone']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $university['email']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="picture" class="form-control-label">Choose Picture</label>
                        <input type="file" name="picture" id="picture" class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" id="state" value="<?php echo $university['state']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" value="<?php echo $university['city']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="zipcode" class="form-label">Zipcode</label>
                        <input type="number" name="zipcode" id="zipcode" value="<?php echo $university['zipcode']; ?>" required class="form-control">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" required class="form-control"><?php echo $university['address']; ?></textarea>
                    </div>
                    <div class="col-md-6 mt-3">
                        <input type="submit" value="Update University" class="btn btn-danger w-100 mt-4 p-2">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
