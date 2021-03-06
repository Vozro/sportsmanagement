<?php 
/** SportsManagement ein Programm zur Verwaltung f?r alle Sportarten
* @version         1.0.05
* @file                agegroup.php
* @author                diddipoeler, stony, svdoldie und donclumsy (diddipoeler@arcor.de)
* @copyright        Copyright: ? 2013 Fussball in Europa http://fussballineuropa.de/ All rights reserved.
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
* SportsManagement ist Freie Software: Sie k?nnen es unter den Bedingungen
* der GNU General Public License, wie von der Free Software Foundation,
* Version 3 der Lizenz oder (nach Ihrer Wahl) jeder sp?teren
* ver?ffentlichten Version, weiterverbreiten und/oder modifizieren.
*
* SportsManagement wird in der Hoffnung, dass es n?tzlich sein wird, aber
* OHNE JEDE GEW?HELEISTUNG, bereitgestellt; sogar ohne die implizite
* Gew?hrleistung der MARKTF?HIGKEIT oder EIGNUNG F?R EINEN BESTIMMTEN ZWECK.
* Siehe die GNU General Public License f?r weitere Details.
*
* Sie sollten eine Kopie der GNU General Public License zusammen mit diesem
* Programm erhalten haben. Wenn nicht, siehe <http://www.gnu.org/licenses/>.
*
* Note : All ini files need to be saved as UTF-8 without BOM
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
?>

<form name="adminForm" id="adminForm" method="post"	action="<?php echo $this->action;?>">
<table class="table">
	<tr>
	<?php
	//echo " [" . $this->startdate. " / " . $this->enddate. "]";

	//echo $this->pagenav.'<br>';
	//echo $this->pagenav2.'<br>';

	//echo JHtml::calendar( $this->startdate, 'startdate', 'startdate', $dateformat );
	//echo " - " . JHtml::calendar( $this->enddate, 'enddate', 'enddate', $dateformat );
	echo "<td>".JHtml::_('select.genericlist', $this->lists['type'], 'type' , 'class="inputbox" size="1"', 'value', 'text', $this->type )."</td>";
	echo "<td>".JHtml::_('select.genericlist', $this->lists['frommatchday'], 'from' , 'class="inputbox" size="1"', 'value' ,'text' , $this->from )."</td>";
	echo "<td>".JHtml::_('select.genericlist', $this->lists['tomatchday'], 'to' , 'class="inputbox" size="1"', 'value', 'text', $this->to )."</td>";

	?>
		<td><input type="submit" class="<?PHP echo $this->config['button_style']; ?>" name="reload View"
			value="<?php echo JText::_('COM_SPORTSMANAGEMENT_RANKING_FILTER'); ?>"></td>
	</tr>
</table>
	<?php echo JHtml::_( 'form.token' ); ?>
    </form>
<br />

