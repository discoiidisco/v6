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
    if(isset($_POST['path']) && !empty($_POST['path']) && isset($_POST['item_id']) && !empty($_POST['item_id']) && ctype_digit($_POST['item_id'])) {
        // Check product, category, doc exists
        $exists = false;
        switch($_POST['type']) {
            case 'prod':
                $exists = $GLOBALS['db']->select('CubeCart_inventory', false, array('product_id' => (int)$_POST['item_id']));
            break;
            case 'cat':
                $exists = $GLOBALS['db']->select('CubeCart_category', false, array('cat_id' => (int)$_POST['item_id']));
            break;
            case 'doc':
                $exists = $GLOBALS['db']->select('CubeCart_category', false, array('doc_id' => (int)$_POST['item_id']));
        }
        if($exists) {
            if($GLOBALS['seo']->setdbPath($_POST['type'], (int)$_POST['item_id'], $_POST['path'], true, false, $_POST['redirect'])) {
                $GLOBALS['main']->successMessage($lang['notification']['notify_success_add_redirect']);
            } else {
                $GLOBALS['main']->errorMessage($lang['notification']['notify_fail_add_redirect']);
            }
        } else {
            $GLOBALS['main']->errorMessage($lang['notification']['notify_object_not_found']);
        }
    }
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
