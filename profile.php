<?php 	
  include "partial/header.php";	
  require_once "processor/pro_profile.php"; 
?>
<title>Profile Details, Contact dir</title>

	<!-- body content -->
    <div class="container-fluid cnt">
        <div class="col-md-3 left-sidebar">
           <div>
               <?php include "partial/left-profile.php";  ?>
           </div>
        </div>

        <div class="col-md-6 middle-content">
          <div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <?php echo $status; ?>
              <h2 class="ttle">Profile Information</h2>
              <div class="form-group">
                  <label for="first_name" class="col-sm-3 control-label">First Name </label>
                  <div class="col-sm-8">
                      <input required="required" type="text" class="form-control" id="first_name" name="first_name" placeholder="">
                  </div>
              </div>
              <div class="form-group">
                  <label for="last_name" class="col-sm-3 control-label">Last Name </label>
                  <div class="col-sm-8">
                      <input required="required" type="text" class="form-control" id="last_name" name="last_name" placeholder="">
                  </div>
              </div>
              <hr>
              <div class="form-group">
                  <label for="email" class="col-sm-3 control-label">Email </label>
                  <div class="col-sm-8">
                      <input required="required" readonly="readonly" value="fongohmartin@gmail.com" type="text" class="form-control" name="email" id="email" placeholder="">
                  </div>
              </div>
              <div class="form-group">
                  <label for="photo" class="col-sm-3 control-label">Photo </label>
                  <div class="col-sm-8">
                      <input type="file" class="form-control" name="file" id="photo" placeholder="">
                  </div>
              </div>
              <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Password </label>
                  <div class="col-sm-8">
                      <input required="required" type="password" class="form-control" name="password" id="password" placeholder="">
                  </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="visible"> Others can see my profile
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-9 col-md-offset-3">
                    <input required="required" type="checkbox" class="" name="liscence"> I accept
                  </div>
                  <div class="col-sm-8 col-md-offset-3">
                      <textarea disabled="disabled" class="form-control" id="skype_id" name="privacy_policy" placeholder=""> Privacy policy agreement here </textarea>
                  </div>
              </div>
              <div class="form-group" style="text-align: right;">
                  <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" name="update_profile" class="btn btn-primary">Update</button>
                  </div>
              </div>
            </form>    
          </div>
        </div>

        <div class="col-md-3 right-sidebar">
           <div>
               <?php include "partial/right-relation.php"; ?>
           </div>
        </div>
    </div>


<?php include "partial/footer.php";