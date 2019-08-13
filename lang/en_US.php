<?php


# C
$lang['cancel'] = 'Cancel';
$lang['css_preprocessor'] = 'CSS Preprocessor';
$lang['choose_preprocessor'] = 'Choose the preprocessor you want to use';


# F
$lang['friendlyname'] = 'CSS Preprocessor';


# G
$lang['generate_sourcemap'] = 'Source map';
$lang['generate_sourcemap_label'] = 'Generate a source map, if the PreProcessor supports it';


# H



# I
$lang['import_dirs'] = 'Directories containing LESS/SASS files to include in compilation - Relative to the <strong>root</strong> dir - Comma separated list';

# M
$lang['minify'] = 'Minify';
$lang['minify_label'] = 'Minify the CSS';

# N
$lang['note'] = 'Note:';


# O
$lang['options'] = 'Options';


# P
$lang['preferences'] = 'Preferences';
$lang['preferences_set'] = 'Preferences saved';




# S
$lang['submit'] = 'Submit';


# U
$lang['use_autoprefixer'] = 'Use PHP-Autoprefixer (more info: <a href="https://github.com/padaliyajay/php-autoprefixer" target="_blank">https://github.com/padaliyajay/php-autoprefixer</a>)';






$lang['help'] = <<<EOT
<h2>What does this do?</h2>
<p>This module adds to the CMSMS file-based stylesheets (CMSMS 2.3+) and/or DesignManager some CSS Preprocessors, in order to compile LESS or SASS languages (or other maybe later).</p>

<h2>How does it work and integrate in CMSMS</h2>
<p>
	This module is launched after all the stylesheets have been combined (through cms_stylesheet or cms_render_css), and it takes all the CSS content to give it to the Preprocessor of your choice.
</p>
<p>
	Keep in mind that this module processes the entire stylesheet after their combination. No matter if you use 1 or 10 stylesheets in your design, the preprocessor will only process it one time, and it will only process it when there's a change in one of the included stylesheet.
</p>


<h2>How Do I Use It</h2>
<ul>
	<li>
		Define your import directories, if you use it. For example, if you want to integrate Bootstrap, you can:
		<ol>
			<li>Put your Bootstrap SASS source files in assets/bootstrap/ (or maybe assets/themes/MyThemeName/scss/bootstrap if you are using the themes system)</li>
			<li>Type <strong><em>assets/bootstrap</em></strong> in the "Directories containing LESS/SASS files to include in compilation" - No slash at beginning or end</li>
      		<li>
      			Create one or more "custom" stylesheet in the Design Manager and link it to your design.
      			<br>
      			OR
      			<br>
      			Queue your various CSS in your template with {cms_queue_css file="assets/themes/MyThemeName/css/main-stylesheet.scss"}
      		</li>
      		<li>
      			Use {cms_stylesheet} or {cms_render_css} according to how you're working with stylesheets in CMS Made Simple. CSS Preprocessor works with both.
      		</li>
		</ol>
	</li>
  <li>
		Same can be done for Foundation:
		<ol>
			<li>Put your Foundation SASS source files in assets/foundation/scss</li>
			<li>Type <strong><em>assets/foundation/scss</em></strong> in the "Directories containing LESS/SASS files to include in compilation" - No slash at beginning or end</li>
			<li>
				Call the foundation mixins / rules in your main CSS file
			</li>
		</ol>
	</li>
	<li>Start using LESS / SASS code in your stylesheets!</li>
</ul>


<h2>Updating stylesheets</h2>
<p>
	If you make an update on a DesignManager or file-based stylesheet (queued with cms_queue_css), the module will process the stylesheet again on the next page refresh.
</p>
<p>
	However, if you did make a change in your imported less files, the system will not perform any update - in this case, you must clear the cache or simply save your designmanager stylesheet to make the {cms_stylesheet} plugin process the css again.
	<br>
	In CMSMS 2.3+ your can use {cms_render_css force=true} to combine and process the whole stylesheets on every page refresh (useful on development).
</p>


<h2>Smarty support</h2>
<p>As this module uses {cms_stylesheet} and/or {cms_render_css}, you can use Smarty tags with [[ and ]] - Smarty will be processed before the CSS PreProcessor.</p>

<h2>Using Sourcemaps</h2>
<p>
	Some preprocessors can create sourcemap files, in order to help you during integration. Don't forget to configure your browser to use that function. Note that only imported files will be mapped in the sourcemaps (this may change in a further version).<br>Don't forget to disable the sourcemaps for production.
</p>

<h2>Securing your scss source files</h2>
<p>
	In production, you should disable your .scss source files from being viewed in a browser. You may use an .htaccess rule for Apache, like this one:
	<br>
	<em>RedirectMatch 403 ^.*/assets/.*\.scss$</em>
	<br>
	You should comment this line in Development if you want to use Sourcemaps because your browser will try to open it in the inspector.
</p>

<h2>Deactivate the module</h2>
<p>
	If you don't want to use any of the preprocessors, please remove it or disable it in the Modules Manager - There are no "deactivate" function built in the module.
</p>

<h2>Preprocessor switch</h2>
<p>
	You may want to switch from one preprocessor to another - The module should clear the cache on preferences change so on the next page refresh in your browser the whole CSS will be preprocessed again.
</p>

<h2>Extend with another preprocessor</h2>
<p>
	You can create a new directory in the "preprocessors" directory, and create your own class - Check how the bundled preprocessors are integrated.
</p>
<p>Don't forget to <a href="mailto:contact@airelibre.net">email me</a> if you want your preprocessor to be added to the project!</p>

<h2>Support</h2>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<p>
	If you want to contact me: <a href="mailto:contact@airelibre.net">contact@airelibre.net</a>
</p>

<h2>Project on the web</h2>
<p>You can follow the project on : </p>
<ul>
	<li>GitHub: <a href="https:#github.com/airelibre/CSSPreprocessor" target="_blank">https:#github.com/airelibre/CSSPreprocessor</a></li>
	<li>CMSMS Forge: <a href="http:#dev.cmsmadesimple.org/projects/csspreprocessor" target="_blank">http:#dev.cmsmadesimple.org/projects/csspreprocessor</a></li>
</ul>

<h2>Copyright and License</h2>
<p>Copyright &copy; 2014-2017, Mathieu Muths <aireLibre> <a href="mailto:contact@airelibre.net">contact@airelibre.net</a> / <a href="https://www.airelibre.net" target="_blank">www.airelibre.net</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http:#www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>

<h3>Preprocessors copyright</h3>
<p>
	The author of this module does not own the preprocessors bundled with it - Please see every preprocessors source code / website to get informations about licence and copyright.
</p>
<p>I just wanted to thank all the developers that contribute to these preprocessors which are great tools for designers!</p>
<br>
<br>
<br>
EOT;







?>
