<?php
// $Id: multibyte.php,v 1.1 2008/02/24 03:26:54 ohwada Exp $

//=========================================================
// Google Ajax Maps Module
// 2008-02-17 K.OHWADA
//=========================================================

//---------------------------------------------------------
// same as happy_linux/include/multibyte.php
//---------------------------------------------------------

function gamaps_convert_encoding( $str, $to, $from=null )
{
	if ( function_exists('mb_convert_encoding') ) 
	{
		if ( $from ) {
			return mb_convert_encoding($str, $to, $from);
		} else {
			return mb_convert_encoding($str, $to);
		}
	}
	return $str;
}

function gamaps_convert_to_utf8($str, $encoding=null)
{
	if ( empty($encoding) ) {
		$encoding = _CHARSET;
	}

	if ( function_exists('mb_convert_encoding') ) {
		$str = mb_convert_encoding($str, 'UTF-8', $encoding);
	} else {
		$str = utf8_encode($str);
	}
	return $str;
}

function gamaps_convert_from_utf8($str, $encoding=null)
{
	if ( empty($encoding) ) {
		$encoding = _CHARSET;
	}

	if ( function_exists('mb_convert_encoding') ) {
		$str = mb_convert_encoding($str, $encoding, 'UTF-8');
	} else {
		$str = utf8_decode($str);
	}
	return $str;
}

function gamaps_convert_kana( $str, $option="KV", $encoding=null )
{
	if ( function_exists('mb_convert_kana') )
	{
		if ( $encoding ) {
			return mb_convert_kana( $str, $option, $encoding );
		} else {
			return mb_convert_kana( $str, $option );
		}
	}
	return $str;
}

function gamaps_internal_encoding( $encoding=null )
{
	if ( function_exists('mb_internal_encoding') )
	{
		if ( $encoding ) {
			return mb_internal_encoding( $encoding );
		} else {
			return mb_internal_encoding();
		}
	}
}

function gamaps_detect_encoding( $str, $encoding_list=null, $strict=null )
{
	if ( function_exists('mb_detect_encoding') )
	{
		if( $encoding_list && $strict ) {
			return mb_detect_encoding( $str, $encoding_list, $strict );
		} elseif( $encoding_list ) {
			return mb_detect_encoding( $str, $encoding_list );
		}
		return mb_detect_encoding( $str );
	}
	return false;
}

function gamaps_strcut( $str, $start, $length, $encoding=null )
{
	if ( function_exists('mb_strcut') )
	{
		if ( $encoding ) {
			return mb_strcut($str, $start, $length, $encoding);
		} else {
			return mb_strcut($str, $start, $length);
		}
	}

// BUG 4339: Fatal error: Call to undefined function: strcut() 
// strcut -> substr
	return substr($str, $start, $length);
}

function gamaps_http_output( $encoding=null )
{
	if ( function_exists('mb_http_output') ) 
	{
		if ( $encoding ) {
			return mb_http_output( $encoding );
		} else {
			return mb_http_output();
		}
	}
}

function gamaps_mb_language( $language=null )
{
	if ( function_exists('mb_language') ) 
	{
		if ( $language ) {
			return mb_language( $language );
		} else {
			return mb_language();
		}
	}
}

function gamaps_send_mail($mailto, $subject, $message, $headers=null, $parameter=null)
{
	if ( function_exists('mb_send_mail') )
	{
		if ( $parameter ) {
			return mb_send_mail($mailto, $subject, $message, $headers, $parameter);
		} elseif ( $headers ) {
			return mb_send_mail($mailto, $subject, $message, $headers);
		} else {
			return mb_send_mail($mailto, $subject, $message);
		}
	}

	if ( $parameter ) {
		return mail($mailto, $subject, $message, $headers, $parameter);
	} elseif ( $headers ) {
		return mail($mailto, $subject, $message, $headers);
	}
	return mail($mailto, $subject, $message);
}

function gamaps_mb_ereg_replace( $pattern, $replace, $string, $option=null )
{
	if ( function_exists('mb_ereg_replace') ) 
	{
		if ( $option ) {
			return mb_ereg_replace( $pattern, $replace, $string, $option );
		} else {
			return mb_ereg_replace( $pattern, $replace, $string );
		}
	}
}

//---------------------------------------------------------
// shorten strings
// max: plus=shorten, 0=null, -1=unlimited
//---------------------------------------------------------
function gamaps_mb_shorten( $str, $max, $tail=' ...' ) 
{
	$text = $str;
	if (( $max > 0 )&&( strlen($str) > $max ) ) {
		$text = gamaps_strcut( $str, 0, $max ) . $tail;
	} elseif ( $max == 0 )  {
		$text = null;
	}
	return $text;
}

//---------------------------------------------------------
// build summary
//---------------------------------------------------------
function gamaps_mb_build_summary( $str, $max, $tail=' ...', $is_japanese=false )
{
	if ( $is_japanese )
	{
		$str = gamaps_convert_kana($str, "s");
		$str = gamaps_str_add_space_after_punctuation_ja($str);
	}

// BUG: not show smile icon
//	$str = gamaps_str_add_space_after_punctuation($str);

	$str = gamaps_str_add_space_after_tag($str);
	$str = strip_tags($str);
	$str = gamaps_str_replace_control_code($str);
	$str = gamaps_str_replace_tab_code($str);
	$str = gamaps_str_replace_return_code($str);
	$str = gamaps_str_replace_html_space_code($str);
	$str = gamaps_str_replace_continuous_space_code($str);
	$str = gamaps_str_set_empty_if_only_space($str);
	$str = gamaps_mb_shorten($str, $max, $tail);
	return $str;
}

function gamaps_str_add_space_after_tag($str)
{
	return gamaps_str_add_space_after_str( '>', $str );
}

// BUG: not show smile icon
// recommend not to use, because strong side effect
// "abc.gif" => "abc. gif"
function gamaps_str_add_space_after_punctuation($str)
{
	$str = gamaps_str_add_space_after_str( ',', $str );
	$str = gamaps_str_add_space_after_str( '.', $str );
	return $str;
}

function gamaps_str_add_space_after_punctuation_ja($str)
{
// japanese punctuation mark
	if( defined('_HAPPY_LINUX_JA_KUTEN') )
	{
		$str = gamaps_mb_add_space_after_str( _HAPPY_LINUX_JA_KUTEN,   $str );
		$str = gamaps_mb_add_space_after_str( _HAPPY_LINUX_JA_DOKUTEN, $str );
		$str = gamaps_mb_add_space_after_str( _HAPPY_LINUX_JA_PERIOD,  $str );
		$str = gamaps_mb_add_space_after_str( _HAPPY_LINUX_JA_COMMA,   $str );
	}
	return $str;
}

function gamaps_str_add_space_after_str( $word, $string )
{
	return str_replace( $word, $word.' ', $string );
}

function gamaps_mb_add_space_after_str( $word, $string )
{
	return gamaps_mb_ereg_replace( $word, $word.' ', $string );
}

function gamaps_str_set_empty_if_only_space($str)
{
	$temp = gamaps_str_replace_space_code( $str, '' );
	if ( strlen($temp) == 0 )
	{	$str = '';	}
	return $str;
}

function gamaps_is_japanese()
{
	global $xoopsConfig;
	include_once XOOPS_ROOT_PATH.'/modules/gamaps/language/lang_name_ja.php';
	if ( in_array( $xoopsConfig['language'], gamaps_get_lang_name_ja() ) )
	{	return true;	}
	return false;
}

//---------------------------------------------------------
// TAB \x09 \t
// LF  \xOA \n
// CR  \xOD \r
//---------------------------------------------------------
function gamaps_str_replace_control_code( $str, $replace=' ' )
{
	$str = preg_replace('/[\x00-\x08]/', $replace, $str);
	$str = preg_replace('/[\x0B-\x0C]/', $replace, $str);
	$str = preg_replace('/[\x0E-\x1F]/', $replace, $str);
	$str = preg_replace('/[\x7F]/',      $replace, $str);
	return $str;
}

function gamaps_str_replace_tab_code( $str, $replace=' ' )
{
	return preg_replace("/\t/", $replace, $str);
}

function gamaps_str_replace_return_code( $str, $replace=' ' )
{
	$str = preg_replace("/\n/", $replace, $str);
	$str = preg_replace("/\r/", $replace, $str);
	return $str;
}

function gamaps_str_replace_html_space_code( $str, $replace=' ' )
{
	return preg_replace("/&nbsp;/i", $replace, $str);
}

function gamaps_str_replace_space_code( $str, $replace=' ' )
{
	return preg_replace("/[\x20]/", $replace, $str);
}

function gamaps_str_replace_continuous_space_code( $str, $replace=' ' )
{
	return preg_replace("/[\x20]+/", $replace, $str);
}

?>