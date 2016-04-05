<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  
    <xsl:for-each select="user">
    <div>
      <div class="img-thumbnail">
        <img src='{image}' width="170px;" />
      </div>
      <h4><xsl:value-of select="email" /><small></small></h4>
      <h3>First Name : <xsl:value-of select="first_name" /></h3>
      <h3>Last  Name : <xsl:value-of select="last_name" /></h3>
    </div>
    </xsl:for-each>
</xsl:template>

</xsl:stylesheet>