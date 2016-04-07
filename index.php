<?php 
  require_once "partial/connect.php";
  include "partial/header.php"; 
  require_once "processor/pro_auth.php";
?>
<title>Ultimate Contact Directory</title>

<div id="top-carousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="img/contact2.jpg" alt="carousel image">
            <div class="carousel-caption">
                <h1 style="color: #000;"> Setup Contacts</h1>
                <?php echo $status; ?>
                <?php if(!isset($_SESSION['email']))  { ?>
                <div class="container-fluid login-banner-div">
                    <div class="col-md-8">
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
                                <input type="checkbox"> Remember me
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
                <?php } ?>
            </div>
        </div>
    </div>

</div>

<?php include "partial/footer.php"; ?>