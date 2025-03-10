<?php include 'admin_head.php'?>
<?php include 'links.php' ?>

<div class="row m-auto">
    <div class="col-md-4" style="background-image:url('');height:100vh" ></div>
    <div class="col-md-5 mt-5">
        <div class="card container mt-4 p-3">
                <div class="text-center h3">Add University</div>
                <form action="add_university_action.php" method="post" enctype="multipart/form-data">
                    <div class="row m-auto">
                        <div class="col-md-6 mt-3">
                            <label for="university_name" class="form-label">University Name</label>
                            <input type="text" name="university_name" id="university_name" placeholder="Enter university Name" required class="form-control">
                        </div>
                         <div class="col-md-6 mt-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="number" name="phone" id="phone" placeholder="Enter Phone Number" required class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter Email" required class="form-control">
                        </div>
                         <div class="col-md-6 mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password" required class="form-control">
                          </div>
                          <div class="col-md-6 mt-3">
                            <label for="picture" class="form-control-label">Choose  Picture</label>
                            <input type="file" name="picture" id="picture" placeholder="" required class="form-control">
                        </div>
                          <div class="col-md-6 mt-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" name="state" id="state" placeholder="Enter state" required class="form-control">
                          </div>
                         <div class="col-md-6 mt-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" id="city" placeholder="Enter city" required class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="zipcode" class="form-label">Zipcode</label>
                            <input type="number" name="zipcode" id="zipcode" placeholder="Enter zipcode" required class="form-control">
                        </div>
                         <div class="col-md-6 mt-2">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" placeholder="Enter Address" required class="form-control"></textarea>
                          </div>
                         <div class="col-md-6 mt-3">
                            <input type="submit" value="Add University" class="btn btn-danger w-100 mt-4 p-2">
                         </div>
                     </div>
                </form>
            </div>
      </div>
</div>




