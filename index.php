<?php
// $Id: index.php,v 1.3 2008/02/14 16:16:20 ohwada Exp $

// 2008-02-12 K.OHWADA
// change use_type_control to type_control

// 2007-07-20 K.OHWADA
// Geo RSS

//================================================================
// Google Ajax Maps Module
// 2007-07-01 K.OHWADA
//================================================================

include '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/modules/gamaps/include/functions.php';

$ZOOM_GEOCODE_DEFAULT = 13;

// start
$xoopsOption['template_main'] = 'gamaps_search.html';
include XOOPS_ROOT_PATH.'/header.php';

$addr = gamaps_get_config_text('address', 's');
$lat  = $xoopsModuleConfig['latitude'];
$lng  = $xoopsModuleConfig['longitude'];
$zoom = $xoopsModuleConfig['zoom'];

if ( isset($_GET['lat']) && isset($_GET['lng']) )
{
	$addr = '';
	$lat  = $_GET['lat'];
	$lng  = $_GET['lng'];
	$zoom = $ZOOM_GEOCODE_DEFAULT;
	if ( isset($_GET['zoom']) )
	{
		$zoom = $_GET['zoom'];
	}
}

$xoopsTpl->assign('module_name',     $xoopsModule->getVar('name') );
$xoopsTpl->assign('is_module_admin', $xoopsUserIsAdmin );

$xoopsTpl->assign('default_address',  $addr );
$xoopsTpl->assign('ga_latitude',      $lat );
$xoopsTpl->assign('ga_longitude',     $lng );
$xoopsTpl->assign('ga_zoom',          $zoom );

$xoopsTpl->assign('ga_api_key',           $xoopsModuleConfig['api_key'] );
$xoopsTpl->assign('ga_map_type',          $xoopsModuleConfig['map_type'] );
$xoopsTpl->assign('ga_map_control',       $xoopsModuleConfig['map_control'] );
$xoopsTpl->assign('ga_geocode_kind',      $xoopsModuleConfig['geocode_kind'] );
$xoopsTpl->assign('ga_type_control',      $xoopsModuleConfig['type_control'] );

$xoopsTpl->assign('ga_use_scale_control',         gamaps_get_config_bool('use_scale_control') );
$xoopsTpl->assign('ga_use_overview_map_control',  gamaps_get_config_bool('use_overview_map_control') );
$xoopsTpl->assign('ga_use_draggable_marker',      gamaps_get_config_bool('use_draggable_marker') );
$xoopsTpl->assign('ga_use_search_marker',         gamaps_get_config_bool('use_search_marker') );
$xoopsTpl->assign('ga_use_nishioka_inverse',      gamaps_get_config_bool('use_nishioka_inverse') );

$xoopsTpl->assign('ga_set_current_location', "true" );

$xoopsTpl->assign('lang_title_search',      _GAMAPS_TITLE_SEARCH );
$xoopsTpl->assign('lang_title_location',    _GAMAPS_TITLE_LOCATION );
$xoopsTpl->assign('lang_title_georss',      _GAMAPS_TITLE_GEORSS );
$xoopsTpl->assign('lang_title_search_desc', _GAMAPS_TITLE_SEARCH_DESC );
$xoopsTpl->assign('lang_search',            _GAMAPS_SEARCH );
$xoopsTpl->assign('lang_search_list',       _GAMAPS_SEARCH_LIST );
$xoopsTpl->assign('lang_current_location',  _GAMAPS_CURRENT_LOCATION );
$xoopsTpl->assign('lang_current_address',   _GAMAPS_CURRENT_ADDRESS );
$xoopsTpl->assign('lang_no_match_place',    _GAMAPS_NO_MATCH_PLACE );

$xoopsTpl->assign('lang_address',           _GAMAPS_ADDRESS );
$xoopsTpl->assign('lang_latitude',          _GAMAPS_LATITUDE );
$xoopsTpl->assign('lang_longitude',         _GAMAPS_LONGITUDE );
$xoopsTpl->assign('lang_zoom',              _GAMAPS_ZOOM );
$xoopsTpl->assign('lang_js_invalid',        _GAMAPS_JS_INVALID );
$xoopsTpl->assign('lang_not_compatible',    _GAMAPS_NOT_COMPATIBLE );

include XOOPS_ROOT_PATH.'/footer.php';
exit();

?>