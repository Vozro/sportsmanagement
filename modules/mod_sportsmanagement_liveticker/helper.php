<?php
/** SportsManagement ein Programm zur Verwaltung f�r alle Sportarten
* @version         1.0.05
* @file                agegroup.php
* @author                diddipoeler, stony, svdoldie und donclumsy (diddipoeler@arcor.de)
* @copyright        Copyright: � 2013 Fussball in Europa http://fussballineuropa.de/ All rights reserved.
* @license                This file is part of SportsManagement.
*
* SportsManagement is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* SportsManagement is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with SportsManagement.  If not, see <http://www.gnu.org/licenses/>.
*
* Diese Datei ist Teil von SportsManagement.
*
* SportsManagement ist Freie Software: Sie k�nnen es unter den Bedingungen
* der GNU General Public License, wie von der Free Software Foundation,
* Version 3 der Lizenz oder (nach Ihrer Wahl) jeder sp�teren
* ver�ffentlichten Version, weiterverbreiten und/oder modifizieren.
*
* SportsManagement wird in der Hoffnung, dass es n�tzlich sein wird, aber
* OHNE JEDE GEW�HELEISTUNG, bereitgestellt; sogar ohne die implizite
* Gew�hrleistung der MARKTF�HIGKEIT oder EIGNUNG F�R EINEN BESTIMMTEN ZWECK.
* Siehe die GNU General Public License f�r weitere Details.
*
* Sie sollten eine Kopie der GNU General Public License zusammen mit diesem
* Programm erhalten haben. Wenn nicht, siehe <http://www.gnu.org/licenses/>.
*
* Note : All ini files need to be saved as UTF-8 without BOM
*/

defined('_JEXEC') or die('Restricted access');

/**
 * modTurtushoutHelper
 * 
 * @package   
 * @author 
 * @copyright diddi
 * @version 2014
 * @access public
 */
class modTurtushoutHelper
{
	
    /**
     * modTurtushoutHelper::getListCommentary()
     * 
     * @param mixed $list
     * @return
     */
    function getListCommentary($list)
    {
    $db		= JFactory::getDBO();  
    $query = $db->getQuery(true);
    $mainframe = JFactory::getApplication();  
    $matches = array();
    
    foreach ( $list as $row )    
    {
    //$matches[] = $row->match_id;    
        
    //$selmatchcomm = implode(',',$matches);
    $query->select('*');
    $query->from('#__sportsmanagement_match_commentary');
    $query->where('match_id = '.$row->match_id);
    $query->order('event_time DESC');

    //$mainframe->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' <br><pre>'.print_r($query->dump(),true).'</pre>'),'');
    
    $db->setQuery($query);
	$rows = $db->loadObjectList();
    
    if ( $rows )
    {
    $matches[$row->match_id] = $rows;    
    }
    
    }

    return $matches;    
    }
        
    /**
     * modTurtushoutHelper::getList()
     * 
     * @param mixed $params
     * @param mixed $limit
     * @return
     */
    function getList(&$params, $limit)
    {
        // aktuelles datum
        $akt_datum = date("Y-m-d",time());
        $von = $akt_datum.' 00:00:00';
        $bis = $akt_datum.' 23:59:59';
        
		$db		= JFactory::getDBO();
        $query = $db->getQuery(true);
        $mainframe = JFactory::getApplication();
    
        $query->select('jl.id,jl.name,jl.game_regular_time,jl.halftime,jl.fav_team');
        $query->select('jco.alpha2');
        $query->select('jm.id as match_id,jm.match_date,jm.projectteam1_id,jm.projectteam2_id,jm.team1_result,jm.team2_result');
        $query->select('jt1.name as heim,jt1.short_name as heim_short_name,jt1.middle_name as heim_middle_name');
        $query->select('jt2.name as gast,jt2.short_name as gast_short_name,jt2.middle_name as gast_middle_name');
        $query->select('jc1.logo_big as wappenheim');
        $query->select('jc2.logo_big as wappengast');
        $query->from('#__sportsmanagement_project as jl');
        $query->join('INNER', '#__sportsmanagement_round as jr ON jr.project_id = jl.id');
        $query->join('INNER', '#__sportsmanagement_match as jm ON jm.round_id = jr.id');
        
        $query->join('INNER', '#__sportsmanagement_project_team as jpt1 ON jpt1.id = jm.projectteam1_id ');
        $query->join('INNER', '#__sportsmanagement_season_team_id AS st1 ON st1.id = jpt1.team_id');
        $query->join('INNER', '#__sportsmanagement_team as jt1 ON jt1.id = st1.team_id');
        $query->join('INNER', '#__sportsmanagement_club as jc1 ON jc1.id = jt1.club_id');
        
        $query->join('INNER', '#__sportsmanagement_project_team as jpt2 ON jpt2.id = jm.projectteam2_id ');
        $query->join('INNER', '#__sportsmanagement_season_team_id AS st2 ON st2.id = jpt2.team_id');
        $query->join('INNER', '#__sportsmanagement_team as jt2 ON jt2.id = st2.team_id');
        $query->join('INNER', '#__sportsmanagement_club as jc2 ON jc2.id = jt2.club_id');
        
        $query->join('INNER', '#__sportsmanagement_league as jle ON jle.id = jl.league_id');
        
        $query->join('LEFT', '#__sportsmanagement_countries as jco ON jco.alpha3 = jle.country');
        
        $query->where("( jm.match_date >= '".$von."' AND jm.match_date <= '".$bis."' )"); 
   
        //$mainframe->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' <br><pre>'.print_r($query->dump(),true).'</pre>'),'');
        
		$db->setQuery($query, 0, $limit);
		$rows = $db->loadObjectList();
		
		if ($db->_errorMsg)
        {
//			 modTurtushoutHelper::install();
		}
		return $rows;
	}

	/**
	 * modTurtushoutHelper::shout()
	 * 
	 * @param mixed $display_username
	 * @param mixed $display_title
	 * @param mixed $add_timeout
	 * @return
	 */
	function shout($display_username, $display_title, $add_timeout)
    {
        
	}


	/**
	 * modTurtushoutHelper::delete()
	 * 
	 * @return
	 */
	function delete()
    {

	}

	/**
	 * modTurtushoutHelper::install()
	 * 
	 * @return
	 */
	function install()
    {
        
	}
}