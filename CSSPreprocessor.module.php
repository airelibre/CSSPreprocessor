<?php
#-------------------------------------------------------------------------
# Module: CSSPreprocessor
# Author: Airelibre / Mathieu Muths - www.airelibre.fr
# A module to help designers to use CSS Preprocessor in order to process
# LESS or SASS (later) code.
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2011 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
# The module's homepage is: http://dev.cmsmadesimple.org/projects/customgs
#-------------------------------------------------------------------------
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#-------------------------------------------------------------------------
if( !isset($gCms) ) exit;

class CSSPreprocessor extends CMSModule
{

	function __construct(){
		parent::__construct();

  	\CMSMS\HookManager::add_hook('Core::StylesheetPostRender', [$this, 'RunPreprocessor'] );
	}

	function GetVersion() {return '3.0-beta1';}
	function MinimumCMSVersion() {return '2.2';}
	function GetFriendlyName() {return $this->Lang('friendlyname');}
	function GetHelp(){return $this->Lang('help');}

	function GetAuthor() { return 'Aire libre - Mathieu Muths'; }
  function GetAuthorEmail() { return 'contact@airelibre.fr'; }

  function GetChangeLog() {
		return file_get_contents(dirname(__FILE__).'/doc/changelog.html');
	}

	public function LazyLoadFrontend() { return false; }
  public function LazyLoadAdmin() { return false; }


  // Admin params
  function HasAdmin() { return true; }
  function IsAdminOnly() { return false; }

  function GetAdminSection() { return 'layout'; }
  function VisibleToAdminUser() {
		return $this->CheckPermission('Manage Stylesheets');
  }


  function GetHeaderHTML() {
		$header = '<link rel="stylesheet" href="../modules/CSSPreprocessor/admin_css/csspreprocessor.css">';

		return $header;
  }



  // **********************************************************
  // NON-API CUSTOM FUNCTIONS
  // **********************************************************

  public function GetPreprocessor()
  {
		$preprocessor_name = $this->GetPreference('preprocessor', 'LessPHPOyejorge');

		require_once(cms_join_path(__DIR__, 'preprocessors', $preprocessor_name, 'class.Preprocessor_' . $preprocessor_name . '.php'));

		$class_name = 'PreProcessor_' . $preprocessor_name;
		$obj = new $class_name();

		$obj->Load();

		return $obj;
  }




  // Run the preprocessor
  public function RunPreprocessor($params){

		// CSSPreprocessor load and run
		if ($preprocessor = $this->GetPreprocessor())
		{

			$preprocessor->CompileCSS($params['content']);


			if ( $this->GetPreference('use_autoprefixer', 0) )
			{
				// Store to a file to give it to the command line
				$tmp_file = cms_join_path(TMP_CACHE_LOCATION, 'postcss_tmp.css');
				file_put_contents($tmp_file, $params['content']);
				exec('postcss ' . $tmp_file . ' --use autoprefixer --no-map -o ' . $tmp_file);

				$res = file_get_contents($tmp_file);
				if ( $res != '')
				{
					$params['content'] = $res;
				}

				@unlink($tmp_file);
			}


			// Minify
			if ($preprocessor->minify)
				$preprocessor->MinifyCSS($params['content']);
		}
  }


}

?>
