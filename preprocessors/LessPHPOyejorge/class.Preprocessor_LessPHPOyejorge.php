<?php

class Preprocessor_LessPHPOyejorge extends Preprocessor {

	const FRIENDLY_NAME = 'LessPHP (Oyejorge)';
	const DESCRIPTION = 'A PHP / LESSCSS pre-processor';
	const AUTHOR = 'oyejorge - Josh Schmidt';
	const WEBSITE = 'https://github.com/oyejorge/less.php';
	const NOTE = 'Should support sourcemaps';
	const LOGO = 'logo.png';
	const PRIORITY = 50;
	
	
	// For LessPHPOyejorge
	public $parser;
	

	public function Load()
	{
		parent::Load();
		
		require_once(cms_join_path(__DIR__, 'Less', 'Autoloader.php'));
		Less_Autoloader::register();
		
		// Options
		$options['compress'] = $this->minify;
		
		if ($this->generate_sourcemap)
		{
			$options['sourceMap'] = true;
			$options['sourceMapWriteTo'] = $this->source_map_file;
			$options['sourceMapURL'] = $this->source_map_url;
			
			$config = cmsms()->GetConfig();
			$options['sourceMapBasepath'] = $config['root_path'];
		}
		
		$this->parser = new Less_Parser($options);
		
		// Import dirs
		$this->parser->SetImportDirs($this->import_dirs);
	}
	
	// Note : $css is passed by reference - no need to return
	public function CompileCSS(&$css='')
	{
		try {
			$this->parser->parse($css);
			$css = $this->parser->getCss();
		}
		catch (exception $e) {
			$error_message = $e->getMessage();
			debug_to_log($error_message);
		}
		
		return true;
	}

}




?>