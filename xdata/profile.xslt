<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  
    <xsl:for-each select="user">
    <div>
      <div class="img-thumbnail">
        <img src='img/users/default.jpg' width="170px;" />
      </div>
      <h4><xsl:value-of select="email" /><small></small></h4>
      <h2><xsl:value-of select="first_name" /></h2>
      <h2><xsl:value-of select="last_name" /></h2>
    </div>
    </xsl:for-each>
</xsl:template>

</xsl:stylesheet>