<?php

require_once(cms_join_path(__DIR__, 'scssphp', 'scss.inc.php'));
use Leafo\ScssPhp\Compiler;

class Preprocessor_ScssPHP extends Preprocessor {

	const FRIENDLY_NAME = 'ScssPHP';
	const DESCRIPTION = 'A PHP / SASS pre-processor';
	const AUTHOR = 'Leaf';
	const WEBSITE = 'http://leafo.github.io/scssphp/';
	const NOTE = 'Does not support sourcemaps and autoprefixer. Useful if sass is not installed on your server';
	const LOGO = 'logo.png';


	public $parser;


	public function Load()
	{
		parent::Load();


		$this->parser = new Compiler();

		// Options
		if ($this->minify)
			$this->parser->setFormatter('Leafo\ScssPhp\Formatter\Crunched');

		// Import dirs
		$this->parser->setImportPaths($this->import_dirs);
	}

	// Note : $css is passed by reference - no need to return
	public function CompileCSS(&$css='')
	{
		try {
			$css = $this->parser->compile($css);
		}
		catch (exception $e) {
			$error_message = $e->getMessage();
			debug_to_log($error_message);
		}

		return true;
	}

}




?>
