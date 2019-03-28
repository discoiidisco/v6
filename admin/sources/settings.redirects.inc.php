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
Admin::getInstance()->permissions('settings', CC_PERM_READ, true);

global $lang;

$GLOBALS['gui']->addBreadcrumb($lang['settings']['redirects'], currentPage());
$GLOBALS['main']->addTabControl($lang['settings']['redirects'], 'redirects');

if (Admin::getInstance()->permissions('settings', CC_PERM_EDIT)) {

}
if (Admin::getInstance()->permissions('settings', CC_PERM_DELETE)) {

}
$redirect_dataset = false;
if($redirects =  $GLOBALS['db']->select('CubeCart_seo_urls', false, "`redirect` IN ('301', '302')")) {
    $redirect_dataset = array();
    foreach($redirects as $redirect) {
        $redirect['destination'] = $GLOBALS['seo']->getdbPath($redirect['type'], $redirect['item_id']);
        $redirect_dataset[] = $redirect;
    }
}
$GLOBALS['smarty']->assign('REDIRECTS', $redirect_dataset);

$page_content = $GLOBALS['smarty']->fetch('templates/settings.redirects.php');
