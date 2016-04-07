<?php 
	if (isset($_GET['del_rel']) && isset($_GET['del_rel']) != "") {
		//deleting relation
		$relation = $_GET['del_rel'];
		$query = 'doc("Relations")[relation="'.$relation.'"]';
		if (!sedna_execute($query)) {
			echo $status = '<div class="alert alert-danger">Error ' . 
            sedna_error() .'getting user\'s information</div>';
        }
        unset($_GET);
	}
?>
<div>
	<h2>Relations</h2>
	<ul class="list-unstyled">
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
				    $xsl->load('xdata/relation.xsl');

				    $proc = new XSLTProcessor;
				    $proc->importStyleSheet($xsl);
				    echo $proc->transformToXML($xml);
				}
			}
		 ?>
	</ul>
</div>