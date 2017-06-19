<?php

class Preprocessor_SassCommand extends Preprocessor {

	const FRIENDLY_NAME = 'Sass compiler from command line';
	const DESCRIPTION = 'The official command line SASS compilator';
	const AUTHOR = 'Core SASS team';
	const WEBSITE = 'http://www.sass-lang.com';
	const NOTE = 'Fast, but you NEED the sass command line tool installed on your server to use it - check the official website for more informations';
	const LOGO = 'logo.png';

	const SOURCEMAPFILE = 'csspreprocessor_out.css.map';



	// Note : $css is passed by reference - no need to return
	public function CompileCSS(&$css='')
	{
		// Put in a cache file
		$file = cms_join_path(TMP_CACHE_LOCATION, 'csspreprocessor.scss');
		file_put_contents($file, $css);

		debug_to_log('Write CSS file' . $css);

		$file_output = cms_join_path(TMP_CACHE_LOCATION, 'csspreprocessor_out.css');

		// EXEC **************************************
		// Compile
		$command = 'sass -l -E "UTF-8" '; // -l with line numbers

 		if ($this->minify)
 		{
 			$command .= '--style compressed ';
		}

		// Sourcemap
		if ($this->generate_sourcemap)
			$command .= '--sourcemap=auto ';
		else
			$command .= '--sourcemap=none ';


		if (!empty($this->import_dirs))
		{
			$config = cmsms()->GetConfig();
			$separator = ',';

			$command .= '--load-path ' . implode($separator, $this->import_dirs);
		}

		$command .= ' ' . $file . ' ' .$file_output;

		// Ask for command to system
		$result = exec($command);

		if (!empty($result))
			debug_to_log('CSSPreprocessor: ' . $result);

		$css = file_get_contents($file_output);


		// Remove temp files
		@unlink($file);
		@unlink($file_output);

		return true;
	}


}




?>
