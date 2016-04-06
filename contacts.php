<?php 	include "partial/header.php";	

  sedna_execute("doc('contactDir')//contacts");
  // var_dump(sedna_result_array()); die();
  
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
            <div class="col-md-12"> <a href="newContact.php" class="btn btn-danger btn-md pull-right">New Contact<i class="glyphicon glyphicon-user"></i><i class="glyphicon glyphicon-plus"></i></a></div>
                <hr /><hr />
           
          <?php

            $user_id = $_SESSION['email'];
            if(isset($_GET['delete']))
              {
                  $del_id = $_GET['delete'];
                  $query = "UPDATE delete doc('contactDir')//contacts[@id='".$user_id."']//contact[@id='".$del_id."']";
                 if (!sedna_execute($query)) {
                    echo $status = '<div class="alert alert-danger">Error ' . 
                    sedna_error() .'getting user\'s information</div>';
                  }
                  unset($_GET);
                  echo '
                  <script type="text/javascript">
                    window.setTimeout(function() {
                      location.href = "contacts.php";
                      }, 500);
                  </script>';
              }

            $query = "doc('contactDir')//contacts[@id='".$user_id."']";

            if (!sedna_execute($query)) {
              $status = '<div class="alert alert-danger">Error ' . 
              sedna_error() .'getting user\'s information</div>';
            }

            else
            {
                  $contacts = sedna_result_array();
                  //var_dump($contacts);

                  if(sizeof($contacts)>0)
                  {
                       $contacts = $contacts[0];
                       $xml = new DOMDocument;

                       $xml->loadXML($contacts);
                      
                       $xsl = new DOMDocument;
                       $xsl->load('xdata/contacts.xsl');

                       $proc = new XSLTProcessor;

                       $proc->importStyleSheet($xsl);
                       echo $proc->transformToXML($xml);
                  }

                  else
                    echo '<div class="alert alert-danger"><h4> No Contacts Found, 
                                          you can create New contacts </h4></div>';


              }

          ?>


        </div>

        <div class="col-md-3 right-sidebar">
           <div>
               <?php include "partial/right-relation.php"; ?>
           </div>
        </div>
    </div>


<?php include "partial/footer.php";