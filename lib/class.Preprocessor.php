<?php

class Preprocessor {

	const LOGO = '';

	const SOURCEMAPFILE = 'sourcemap.map';

	public $import_dirs;
	public $minify;

	public $generate_sourcemap;
	public $source_map_file='';
	public $source_map_url='';

	public $use_autoprefixer = 0;
	public $autoprefixer_browsers = '';


	// Load import dirs
	public function Load()
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
			$this->source_map_file = cms_join_path(TMP_CACHE_LOCATION, self::SOURCEMAPFILE);
			$this->source_map_url = $config['css_url'] . self::SOURCEMAPFILE;
		}
		// End sourcemap
		// ***************************************************************************************************

		// ***************************************************************************************************
		// Autoprefixer ?
		$this->use_autoprefixer = $mod->GetPreference('use_autoprefixer', 0);
		$this->autoprefixer_browsers = $mod->GetPreference('autoprefixer_browsers', '');
		// End Autoprefixer
		// ***************************************************************************************************
	}





	// Needs to be overridden by the subclasses
	public function CompileCSS(&$css='')
	{
		return true;
	}





	// From : http://code.seebz.net/p/minify-css/
	// Thanks
	public function MinifyCSS(&$css='')
	{
		$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);

		$css = str_replace(array("\r","\n"), '', $css);
		$css = preg_replace('`([^*/])\/\*([^*]|[*](?!/)){5,}\*\/([^*/])`Us', '$1$3', $css);
		$css = preg_replace('`\s*({|}|,|:|;)\s*`', '$1', $css);
		$css = str_replace(';}', '}', $css);
		$css = preg_replace('`(?=|})[^{}]+{}`', '', $css);
		$css = preg_replace('`[\s]+`', ' ', $css);

		// Test
		//$css = '/*Mini*/'.$css;

		if ($this->generate_sourcemap && $this->source_map_url)
		{
			// And add sourcemap because minify removes comments
			$css = $css . "/*# sourceMappingURL=" . $this->source_map_url . " */";
		}
	}

}





?>
