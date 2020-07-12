<?php
// $Id: index.php,v 1.3 2008/02/24 03:24:50 ohwada Exp $

// 2007-07-20 K.OHWADA
// divid to location.php

//=========================================================
// Google Ajax Maps Module
// 2007-07-01 K.OHWADA
//=========================================================

include '../../../include/cp_header.php';

$XOOPS_LANGUAGE = $xoopsConfig['language'];
if ( file_exists(XOOPS_ROOT_PATH.'/modules/gamaps/language/'.$XOOPS_LANGUAGE.'/modinfo.php') ) 
{
	include_once XOOPS_ROOT_PATH.'/modules/gamaps/language/'.$XOOPS_LANGUAGE.'/modinfo.php';
}
else
{
	include_once XOOPS_ROOT_PATH.'/modules/gamaps/language/english/modinfo.php';
}

// --- main start ---
xoops_cp_header();
$url_pref = XOOPS_URL.'/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod='.$xoopsModule->getVar('mid');
$url_mod = XOOPS_URL.'/modules/gamaps/index.php';

?>
<h3><?php echo $xoopsModule->getVar('name'); ?></h3>
<?php echo _MI_GAMAPS_DESC; ?><br /><br />
<ul>
<li><a href="<?php echo $url_pref; ?>"><?php echo _PREFERENCES; ?></a><br /><br /></li>
<li><a href="location.php"><?php echo _AM_GAMAPS_TITLE_LOCATION; ?></a><br /><br /></li>
<li><a href="view_kml.php" target="_blank"><?php echo _AM_GAMAPS_TITLE_KML; ?></a><br /><br /></li>
<li><a href="<?php echo $url_mod; ?>"><?php echo _AM_GAMAPS_GOTO_MODULE; ?></a></li>
</ul><br />
<hr />
<div style="text-align: right; font-size: 80%;">
<a href="http://linux2.ohwada.net/" target="_blank">
Powered by Happy Linux
</a><br />
&copy; 2007, Kenichi OHWADA<br />
</div>
<?php

xoops_cp_footer();
exit();
// --- main end ---


?>