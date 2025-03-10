<?php include 'head.php'?>
<?php include 'links.php' ?>

<div class="row m-auto">
    <div class="col-md-4" style="background-image:url('');height:100vh" ></div>
    <div class="col-md-5 mt-5">
        <div class="card container mt-4 p-3">
                <div class="text-center h3">Student Registration</div>
                <form action="student_reg_action.php" enctype="multipart/form-data" method="post">
                    <div class="row m-auto">
                        <div class="col-md-6 mt-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" placeholder="Enter first name Name" required class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Enter last name Name" required class="form-control">
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
                        <div class="col-md-6 mt-4">
                            <label for="image" class="form-control-label">Choose Student Picture</label>
                            <input type="file" name="image" id="image" placeholder="" required class="form-control">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="gpa" class="form-label">GPA</label>
                            <input type="number" name="gpa" id="gpa" placeholder="Enter GPA ex:100" required class="form-control">
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
                            <input type="submit" value="Register" class="btn btn-danger w-100 mt-4 p-2">
                         </div>
                     </div>
                </form>
            </div>
      </div>
</div>




