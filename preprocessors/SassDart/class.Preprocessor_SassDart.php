<?php

class Preprocessor_SassDart extends Preprocessor {

	const FRIENDLY_NAME = 'Sass compiler from command line (Dart)';
	const DESCRIPTION = 'The official command line SASS compilator';
	const AUTHOR = 'Core SASS team';
	const WEBSITE = 'https://sass-lang.com/dart-sass';
	const NOTE = 'Primary implementation of Sass. You NEED the Dart-Sass command line tool installed on your server to use it - check the official website for more informations. Supports sourcemaps';
	const LOGO = 'logo.png';
	const SOURCEMAPFILE = 'csspreprocessor_out.css.map';
    const PRIORITY = 10;



	// Note : $css is passed by reference - no need to return
	public function CompileCSS(&$css='')
	{
		// Put in a cache file
		$file = cms_join_path(TMP_CACHE_LOCATION, 'csspreprocessor.scss');
		file_put_contents($file, $css);

		//debug_to_log('Write CSS file' . $css);

		$file_output = cms_join_path(TMP_CACHE_LOCATION, 'csspreprocessor_out.css');

		// EXEC **************************************
		// Compile
        $command = 'sass ';

 		if ($this->minify) {
            $command .= '--style=compressed ';
		}

        // NO Sourcemap ?
        if (!$this->generate_sourcemap) {
            $command .= '--no-source-map ';
        }

        if (!empty($this->import_dirs)) {
            $separator = ',';
            $command .= '--load-path=' . implode($separator, $this->import_dirs);
        }

        $command .= ' ' . $file . ' ' .$file_output;

		// Ask for command to system
        debug_to_log($command);
		$result = exec($command);

		if (!empty($result)) {
			debug_to_log('CSSPreprocessor: ' . $result);
        }
		$css = file_get_contents($file_output);

        // Force the sourcemap URL, because the sass CLI tool doesn't know anything about the final cached css filename (something like cms_82cb....css)
        if ($this->generate_sourcemap && $this->source_map_url)
        {
            $css .= "/*# sourceMappingURL=" . $this->source_map_url . " */";
        }

		// Remove temp files
        if (!$this->generate_sourcemap) {
        // Do not remove the tmp source file for development to allow for the browser inspector to get it
		  @unlink($file);
        }
		@unlink($file_output);

		return true;
	}
}