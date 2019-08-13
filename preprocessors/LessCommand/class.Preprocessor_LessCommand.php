<?php

class Preprocessor_LessCommand extends Preprocessor {

	const FRIENDLY_NAME = 'Less compiler from command line';
	const DESCRIPTION = 'The official command line LESS compilator';
	const AUTHOR = 'Core LESS team';
	const WEBSITE = 'http://lesscss.org';
	const NOTE = 'Fast, but you NEED the lessc command line tool (v. 1.7 or newer) installed on your server to use it - check the official website for more informations. Supports sourcemaps';
	const LOGO = 'logo.png';
	const PRIORITY = 55;



	// Note : $css is passed by reference - no need to return
	public function CompileCSS(&$css='')
	{
		// Put in a cache file
		$file = cms_join_path(TMP_CACHE_LOCATION, 'csspreprocessor.css');
		file_put_contents($file, $css);

		$file_output = cms_join_path(TMP_CACHE_LOCATION, 'csspreprocessor_out.css');

		// EXEC **************************************
		// Compile
		$command = 'lessc ';

 		/*if ($this->minify)
 		{
 			//$command .= '-x --clean-css '; // note: clean-css does not work with source maps
 			$command .= '-x ';
		}*/

		// Sourcemap
		if ($this->generate_sourcemap)
		{
			$config = cmsms()->GetConfig();

			$command .= '--source-map=' . $this->source_map_file . ' --source-map-url=' . $this->source_map_url . ' --source-map-basepath=' . $config['root_path'] . ' --source-map-rootpath=' . $config['root_url'] . ' ';
		}

		if (!empty($this->import_dirs))
		{
			// Check if we are on Linux or Windows - need testing
			// See http://lesscss.org/usage/#command-line-usage-include-paths
			$phpos = strtolower(PHP_OS);
			$separator= ':';
			if (strpos($phpos, 'win'))
				$separator= ';';

			$command .= ' --include-path=' . implode($separator, $this->import_dirs);
		}

		
		$command .= ' ' . $file . ' ' .$file_output;

		// Ask for command to system
		$result = exec($command);

		if (!empty($result))
			debug_to_log('CSSPreprocessor: ' . $result);

		$css = file_get_contents($file_output);

		// Remove cache file
		//unlink($file);

		return true;
	}


}




?>
