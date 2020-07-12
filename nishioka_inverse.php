<?php
// $Id: nishioka_inverse.php,v 1.2 2007/08/23 11:51:12 ohwada Exp $

// 2007-08-20 K.OHWADA
// check status

//================================================================
// Google Ajax Maps Module
// inverse Geocoder: <http://nishioka.sakura.ne.jp/>
// 2007-07-01 K.OHWADA
// ͭ����������
//================================================================

//----------------------------------------------------------------
// ��礻��ˡ
//   http://nishioka.sakura.ne.jp/google/ws.php?lon=137.243183&lat=35.091722&format=simple
//
// ��礻���
//   <geometry>
//   <version>0.1</version>
//   <point>
//   <lat>35.09491</lat>
//   <lon>137.229332</lon>
//   <address>���θ�˭�Ļ�����Į����253</address>
//   <pref>���θ�</pref>
//   <city>˭�Ļ�</city>
//   <town>����Į����</town>
//   <number>253</number>
//   <distance>1311.58281657</distance>
//   </point>
//   </geometry>
//
//  <Errors>
//  <Error>
//  <Code>1</Code> 
//  <Message>����ǡ����ϸ��Ĥ���ޤ���Ǥ���</Message> 
//  </Error>
//  </Errors>
//
//  <Errors>
//  <Error>
//  <Code>1</Code>
//  <Message>�����ϰϳ��Ǥ���... </Message>
//  </Error>
//  </Errors>
//----------------------------------------------------------------

$DEBUG = false;

include_once '../../mainfile.php' ;
include_once XOOPS_ROOT_PATH .'/class/snoopy.php' ;

$snoopy = new Snoopy;

// no result
$xml = <<<END_OF_TEXT
<?xml version="1.0" encoding="UTF-8" ?>
<Errors>
<Error>
<Code>1</Code>
<Message>No Response</Message>
</Error>
</Errors>
END_OF_TEXT;

// Akashi Muncipal Planetaruim: Akashi, Japan
$lat = 34.649334665716;
$lon = 135.0;
if ( isset($_GET['lon']) && isset($_GET['lat']) )
{
	$lon = floatval( $_GET['lon'] );
	$lat = floatval( $_GET['lat'] );
}

$url = "http://nishioka.sakura.ne.jp/google/ws.php".
	"?lon=". floatval( $lon ) .
	"&lat=". floatval( $lat ) .
	"&format=simple" .
	"&version=0.1";

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

if ( function_exists('mb_http_output') )
{
	mb_http_output('pass');
}

header('Content-type: application/xml;charset=utf-8');
echo $xml;
exit();

?>