<?php
if (!isset($gCms)) exit;

// Version 1.1
if( version_compare($oldversion,'1.1') < 0 )
{
	// Switch from post to precompile in order to make Smarty work
	$this->RemoveEventHandler('Core', 'SmartyPostCompile');
	$this->AddEventHandler('Core', 'SmartyPreCompile', false);
}



if( version_compare($oldversion,'1.4') < 0 )
{
	// Switch from the general SmartyPreCompile to dedicated StylesheetPreCompile
	$this->RemoveEventHandler('Core', 'SmartyPreCompile');
	$this->AddEventHandler('Core', 'StylesheetPreCompile', false);
}


if (version_compare($oldversion, '3.0') < 0)
{
	$this->RemoveEventHandler('Core', 'StylesheetPreCompile');
}


?>
