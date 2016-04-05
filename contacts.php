<?php 	include "partial/header.php";	?>
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
            $query = "doc('contactDir')//contacts[@id='".$user_id."']";

            if (!sedna_execute($query)) {
              $status = '<div class="alert alert-danger">Error ' . 
              sedna_error() .'getting user\'s information</div>';
            }

            else
            {
              $contacts = sedna_result_array();
              //var_dump($contacts);

              $contacts = $contacts[0];
                 $xml = new DOMDocument;
                 $xml->loadXML($contacts);

                 $xsl = new DOMDocument;
                 $xsl->load('xdata/contacts.xsl');

                 $proc = new XSLTProcessor;

                 $proc->importStyleSheet($xsl);
                 echo $proc->transformToXML($xml);



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