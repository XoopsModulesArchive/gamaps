<?php
// $Id: modinfo.php,v 1.5 2008/02/14 16:16:20 ohwada Exp $

// 2008-02-12 K.OHWADA
// add physical in map_type

// 2007-07-20 K.OHWADA
// Geo RSS

//=========================================================
// Google Ajax Maps Module
// 2007-07-01 K.OHWADA
// EUC-JP ͭ����������
//=========================================================

//---------------------------------------------------------
// max number of chracter is 30, in PHP 4.3
//---------------------------------------------------------

// module name
define('_MI_GAMAPS_NAME','Google Maps');
define('_MI_GAMAPS_DESC','Google Maps API �����Ѥ����Ͽޤ�ɽ������');

// module config
define('_MI_GAMAPS_API_KEY','Google API Key');
define('_MI_GAMAPS_API_KEY_DSC', 'Google Maps �����Ѥ������ <br /> <a href="http://www.google.com/apis/maps/signup.html" target="_blank">Sign Up for the Google Maps API</a> <br /> �ˤ� <br /> API key ��������Ƥ�������<br /><br />�ѥ�᡼���ξܺ٤ϲ���������������<br /><a href="http://www.google.com/apis/maps/documentation/reference.html" target="_blank">Google Maps API Reference</a>');
define('_MI_GAMAPS_ADDRESS',   '����');
define('_MI_GAMAPS_LATITUDE',  '����');
define('_MI_GAMAPS_LONGITUDE', '����');
define('_MI_GAMAPS_ZOOM', '������');
define('_MI_GAMAPS_MAP_TYPE',  '�Ͽޤη���');
define('_MI_GAMAPS_MAP_TYPE_DSC',  'GMapType');
define('_MI_GAMAPS_MAP_TYPE_NORMAL',   '�Ͽ�: Normal');
define('_MI_GAMAPS_MAP_TYPE_SATELLITE','�Ҷ��̿�: Satellite');
define('_MI_GAMAPS_MAP_TYPE_HYBRID',   '�Ͽ�+�̿�: Hybrid');
define('_MI_GAMAPS_MAP_CONT',  '�ޥåס�����ȥ���');
define('_MI_GAMAPS_MAP_CONT_DSC',  'GLargeMapControl, GSmallMapControl, GSmallZoomControl');
define('_MI_GAMAPS_MAP_CONT_NON',   'ɽ�����ʤ�');
define('_MI_GAMAPS_MAP_CONT_LARGE', '�礭������ȥ���: Large');
define('_MI_GAMAPS_MAP_CONT_SMALL', '����������ȥ���: Small');
define('_MI_GAMAPS_MAP_CONT_ZOOM',  '������: Zoom');
define('_MI_GAMAPS_USE_TYPE_CONT',  '�Ͽ޷����ܥ������Ѥ���');
define('_MI_GAMAPS_USE_TYPE_CONT_DSC',  'GMapTypeControl, addMapType');
define('_MI_GAMAPS_USE_SCALE_CONT',  '��Υɽ������Ѥ���');
define('_MI_GAMAPS_USE_SCALE_CONT_DSC',  'GScaleControl');
define('_MI_GAMAPS_USE_OVERVIEW',  '�����ξ������Ͽޤ���Ѥ���');
define('_MI_GAMAPS_USE_OVERVIEW_DSC',  'GOverviewMapControl');
define('_MI_GAMAPS_GEOCODE_KIND',  '���������ɤμ���');
define('_MI_GAMAPS_GEOCODE_KIND_DSC',  '���꤫����١����٤򸡺�����<br /><b>ñ��θ���</b><br />GClientGeocoder - getLatLng<br /><b>ʣ���θ���</b><br />GClientGeocoder - getLocations<br /><b>������ CSIS</b><br />���ܤǤΤ�ͭ��<br /><a href="http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/" target="_blank">������ ����ץ른�������ǥ��󥰼¸�</a>');
define('_MI_GAMAPS_GEOCODE_KIND_LATLNG', 'ñ��θ���: getLatLng');
define('_MI_GAMAPS_GEOCODE_KIND_LOCATIONS',   'ʣ���θ���: getLocations');
define('_MI_GAMAPS_GEOCODE_KIND_TOKYO_UNIV', '[����] ������ CSIS');
define('_MI_GAMAPS_USE_NISHIOKA',  '[����] �ե��������ɤ���Ѥ���');
define('_MI_GAMAPS_USE_NISHIOKA_DSC',  '���ܤǤΤ�ͭ��<br />���١����٤��齻��򸡺�����<br /><a href="http://nishioka.sakura.ne.jp/google/" target="_blank">http://nishioka.sakura.ne.jp/google/</a>');
define('_MI_GAMAPS_DR_MARKER',  '[����] �ɥ�å����ޡ���������Ѥ���');
define('_MI_GAMAPS_DR_MARKER_DSC',  'GMarker - draggable');
define('_MI_GAMAPS_SR_MARKER',  '[����] ������̤Υޡ���������Ѥ���');
define('_MI_GAMAPS_SR_MARKER_DSC',  'GMarker - icon');
define('_MI_GAMAPS_LO_MARKER',  '[���] �ޡ���������Ѥ���');
define('_MI_GAMAPS_LO_MARKER_DSC',  'GMarker');
define('_MI_GAMAPS_LO_MARKER_CL',  '[���] �ޡ������Υ���å�����Ѥ���');
define('_MI_GAMAPS_LO_MARKER_CL_DSC',  'GEvent - addListener');
define('_MI_GAMAPS_LO_MARKER_HTML',  '[���] �ޡ������򥯥�å������Ȥ�������');
define('_MI_GAMAPS_LO_MARKER_HTML_DSC',  'GMarker - openInfoWindowHtml');

// 2007-07-20
define('_MI_GAMAPS_GEO_URL',  '[GeoRSS] RSS �� URL');
define('_MI_GAMAPS_GEO_URL_DSC',  'GGeoXml <br />GeoRSS ���б�����URL����ꤹ��');
define('_MI_GAMAPS_GEO_TITLE', '[GeoRSS] �����ȥ�');

// 2008-02-12
define('_MI_GAMAPS_MAP_TYPE_PHYSICAL', '�Ϸ�: Physical');
define('_MI_GAMAPS_USE_TYPE_CONT_DEFAULT',  '�ǥե����: �Ͽ�, �Ҷ��̿�, �Ͽ�+�̿�');
define('_MI_GAMAPS_USE_TYPE_CONT_PHYSICAL', '���Ϸ��פ��ɲä���');

?>