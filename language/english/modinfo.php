<?php
// $Id: modinfo.php,v 1.6 2008/02/14 16:30:32 ohwada Exp $

// 2008-02-12 K.OHWADA
// add physical in map_type

// 2007-07-20 K.OHWADA
// Geo RSS

//=========================================================
// Google Ajax Maps Module
// 2007-07-01 K.OHWADA
//=========================================================

// module name
define('_MI_GAMAPS_NAME','Google Maps');
define('_MI_GAMAPS_DESC','Show map using Google Maps API');

// module config
define('_MI_GAMAPS_API_KEY','Google API Key');
define('_MI_GAMAPS_API_KEY_DSC', 'Get the API key on <br/><a href="http://www.google.com/apis/maps/signup.html" target="_blank">Sign Up for the Google Maps API</a><br /><br />For the details of the parameter, see the following<br /><a href="http://www.google.com/apis/maps/documentation/reference.html" target="_blank">Google Maps API Reference</a>');
define('_MI_GAMAPS_ADDRESS',   'Address');
define('_MI_GAMAPS_LATITUDE',  'Latitude');
define('_MI_GAMAPS_LONGITUDE', 'Longitude');
define('_MI_GAMAPS_ZOOM', 'Zoom Level');
define('_MI_GAMAPS_MAP_TYPE',  'Mpa type');
define('_MI_GAMAPS_MAP_TYPE_DSC',  'GMapType');
define('_MI_GAMAPS_MAP_TYPE_NORMAL',   'Map: Normal');
define('_MI_GAMAPS_MAP_TYPE_SATELLITE','Satellite');
define('_MI_GAMAPS_MAP_TYPE_HYBRID',   'Hybrid');
define('_MI_GAMAPS_MAP_CONT',  'Map Control');
define('_MI_GAMAPS_MAP_CONT_DSC',  'GLargeMapControl, GSmallMapControl, GSmallZoomControl');
define('_MI_GAMAPS_MAP_CONT_NON',   'Not Show');
define('_MI_GAMAPS_MAP_CONT_LARGE', 'Large Map Control');
define('_MI_GAMAPS_MAP_CONT_SMALL', 'Small Map Controll');
define('_MI_GAMAPS_MAP_CONT_ZOOM',  'Small Zoom Control');
define('_MI_GAMAPS_USE_TYPE_CONT',  'Use Map Type Control');
define('_MI_GAMAPS_USE_TYPE_CONT_DSC',  'GMapTypeControl, addMapType');
define('_MI_GAMAPS_USE_SCALE_CONT',  'Use Scale Control');
define('_MI_GAMAPS_USE_SCALE_CONT_DSC',  'GScaleControl');
define('_MI_GAMAPS_USE_OVERVIEW',  'Use Overview Map');
define('_MI_GAMAPS_USE_OVERVIEW_DSC',  'GOverviewMapControl');
define('_MI_GAMAPS_GEOCODE_KIND',  'Kind of Geocode');
define('_MI_GAMAPS_GEOCODE_KIND_DSC',  'Search latitude and longitude from address<br /><b>Single Result</b><br />GClientGeocoder - getLatLng<br /><b>More Results</b><br />GClientGeocoder - getLocations<br /><b>CSIS</b><br />Valid in Japan<br /><a href="http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/" target="_blank">Tokyo University CSIS</a>');
define('_MI_GAMAPS_GEOCODE_KIND_LATLNG', 'Single Result: getLatLng');
define('_MI_GAMAPS_GEOCODE_KIND_LOCATIONS',   'More Results: getLocations');
define('_MI_GAMAPS_GEOCODE_KIND_TOKYO_UNIV', '[Japan] CSIS');
define('_MI_GAMAPS_USE_NISHIOKA',  '[Japan] Use Inverse Geocode');
define('_MI_GAMAPS_USE_NISHIOKA_DSC',  'Valid in Japan<br />Search address from latitude and longitude from address<br /><a href="http://nishioka.sakura.ne.jp/google/" target="_blank">http://nishioka.sakura.ne.jp/google/</a>');
define('_MI_GAMAPS_DR_MARKER',  '[Search] Use Draggable Marker');
define('_MI_GAMAPS_DR_MARKER_DSC',  'GMarker - draggable');
define('_MI_GAMAPS_SR_MARKER',  '[Search] Use Search Result Marker');
define('_MI_GAMAPS_SR_MARKER_DSC',  'GMarker - icon');
define('_MI_GAMAPS_LO_MARKER',  '[Location] Use Marker');
define('_MI_GAMAPS_LO_MARKER_DSC',  'GMarker');
define('_MI_GAMAPS_LO_MARKER_CL',  '[Location] Use Maker Click');
define('_MI_GAMAPS_LO_MARKER_CL_DSC',  'GEvent - addListener');
define('_MI_GAMAPS_LO_MARKER_HTML',  '[Location] Content when click marker');
define('_MI_GAMAPS_LO_MARKER_HTML_DSC',  'GMarker - openInfoWindowHtml');

// 2007-07-20
define('_MI_GAMAPS_GEO_URL',  '[GeoRSS] URL of RSS');
define('_MI_GAMAPS_GEO_URL_DSC',  'GGeoXml <br />Set URL supporting GeoRSS');
define('_MI_GAMAPS_GEO_TITLE', '[GeoRSS] Title');

// 2008-02-12
define('_MI_GAMAPS_MAP_TYPE_PHYSICAL', 'Terrain');
define('_MI_GAMAPS_USE_TYPE_CONT_DEFAULT',  'Default: Map, Satellite, Hybrid');
define('_MI_GAMAPS_USE_TYPE_CONT_PHYSICAL', 'add "Terrain"');

?>