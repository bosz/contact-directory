<?php 	
  include "partial/header.php"; 
  require_once 'processor/pro_auth.php';
?>
<title>Contact Dir, add new relation</title>

	<!-- body content -->
    <div class="container-fluid cnt">
        <div class="col-md-12" style="text-align: center;"><?php echo $status; ?></div>
        <div class="col-md-6 left-sidebar">
           <div>
               <form class="form-horizontal" method="post">
                  <h2 class="ttle">Sign In</h2>
                  <div class="form-group">
                      <label for="email" class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-8">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="password" class="col-sm-3 control-label">Password</label>
                      <div class="col-sm-8">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                              <label>
                        <input type="checkbox" name="remember_me" id="remember_me" > Remember me
                      </label>
                        </div>
                      </div>
                  </div>
                  <div class="form-group" style="text-align: right;">
                      <div class="col-sm-offset-3 col-sm-8">
                          <button type="submit" name="signin" class="btn btn-primary">Sign in</button>
                      </div>
                  </div>
              </form>
           </div>
        </div>

        <div class="col-md-6 right-sidebar">
            
           <div>
               <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <h2 class="ttle">Sign Up</h2>
      				    <div class="form-group">
      				        <label for="first_name" class="col-sm-3 control-label">First Name </label>
      				        <div class="col-sm-8">
      				            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="">
      				        </div>
      				    </div>
                  <div class="form-group">
                      <label for="last_name" class="col-sm-3 control-label">Last Name </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="">
                      </div>
                  </div>
                  <hr>
                  <div class="form-group">
                      <label for="email" class="col-sm-3 control-label">Email </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="email" id="email" placeholder="">
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
                          <input type="password" class="form-control" name="password" id="password" placeholder="">
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
                        <input type="checkbox" class="" name="liscence"> I accept
                      </div>
                      <div class="col-sm-8 col-md-offset-3">
                          <textarea disabled="disabled" class="form-control" id="skype_id" name="privacy_policy" placeholder=""> Privacy policy agreement here </textarea>
                      </div>
                  </div>
      				    <div class="form-group" style="text-align: right;">
      				        <div class="col-sm-offset-2 col-sm-8">
      				            <button type="submit" name="signup" class="btn btn-primary">Create / Update</button>
      				        </div>
      				    </div>
      				</form>
           </div>
        </div>
    </div>


<?php include "partial/footer.php";