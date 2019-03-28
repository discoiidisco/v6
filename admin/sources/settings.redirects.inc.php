<?php
/**
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2017. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 */
if (!defined('CC_INI_SET')) {
    die('Access Denied');
}
Admin::getInstance()->permissions('maintenance', CC_PERM_READ, true);

global $lang;

$GLOBALS['gui']->addBreadcrumb('Redirects', currentPage());
$GLOBALS['main']->addTabControl('Redirects', 'redirects');

if (Admin::getInstance()->permissions('maintenance', CC_PERM_EDIT)) {

}

$page_content = $GLOBALS['smarty']->fetch('templates/settings.redirects.php');
