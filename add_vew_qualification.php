<?php include 'student_head.php'?>
<?php include 'links.php' ?>
<?php include 'dbconn.php' ?>


<div class="row  m-auto">
  <div class="col-md-12">
    <div class="row m-auto">
      <div class="col-md-4"></div>
            <div class="col-md-4 mt-5">
            <div class="card container1 mt-5 p-3">
                <form action="add_view_qualification_action.php" method="post">
                <div class="text-center h4">Add Qualification</div>
                <div class="mt-3">
                    <label for="qualification_title" class="form-label">Qualification Title</label>
                    <input type="text" name="qualification_title" id="qualification_title" placeholder="Enter Qualification Title" required class="form-control">
                </div>
                <div class="mt-3">
                    <label class="form-label mt-2"></label>
                    <select name="grade" id="grade" class="form-control" placeholder="" required>>
                        <option value="">Choose Grade</option>
                        <option value="A+">A+</option>
                        <option value="A">A</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="passed_year" class="form-label">Passed Year</label>
                    <input type="number" name="passed_year" id="passed_year" placeholder="Enter Passed out year" required class="form-control">
                </div>
                <div class="btn">
                    <input type="submit" value="Add Qualification" class="btn btn-danger w-100 mt-3">
                </div>
                </form>
            </div>
        </div>
          <div class="col-md-">
            
            
          </div>
    </div>
  </div>
</div>

