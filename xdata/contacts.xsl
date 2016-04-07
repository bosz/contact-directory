<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

          <xsl:for-each select="contacts/contact">
               <div class="contact-in-contacts col-md-12">
                  <div class="img-thumbnail col-md-3">
                    <img src='{image}' width="130px;" class="pull-left" />
                  </div>
                 <div class="col-md-9">
                   <h4><xsl:value-of select='name' /> ( <small> { <xsl:value-of select='relation' />} </small>) </h4>
                   <h4><xsl:value-of select='phone' /></h4>
                   <h4>Alias: <xsl:value-of select='alias' /></h4>
                   <h4>Email: <xsl:value-of select='email' /></h4>
                   <h4>Skype: <xsl:value-of select='skype' />
                   <xsl:variable name="id" select="alias"/>
                   <a href="contacts.php?delete={$id}" class="btn btn-sm btn-warning pull-right col-sm-offset-1"
                    >Delete</a>
                    <a href="editContact.php?alias={$id}" class="btn btn-sm btn-primary pull-right"
                      >Edit contact</a>
                    
                    </h4>
                 </div>
               </div>
          </xsl:for-each>

</xsl:template>

</xsl:stylesheet> 