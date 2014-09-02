<?php


// C
$lang['cancel'] = 'Cancel';
$lang['css_preprocessor'] = 'CSS Preprocessor';
$lang['choose_preprocessor'] = 'Choose the preprocessor you want to use:';


// F
$lang['friendlyname'] = 'CSS Preprocessor';


// G
$lang['generate_sourcemap'] = 'Source map';
$lang['generate_sourcemap_label'] = 'Generate a source map, if the PreProcessor supports it';


// H
$lang['help'] = <<<EOT
<h2>What does this do?</h2>
 <p>This module adds to the CMSMS Stylesheets / Design manager some CSS Preprocessors, in order to compile LESS (or other maybe later) code</p>
 
 <h2>How does it work and integrate in CMSMS</h2>
 <p>
	This module uses the standard stylesheets of CMS Made Simple. It is launched after all the stylesheets have been combined, and it takes all the CSS content to give it to the Preprocessor of your choice.
 </p>
 <p>
		Keep in mind that this module processes the entire stylesheet after their combination. No matter if you use 1 or 10 stylesheets in your design, the preprocessor will only get one string.
 </p>

<h2>How Do I Use It</h2>
<ul>
	<li>Use the "combine" option (default in {cms_stylesheet})</li>
	<li>In order to recognize which template is a stylesheet, you MUST put that string in one of your stylesheets: <strong>@@CSSPreprocessor@@</strong> - I suggest putting it in a simple comment</li>
	<li>
		Define your import directories, if you use it. For exemple, if you want to integrate Bootstrap, you can :
		<ol>
			<li>Put your Bootstrap LESS source files in uploads/bootstrap/</li>
			<li>Type <strong><em>bootstrap</em></strong> in the "Directories containing LESS files to include in compilation" - No slash at beginning or end</li>
		</ol>
	</li>
	<li>Start using LESS code in your stylesheets!</li>
</ul>

<h2>Updating stylesheets</h2>
<p>
	If you make an update on a CMSMS stylesheet, everything is fine and the module will process the stylesheet again on the next page refresh.
</p>
<p>
	However, if you did make a change in your imported less files, the system will not perform any update - in this case, you must clear the cache or simply remove the stylesheet from the cache directory.
</p>

<h2>Example: using Bootstrap</h2>
<p>This is a proposal on how to use and compile Bootstrap for CMS Made Simple with the CSSPreprocessor module :</p>
<ol>
	<li>Put the Bootstrap LESS files in <strong>uploads/bootstrap/</strong></li>
	<li>Create a new stylesheet in CMSMS called something like <strong><em>Bootstrap :: main</em></strong></li>
	<li>In that new stylesheet, copy all the content from bootstrap/bootstrap.less - This file is only a list of file import, but it's nice to have it in CMSMS because you can easily comment out the files you don't need</li>
	<li>In the CSSPreprocessor module preferences, add <strong>bootstrap</strong> to the import directories</li>
	<li>Create a new stylesheet called something like <strong><em>Custom :: main</em></strong></li>
	<li>Put the string <strong>@@CSSPreprocessor@@</strong> at the top</li>
	<li>You can now use that file to define your custom variables, override Bootstrap variables, create your styles, ... Or your can create as much stylesheets as you want</li>
	<li>Don't forget to link your stylesheets to your templates (cmsms < 2.0) or designs (cmsms =< 2.0) - You should maybe put the Bootstrap :: main file at the top, before other stylesheets</li>
</ol>
<p>
	Now you can simply change the grid or whatever you want in your custom files, because the preprocessors doesn't care of the order of the code - Putting <strong>@grid-columns: 12;</strong> in your custom stylesheets will work!
</p>



<h2>Smarty support</h2>
<p>For the moment, due to the place where the module is plugged in, there is no Smarty functions/variables support in the Stylesheet - Please use LESS variables - I hope this could be fixed soon.</p>

<h2>Using Sourcemaps</h2>
<p>
	Some preprocessors can create sourcemap files, in order to help you during integration. Don't forget to configure your browser to use that function. Note that only imported files will be mapped in the sourcemaps (this may change in a further version).
</p>

<h2>Deactivate the module</h2>
<p>
	If you don't want to use any of the preprocessors, please remove it or disable it in the Modules Manager - There are no "deactivate" function built in the module.
</p>

<h2>Preprocessor switch</h2>
<p>
	You may want to switch from one preprocessor to another - Don't forget to clear your cache after that because the module will not do it.
</p>

<h2>Extend with another preprocessor</h2>
<p>
	You can create a new directory in the "preprocessors" directory, and create your own class - Check how the bundled preprocessors are integrated.
</p>
<p>Don't forget to <a href="mailto:contact@airelibre.fr">email me</a> if you want your preprocessor to be added to the project!</p>

<h2>Support</h2>
	<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
	<p>
		If you want to contact me: <a href="mailto:contact@airelibre.fr">contact@airelibre.fr</a>
	</p>

<h2>Copyright and License</h2>
	<p>Copyright &copy; 2014, AireLibre <a href="mailto:contact@airelibre.fr">contact@airelibre.fr</a> / <a href="http://www.airelibre.fr" target="_blank">www.airelibre.fr</a>. All Rights Are Reserved.</p>
	<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>
	
	<h3>Preprocessors copyright</h3>
	<p>
		The author of this module does not own the preprocessors bundled with it - Please see every preprocessors source code / website to get informations about licence and copyright.
	</p>
	<p>I just wanted to thank all the developers that contribute to these preprocessors which are great tools for designers!</p>
EOT;


// I
$lang['import_dirs'] = 'Directories containing LESS files to include in compilation - Relative to the <strong>uploads/</strong> dir - Comma separated list';

// M
$lang['minify'] = 'Minify';
$lang['minify_label'] = 'Minify the CSS - Note: if allowed by the pre-processor ';

// N
$lang['note'] = 'Note:';


// O
$lang['options'] = 'Options';


// P
$lang['preferences'] = 'Preferences';
$lang['preferences_set'] = 'Preferences saved<br>Please clear your website cache in order to re-process the CSS';




// S
$lang['submit'] = 'Submit';

?>