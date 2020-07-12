<?php
// $Id: modinfo.php,v 1.5 2008/02/14 16:16:20 ohwada Exp $

// 2008-02-12 K.OHWADA
// add physical in map_type

// 2007-07-20 K.OHWADA
// Geo RSS

//=========================================================
// Google Ajax Maps Module
// 2007-07-01 K.OHWADA
// EUC-JP 有朋自遠方来
//=========================================================

//---------------------------------------------------------
// max number of chracter is 30, in PHP 4.3
//---------------------------------------------------------

// module name
define('_MI_GAMAPS_NAME','Google Maps');
define('_MI_GAMAPS_DESC','Google Maps API を利用して地図を表示する');

// module config
define('_MI_GAMAPS_API_KEY','Google API Key');
define('_MI_GAMAPS_API_KEY_DSC', 'Google Maps を利用する場合は <br /> <a href="http://www.google.com/apis/maps/signup.html" target="_blank">Sign Up for the Google Maps API</a> <br /> にて <br /> API key を取得してください<br /><br />パラメータの詳細は下記をご覧ください<br /><a href="http://www.google.com/apis/maps/documentation/reference.html" target="_blank">Google Maps API Reference</a>');
define('_MI_GAMAPS_ADDRESS',   '住所');
define('_MI_GAMAPS_LATITUDE',  '緯度');
define('_MI_GAMAPS_LONGITUDE', '経度');
define('_MI_GAMAPS_ZOOM', 'ズーム');
define('_MI_GAMAPS_MAP_TYPE',  '地図の形式');
define('_MI_GAMAPS_MAP_TYPE_DSC',  'GMapType');
define('_MI_GAMAPS_MAP_TYPE_NORMAL',   '地図: Normal');
define('_MI_GAMAPS_MAP_TYPE_SATELLITE','航空写真: Satellite');
define('_MI_GAMAPS_MAP_TYPE_HYBRID',   '地図+写真: Hybrid');
define('_MI_GAMAPS_MAP_CONT',  'マップ・コントロール');
define('_MI_GAMAPS_MAP_CONT_DSC',  'GLargeMapControl, GSmallMapControl, GSmallZoomControl');
define('_MI_GAMAPS_MAP_CONT_NON',   '表示しない');
define('_MI_GAMAPS_MAP_CONT_LARGE', '大きいコントロール: Large');
define('_MI_GAMAPS_MAP_CONT_SMALL', '小さいコントロール: Small');
define('_MI_GAMAPS_MAP_CONT_ZOOM',  'ズーム: Zoom');
define('_MI_GAMAPS_USE_TYPE_CONT',  '地図形式ボタンを使用する');
define('_MI_GAMAPS_USE_TYPE_CONT_DSC',  'GMapTypeControl, addMapType');
define('_MI_GAMAPS_USE_SCALE_CONT',  '距離表示を使用する');
define('_MI_GAMAPS_USE_SCALE_CONT_DSC',  'GScaleControl');
define('_MI_GAMAPS_USE_OVERVIEW',  '右下の小さい地図を使用する');
define('_MI_GAMAPS_USE_OVERVIEW_DSC',  'GOverviewMapControl');
define('_MI_GAMAPS_GEOCODE_KIND',  'ジオコードの種類');
define('_MI_GAMAPS_GEOCODE_KIND_DSC',  '住所から緯度・経度を検索する<br /><b>単一の検索</b><br />GClientGeocoder - getLatLng<br /><b>複数の検索</b><br />GClientGeocoder - getLocations<br /><b>東京大学 CSIS</b><br />日本でのみ有効<br /><a href="http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/" target="_blank">東京大学 シンプルジオコーディング実験</a>');
define('_MI_GAMAPS_GEOCODE_KIND_LATLNG', '単一の検索: getLatLng');
define('_MI_GAMAPS_GEOCODE_KIND_LOCATIONS',   '複数の検索: getLocations');
define('_MI_GAMAPS_GEOCODE_KIND_TOKYO_UNIV', '[日本] 東京大学 CSIS');
define('_MI_GAMAPS_USE_NISHIOKA',  '[日本] 逆ジオコードを使用する');
define('_MI_GAMAPS_USE_NISHIOKA_DSC',  '日本でのみ有効<br />緯度・経度から住所を検索する<br /><a href="http://nishioka.sakura.ne.jp/google/" target="_blank">http://nishioka.sakura.ne.jp/google/</a>');
define('_MI_GAMAPS_DR_MARKER',  '[検索] ドラッグ・マーカーを使用する');
define('_MI_GAMAPS_DR_MARKER_DSC',  'GMarker - draggable');
define('_MI_GAMAPS_SR_MARKER',  '[検索] 検索結果のマーカーを使用する');
define('_MI_GAMAPS_SR_MARKER_DSC',  'GMarker - icon');
define('_MI_GAMAPS_LO_MARKER',  '[場所] マーカーを使用する');
define('_MI_GAMAPS_LO_MARKER_DSC',  'GMarker');
define('_MI_GAMAPS_LO_MARKER_CL',  '[場所] マーカーのクリックを使用する');
define('_MI_GAMAPS_LO_MARKER_CL_DSC',  'GEvent - addListener');
define('_MI_GAMAPS_LO_MARKER_HTML',  '[場所] マーカーをクリックしたときの内容');
define('_MI_GAMAPS_LO_MARKER_HTML_DSC',  'GMarker - openInfoWindowHtml');

// 2007-07-20
define('_MI_GAMAPS_GEO_URL',  '[GeoRSS] RSS の URL');
define('_MI_GAMAPS_GEO_URL_DSC',  'GGeoXml <br />GeoRSS に対応したURLを指定する');
define('_MI_GAMAPS_GEO_TITLE', '[GeoRSS] タイトル');

// 2008-02-12
define('_MI_GAMAPS_MAP_TYPE_PHYSICAL', '地形: Physical');
define('_MI_GAMAPS_USE_TYPE_CONT_DEFAULT',  'デフォルト: 地図, 航空写真, 地図+写真');
define('_MI_GAMAPS_USE_TYPE_CONT_PHYSICAL', '「地形」を追加する');

?>