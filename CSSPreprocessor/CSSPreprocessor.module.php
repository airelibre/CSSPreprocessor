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

	function GetVersion() {return '2.0';}
	function MinimumCMSVersion() {return '1.12.1';}
	function GetFriendlyName() {return $this->Lang('friendlyname');}
	function GetHelp(){return $this->Lang('help');}

	function GetAuthor() { return 'AireLibre - Mathieu Muths'; }
  function GetAuthorEmail() { return 'contact@airelibre.fr'; }

  function GetChangeLog() {
		return file_get_contents(dirname(__FILE__).'/doc/changelog.html');
	}

	public function LazyLoadFrontend() { return true; }
  public function LazyLoadAdmin() { return true; }

  // Admin params
  function HasAdmin() { return true; }
  public function IsAdminOnly() { return true; }
  function GetAdminSection() { return 'layout'; }
  function VisibleToAdminUser() {
		return $this->CheckPermission('Manage Stylesheets');
  }


  function GetHeaderHTML() {
		$header = '<link rel="stylesheet" href="../modules/CSSPreprocessor/admin_css/csspreprocessor.css"';

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

  // Smarty fetch - do it "manually" because the postfilter does not give a clean smarty code (gives "<?php " etc.
  public function FetchSmarty($content)
  {
		$smarty = cmsms()->GetSmarty();

		$smarty->left_delimiter = '[[';
		$smarty->right_delimiter = ']]';

		$content = $smarty->fetch('string:' . $content);

		//$smarty->left_delimiter = '{';
		//$smarty->right_delimiter = '}';

		return $content;
  }
}

?>
