<?php
// $Id: location.php,v 1.1 2007/07/22 03:46:22 ohwada Exp $

// 2007-07-20 K.OHWADA
// divid from index.php

//=========================================================
// Google Ajax Maps Module
// 2007-07-20 K.OHWADA
//=========================================================

include '../../../include/cp_header.php';

include_once XOOPS_ROOT_PATH.'/class/template.php';
include_once XOOPS_ROOT_PATH.'/modules/gamaps/include/functions.php';
include_once XOOPS_ROOT_PATH.'/modules/gamaps/include/gtickets.php';

$XOOPS_LANGUAGE = $xoopsConfig['language'];
if ( file_exists(XOOPS_ROOT_PATH.'/modules/gamaps/language/'.$XOOPS_LANGUAGE.'/modinfo.php') ) 
{
	include_once XOOPS_ROOT_PATH.'/modules/gamaps/language/'.$XOOPS_LANGUAGE.'/modinfo.php';
}
else
{
	include_once XOOPS_ROOT_PATH.'/modules/gamaps/language/english/modinfo.php';
}

if ( file_exists(XOOPS_ROOT_PATH.'/modules/gamaps/language/'.$XOOPS_LANGUAGE.'/main.php') ) 
{
	include_once XOOPS_ROOT_PATH.'/modules/gamaps/language/'.$XOOPS_LANGUAGE.'/main.php';
}
else
{
	include_once XOOPS_ROOT_PATH.'/modules/gamaps/language/english/main.php';
}

//=========================================================
// class gamaps_config
//=========================================================
class gamaps_config
{
	var $_config_handler;
	var $_conf_objs = array();

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function gamaps_config()
{
	$this->_config_handler =& xoops_gethandler('ConfigItem');
}

function &getInstance()
{
	static $instance;
	if (!isset($instance)) 
	{
		$instance = new gamaps_config();
	}
	return $instance;
}

//---------------------------------------------------------
// function
//---------------------------------------------------------
function save()
{
	$this->_get_objects();
	if ( isset($_POST['gamaps_address']) )
	{
		$this->_save( 'address', $_POST['gamaps_address'] );
	}
	if ( isset($_POST['gamaps_latitude']) )
	{
		$this->_save( 'latitude', floatval($_POST['gamaps_latitude']) );
	}
	if ( isset($_POST['gamaps_longitude']) )
	{
		$this->_save( 'longitude', floatval($_POST['gamaps_longitude']) );
	}
	if ( isset($_POST['gamaps_zoom']) )
	{
		$this->_save( 'zoom', intval($_POST['gamaps_zoom']) );
	}
}

function _get_objects()
{
	$this->_conf_objs = array();

	$mid = $this->_get_mid();
	$criteria = new CriteriaCompo(new Criteria('conf_modid', $mid));
	$objs =& $this->_config_handler->getObjects($criteria);

	if ( is_array($objs) )
	{
		foreach( $objs as $obj )
		{
			$this->_conf_objs[ $obj->getVar('conf_name') ] = $obj;
		}
	}
}

function _get_mid()
{
	global $xoopsModule;
	$mid = $xoopsModule->getVar('mid');
	return $mid;
}
function _save( $name, $val )
{
	$obj =& $this->_get_obj( $name );
	if ( is_object($obj) )
	{
		$obj->setVar( 'conf_value', $val );
		$this->_config_handler->insert($obj);
	}
}

function &_get_obj( $name )
{
	$ret = false;
	if ( isset($this->_conf_objs[ $name ]) )
	{
		$ret =& $this->_conf_objs[ $name ];
	}
	return $ret;
}

// --- class end ---
}


//=========================================================
// function
//=========================================================
function print_template()
{
	global $xoopsModule, $xoopsModuleConfig, $xoopsGTicket;

	$ticket    = $xoopsGTicket->issue( __LINE__ );

	$tpl = new XoopsTpl();
	$tpl->assign('ticket',      $ticket );

	$tpl->assign('module_name', $xoopsModule->getVar('name') );
	$tpl->assign('mid',         $xoopsModule->getVar('mid') );

	$tpl->assign('ga_opener_mode',              "self" );
	$tpl->assign('ga_map_control',              "large" );
	$tpl->assign('ga_set_current_location',     "true" );
	$tpl->assign('ga_use_draggable_marker',     "true" );
	$tpl->assign('ga_use_search_marker',        "true" );
	$tpl->assign('ga_use_set_parent_location',  "true" );
	$tpl->assign('ga_use_set_parent_address',   "true" );

	$tpl->assign('ga_api_key',           $xoopsModuleConfig['api_key'] );
	$tpl->assign('ga_latitude',          $xoopsModuleConfig['latitude'] );
	$tpl->assign('ga_longitude',         $xoopsModuleConfig['longitude'] );
	$tpl->assign('ga_zoom',              $xoopsModuleConfig['zoom'] );
	$tpl->assign('ga_map_type',          $xoopsModuleConfig['map_type'] );
	$tpl->assign('ga_geocode_kind',      $xoopsModuleConfig['geocode_kind'] );

	$tpl->assign('ga_address',                   gamaps_get_config_text('address', 's') );
	$tpl->assign('ga_use_type_control',          gamaps_get_config_bool('use_type_control') );
	$tpl->assign('ga_use_scale_control',         gamaps_get_config_bool('use_scale_control') );
	$tpl->assign('ga_use_overview_map_control',  gamaps_get_config_bool('use_overview_map_control') );
	$tpl->assign('ga_use_nishioka_inverse',      gamaps_get_config_bool('use_nishioka_inverse') );

	$tpl->assign('lang_address',          _GAMAPS_ADDRESS );
	$tpl->assign('lang_latitude',         _GAMAPS_LATITUDE );
	$tpl->assign('lang_longitude',        _GAMAPS_LONGITUDE );
	$tpl->assign('lang_zoom',             _GAMAPS_ZOOM );
	$tpl->assign('lang_search',           _GAMAPS_SEARCH );
	$tpl->assign('lang_search_list',      _GAMAPS_SEARCH_LIST );
	$tpl->assign('lang_current_location', _GAMAPS_CURRENT_LOCATION );
	$tpl->assign('lang_current_address',  _GAMAPS_CURRENT_ADDRESS );
	$tpl->assign('lang_no_match_place',   _GAMAPS_NO_MATCH_PLACE );
	$tpl->assign('lang_not_compatible',   _GAMAPS_NOT_COMPATIBLE );
	$tpl->assign('lang_js_invalid',       _GAMAPS_JS_INVALID );
	$tpl->assign('lang_module_desc',      _MI_GAMAPS_DESC );
	$tpl->assign('lang_goto_module',      _AM_GAMAPS_GOTO_MODULE );
	$tpl->assign('lang_title_location',   _AM_GAMAPS_TITLE_LOCATION );
	$tpl->assign('lang_conf_location',    _AM_GAMAPS_LOCATION );
	$tpl->assign('lang_conf_address',     _AM_GAMAPS_ADDRESS );
	$tpl->assign('lang_index',            _AM_GAMAPS_INDEX );
	$tpl->assign('lang_preferences',      _PREFERENCES );
	$tpl->assign('lang_close',            _CLOSE );
	$tpl->assign('lang_edit',             _EDIT );

	$tpl->display('db:gamaps_admin_location.html');
}

//=========================================================
// main
//=========================================================

$op = '';
if ( isset($_POST['op']) )
{
	$op = $_POST['op'];
}
if ( $op == 'edit' )
{
	global $xoopsModule, $xoopsModuleConfig, $xoopsGTicket;
	if ( $xoopsGTicket->check( true, '' , false ) )
	{
		$config_handler =& gamaps_config::getInstance();
		$config_handler->save();

		redirect_header( 'location.php', 1, _EDIT );
	}
	else
	{
		xoops_cp_header();
		xoops_error('Ticket Error');
	}
}
else
{
	xoops_cp_header();
}

print_template();

xoops_cp_footer();
exit();
// --- main end ---

?>