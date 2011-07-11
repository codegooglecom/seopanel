<?php

/***************************************************************************
 *   Copyright (C) 2009-2011 by Geo Varghese(www.seopanel.in)  	           *
 *   sendtogeo@gmail.com   												   *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License, or     *
 *   (at your option) any later version.                                   *
 *                                                                         *
 *   This program is distributed in the hope that it will be useful,       *
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of        *
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         *
 *   GNU General Public License for more details.                          *
 *                                                                         *
 *   You should have received a copy of the GNU General Public License     *
 *   along with this program; if not, write to the                         *
 *   Free Software Foundation, Inc.,                                       *
 *   59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.             *
 ***************************************************************************/

# class defines all settings controller functions
class SettingsController extends Controller{
	
	var $layout = 'ajax';
	
	function showSystemSettings($category='system') {
		
		$this->set('list', $this->__getAllSettings(true, 1, $category));
		
		if ($category == 'system') {		
    		$langCtrler = New LanguageController();
    		$langList = $langCtrler->__getAllLanguages(" where translated=1");
    		$this->set('langList', $langList);
		}
		$this->set('category', $category);
		
		$this->render('settings/showsettings');
	}
	
	function updateSystemSettings($postInfo) {
		
		$setList = $this->__getAllSettings(true, 1, $postInfo['category']);
		foreach($setList as $setInfo){

			switch($setInfo['set_name']){
				
				case "SP_PAGINGNO":
					$postInfo[$setInfo['set_name']] = intval($postInfo[$setInfo['set_name']]);
					$postInfo[$setInfo['set_name']] = empty($postInfo[$setInfo['set_name']]) ? SP_PAGINGNO_DEFAULT : $postInfo[$setInfo['set_name']];				
					break;
				
				case "SP_CRAWL_DELAY":
				case "SP_USER_GEN_REPORT":
				case "SA_CRAWL_DELAY_TIME":
				case "SA_MAX_NO_PAGES":
					$postInfo[$setInfo['set_name']] = intval($postInfo[$setInfo['set_name']]);
					break;					
			}
			
			$sql = "update settings set set_val='".addslashes($postInfo[$setInfo['set_name']])."' where set_name='{$setInfo['set_name']}'";
			$this->db->query($sql);
		}
		
		$this->set('saved', 1);
		$this->showSystemSettings($postInfo['category']);
	}
	
	# func to show about us of seo panel
	function showAboutUs() {
		
		$sql = "select t.*,l.lang_name from translators t,languages l where t.lang_code=l.lang_code";
		$transList = $this->db->select($sql); 
		$this->set('transList', $transList);
		
		$this->set('sponsors', $this->getSponsors());		
		$this->render('settings/aboutus');
	}
	
	# function to get sponsors
	function getSponsors() {		
		
		if(empty($_COOKIE['sponsors'])){
			$ret = $this->spider->getContent(SP_SPONSOR_PAGE . "?lang=". $_SESSION['lang_code']);			
			setcookie("sponsors", $ret['page'], time()+ (60*60*24));
		} else {
			$ret['page'] = $_COOKIE['sponsors'];
		}
		
		return $ret['page'];
	}
	
	# func to show version of seo panel
	function showVersion() {		
		$this->render('settings/version');
	}
	
	# function to check version
	function checkVersion() {
	    $content = $this->spider->getContent(SP_VERSION_PAGE);
	    $content['page'] = str_replace('Version:', '', $content['page']);
	    $latestVersion = str_replace('.', '', $content['page']);
	    $installVersion = str_replace('.', '', SP_INSTALLED);
	    if ($latestVersion > $installVersion) {
	        echo showErrorMsg($this->spTextSettings['versionnotuptodatemsg']."({$content['page']}) from <a href='".SP_DOWNLOAD_LINK."' target='_blank'>".SP_DOWNLOAD_LINK."</a>", false);
	    } else {
	        echo showSuccessMsg($this->spTextSettings["Your Seo Panel installation is up to date"], false);
	    }
	}
	
}
?>