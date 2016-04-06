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
              <?php 
              $xml = new DOMDocument;
              $query = 'doc("users")//user[email="'.$_SESSION['email'].'"]';
              sedna_execute($query);
              $data = sedna_result_array();
                // echo "<pre>"; var_dump($data); die();
              $data = $data[0];
              $xml->loadXML($data);

              // Load XSL file
              $xsl = new DOMDocument;
              $xsl->load('xdata/editProfile.xslt');

              // Configure the transformer
              $proc = new XSLTProcessor;

              // Attach the xsl rules
              $proc->importStyleSheet($xsl);

              echo $proc->transformToXML($xml);
              ?>
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