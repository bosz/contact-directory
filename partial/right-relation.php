<div>
	<h2>Relations</h2>
	<ul class="list-unstyled">
		<?php                  
		    $xml = new DOMDocument;
		    $xml->load('xdata/relation.xml');

		    $xsl = new DOMDocument;
		    $xsl->load('xdata/relation.xsl');

		    $proc = new XSLTProcessor;
		    $proc->importStyleSheet($xsl);
		    echo $proc->transformToXML($xml);
		 ?>
	</ul>
</div>