<?php

/***************************************************************************
 *   Copyright (C) 2009-2011 by Geo Varghese(www.seopanel.in)  	   *
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

# class defines all crawl log functions
class CrawlLogController extends Controller {
	
	/**
	 * the name of the crawl logging database tabel
	 */
	var $tablName = "crawl_log";
	
	/**
	 * function to create crawl logs for report generation
	 * @param $crawlInfo 	The array contains all detaisl of crawl
	 */
	function createCrawlLog($crawlInfo) {
		$sql = "INSERT INTO ". $this->tablName ."(".implode(",", array_keys($crawlInfo)).")";
		$sql .= " values ('".implode("','", array_values($crawlInfo))."')";
		$this->db->query($sql);
		$logId = $this->db->getMaxId($this->tablName);
		return $logId;
	}
	
	/**
	 * function to update crawl log
	 * @param int $logId			The id of the crawl log needs to be updated
	 * @param Array $crawlInfo		The array contains crawl log details needs to be updated
	 */
	function updateCrawlLog($logId, $crawlInfo) {
		
		// if log id is not empty
		if (!empty($logId)) {
		
			$sql = "update $this->tablName set ";
			
			// for each through the log values
			foreach($crawlInfo as $key => $value) {
				$sql .= "$key='". addslashes($value) ."',";
			}
			
			$sql = rtrim($sql, ",");
			$sql .= " where id=$logId";
			$this->db->query($sql);
		}
		
	}
	
	/**
	 * Function to display crawl log details 
	 * @param Array $info	Contains all search details
	 */
	function listCrawlLog($info = ''){
	
		$userId = isLoggedIn();
		$sql = "select * from $this->tablName where 1=1";
		$conditions = "";
	
		if (isset($info['status'])) {
			if (($info['status'] == 'success') || ($info['status'] == 'fail')) {
				$statVal = ($info['status']=='success') ? 1 : 0;
				$conditions .= " and crawl_status=$statVal";
				$urlParams .= "&status=".$info['status'];
			}
		} else {
			$info['status'] = '';
		}
		
		$this->set('statVal', $info['status']);
	
		if (empty($info['keyword'])) {
			$info['keyword'] =  '';
		} else {
			$info['keyword'] = urldecode($info['keyword']);
			$conditions .= " and (ref_id like '%".addslashes($info['keyword'])."%' or subject like '%".addslashes($info['keyword'])."%'
			 or crawl_link like '%".addslashes($info['keyword'])."%' or log_message like '%".addslashes($info['keyword'])."%' )";
			$urlParams .= "&keyword=".urlencode($info['keyword']);
		}
		
		$this->set('keyword', $info['keyword']);
		
		$crawlType = "";
		if (!empty($info['crawl_type'])) {
			$crawlType = $info['crawl_type'];
			$conditions .= " and crawl_type='".addslashes($crawlType)."'";
			$urlParams .= "&crawl_type=".$crawlType;
		}
		
		// find different crawl types
		$crawlTypeSql = "select distinct crawl_type from $this->tablName";
		$crawlTypeList = $this->db->select($crawlTypeSql);
		$this->set('crawlTypeList', $crawlTypeList);
		$this->set('crawlType', $crawlType);		
		
		$proxyId = "";
		if (!empty($info['proxy_id'])) {
			$proxyId = $info['proxy_id'];
			$conditions .= " and proxy_id='".intval($proxyId)."'";
			$urlParams .= "&proxy_id=".$proxyId;
		}
		
		// find different proxy used
		$proxySql = "select distinct proxy_id, proxy, port from $this->tablName t, proxylist pl 
		where pl.id=t.proxy_id and t.proxy_id!=0";
		$proxyList = $this->db->select($proxySql);
		$this->set('proxyList', $proxyList);
		$this->set('proxyId', $proxyId);
		
		if (!empty ($info['from_time'])) {
			$fromTime = strtotime($info['from_time'] . ' 00:00:00');
		} else {
			$fromTime = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
		}
		
		if (!empty ($info['to_time'])) {
			$toTime = strtotime($info['to_time'] . ' 00:00:00');
		} else {
			$toTime = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
		}
		
		$fromTimeLabel = date('Y-m-d', $fromTime);
		$toTimeLabel = date('Y-m-d', $toTime);
		$this->set('fromTime', $fromTimeLabel);
		$this->set('toTime', $toTimeLabel);
		$urlParams .= "&from_time=$fromTimeLabel&to_time=$toTimeLabel";
		
		// sql created using param
		$sql .= " $conditions and crawl_time >='$fromTimeLabel 00:00:00' and crawl_time<='$toTimeLabel 23:59:59' order by id";
		
		// pagination setup
		$this->db->query($sql, true);
		$this->paging->setDivClass('pagingdiv');
		$this->paging->loadPaging($this->db->noRows, SP_PAGINGNO);
		$pagingDiv = $this->paging->printPages('log.php', '', 'scriptDoLoad', 'content', $urlParams);
		$this->set('pagingDiv', $pagingDiv);
		$sql .= " limit ".$this->paging->start .",". $this->paging->per_page;
	
		$logList = $this->db->select($sql);
		$this->set('pageNo', $info['pageno']);
		$this->set('list', $logList);
		$this->set('urlParams', $urlParams);
		$this->render('log/crawlloglist');
	}
	
}
?>