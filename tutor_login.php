<?php include 'head.php'?>
<?php include 'links.php' ?>
<div class="row  m-auto">
    <div class="col-md-2" style="background-image:url('');height:100vh"></div>
    <div class="col-md-10">
        <div class="row m-auto">
            <div class="col-md-3"></div>
              <div class="col-md-4 mt-5">
                <div class="card container1 mt-5 p-3">
                    <form action="tutor_login_action.php" method="post">
                        <div class="text-center h4">Tutor Login</div>
                        <div class="mt-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" name="email" id="email" placeholder="Enter Email" required class="form-control">
                        </div>
                        <div class="mt-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name="password" id="password" placeholder="Enter Password" required class="form-control">
                        </div>
                      <div class="btn">
                          <input type="submit" value="Login" class="btn btn-danger w-100 mt-5">
                      </div>
                    </form>
                  </div>
                </div>
              <div class="col-md-4"></div>
        </div>
    </div>
</div>


