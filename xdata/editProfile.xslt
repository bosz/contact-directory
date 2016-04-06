<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
    <xsl:for-each select="user">
        <div class="form-group">
            <label for="first_name" class="col-sm-3 control-label">First Name </label>
            <div class="col-sm-8">
                <input required="required" type="text" class="form-control" id="first_name" value="{first_name}" name="first_name" placeholder="" />
            </div>
        </div>
        <div class="form-group">
            <label for="last_name" class="col-sm-3 control-label">Last Name </label>
            <div class="col-sm-8">
                <input required="required" type="text" class="form-control" id="last_name" value="{last_name}" name="last_name" placeholder="" />
            </div>
        </div>
        <hr />
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email </label>
            <div class="col-sm-8">
                <input required="required" readonly="readonly" type="text" value="{email}" class="form-control" name="email" id="email" placeholder="" />
            </div>
        </div>
        <div class="form-group">
            <label for="photo" class="col-sm-3 control-label">Photo </label>
            <div class="col-sm-8">
                <input type="file" class="form-control" name="file" id="photo" placeholder="" />
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password </label>
            <div class="col-sm-8">
                <input required="required" type="password" class="form-control" name="password" value="******" id="password" placeholder="" />
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            <div class="checkbox">
              <label>
                <input value="{visible}" type="checkbox" name="visible" /> Others can see my profile
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
              <input required="required" type="checkbox" class="" name="liscence" /> I accept
            </div>
            <div class="col-sm-8 col-md-offset-3">
                <textarea disabled="disabled" class="form-control" id="skype_id" name="privacy_policy" placeholder=""> Privacy policy agreement here </textarea>
            </div>
        </div>
        <div class="form-group" style="text-align: right;">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" name="update_profile" class="btn btn-primary">Update</button>
            </div>
        </div>
    </xsl:for-each>
</xsl:template>

</xsl:stylesheet>