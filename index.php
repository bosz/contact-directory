    <?php include "partial/header.php"; ?>
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
                <img src="img/carousel3.jpg" alt="carousel image">
                <div class="carousel-caption">
                    <h1> Setup Contacts</h1>
                    <div class="container-fluid login-banner-div">
                        <div class="col-md-8">
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
                </div>
            </div>
            <div class="item">
                <img src="img/carousel3.jpg" alt="carousel image">
                <div class="carousel-caption">
                    <h1>Easy Management</h1>
                </div>
            </div>
            <div class="item">
                <img src="img/carousel3.jpg" alt="carousel image">
                <div class="carousel-caption">
                    <h1>Very Seccured</h1>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- body content -->
    <div class="container-fluid cnt">
        <div class="col-md-3 left-sidebar">
           <div>
               <?php include "partial/left-profile.php";  ?>
           </div>
        </div>

        <div class="col-md-6 middle-content">
            
           <div>
               <?php include "partial/contacts.php"; ?>
           </div>
        </div>

        <div class="col-md-3 right-sidebar">
           <div>
               <?php include "partial/right-relation.php"; ?>
           </div>
        </div>
    </div>

<?php include "partial/footer.php";