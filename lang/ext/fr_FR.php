<?php
$lang['autoprefixer_browsers'] = 'Liste des navigateurs à passer en paramètre au plugin Autoprefixer - Consultez : <a href="https://github.com/postcss/autoprefixer#browsers" target="_blank">https://github.com/postcss/autoprefixer#browsers</a>';
$lang['cancel'] = 'Annuler';
$lang['css_preprocessor'] = 'Préprocesseur CSS';
$lang['choose_preprocessor'] = 'Choisissez le préprocesseur que vous souhaitez utiliser';
$lang['friendlyname'] = 'Préprocesseur CSS';
$lang['generate_sourcemap'] = 'Fichier sourcemap';
$lang['generate_sourcemap_label'] = 'Générer un source map, si le préprocesseur le supporte';
$lang['import_dirs'] = 'Répertoires contenant des fichiers LESS à inclure lors de la compilation - Relatif au répertoire racine du CMS - Liste séparée par des virgules';
$lang['minify'] = 'Minifier';
$lang['minify_label'] = 'Minifier le CSS';
$lang['note'] = 'Note :';
$lang['options'] = 'Options&nbsp;';
$lang['preferences'] = 'Préférences';
$lang['preferences_set'] = 'Préférences sauvegardées<br>Veuillez vider le cache du CMS pour re-générer les CSS';
$lang['submit'] = 'Envoyer';
$lang['use_autoprefixer'] = 'Utiliser Autoprefixer (plus d\'infos sur <a href="https:#github.com/postcss/autoprefixer" target="_blank">https:#github.com/postcss/autoprefixer</a>) - Seulement si installé sur le serveur et si le préprocesseur sélectionné le permet.';
$lang['help'] = '<h2>What does this do?</h2>
 <p>This module adds to the CMSMS Stylesheets / Design manager some CSS Preprocessors, in order to compile LESS or SASS languages (or other maybe later).</p>

 <h2>How does it work and integrate in CMSMS</h2>
 <p>
	This module uses the standard stylesheets of CMS Made Simple. It is launched after all the stylesheets have been combined, and it takes all the CSS content to give it to the Preprocessor of your choice.
 </p>
 <p>
		<strong>For CMSMS 1.12</strong> : Keep in mind that this module processes the entire stylesheet after their combination. No matter if you use 1 or 10 stylesheets in your design, the preprocessor will only get one string.
  </p>
  <p>
    <strong>For CMSMS 2+</strong> : the new {cms_stylesheet} has a different behaviour. Every stylesheet is processed seperately, and the CSSPreprocessor module will not work if you have more than 1 LESS / SASS Stylessheet in the design. You will not be able to define a variable in one stylesheet, and then use it in another one.<br>
    <strong>Solution:</strong> : put your LESS / SASS code in files and link the main file with the module through the "import dirs" parameter.
 </p>

<h2>How Do I Use It</h2>
<h3>CMSMS 1.12</h3>
<ul>
	<li>Use the "combine" option (default in {cms_stylesheet})</li>
	<li>In order to recognize which template is a stylesheet, you MUST put that string in one of your stylesheets: <strong>@@CSSPreprocessor@@</strong> - I suggest putting it in a simple comment</li>
	<li>
		Define your import directories, if you use it. For exemple, if you want to integrate Bootstrap, you can :
		<ol>
			<li>Put your Bootstrap LESS source files in uploads/bootstrap/</li>
			<li>Type <strong><em>uploads/bootstrap</em></strong> in the "Directories containing LESS/SASS files to include in compilation" - No slash at beginning or end</li>
		</ol>
	</li>
	<li>Start using LESS code in your stylesheets!</li>
</ul>

<h3>CMSMS 2+</h3>
<ul>
	<li>In order to recognize which template is a stylesheet, you MUST put that string in one of your stylesheets: <strong>@@CSSPreprocessor@@</strong> - I suggest putting it in a simple comment</li>
	<li>
		Define your import directories, if you use it. For exemple, if you want to integrate Bootstrap, you can :
		<ol>
			<li>Put your Bootstrap LESS source files in uploads/bootstrap/</li>
			<li>Type <strong><em>uploads/bootstrap</em></strong> in the "Directories containing LESS/SASS files to include in compilation" - No slash at beginning or end</li>
      <li>Create a "custom" stylesheet (only one stylesheet) and link it to your design.</li>
		</ol>
	</li>
  <li>
		Same can be done for Foundation:
		<ol>
			<li>Put your Foundation SASS source files in uploads/foundation/scss</li>
			<li>Type <strong><em>uploads/foundation/scss</em></strong> in the "Directories containing LESS/SASS files to include in compilation" - No slash at beginning or end</li>
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



<h2>Smarty support</h2>
<p>You can use Smarty tags with [[ and ]] - Smarty will be processed before the CSS PreProcessor.</p>

<h2>Using Sourcemaps</h2>
<p>
	Some preprocessors can create sourcemap files, in order to help you during integration. Don\'t forget to configure your browser to use that function. Note that only imported files will be mapped in the sourcemaps (this may change in a further version).
</p>

<h2>Deactivate the module</h2>
<p>
	If you don\'t want to use any of the preprocessors, please remove it or disable it in the Modules Manager - There are no "deactivate" function built in the module.
</p>

<h2>Preprocessor switch</h2>
<p>
	You may want to switch from one preprocessor to another - Don\'t forget to clear your cache after that because the module will not do it.
</p>

<h2>Extend with another preprocessor</h2>
<p>
	You can create a new directory in the "preprocessors" directory, and create your own class - Check how the bundled preprocessors are integrated.
</p>
<p>Don\'t forget to <a href="mailto:contact@airelibre.fr">email me</a> if you want your preprocessor to be added to the project!</p>

<h2>Support</h2>
	<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
	<p>
		If you want to contact me: <a href="mailto:contact@airelibre.fr">contact@airelibre.fr</a>
	</p>

<h2>Project on the web</h2>
<p>You can follow the project on : </p>
	<ul>
		<li>GitHub: <a href="https:#github.com/airelibre/CSSPreprocessor" target="_blank">https:#github.com/airelibre/CSSPreprocessor</a></li>
		<li>CMSMS Forge: <a href="http:#dev.cmsmadesimple.org/projects/csspreprocessor" target="_blank">http:#dev.cmsmadesimple.org/projects/csspreprocessor</a></li>
	</ul>

<h2>Copyright and License</h2>
	<p>Copyright © 2014, AireLibre <a href="mailto:contact@airelibre.fr">contact@airelibre.fr</a> / <a href="http:#www.airelibre.fr" target="_blank">www.airelibre.fr</a>. All Rights Are Reserved.</p>
	<p>This module has been released under the <a href="http:#www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>

	<h3>Preprocessors copyright</h3>
	<p>
		The author of this module does not own the preprocessors bundled with it - Please see every preprocessors source code / website to get informations about licence and copyright.
	</p>
	<p>I just wanted to thank all the developers that contribute to these preprocessors which are great tools for designers!</p>';
?>