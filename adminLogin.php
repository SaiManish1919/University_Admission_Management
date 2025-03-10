<?php include 'head.php'?>
<?php include 'links.php' ?>

<div class="row m-auto">
    
    <div class="col-md-10">
        <div class="row m-auto">
            <div class="col-md-5">
            </div>
              <div class="col-md-4 mt-5">
                <div class="card  container mt-5 p-4">
                    <form action="adminLogin1.php" method="post">
                        <div class="text-center h4">Admin Login</div>
                        <div class="mt-2">
                          <label for="username" class="form-label">User Name</label>
                          <input type="text" name="username" id="username" placeholder="Enter Name" required class="form-control">
                        </div>
                        <div class="mt-2">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name="password" id="password" placeholder="Enter Password" required class="form-control">
                        </div>
                        <div class="btn">
                          <input type="submit" value="Login" class="btn btn-danger  w-100 mt-10">
                        </div>
                    </form>
                  </div>
                </div>
              <div class="col-md-4"></div>
        </div>

    </div>
</div>
