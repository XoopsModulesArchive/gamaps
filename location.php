<?php
// $Id: location.php,v 1.4 2008/02/24 03:24:49 ohwada Exp $

// 2008-02-17 K.OHWADA
// ga_address

// 2008-02-12 K.OHWADA
// change use_type_control to type_control

// 2007-07-20 K.OHWADA
// Geo RSS

//=========================================================
// Google Ajax Maps Module
// 2007-07-01 K.OHWADA
//=========================================================

include '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/modules/gamaps/include/functions.php';

// start
$xoopsOption['template_main'] = 'gamaps_location.html';
include XOOPS_ROOT_PATH.'/header.php';

$xoopsTpl->assign('module_name',     $xoopsModule->getVar('name') );
$xoopsTpl->assign('is_module_admin', $xoopsUserIsAdmin );

$xoopsTpl->assign('ga_api_key',                  $xoopsModuleConfig['api_key'] );
$xoopsTpl->assign('ga_address',                  $xoopsModuleConfig['address'] );
$xoopsTpl->assign('ga_latitude',                 $xoopsModuleConfig['latitude'] );
$xoopsTpl->assign('ga_longitude',                $xoopsModuleConfig['longitude'] );
$xoopsTpl->assign('ga_zoom',                     $xoopsModuleConfig['zoom'] );
$xoopsTpl->assign('ga_map_type',                 $xoopsModuleConfig['map_type'] );
$xoopsTpl->assign('ga_map_control',              $xoopsModuleConfig['map_control'] );
$xoopsTpl->assign('ga_type_control',             $xoopsModuleConfig['type_control'] );

$xoopsTpl->assign('ga_use_scale_control',         gamaps_get_config_bool('use_scale_control') );
$xoopsTpl->assign('ga_use_overview_map_control',  gamaps_get_config_bool('use_overview_map_control') );
$xoopsTpl->assign('ga_use_loc_marker',            gamaps_get_config_bool('use_loc_marker') );
$xoopsTpl->assign('ga_use_loc_marker_click',      gamaps_get_config_bool('use_loc_marker_click') );
$xoopsTpl->assign('ga_loc_marker_html',           gamaps_get_config_text('loc_marker_html', 'textarea') );

$xoopsTpl->assign('lang_title_search',        _GAMAPS_TITLE_SEARCH );
$xoopsTpl->assign('lang_title_location',      _GAMAPS_TITLE_LOCATION );
$xoopsTpl->assign('lang_title_georss',        _GAMAPS_TITLE_GEORSS );
$xoopsTpl->assign('lang_title_location_desc', _GAMAPS_TITLE_LOCATION_DESC );
$xoopsTpl->assign('lang_address',             _GAMAPS_ADDRESS );
$xoopsTpl->assign('lang_latitude',            _GAMAPS_LATITUDE );
$xoopsTpl->assign('lang_longitude',           _GAMAPS_LONGITUDE );
$xoopsTpl->assign('lang_zoom',                _GAMAPS_ZOOM );
$xoopsTpl->assign('lang_js_invalid',          _GAMAPS_JS_INVALID );
$xoopsTpl->assign('lang_not_compatible',      _GAMAPS_NOT_COMPATIBLE );
$xoopsTpl->assign('lang_current_location',    _GAMAPS_CURRENT_LOCATION );
$xoopsTpl->assign('lang_download_kml',        _GAMAPS_DOWNLOAD_KML );

include XOOPS_ROOT_PATH.'/footer.php';
exit();

?>