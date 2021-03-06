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

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );
// import Joomla table library
jimport('joomla.database.table');
// Include library dependencies
jimport( 'joomla.filter.input' );


/**
 * sportsmanagementTableTeamPerson
 * 
 * @package   
 * @author 
 * @copyright diddi
 * @version 2014
 * @access public
 */
class sportsmanagementTableTeamPerson extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 * @since 1.0
	 */
	function __construct(& $db)
	{
	   $db = sportsmanagementHelper::getDBConnection();
		parent::__construct( '#__'.COM_SPORTSMANAGEMENT_TABLE.'_season_team_person_id', 'id', $db );
	}

	
/**
 * 	function delete( $oid=null )
 * 	{
 * 		//TODO: check that there are no events and and matches associated to this player

 * 		$k = $this->_tbl_key;
 * 		if ($oid) {
 * 			$this->$k = intval( $oid );
 * 		}

 * 		$query = 'DELETE FROM '.$this->getDbo()->nameQuote( $this->_tbl ).
 * 				' WHERE '.$this->_tbl_key.' = '. $this->getDbo()->Quote($this->$k);
 * 		$this->getDbo()->setQuery( $query );

 * 		if ($this->getDbo()->query())
 * 		{
 * 			return true;
 * 		}
 * 		else
 * 		{
 * 			$this->setError($this->getDbo()->getErrorMsg());
 * 			return false;
 * 		}
 * 	}
 */

/**
 * 	function canDelete($id)
 * 	{
 * 		// cannot be deleted if assigned to games
 * 		$query = ' SELECT COUNT(id) FROM #__'.COM_SPORTSMANAGEMENT_TABLE.'_match_player '
 * 		       . ' WHERE teamplayer_id = '. $this->getDbo()->Quote($id)
 * 		       . ' GROUP BY teamplayer_id ';
 * 		$this->getDbo()->setQuery($query, 0, 1);
 * 		$res = $this->getDbo()->loadResult();
 * 		
 * 		if ($res) {
 * 			$this->setError(Jtext::sprintf('PLAYER ASSIGNED TO %d GAMES', $res));
 * 			return false;
 * 		}
 * 		
 * 		// cannot be deleted if has events
 * 		$query = ' SELECT COUNT(id) FROM #__'.COM_SPORTSMANAGEMENT_TABLE.'_match_event '
 * 		       . ' WHERE teamplayer_id = '. $this->getDbo()->Quote($id)
 * 		       . ' GROUP BY teamplayer_id ';
 * 		$this->getDbo()->setQuery($query, 0, 1);
 * 		$res = $this->getDbo()->loadResult();
 * 		
 * 		if ($res) {
 * 			$this->setError(JText::sprintf('%d EVENTS ASSIGNED TO PLAYER', $res));
 * 			return false;
 * 		}
 * 		
 * 		// cannot be deleted if has stats
 * 		$query = ' SELECT COUNT(id) FROM #__'.COM_SPORTSMANAGEMENT_TABLE.'_match_statistic '
 * 		       . ' WHERE teamplayer_id = '. $this->getDbo()->Quote($id)
 * 		       . ' GROUP BY teamplayer_id ';
 * 		$this->getDbo()->setQuery($query, 0, 1);
 * 		$res = $this->getDbo()->loadResult();
 * 		
 * 		if ($res) {
 * 			$this->setError(JText::sprintf('%d STATS ASSIGNED TO PLAYER', $res));
 * 			return false;
 * 		}
 * 		
 * 		return true;
 * 	}
 */
}
?>