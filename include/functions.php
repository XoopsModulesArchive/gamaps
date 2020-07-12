<?php
// $Id: functions.php,v 1.1 2007/07/11 08:56:14 ohwada Exp $

//================================================================
// Google Ajax Maps Module
// 2007-07-01 K.OHWADA
//================================================================

function gamaps_get_config_bool( $name )
{
	global $xoopsModuleConfig;
	if ( isset($xoopsModuleConfig[ $name ]) )
	{
		if ( $xoopsModuleConfig[ $name ] )
		{
			return "true";
		}
		else
		{
			return "false";
		}
	}
	return null;
}

function gamaps_get_config_text( $name, $format='n' )
{
	global $xoopsModuleConfig;
	if ( !isset($xoopsModuleConfig[ $name ]) )
	{	return null;	}

	$val = $xoopsModuleConfig[ $name ];

	switch ($format)
	{
		case 's':
			$ret = htmlspecialchars($val, ENT_QUOTES);
			break;

		case 'textarea':
			$ret = str_replace( '"', "'", $val );
			break;

		case 'n':
		default:
			$ret = $val;
			break;
	}
	return $ret;
}

?>