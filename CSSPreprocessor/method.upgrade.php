<?php
if (!isset($gCms)) exit;

// Version 1.1
if( version_compare($oldversion,'1.1') < 0 ) 
{
	// Switch from post to precompile in order to make Smarty work
	$this->AddEventHandler('Core', 'SmartyPreCompile', false);
	$this->RemoveEventHandler('Core', 'SmartyPostCompile', false);
}




?>
