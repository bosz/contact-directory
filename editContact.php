<?php   
    include "partial/header.php"; 
    require_once 'processor/pro_editContact.php';

    if(isset($_GET['alias']))
    {
        $alias = $_GET['alias'];
        $query = "doc('contactDir')//contacts//contact[@id='T-Boy']";
        if (!sedna_execute($query)) {
                  echo $status = '<div class="alert alert-danger">Error ' . 
                  sedna_error() .'getting user\'s information</div>';
                }

        elseif(sizeof($contacts = sedna_result_array()) > 0)
        {
          $contact = $contacts[0];
          $xml = new SimpleXMLElement($contact);
          $name = explode(" ", $xml->name);
          $fname = $name[0];
          $lname = $name[1];
          $phone =  $xml->phone;
          $alias = $xml->alias;
          $email = $xml->email;
          $skype = $xml->skype;
          $relation = $xml->relation;
          $note = $xml->note;

        }
        unset($_GET);
    }
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
               <form class="form-horizontal" method="Post" action="newContact.php">
                  <h2 class="ttle">Edit <?php echo strtoupper($fname.' '.$lname); ?></h2>
                  <div class="form-group">
                      <label for="first_name" class="col-sm-3 control-label">First Name </label>
                      <div class="col-sm-8">
                         <?php echo '<input type="text" class="form-control" id="first_name" name="first_name" value='.$fname.'>';
                         ?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="last_name" class="col-sm-3 control-label">Last Name </label>
                      <div class="col-sm-8">
                          <?php echo '<input type="text" class="form-control" id="last_name" name="last_name" value='.$lname.'>';
                          ?>
                      </div>
                  </div>
                  <hr>
                  <div class="form-group">
                      <label for="alias" class="col-sm-3 control-label">Phone Number </label>
                      <div class="col-sm-8">
                          <?php echo '<input type="text" class="form-control" id="phone" name="phone" value='.$phone.'>';
                          ?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="alias" class="col-sm-3 control-label">Alias (username) </label>
                      <div class="col-sm-8">
                         <?php echo '<input type="text" class="form-control" id="alias" name="alias" value='.$alias.'>';
                         ?>
                      </div>
                  </div>
                  <hr>
                  <div class="form-group">
                      <label for="email" class="col-sm-3 control-label">Email </label>
                      <div class="col-sm-8">
                          <?php echo '<input type="text" class="form-control" id="email" name="email" value='.$email.'>';
                          ?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="skype_id" class="col-sm-3 control-label">Skype Id</label>
                      <div class="col-sm-8">
                          <?php echo '<input type="text" class="form-control" id="skype_id" name="skype_id" value='.$skype.'>';
                          ?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="relation" name="relation" class="col-sm-3 control-label">Related </label>
                      <div class="col-sm-8">
                           <select class="form-control" id='relation' name='relation'>
                            <?php 
                            
                            $xml = new DOMDocument;
                            $xml->load('xdata/relation.xml');

                            $xsl = new DOMDocument;
                            $xsl->load('xdata/relationInContacts.xsl');

                            $proc = new XSLTProcessor;
                            $proc->importStyleSheet($xsl);
                            echo $proc->transformToXML($xml);
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
                         <?php echo '<textarea type="text" class="form-control" id="note" name="note">'.$note.' </textarea>';
                         ?>
                      </div>
                  </div>
                  <div class="form-group" style="text-align: right;">
                      <div class="col-sm-offset-3 col-sm-8">
                          <button type="submit" class="btn btn-primary" name="new" id="new" >Update</button>
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