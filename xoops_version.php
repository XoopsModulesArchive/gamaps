<?php
// $Id: xoops_version.php,v 1.7 2008/02/24 03:24:50 ohwada Exp $

// 2008-02-17 K.OHWADA
// gamaps_kml.html

// 2008-02-12 K.OHWADA
// add physical in map_type
// change use_type_control to type_control

// 2007-07-20 K.OHWADA
// Geo RSS

//=========================================================
// Google Ajax Maps Module
// 2007-07-01 K.OHWADA
//=========================================================

$modversion['version']     = 0.40;
$modversion['name']        = _MI_GAMAPS_NAME;
$modversion['description'] = _MI_GAMAPS_DESC;
$modversion['credits']  = '';
$modversion['author']   = 'K.OHWADA';
$modversion['help']     = '';
$modversion['license']  = 'GPL see LICENSE';
$modversion['official'] = 1;
$modversion['image']    = 'images/gamaps_logo.png';
$modversion['dirname']  = 'gamaps';

//Admin things
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu']  = 'admin/menu.php';

// Menu
$modversion['hasMain'] = 1;

// Templates
$modversion['templates'][1]['file'] = 'gamaps_js.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'gamaps_search.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'gamaps_location.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'gamaps_admin_location.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'gamaps_georss.html';
$modversion['templates'][5]['description'] = '';
$modversion['templates'][6]['file'] = 'gamaps_kml.html';
$modversion['templates'][6]['description'] = '';

//---------------------------------------------------------
// Config Settings (only for modules that need config settings generated automatically)
// max length of config_name is 25
// max length of conf_title and conf_desc is 30
//---------------------------------------------------------
$modversion['config'][1]['name']        = 'api_key';
$modversion['config'][1]['title']       = '_MI_GAMAPS_API_KEY';
$modversion['config'][1]['description'] = '_MI_GAMAPS_API_KEY_DSC';
$modversion['config'][1]['formtype']    = 'textarea';
$modversion['config'][1]['valuetype']   = 'text';
$modversion['config'][1]['default']     = '';

$modversion['config'][2]['name']        = 'address';
$modversion['config'][2]['title']       = '_MI_GAMAPS_ADDRESS';
$modversion['config'][2]['description'] = '';
$modversion['config'][2]['formtype']    = 'text';
$modversion['config'][2]['valuetype']   = 'text';
$modversion['config'][2]['default']     = 'Tokyo, Japan';

$modversion['config'][3]['name']        = 'latitude';
$modversion['config'][3]['title']       = '_MI_GAMAPS_LATITUDE';
$modversion['config'][3]['description'] = '';
$modversion['config'][3]['formtype']    = 'text';
$modversion['config'][3]['valuetype']   = 'float';
$modversion['config'][3]['default']     = '35.55003550337348';

$modversion['config'][4]['name']        = 'longitude';
$modversion['config'][4]['title']       = '_MI_GAMAPS_LONGITUDE';
$modversion['config'][4]['description'] = '';
$modversion['config'][4]['formtype']    = 'text';
$modversion['config'][4]['valuetype']   = 'float';
$modversion['config'][4]['default']     = '139.7863483428955';

$modversion['config'][5]['name']        = 'zoom';
$modversion['config'][5]['title']       = '_MI_GAMAPS_ZOOM';
$modversion['config'][5]['description'] = '';
$modversion['config'][5]['formtype']    = 'text';
$modversion['config'][5]['valuetype']   = 'int';
$modversion['config'][5]['default']     = '10';

$modversion['config'][6]['name']        = 'map_type';
$modversion['config'][6]['title']       = '_MI_GAMAPS_MAP_TYPE';
$modversion['config'][6]['description'] = '_MI_GAMAPS_MAP_TYPE_DSC';
$modversion['config'][6]['formtype']    = 'select';
$modversion['config'][6]['valuetype']   = 'text';
$modversion['config'][6]['default']     = 'normal';
$modversion['config'][6]['options']     = array(
	'_MI_GAMAPS_MAP_TYPE_NORMAL'    => 'normal',
	'_MI_GAMAPS_MAP_TYPE_SATELLITE' => 'satellite',
	'_MI_GAMAPS_MAP_TYPE_HYBRID'    => 'hybrid',
	'_MI_GAMAPS_MAP_TYPE_PHYSICAL'  => 'physical',
);

$modversion['config'][7]['name']        = 'map_control';
$modversion['config'][7]['title']       = '_MI_GAMAPS_MAP_CONT';
$modversion['config'][7]['description'] = '_MI_GAMAPS_MAP_CONT_DSC';
$modversion['config'][7]['formtype']    = 'select';
$modversion['config'][7]['valuetype']   = 'text';
$modversion['config'][7]['default']     = 'large';
$modversion['config'][7]['options']     = array(
	'_MI_GAMAPS_MAP_CONT_NON'   => 'non',
	'_MI_GAMAPS_MAP_CONT_LARGE' => 'large',
	'_MI_GAMAPS_MAP_CONT_SMALL' => 'small',
	'_MI_GAMAPS_MAP_CONT_ZOOM'  => 'zoom',
);

$modversion['config'][8]['name']        = 'geocode_kind';
$modversion['config'][8]['title']       = '_MI_GAMAPS_GEOCODE_KIND';
$modversion['config'][8]['description'] = '_MI_GAMAPS_GEOCODE_KIND_DSC';
$modversion['config'][8]['formtype']    = 'select';
$modversion['config'][8]['valuetype']   = 'text';
$modversion['config'][8]['default']     = 'locations';
$modversion['config'][8]['options']     = array(
	'_MI_GAMAPS_GEOCODE_KIND_LATLNG'     => 'latlng',
	'_MI_GAMAPS_GEOCODE_KIND_LOCATIONS'  => 'locations',
	'_MI_GAMAPS_GEOCODE_KIND_TOKYO_UNIV' => 'tokyo_univ',
);

$modversion['config'][9]['name']        = 'type_control';
$modversion['config'][9]['title']       = '_MI_GAMAPS_USE_TYPE_CONT';
$modversion['config'][9]['description'] = '_MI_GAMAPS_USE_TYPE_CONT_DSC';
$modversion['config'][9]['formtype']    = 'select';
$modversion['config'][9]['valuetype']   = 'text';
$modversion['config'][9]['default']     = 'default';
$modversion['config'][9]['options']     = array(
	'_NO'                               => 'no',
	'_MI_GAMAPS_USE_TYPE_CONT_DEFAULT'  => 'default',
	'_MI_GAMAPS_USE_TYPE_CONT_PHYSICAL' => 'physical',
);

$modversion['config'][10]['name']        = 'use_scale_control';
$modversion['config'][10]['title']       = '_MI_GAMAPS_USE_SCALE_CONT';
$modversion['config'][10]['description'] = '_MI_GAMAPS_USE_SCALE_CONT_DSC';
$modversion['config'][10]['formtype']    = 'yesno';
$modversion['config'][10]['valuetype']   = 'int';
$modversion['config'][10]['default']     = '1';

$modversion['config'][11]['name']        = 'use_overview_map_control';
$modversion['config'][11]['title']       = '_MI_GAMAPS_USE_OVERVIEW';
$modversion['config'][11]['description'] = '_MI_GAMAPS_USE_OVERVIEW_DSC';
$modversion['config'][11]['formtype']    = 'yesno';
$modversion['config'][11]['valuetype']   = 'int';
$modversion['config'][11]['default']     = '1';

$modversion['config'][12]['name']        = 'use_nishioka_inverse';
$modversion['config'][12]['title']       = '_MI_GAMAPS_USE_NISHIOKA';
$modversion['config'][12]['description'] = '_MI_GAMAPS_USE_NISHIOKA_DSC';
$modversion['config'][12]['formtype']    = 'yesno';
$modversion['config'][12]['valuetype']   = 'int';
$modversion['config'][12]['default']     = '0';

$modversion['config'][13]['name']        = 'use_draggable_marker';
$modversion['config'][13]['title']       = '_MI_GAMAPS_DR_MARKER';
$modversion['config'][13]['description'] = '_MI_GAMAPS_DR_MARKER_DSC';
$modversion['config'][13]['formtype']    = 'yesno';
$modversion['config'][13]['valuetype']   = 'int';
$modversion['config'][13]['default']     = '1';

$modversion['config'][14]['name']        = 'use_search_marker';
$modversion['config'][14]['title']       = '_MI_GAMAPS_SR_MARKER';
$modversion['config'][14]['description'] = '_MI_GAMAPS_SR_MARKER_DSC';
$modversion['config'][14]['formtype']    = 'yesno';
$modversion['config'][14]['valuetype']   = 'int';
$modversion['config'][14]['default']     = '1';

$modversion['config'][15]['name']        = 'use_loc_marker';
$modversion['config'][15]['title']       = '_MI_GAMAPS_LO_MARKER';
$modversion['config'][15]['description'] = '_MI_GAMAPS_LO_MARKER_DSC';
$modversion['config'][15]['formtype']    = 'yesno';
$modversion['config'][15]['valuetype']   = 'int';
$modversion['config'][15]['default']     = '1';

$modversion['config'][16]['name']        = 'use_loc_marker_click';
$modversion['config'][16]['title']       = '_MI_GAMAPS_LO_MARKER_CL';
$modversion['config'][16]['description'] = '_MI_GAMAPS_LO_MARKER_CL_DSC';
$modversion['config'][16]['formtype']    = 'yesno';
$modversion['config'][16]['valuetype']   = 'int';
$modversion['config'][16]['default']     = '1';

$modversion['config'][17]['name']        = 'loc_marker_html';
$modversion['config'][17]['title']       = '_MI_GAMAPS_LO_MARKER_HTML';
$modversion['config'][17]['description'] = '_MI_GAMAPS_LO_MARKER_HTML_DSC';
$modversion['config'][17]['formtype']    = 'textarea';
$modversion['config'][17]['valuetype']   = 'other';
$modversion['config'][17]['default']     = "<b>Exsample</b><br/><a href='http://www.tokyo-airport-bldg.co.jp/fl/english/' target='_blank'>Tokyo Hanada Airport</a>";

$modversion['config'][18]['name']        = 'geo_url';
$modversion['config'][18]['title']       = '_MI_GAMAPS_GEO_URL';
$modversion['config'][18]['description'] = '_MI_GAMAPS_GEO_URL_DSC';
$modversion['config'][18]['formtype']    = 'text';
$modversion['config'][18]['valuetype']   = 'text';
$modversion['config'][18]['default']     = 'http://api.flickr.com/services/feeds/geo/?id=7593934@N02&format=rss_200&georss=1';

$modversion['config'][19]['name']        = 'geo_title';
$modversion['config'][19]['title']       = '_MI_GAMAPS_GEO_TITLE';
$modversion['config'][19]['description'] = '';
$modversion['config'][19]['formtype']    = 'text';
$modversion['config'][19]['valuetype']   = 'text';
$modversion['config'][19]['default']     = 'Photos from Tagchan, with geodata';

?>