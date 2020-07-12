<?php
// $Id: view_kml.php,v 1.1 2008/02/24 03:24:50 ohwada Exp $

//=========================================================
// Google Ajax Maps Module
// 2008-02-17 K.OHWADA
//=========================================================

include '../../../include/cp_header.php';

include_once XOOPS_ROOT_PATH.'/class/template.php';
include_once XOOPS_ROOT_PATH.'/modules/gamaps/include/functions.php';
include_once XOOPS_ROOT_PATH.'/modules/gamaps/include/multibyte.php';
include_once XOOPS_ROOT_PATH.'/modules/gamaps/class/build_xml.php';
include_once XOOPS_ROOT_PATH.'/modules/gamaps/class/build_kml.php';
include_once XOOPS_ROOT_PATH.'/modules/gamaps/class/show_kml.php';

//=========================================================
// main
//=========================================================

$builder =& gamaps_show_kml::getInstance( 'gamaps' );
$builder->view_gamaps_kml();

exit();
// --- main end ---

?>