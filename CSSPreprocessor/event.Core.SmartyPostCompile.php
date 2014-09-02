<?php
if( !isset($gCms) ) exit;


$content = &$params['content'];


if (strpos($content, '@@CSSPreprocessor@@') !== false)
{
	
	// CSSPreprocessor load and compile
	$processor = $this->GetPreprocessor();
	
	$processor->CompileCSS($content);
	
	if ($this->minify)
		$processor->MinifyCSS($content);
}







?>