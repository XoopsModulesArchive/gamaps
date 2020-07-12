<?php
// $Id: tokyo_univ_geocode.php,v 1.2 2007/08/23 11:51:12 ohwada Exp $

// 2007-08-20 K.OHWADA
// check status
// urlencode

//=========================================================
// Google Ajax Maps Module
// Geocode: <http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/>
// 2007-07-01 K.OHWADA
// 有朋自遠方来
//=========================================================

//----------------------------------------------------------------
// CSISシンプルジオコーディング実験 参加規約
//   http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/modules/simple-geocode1/index.php?id=2
//
// 問合せ方法
//   http://geocode.csis.u-tokyo.ac.jp/cgi-bin/simple_geocode.cgi?addr=<住所>[オプションパラメータ...]
//   addr:    住所
//   charset: x-euc-jp, Shift_JIS, ISO-2022-JP, UTF8 ,[デフォルト自動]
//   geosys:  tokyo(日本測地系), [world](世界測地系)
//   series:  [ADDRESS](住所), STATION(駅名), PLACE(地名), FACILITY(公共施設)
//   constraint: 絞り込みたい地名の文字列、[省略時は全ての結果を返す]
//
// 問合せ結果
//   <results>
//   <query>大手町</query>
//   <geodetic>wgs1984</geodetic>
//   <iConf>2</iConf>
//   <converted>大手町</converted>
//   <candidate>
//     <address>北海道/函館市/大手町</address>
//     <longitude>140.725098</longitude>
//     <latitude>41.769379</latitude>
//     <iLvl>5</iLvl>
//   </candidate>
//   <candidate>
//     <address>岩手県/一関市/大手町</address>
//     <longitude>141.135269</longitude>
//     <latitude>38.928810</latitude>
//     <iLvl>5</iLvl>
//   </candidate>
//   </results>
//
// 問合せ文字列が不適切なとき
//   <title>500 Internal Server Error</title>
//----------------------------------------------------------------

$DEBUG = false;

include_once '../../mainfile.php' ;
include_once XOOPS_ROOT_PATH .'/class/snoopy.php' ;

$snoopy =  new Snoopy;

// null result
$xml = <<<END_OF_TEXT
<?xml version="1.0" encoding="UTF-8" ?>
<Errors>
<Error>
<Code>1</Code>
<Message>No Response</Message>
</Error>
</Errors>
END_OF_TEXT;

$query = null;
if ( isset($_GET['query']) )
{
	$query = $_GET['query'];
	if ( get_magic_quotes_gpc() ) 
	{
		$query = stripslashes( $query );
	}
}

if ( $query )
{
	$url = "http://geocode.csis.u-tokyo.ac.jp/cgi-bin/simple_geocode.cgi".
	"?addr=". urlencode( $query ) .
	"&charset=UTF8".
	"&geosys=world".
	"&series=ADDRESS";

	if ( $snoopy->fetch( $url ) )
	{
// check status
		if ( $snoopy->status == 200 ) {
			$xml = $snoopy->results;
		} elseif ( $DEBUG ) {
			$xml  = $snoopy->results;
			$xml .= '<status>'. $snoopy->status. '</status>';
		}
	}
}

if ( function_exists('mb_http_output') )
{
	mb_http_output('pass');
}

header('Content-type: application/xml;charset=utf-8');
echo $xml;
exit();

?>