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
            
           <div>
               <form class="form-horizontal">
               		<h2 class="ttle">Add Relation</h2>
				    <div class="form-group">
				        <label for="relName" class="col-sm-2 control-label">Relation</label>
				        <div class="col-sm-10">
				            <input type="text" class="form-control" id="relName" placeholder="Relation. eg Father, Mother, Co-worker, spouse">
				        </div>
				    </div>
				    <div class="form-group" style="text-align: right;">
				        <div class="col-sm-offset-2 col-sm-10">
				            <button type="submit" class="btn btn-primary">Create / Update</button>
				        </div>
				    </div>
				    <div style="text-align: right;">
				        <a href="newContact.php">Add A New Contact</a>
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