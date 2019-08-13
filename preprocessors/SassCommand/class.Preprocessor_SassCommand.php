<?php

class Preprocessor_SassCommand extends Preprocessor {

	const FRIENDLY_NAME = 'Sass compiler from command line (<em>no longer supported</em>)';
	const DESCRIPTION = 'The official command line SASS compilator';
	const AUTHOR = 'Core SASS team';
	const WEBSITE = 'https://sass-lang.com/ruby-sass';
	const NOTE = 'Uses Ruby Sass which is <strong>no longer supported</strong>. Will be removed in a future version. Better use Dart Sass now or ScssPHP - check the official website for more informations';
	const LOGO = 'logo.png';
	//const SOURCEMAPFILE = 'csspreprocessor_out.css.map';
	const PRIORITY = 15;



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