<?php
if( !isset($gCms) ) exit;


$content = &$params['stylesheet'];
$search_string = '@@CSSPreprocessor@@';

if (strpos($content, $search_string) !== false)
{

	// Prevent from loops (smarty fetch launches this precompile function in a loop
	$content = str_replace($search_string, '', $content);

	// We need to compile smarty before the CSSPreprocessor, since the preprocessor will not understand [[ ]] code
	$content = $this->FetchSmarty($content);



	// CSSPreprocessor load and compile
	$processor = $this->GetPreprocessor();

	if ($processor)
		$processor->CompileCSS($content);

	// Minify
	if ($this->minify)
		$processor->MinifyCSS($content);
}







?>
