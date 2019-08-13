<?php

if (!isset($gCms)) exit;
if (!$this->VisibleToAdminUser()) return;



if (isset($params['submit']))
{
	$this->SetPreference('preprocessor', $params['preprocessor']);
	$this->SetPreference('import_dirs', $params['import_dirs']);
	$this->SetPreference('minify', $params['minify']);
	$this->SetPreference('generate_sourcemap', $params['generate_sourcemap']);
	
	// Autoprefixer
	$this->SetPreference('use_autoprefixer', $params['use_autoprefixer']);


	cmsms()->clear_cached_files(-1);
  // put mention into the admin log
  audit('CSSPreprocessor', 'System maintenance', 'Cache cleared after CSSPreprocessor preferences change');
	
	$this->ShowMessage($this->Lang('preferences_set'));
}





// Retrieve the available preprocessors in the directory "preprocessors"
$preprocessors = array();

$root = cms_join_path($this->GetModulePath(), 'preprocessors');
$search = cms_join_path($root, '*');
$dirs = glob($search, GLOB_ONLYDIR);

if ($dirs)
{
	foreach ($dirs as $one)
	{
		$preprocessor = basename($one);
		
		// Search info : name, logo, ...
		$class_name = 'Preprocessor_'.$preprocessor;
		require_once(cms_join_path($root, $preprocessor, 'class.'.$class_name.'.php'));
		
		$obj = new stdClass;
		$obj->dir = $preprocessor;
		$obj->friendly_name = $class_name::FRIENDLY_NAME;
		$obj->description = $class_name::DESCRIPTION;
		$obj->author = $class_name::AUTHOR;
		$obj->website = $class_name::WEBSITE;
		
		$logo = $class_name::LOGO;
		if (!empty($logo))
			$obj->logo = $logo;
		
		$note = $class_name::NOTE;
		if (!empty($note))
			$obj->note = $note;
		
		$preprocessors[$class_name::PRIORITY] = $obj;
	}
	// Order by priority
	ksort($preprocessors);
	
	$assign['preprocessors'] = $preprocessors;
}

// Current preprocessor
$assign['current_preprocessor'] = $this->GetPreference('preprocessor', 'ILess');
$assign['import_dirs'] = $this->GetPreference('import_dirs', '');
$assign['minify'] =  $this->GetPreference('minify', 0);
$assign['generate_sourcemap'] =  $this->GetPreference('generate_sourcemap', 0);

// Autoprefixer
$assign['use_autoprefixer'] =  $this->GetPreference('use_autoprefixer', 0);



// CMSMS 1.11 compatibility
$assign['mod'] = $this;
$assign['form_start'] = $this->CreateFormStart($id, 'defaultadmin');
$assign['form_end'] = $this->CreateFormEnd();

cmsms()->GetSmarty()->assign($assign);

echo $this->ProcessTemplate('preferences.tpl');


?>