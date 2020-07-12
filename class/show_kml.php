<?php
// $Id: show_kml.php,v 1.1 2008/02/24 03:24:50 ohwada Exp $

//=========================================================
// Google Ajax Maps Module
// 2008-02-17 K.OHWADA
//=========================================================

//=========================================================
// class gamaps_show_kml
//=========================================================
class gamaps_show_kml extends gamaps_build_kml
{
	var $_DIRNAME;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function gamaps_show_kml( $dirname )
{
	$this->_DIRNAME = $dirname;
	$this->gamaps_build_kml();
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) 
	{
		$instance = new gamaps_show_kml( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// pulic
//---------------------------------------------------------
function build_gamaps_kml()
{
	$this->_set_kml();
	$this->build_kml();
}

function view_gamaps_kml()
{
	$this->_set_kml();
	$this->view_kml();
}

function _set_kml()
{
	$module_handler =& xoops_gethandler('module');
	$module =& $module_handler->getByDirname( $this->_DIRNAME );

	$config_handler =& xoops_gethandler('config');
	$xoopsModuleConfig =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));

	$placemark = array(
		'name'        => $xoopsModuleConfig['address'],
		'description' => $xoopsModuleConfig['loc_marker_html'],
		'latitude'    => $xoopsModuleConfig['latitude'],
		'longitude'   => $xoopsModuleConfig['longitude'],
	);

	$this->init_obj();
	$this->set_dirname( $this->_DIRNAME );
	$this->set_template( 'db:gamaps_kml.html' );
	$this->set_document_tag_use(  true );
	$this->set_document_open_use( true );
	$this->set_document_name( $this->build_document_name() );
	$this->set_placemarks( array($placemark) );
}

// --- class end ---
}

?>