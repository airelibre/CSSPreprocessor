<?php

class Preprocessor {

	const LOGO = '';

	const SOURCEMAPFILE = 'sourcemap.map';

	// Priority in the order of appearance on the admin panel
	const PRIORITY = 100;

	public $import_dirs;
	public $minify;

	public $generate_sourcemap;
	public $source_map_file='';
	public $source_map_url='';

	// Load import dirs
	public function load()
	{
		$mod = cms_utils::get_module('CSSPreprocessor');
		$config = cmsms()->GetConfig();

		// ***************************************************************************************************
		// Import dirs, if any
		$import_dirs = $mod->GetPreference('import_dirs', '');
		$import_dirs_array = array();
		if (!empty($import_dirs))
		{
			// array
			$tmp = explode(',', $import_dirs);

			foreach ($tmp as $one)
			{
				// Note: some preprocessors need the key to be the path (Less.php by oyejorge)
				$dir = cms_join_path($config['root_path'], trim($one));
				$import_dirs_array[] = $dir;
			}
		}
		$this->import_dirs = $import_dirs_array;
		// End import dirs
		// ***************************************************************************************************




		// ***************************************************************************************************
		// Minify ?
		$this->minify = $mod->GetPreference('minify', 0);
		// End minify
		// ***************************************************************************************************




		// ***************************************************************************************************
		// Generate sourcemap ?
		$this->generate_sourcemap = $mod->GetPreference('generate_sourcemap', 0);

		if ($this->generate_sourcemap)
		{
			$this->source_map_file = cms_join_path(TMP_CACHE_LOCATION, static::SOURCEMAPFILE);
			$this->source_map_url = $config['css_url'] . '/' . static::SOURCEMAPFILE;
		}
		// End sourcemap
		// ***************************************************************************************************

	}





	// Needs to be overridden by the subclasses
	public function compileCSS(&$css='')
	{
		return true;
	}





	// From : http://code.seebz.net/p/minify-css/
	// Thanks
	public function minifyCSS(&$css='')
	{
		$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
		$css = str_replace(array("\r","\n"), '', $css);
		$css = preg_replace('`([^*/])\/\*([^*]|[*](?!/)){5,}\*\/([^*/])`Us', '$1$3', $css);
		$css = preg_replace('`\s*({|}|,|:|;)\s*`', '$1', $css);
		$css = str_replace(';}', '}', $css);
		$css = preg_replace('`(?=|})[^{}]+{}`', '', $css);
		$css = preg_replace('`[\s]+`', ' ', $css);
	}

}