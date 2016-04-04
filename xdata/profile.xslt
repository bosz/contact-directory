<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  
    <xsl:for-each select="user">
    <div>
      <div class="img-thumbnail">
        <img src="img/default_user.png" />
      </div>
      <h4><xsl:value-of select="email" /><small></small></h4>
    </div>
    </xsl:for-each>
</xsl:template>

</xsl:stylesheet>