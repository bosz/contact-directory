<?php 	
    include "partial/header.php";	
    require_once 'processor/pro_newContact.php';
?>
<title>Contact Dir, add new relation</title>

	<!-- body content -->
    <div class="container-fluid cnt">
        <div class="col-md-3 left-sidebar">
           <div>
               <?php include "partial/left-profile.php";  ?>
           </div>
        </div>

        <div class="col-md-6 middle-content">
            
           <div>
              <?php echo $status; ?>
               <form class="form-horizontal" method="Post" action="newContact.php"  enctype="multipart/form-data">
                  <h2 class="ttle">Add Contact</h2>
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
                      <label for="alias" class="col-sm-3 control-label">Phone Number </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="alias" class="col-sm-3 control-label">Alias (username) </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="alias" name="alias" placeholder="">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="photo" class="col-sm-3 control-label">Photo </label>
                      <div class="col-sm-8">
                          <input type="file" class="form-control" name="file" id="photo" placeholder="">
                      </div>
                  </div>
                  <hr>
                  <div class="form-group">
                      <label for="email" class="col-sm-3 control-label">Email </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="email" name='email' placeholder="">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="skype_id" class="col-sm-3 control-label">Skype Id</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="skype_id" name="skype_id" placeholder="">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="relation" name="relation" class="col-sm-3 control-label">Related </label>
                      <div class="col-sm-8">
                          <select class="form-control" id='relation' name='relation'>
                            <?php 
                              
                            if (!sedna_execute('doc("Relations")//relation')) {
                              die("Could not get relations");
                            }     
                            $relations = sedna_result_array();
                            if (sizeof($relations) > 0) {
                              foreach ($relations as $relation) {
                                  $xml = new DOMDocument;
                                  $xml->loadXML($relation);

                                  $xsl = new DOMDocument;
                                  $xsl->load('xdata/relationInContacts.xsl');

                                  $proc = new XSLTProcessor;
                                  $proc->importStyleSheet($xsl);
                                  echo $proc->transformToXML($xml);
                              }
                            }
                            ?>
                          </select>
                          <span class="pull-right">Relation not found, <a href="newRelation.php">create a relation</a></span>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Make visible to others
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="note" class="col-sm-3 control-label">Note</label>
                      <div class="col-sm-8">
                          <textarea type="text" class="form-control" id="note" name="note" placeholder=""> </textarea>
                      </div>
                  </div>
      				    <div class="form-group" style="text-align: right;">
      				        <div class="col-sm-offset-3 col-sm-8">
      				            <button type="submit" class="btn btn-primary" name="new" id="new" >Create</button>
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