{*
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2017. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 *}
<form action="{$VAL_SELF}" id="hook_form" method="post" enctype="multipart/form-data">
   <div id="redirects" class="tab_content">
      <h3>Redirects</h3>
      <table>
         <thead>
            <th></th>
         </thead>
      </table>
   </div>
   {include file='templates/element.hook_form_content.php'}
   <div class="form_control"><input type="submit" value="{$LANG.common.save}"></div>
</form>