<?php
/*
*		LAYOUT SETUP  - Copyright JoomSpirit 2009
*/
// no direct access
defined('_JEXEC') or die('Restricted access');
$topmodules = 0;
if ($this->countModules('user1')) $topmodules++;
if ($this->countModules('user2')) $topmodules++;
if ($topmodules == 2)
{
$user_top_width = '45%';
}
else if ($topmodules == 1) 
{
$user_top_width = '100%';
}
$bottommodules = 0;
if ($this->countModules('user4')) $bottommodules++;
if ($this->countModules('user5')) $bottommodules++;
if ($bottommodules == 2)
{
$user_bottom_width = '45%';
}
else if ($bottommodules == 1) 
{
$user_bottom_width = '100%';
}
$copy='<div style="position:absolute;top:0;left:-9999px;"><a href="http://www.joomspirit.com" title="joomla template 1.6">joomla template 1.6</a></div>';
?>