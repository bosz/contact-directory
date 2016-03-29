<?php 	include "partial/header.php";	?>
<title>Contact Dir, add new relation</title>

	<!-- body content -->
    <div class="container-fluid cnt">
        <div class="col-md-6 left-sidebar">
           <div>
               <form class="form-horizontal">
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
                        <input type="checkbox"> Remember me
                      </label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group" style="text-align: right;">
                      <div class="col-sm-offset-3 col-sm-8">
                          <button type="submit" class="btn btn-primary">Sign in</button>
                      </div>
                  </div>
              </form>
           </div>
        </div>

        <div class="col-md-6 right-sidebar">
            
           <div>
               <form class="form-horizontal">
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
                          <input type="text" class="form-control" id="email" placeholder="">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="skype_id" class="col-sm-3 control-label">Skype Id</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="skype_id" name="skype_id" placeholder="">
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Others can see my profile
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                        <input type="checkbox" class=""> I accept
                      </div>
                      <div class="col-sm-8 col-md-offset-3">
                          <textarea disabled="disabled" class="form-control" id="skype_id" name="skype_id" placeholder=""> Privacy policy agreement here </textarea>
                      </div>
                  </div>
      				    <div class="form-group" style="text-align: right;">
      				        <div class="col-sm-offset-2 col-sm-8">
      				            <button type="submit" class="btn btn-primary">Create / Update</button>
      				        </div>
      				    </div>
      				</form>
           </div>
        </div>
    </div>


<?php include "partial/footer.php";