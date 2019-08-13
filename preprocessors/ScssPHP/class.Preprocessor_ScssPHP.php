<?php

require_once(cms_join_path(__DIR__, 'scssphp', 'scss.inc.php'));
use ScssPhp\ScssPhp\Compiler;

class Preprocessor_ScssPHP extends Preprocessor {

	const FRIENDLY_NAME = 'ScssPHP';
	const DESCRIPTION = 'A PHP / SASS pre-processor';
	const AUTHOR = 'Leaf';
	const WEBSITE = 'http://leafo.github.io/scssphp/';
	const NOTE = 'Quite as fast as Sass from command line, supports sourcemaps';
	const LOGO = 'logo.png';
	const PRIORITY = 5;


	public $parser;


	public function Load()
	{
		parent::Load();
		$this->parser = new Compiler();

		// Options
		if ($this->minify) {
			$this->parser->setFormatter('ScssPhp\ScssPhp\Formatter\Crunched');
		}

		if ($this->generate_sourcemap) {
			$config = \cms_config::get_instance();

			// Retrieve the subdir, if any - needed for the sourcemap.map file
			list($foo, $tmp) = explode('//', $config['root_url']);
			$tmp = explode('/', $tmp);
			// Remove the first (it's the domain)
			$basePath = '';
			if (isset($tmp[1])) {
				unset($tmp[0]);
				$basePath = implode('/', $tmp);
			}

			$this->parser->setSourceMap(Compiler::SOURCE_MAP_FILE);
			$this->parser->setSourceMapOptions([
			    // absolute path to write .map file
			    // 'sourceMapWriteTo'  => cms_join_path($config['tmp_cache_location'], 'sourcemap.map'),
			    'sourceMapWriteTo'  => $this->source_map_file,

			    // relative or full url to the above .map file
			    // 'sourceMapURL'      => $config['public_cache_url'] . '/sourcemap.map',
			    'sourceMapURL'      => $this->source_map_url,

			    // (optional) relative or full url to the .css file
			    //'sourceMapFilename' => 'sourcemap.map',

			    // partial path (server root) removed (normalized) to create a relative url
			    'sourceMapBasepath' => $config['root_path'],

			    // subdirs, if any
			    'sourceMapRootpath' => cms_join_path($basePath, ''),

			    // (optional) prepended to 'source' field entries for relocating source files
			    'sourceRoot'        => '/',
			]);
		}

		// Import dirs
		$this->parser->setImportPaths($this->import_dirs);
	}

	// Note : $css is passed by reference for cms_stylesheet, but needss return for cms_render_css
	public function CompileCSS(&$css='')
	{
		try {
			// Using the second param to correct a bug: https://github.com/leafo/scssphp/issues/677
			$css = $this->parser->compile($css, '/');
		}
		catch (exception $e) {
			$error_message = $e->getMessage();
			debug_to_log($error_message);
		}

		return true;
	}

}