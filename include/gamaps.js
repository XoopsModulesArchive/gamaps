/* ========================================================
 * $Id: gamaps.js,v 1.10 2008/02/14 16:16:20 ohwada Exp $
 * http://code.google.com/apis/maps/index.html
 * ========================================================
 */

/* --------------------------------------------------------
 * change log
 * 2008-02-12
 *   add gamaps_setMapType()
 *   change gamaps_use_type_control to gamaps_type_control
 * --------------------------------------------------------
 */

/* georss */

var gamaps_map = null;
var gamaps_client_geocoder  = null;
var gamaps_location_marker  = null;
var gamaps_draggable_marker = null;
var gamaps_bounds      = null;
var gamaps_bounds_zoom = null;
var gamaps_drag_icon   = null;
var gamaps_base_icon   = null;
var gamaps_small_icon  = null;

/* japanese inverse geocoder */
var gamaps_address_jp;
var gamaps_pref_jp;
var gamaps_city_jp;
var gamaps_town_jp;
var gamaps_number_jp;

/* 37.0 -95.0 : Chetopa Kansas: center point of USA */
var gamaps_default_latitude  =  37.0;
var gamaps_default_longitude = -95.0;
var gamaps_default_zoom = 4;
var gamaps_location_marker_html = "Chetopa Kansas, USA";

var gamaps_geo_url = "";

var gamaps_zoom_max = 17;
var gamaps_zoom_geocode_default = 12;
var gamaps_zoom_accuracy = 12;
var gamaps_zoom_accuracy_tokyo_univ = 12;

var gamaps_xoops_langcode = "en";
var gamaps_lang_latitude  = "Latitude";
var gamaps_lang_longitude = "Longitude";
var gamaps_lang_zoom      = "Zoom Level";
var gamaps_lang_not_compatible = "Your browser cannot use GoogleMaps";
var gamaps_lang_no_match_place = "There are no place to match the address";
var gamaps_xoops_url      = "";
var gamaps_opener_mode    = "";

var gamaps_map_control  = 'large';
var gamaps_map_type     = '';
var gamaps_geocode_kind = '';
var gamaps_type_control = 'default';

var gamaps_use_scale_control = true;
var gamaps_use_overview_map_control  = true;
var gamaps_use_location_marker       = true;
var gamaps_use_location_marker_click = true;
var gamaps_use_draggable_marker = true;
var gamaps_use_search_marker    = true;
var gamaps_set_current_location = true;

var gamaps_use_nishioka_inverse    = false;
var gamaps_use_set_parent_location = false;
var gamaps_use_set_parent_address  = false;

/* debug */
var gamaps_DEBUG_geocoder_tokyo_univ = false;
var gamaps_DEBUG_inverse_nishioka    = false;

/* --------------------------------------------------------
 * public functon
 * --------------------------------------------------------
 */
function gamaps_load_location() 
{
	if ( GBrowserIsCompatible() ) {
		gamaps_show_location();
	} else {
		alert( gamaps_lang_not_compatible );
	}
}
function gamaps_load_get_location() 
{
	if ( GBrowserIsCompatible() ) {
		gamaps_show_get_location();
	} else {
		alert( gamaps_lang_not_compatible );
	}
}
function gamaps_load_search() 
{
	if ( GBrowserIsCompatible() ) {
		gamaps_show_search();
	} else {
		alert( gamaps_lang_not_compatible );
	}
}
function gamaps_load_georss() 
{
	if ( GBrowserIsCompatible() ) {
		gamaps_show_georss();
	} else {
		alert( gamaps_lang_not_compatible );
	}
}
function gamaps_searchAddress( addr )
{
	if ( gamaps_geocode_kind == 'latlng' ) {
		gamaps_geocoder_LatLng( addr )
	} else if ( gamaps_geocode_kind == 'tokyo_univ' ) {
		gamaps_geocoder_tokyoUniv( addr );
	} else {
		gamaps_geocoder_Locations( addr );
	}
}
function gamaps_setCenter( lat, lng, zoom )
{
	gamaps_map.setCenter( new GLatLng( parseFloat( lat ) , parseFloat( lng ) ) );
	gamaps_map.setZoom( Math.floor( zoom ) );
}

/* --------------------------------------------------------
 * private functon
 * --------------------------------------------------------
 */

function gamaps_show_location() 
{
	gamaps_initMap();
	gamaps_setCenter( gamaps_default_latitude, gamaps_default_longitude, gamaps_default_zoom );

/* MUST be setMapType() after setCenter() */
	gamaps_setMapType();
	gamaps_addOverviewMapControl();

	if ( gamaps_use_location_marker ) {
		gamaps_location_marker = new GMarker( gamaps_map.getCenter() );
		gamaps_map.addOverlay( gamaps_location_marker );

		if ( gamaps_use_location_marker_click ) {
			gamaps_clickMarker();
		}
	}

}
function gamaps_show_get_location() 
{
	gamaps_initMap();
	gamaps_initIcon();

	now_lat  = gamaps_default_latitude;
	now_lng  = gamaps_default_longitude;
	now_zoom = gamaps_default_zoom;
	now_addr = null;

	gamaps_client_geocoder = new GClientGeocoder();
	gamaps_moveendMap();

	parent_flag  = false;
	parent_param = gamaps_getParentLatitude();
	if ( parent_param ) {
		parent_flag = parent_param[0];
	}

/* if parent param is set */
	if( parent_flag ) {
		now_lat  = parent_param[1];
		now_lng  = parent_param[2];
		now_zoom = parent_param[3];
	}

	gamaps_setCenter( now_lat, now_lng, now_zoom );

	addr = gamaps_getParentAddress();
	if ( addr ) {
		document.getElementById("gamaps_search").value = addr.gamaps_htmlspecialchars();

/* if parent param is NOT set */
		if( parent_flag == false ) {
			gamaps_searchAddress(addr);
		}
	}

}
function gamaps_show_search() 
{
	gamaps_initMap();
	gamaps_initIcon();
	gamaps_client_geocoder = new GClientGeocoder();
	gamaps_moveendMap();
	gamaps_setCenter( gamaps_default_latitude, gamaps_default_longitude, gamaps_default_zoom );
	gamaps_setMapType();
	gamaps_addOverviewMapControl();

	now_addr = null;
	if ( document.getElementById("gamaps_search") != null ) {
		now_addr = document.getElementById("gamaps_search").value;
	}
	gamaps_searchAddress( now_addr );

}

function gamaps_show_georss() 
{
	gamaps_initMap();
	gamaps_setCenter( gamaps_default_latitude, gamaps_default_longitude, gamaps_default_zoom );
	gamaps_setMapType();
	gamaps_addOverviewMapControl();

	var gamaps_geo_xml = new GGeoXml( gamaps_geo_url );
	gamaps_map.addOverlay( gamaps_geo_xml );
}

/* init map */
function gamaps_initMap() 
{
	gamaps_map = new GMap2( document.getElementById("gamaps_map") );

	if ( gamaps_map_control == 'large' ) {
		gamaps_map.addControl( new GLargeMapControl() );
	} else if ( gamaps_map_control == 'small' ) {
		gamaps_map.addControl( new GSmallMapControl() );
	} else if ( gamaps_map_control == 'zoom' ) {
		gamaps_map.addControl( new GSmallZoomControl() );
	}

	if ( gamaps_type_control == 'default' ) {
		gamaps_map.addControl( new GMapTypeControl() );
	} else if ( gamaps_type_control == 'physical' ) {
		gamaps_map.addControl( new GMapTypeControl() );
		gamaps_map.addMapType( G_PHYSICAL_MAP );
	}

	if ( gamaps_use_scale_control ) {
		gamaps_map.addControl( new GScaleControl() );
	}
}
function gamaps_setMapType() 
{
	if ( gamaps_map_type == 'satellite' ) {
		gamaps_map.setMapType( G_SATELLITE_MAP );
	} else if ( gamaps_map_type == 'hybrid' ) {
		gamaps_map.setMapType( G_HYBRID_MAP );
	} else if ( gamaps_map_type == 'physical' ) {
		gamaps_map.setMapType( G_PHYSICAL_MAP );
	}
}
function gamaps_addOverviewMapControl() 
{
	if ( gamaps_use_overview_map_control ) {
		gamaps_map.addControl( new GOverviewMapControl() );
	}
}
function gamaps_initIcon() 
{
	gamaps_drag_icon = new GIcon();
	gamaps_drag_icon.image = gamaps_xoops_url + "/modules/gamaps/images/marker/marker_green_cross_s.png";
	gamaps_drag_icon.iconSize = new GSize(18, 30);
	gamaps_drag_icon.iconAnchor = new GPoint(9, 30);
	gamaps_drag_icon.infoWindowAnchor = new GPoint(9, 2);

	gamaps_base_icon = new GIcon();
	gamaps_base_icon.iconSize = new GSize(20, 34);
	gamaps_base_icon.iconAnchor = new GPoint(9, 34);
	gamaps_base_icon.infoWindowAnchor = new GPoint(9, 2);

	gamaps_small_icon = new GIcon();
	gamaps_small_icon.image = gamaps_xoops_url + "/modules/gamaps/images/marker/marker_small.png";
	gamaps_small_icon.iconSize = new GSize(12, 20);
	gamaps_small_icon.iconAnchor = new GPoint(5, 20);
	gamaps_small_icon.infoWindowAnchor = new GPoint(9, 2);
}

/* map moveend */
function gamaps_moveendMap() 
{
	GEvent.addListener(gamaps_map, "moveend", function() {

		center = gamaps_map.getCenter();
		xx = center.x;
		yy = center.y;
		zz = gamaps_map.getZoom();

		if ( gamaps_use_set_parent_location ) {
			gamaps_setParentLatitude( yy, xx, zz );
		}

		if ( gamaps_set_current_location ) {
			current_location = gamaps_lang_latitude + ': ' + yy + ' / ' + gamaps_lang_longitude + ': ' + xx + ' / ' + gamaps_lang_zoom + ': ' + zz;
			document.getElementById("gamaps_current_location").innerHTML = current_location; 
		}

		if ( gamaps_use_nishioka_inverse ) {
			gamaps_inverse_nishioka( xx, yy );
		}

		if ( gamaps_use_draggable_marker ) {
			gamaps_showDraggableMarker();
		}

	} );

}

/* marker click */
function gamaps_clickMarker() 
{
	GEvent.addListener( gamaps_location_marker, "click", function() {
		gamaps_location_marker.openInfoWindowHtml( gamaps_location_marker_html );
	} );
}

/* draggable marker */
function gamaps_showDraggableMarker() 
{
	if ( gamaps_draggable_marker != null ) {
		gamaps_map.removeOverlay( gamaps_draggable_marker );
	}
	gamaps_draggable_marker = new GMarker( 
		gamaps_map.getCenter(), 
		{ icon:gamaps_drag_icon , draggable:true , bouncy:true , bounceGravity:0.5 } 
	); 
	gamaps_map.addOverlay( gamaps_draggable_marker );
	gamaps_dragendMarker();
}
function gamaps_dragendMarker() 
{
	GEvent.addListener( gamaps_draggable_marker, "dragend", function() {
		window.setTimeout( function() {
			gamaps_map.panTo( gamaps_draggable_marker.getPoint() );
		}, 1000 );
	});
}

/* geocoder Locations */
function gamaps_geocoder_Locations( addr )
{
	if ( addr ) {
		gamaps_client_geocoder.getLocations( addr , function( response ) {
			if ( !response || response.Status.code != 200 ) {
				alert( gamaps_lang_no_match_place + "\n" + addr );
			} else {
				gamaps_geocoder_LocationsResponse( response );
			}
		} );
	}
}
function gamaps_geocoder_LocationsResponse( response )
{
/* clear all marker */
	gamaps_map.clearOverlays();

	var length = response.Placemark.length;
	var gamaps_list = '<ol>';

	for(var i = 0; i< length; i++) {

/* location */
		place = response.Placemark[i];
		addr = place.address;
		lng  = place.Point.coordinates[0];
		lat  = place.Point.coordinates[1];
		zoom = place.AddressDetails.Accuracy + gamaps_zoom_accuracy;
		zoom = gamaps_maxZoom( zoom );

/* add marker */
		if ( gamaps_use_search_marker ) {
			gamaps_addMarker( i, lat, lng, zoom, addr );
		}
		gamaps_setBounds( i, lat, lng, zoom );
		gamaps_list += gamaps_getSearchList( i, lat, lng, zoom, addr );
	}

	gamaps_list += '</ol>';
	gamaps_setCenterBounds( length );
	document.getElementById("gamaps_list").innerHTML = gamaps_list;
}
function gamaps_addMarker( index, lat, lng, zoom, addr )
{
	icon = gamaps_createIcon( index );
	html = gamaps_getSearchHtml( index, lat, lng, zoom, addr );
	gamaps_map.addOverlay( gamaps_createMarker( lat, lng, icon, html ) );
}
function gamaps_createIcon( index ) 
{
	letter = gamaps_getSmallLetter( index );

	if ( letter ) {
		var icon = new GIcon(gamaps_base_icon);
		icon.image = gamaps_xoops_url + "/modules/gamaps/images/marker/marker_" + letter + ".png";
	} else {
		var icon = new GIcon(gamaps_small_icon);
	}

	return icon;
}
function gamaps_createMarker( lat, lng, icon, html ) 
{
	var marker = new GMarker( new GLatLng( parseFloat( lat ) , parseFloat( lng ) ), icon );
	GEvent.addListener(marker, "click", function() {
		marker.openInfoWindowHtml( html );
	});
	return marker;
}
function gamaps_setBounds( index, lat, lng, zoom )
{
	var point = new GLatLng( parseFloat( lat ) , parseFloat( lng ) );
	if (( Math.floor( index ) == 0 )||( gamaps_bounds_zoom == null)) {
		gamaps_bounds_zoom = Math.floor( zoom );
		gamaps_bounds = new GLatLngBounds( point );
	}
	gamaps_bounds.extend( point );
}
function gamaps_setCenterBounds( length )
{
	var northEastPoint = gamaps_bounds.getNorthEast();
	var southWestPoint = gamaps_bounds.getSouthWest();
	lat = (northEastPoint.lat() + southWestPoint.lat()) / 2;
	lng = (northEastPoint.lng() + southWestPoint.lng()) / 2;

	zoom = gamaps_bounds_zoom;
	if ( length > 1 ) {
		zoom = gamaps_map.getBoundsZoomLevel( gamaps_bounds );
	}

	gamaps_setCenter( lat, lng, zoom );
}
function gamaps_getSearchList( index, lat, lng, zoom, addr )
{
	html = gamaps_getSearchHtml( index, lat, lng, zoom, addr );
	list = '<li>' + html + '</li>' + "\n";
	return list;
}
function gamaps_getSearchHtml( index, lat, lng, zoom, addr)
{
	letter = gamaps_getCapitalLetter( index );
	if ( letter == '' ) {
		letter = index + 1;
	}

	func = "gamaps_setCenter(" + lat + ', '  + lng + ', ' + zoom + ")";
	link = '<a href="javascript:void(0)" onClick="' + func + '">' + addr.gamaps_htmlspecialchars() + '</a>';
	html = '<b>' + letter + '</b> ' + link;
	return html;
}
function gamaps_getCapitalLetter( index ) 
{
	var char = '';
	if (index < 26)
	{
		char = String.fromCharCode("A".charCodeAt(0) + index);
	}
	return char;
}
function gamaps_getSmallLetter( index ) 
{
	var char = '';
	if (index < 26)
	{
		char = String.fromCharCode("a".charCodeAt(0) + index);
	}
	return char;
}
function gamaps_maxZoom( z )
{
	if ( z > gamaps_zoom_max ) {
		z = gamaps_zoom_max;
	}
	return z;
}

/* geocoder LatLng */
function gamaps_geocoder_LatLng( addr )
{
	if ( addr ) {
		gamaps_client_geocoder.getLatLng(addr, function( point ) {
			if ( !point ) {
				alert( gamaps_lang_no_match_place + "\n" + addr );
			} else {
				gamaps_map.setCenter( point, Math.floor( gamaps_zoom_geocode_default ) );
			}
		} );
	}

}

/* set & get parent */
function gamaps_getParentLatitude() 
{
	lat  = 0;
	lng  = 0;
	zoom = 0;
	flag = false;

	if ( gamaps_opener_mode == 'self' ) {
		if ( document.getElementById("gamaps_latitude") != null ) {
			lat  = document.getElementById("gamaps_latitude").value;
		}
		if ( document.getElementById("gamaps_longitude") != null ) {
			lng  = document.getElementById("gamaps_longitude").value;
		}
		if ( document.getElementById("gamaps_zoom") != null ) {
			zoom = document.getElementById("gamaps_zoom").value;
		}
	} else if (( gamaps_opener_mode == 'opener' )&&( opener != null )) {
		if ( opener.document.getElementById("gamaps_latitude") != null ) {
			lat  = opener.document.getElementById("gamaps_latitude").value;
		}
		if ( opener.document.getElementById("gamaps_longitude") != null ) {
			lng  = opener.document.getElementById("gamaps_longitude").value;
		}
		if ( opener.document.getElementById("gamaps_zoom") != null ) {
			zoom = opener.document.getElementById("gamaps_zoom").value;
		}
	} else if (( gamaps_opener_mode == 'parent' )&&( parent != null )) {
		if ( parent.document.getElementById("gamaps_latitude") != null ) {
			lat  = parent.document.getElementById("gamaps_latitude").value;
		}
		if ( parent.document.getElementById("gamaps_longitude") != null ) {
			lng  = parent.document.getElementById("gamaps_longitude").value;
		}
		if ( parent.document.getElementById("gamaps_zoom") != null ) {
			zoom = parent.document.getElementById("gamaps_zoom").value;
		}
	}

/* if parent param is set */
	if( (lat != 0) || (lng != 0) || (zoom != 0) ) {
		flag = true;
	}

	arr = new Array(flag, lat, lng, zoom);
	return arr;
}

function gamaps_setParentLatitude( latitude , longitude , zoom )
{
	if ( gamaps_opener_mode == 'self' ) {
		if ( document.getElementById("gamaps_latitude") != null) {
			document.getElementById( "gamaps_latitude" ).value = latitude;
		}
		if ( document.getElementById("gamaps_longitude") != null) {
			document.getElementById( "gamaps_longitude" ).value = longitude;
		}
		if ( document.getElementById("gamaps_zoom") != null) {
			document.getElementById( "gamaps_zoom" ).value = Math.floor( zoom );
		}
	} else if (( gamaps_opener_mode == 'opener' )&&( opener != null)) {
		if ( opener.document.getElementById("gamaps_latitude") != null) {
			opener.document.getElementById( "gamaps_latitude" ).value = latitude;
		}
		if ( opener.document.getElementById("gamaps_longitude") != null) {
			opener.document.getElementById( "gamaps_longitude" ).value = longitude;
		}
		if ( opener.document.getElementById("gamaps_zoom") != null) {
			opener.document.getElementById( "gamaps_zoom" ).value = Math.floor( zoom );
		}
	} else if (( gamaps_opener_mode == 'parent' )&&( parent != null)) {
		if ( parent.document.getElementById("gamaps_latitude") != null) {
			parent.document.getElementById( "gamaps_latitude" ).value = latitude;
		}
		if ( parent.document.getElementById("gamaps_longitude") != null) {
			parent.document.getElementById( "gamaps_longitude" ).value = longitude;
		}
		if ( parent.document.getElementById("gamaps_zoom") != null) {
			parent.document.getElementById( "gamaps_zoom" ).value = Math.floor( zoom );
		}
	}
}
function gamaps_getParentAddress()
{
	addr = '';

	if ( gamaps_opener_mode == 'self' ) {
		if ( document.getElementById("gamaps_address") != null ) {
			addr = document.getElementById("gamaps_address").value;
		}
	} else if (( gamaps_opener_mode == 'opener' )&&( opener != null )) {
		if ( opener.document.getElementById("gamaps_address") != null ) {
			addr = opener.document.getElementById("gamaps_address").value;
		}
	} else if (( gamaps_opener_mode == 'parent' )&&( parent != null )) {
		if ( parent.document.getElementById("gamaps_address") != null ) {
			addr = parent.document.getElementById("gamaps_address").value;
		}
	}

	return addr;
}
function gamaps_setParentAddress( addr )
{
	if (( addr != null )&&( addr != '' )) {
		if ( gamaps_opener_mode == 'self' ) {
			if ( document.getElementById("gamaps_address") != null) {
				document.getElementById("gamaps_address").value = addr.gamaps_htmlspecialchars();
			}
		} else if (( gamaps_opener_mode == 'opener' )&&( opener != null)) {
			if ( opener.document.getElementById("gamaps_address") != null) {
				opener.document.getElementById("gamaps_address").value = addr.gamaps_htmlspecialchars();
			}
		} else if (( gamaps_opener_mode == 'parent' )&&( parent != null)) {
			if ( parent.document.getElementById("gamaps_address") != null) {
				parent.document.getElementById("gamaps_address").value = addr.gamaps_htmlspecialchars();
			}
		}
	}
}

/* reference: mygmap module's myggamaps_map.js */
String.prototype.gamaps_htmlspecialchars = function() {
	var gamaps_tmp = this.toString();
	gamaps_tmp = gamaps_tmp.replace(/\//g, "");
	gamaps_tmp = gamaps_tmp.replace(/&/g, "&amp;");
	gamaps_tmp = gamaps_tmp.replace(/"/g, "&quot;");
	gamaps_tmp = gamaps_tmp.replace(/'/g, "&#39;");
	gamaps_tmp = gamaps_tmp.replace(/</g, "&lt;");
	gamaps_tmp = gamaps_tmp.replace(/>/g, "&gt;");
	return gamaps_tmp;
}

/* --------------------------------------------------------
 * for japanese
 * --------------------------------------------------------
 */
/* japanese inverse geocoder */
function gamaps_geocoder_tokyoUniv( addr )
{
	if ( addr ) {
		var url = gamaps_xoops_url + '/modules/gamaps/tokyo_univ_geocode.php?query=' + encodeURI( addr );

		GDownloadUrl( url , function( data , responseCode ) {
			if( gamaps_DEBUG_geocoder_tokyo_univ ) {
				alert( data );
			}
			if( responseCode == 200 ) {
				xml = GXml.parse( data );

/* fixed javascript errors with IE6 by souhalt */
				if ( xml.documentElement != null ) {
					candidate = xml.documentElement.getElementsByTagName("candidate");
					if ( candidate.length == 0 ) {
						alert( gamaps_lang_no_match_place + "\n" + addr );
					} else {
						gamaps_geocoder_tokyoUnivResponse( xml );
					}
				} else {
					alert( gamaps_lang_no_match_place + "\n" + addr );
				}

			}
		});
	}
}
function gamaps_geocoder_tokyoUnivResponse( xml )
{
/* clear all marker */
	gamaps_map.clearOverlays();

	var candidate = xml.documentElement.getElementsByTagName("candidate");
	var iconf = xml.documentElement.getElementsByTagName("iConf")[0].firstChild.nodeValue;
	var length = candidate.length;

	var gamaps_list = '<ol>';

	iconf = Math.floor( iconf );
	if ( iconf >= 2 && iconf <= 5 ) {
		zoom = iconf + gamaps_zoom_accuracy_tokyo_univ;
	} else {
		zoom = gamaps_zoom_geocode_default;
	}
	zoom = gamaps_maxZoom( zoom );

	for(var i = 0; i< length; i++) {

/* location */
		place = candidate[i];
		addr = place.getElementsByTagName("address")[0].firstChild.nodeValue;
		lat  = place.getElementsByTagName('latitude')[0].firstChild.nodeValue;
		lng  = place.getElementsByTagName('longitude')[0].firstChild.nodeValue;

/* add marker */
		if ( gamaps_use_search_marker ) {
			gamaps_addMarker( i, lat, lng, zoom, addr );
		}
		gamaps_setBounds( i, lat, lng, zoom );
		gamaps_list += gamaps_getSearchList( i, lat, lng, zoom, addr );
	}

	gamaps_setCenterBounds( length );
	gamaps_list += '</ol>';
	document.getElementById("gamaps_list").innerHTML = gamaps_list;
}

/* japanese inverse geocoder */
function gamaps_inverse_nishioka( lon, lat )
{
	var url = gamaps_xoops_url + '/modules/gamaps/nishioka_inverse.php?lon=' + lon + '&lat=' + lat;

	GDownloadUrl( url , function( data , responseCode ) {
		if( gamaps_DEBUG_inverse_nishioka ) {
			alert( data );
		}
		if( responseCode == 200 ) {
			var xml = GXml.parse( data );

/* fixed javascript errors with IE6 by souhalt */
			if ( xml.documentElement != null ) {
				gamaps_inverse_nishiokaResponse( xml );
			}

		}
	});
}

function gamaps_inverse_nishiokaResponse( xml )
{
	gamaps_address_jp = null;
	gamaps_pref_jp    = null;
	gamaps_city_jp    = null;
	gamaps_town_jp    = null;
	gamaps_number_jp  = null;

	var error = null;
	var addr  = null;

	if ( xml.documentElement.getElementsByTagName("address")[0] != null) {
		gamaps_address_jp = xml.documentElement.getElementsByTagName("address")[0].firstChild.nodeValue;
	}
	if ( xml.documentElement.getElementsByTagName("pref")[0] != null) {
		gamaps_pref_jp = xml.documentElement.getElementsByTagName("pref")[0].firstChild.nodeValue;
	}
	if ( xml.documentElement.getElementsByTagName("city")[0] != null) {
		gamaps_city_jp = xml.documentElement.getElementsByTagName("city")[0].firstChild.nodeValue;
	}
	if ( xml.documentElement.getElementsByTagName("town")[0] != null) {
		gamaps_town_jp = xml.documentElement.getElementsByTagName("town")[0].firstChild.nodeValue;;
	}
	if ( xml.documentElement.getElementsByTagName("number")[0] != null) {
		gamaps_number_jp = xml.documentElement.getElementsByTagName("number")[0].firstChild.nodeValue;
	}
	if ( xml.documentElement.getElementsByTagName("Message")[0] != null) {
		error = xml.documentElement.getElementsByTagName("Message")[0].firstChild.nodeValue;
	}

	if ( gamaps_address_jp != null ) {
		addr = gamaps_address_jp;
	} else if ( error != null ) { 
		addr = error;
	} else {
		addr = "unknown";
	}
	document.getElementById("gamaps_current_address").innerHTML = addr;

	if ( gamaps_use_set_parent_address ) {
		gamaps_setParentAddress( gamaps_address_jp );
	}
}
