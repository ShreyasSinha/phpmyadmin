<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Handles find and replace tab
 *
 * Displays find and replace form, allows previewing and do the replacing
 *
 * @package PhpMyAdmin
 */

/**
 * Gets some core libraries
 */
require_once 'libraries/common.inc.php';
include_once 'libraries/tbl_common.inc.php';
require_once 'libraries/di/Container.class.php';
require_once 'libraries/controllers/TableSearchController.class.php';

use PMA\DI;

$container = DI\Container::getDefaultContainer();
$container->factory('PMA\Controllers\Table\TableSearchController');
$container->alias('TableSearchController', 'PMA\Controllers\Table\TableSearchController');

$dependency_definitions = array(
    'searchType' => 'replace',
    'url_query' => &$url_query
);

/** @var PMA\Controllers\Table\TableSearchController $controller */
$controller = $container->get('TableSearchController', $dependency_definitions);
$controller->indexAction();
