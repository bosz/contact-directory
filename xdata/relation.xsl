<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <xsl:for-each select="Relations/relation">
	<li><a href="?relation={.}"><xsl:value-of select='.'/></a></li>
  </xsl:for-each>
</xsl:template>
</xsl:stylesheet> 