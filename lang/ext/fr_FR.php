<?php

$lang['cancel'] = 'Annuler';
$lang['css_preprocessor'] = 'Préprocesseur CSS';
$lang['choose_preprocessor'] = 'Choisissez le préprocesseur que vous souhaitez utiliser';
$lang['friendlyname'] = 'Préprocesseur CSS';
$lang['generate_sourcemap'] = 'Fichier sourcemap';
$lang['generate_sourcemap_label'] = 'Générer un source map, si le préprocesseur le supporte';
$lang['import_dirs'] = 'Répertoires contenant des fichiers LESS/SASS à inclure lors de la compilation - Relatif au répertoire racine du CMS - Liste séparée par des virgules';
$lang['minify'] = 'Minifier';
$lang['minify_label'] = 'Minifier le CSS';
$lang['note'] = 'Note :';
$lang['options'] = 'Options&nbsp;';
$lang['preferences'] = 'Préférences';
$lang['preferences_set'] = 'Préférences sauvegardées';
$lang['submit'] = 'Envoyer';
$lang['use_autoprefixer'] = 'Utiliser Autoprefixer (plus d\'infos sur <a href="https:#github.com/postcss/autoprefixer" target="_blank">https:#github.com/postcss/autoprefixer</a>) - Seulement si installé sur le serveur.';

$lang['help'] = <<<EOT
<h2>What does this do?</h2>
 <p>This module adds to the CMSMS Stylesheets / Design manager some CSS Preprocessors, in order to compile LESS or SASS languages (or other maybe later).</p>

 <h2>How does it work and integrate in CMSMS</h2>
 <p>
	This module uses the standard stylesheets of CMS Made Simple. It is launched after all the stylesheets have been combined, and it takes all the CSS content to give it to the Preprocessor of your choice.
 </p>
 <p>
		Keep in mind that this module processes the entire stylesheet after their combination. No matter if you use 1 or 10 stylesheets in your design, the preprocessor will only process it one time.
  </p>
  

<h2>How Do I Use It</h2>

<h3>CMSMS 2+</h3>
<ul>
	<li>
		Define your import directories, if you use it. For example, if you want to integrate Bootstrap, you can:
		<ol>
			<li>Put your Bootstrap LESS source files in assets/bootstrap/</li>
			<li>Type <strong><em>assets/bootstrap</em></strong> in the "Directories containing LESS/SASS files to include in compilation" - No slash at beginning or end</li>
      <li>Create one or more "custom" stylesheet in the Design Manager and link it to your design.</li>
		</ol>
	</li>
  <li>
		Same can be done for Foundation:
		<ol>
			<li>Put your Foundation SASS source files in assets/foundation/scss</li>
			<li>Type <strong><em>assets/foundation/scss</em></strong> in the "Directories containing LESS/SASS files to include in compilation" - No slash at beginning or end</li>
		</ol>
	</li>
	<li>Start using LESS / SASS code in your stylesheets!</li>
</ul>


<h2>Updating stylesheets</h2>
<p>
	If you make an update on a CMSMS stylesheet, everything is fine and the module will process the stylesheet again on the next page refresh.
</p>
<p>
	However, if you did make a change in your imported less files, the system will not perform any update - in this case, you must clear the cache or simply save your designmanager stylesheet to make the {cms_stylesheet} plugin process the css again.
</p>



<h2>Smarty support</h2>
<p>You can use Smarty tags with [[ and ]] - Smarty will be processed before the CSS PreProcessor.</p>

<h2>Using Sourcemaps</h2>
<p>
	Some preprocessors can create sourcemap files, in order to help you during integration. Don't forget to configure your browser to use that function. Note that only imported files will be mapped in the sourcemaps (this may change in a further version).<br>Don't forget to disable the sourcemaps for production.
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
EOT;
?>