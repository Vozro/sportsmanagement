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
* OHNE JEDE GEW�HRLEISTUNG, bereitgestellt; sogar ohne die implizite
* Gew�hrleistung der MARKTF�HIGKEIT oder EIGNUNG F�R EINEN BESTIMMTEN ZWECK.
* Siehe die GNU General Public License f�r weitere Details.
*
* Sie sollten eine Kopie der GNU General Public License zusammen mit diesem
* Programm erhalten haben. Wenn nicht, siehe <http://www.gnu.org/licenses/>.
*
* Note : All ini files need to be saved as UTF-8 without BOM
*/

defined('_JEXEC') or die('Restricted access');

$templatesToLoad = array('footer','listheader');
sportsmanagementHelper::addTemplatePaths($templatesToLoad, $this);





?>
<form action="<?php echo $this->request_url; ?>" method="post" id="adminForm" name="adminForm">

<table class="<?php echo $this->table_data_class; ?>">
<tr>
<td class="nowrap" align="center">
<img src= "<?php echo JURI::base( true ) ?>/components/com_sportsmanagement/assets/icons/jl.png" width="180" height="auto" >
</td>
<td class="nowrap" align="center">
<div id="delayMsg"></div>
<table class="<?php echo $this->table_data_class; ?>">
<?PHP
$i = 0;
foreach( $this->get_info_fields as $key => $value )
{
?>
<tr>
<td class="nowrap" align="center">
<?PHP    
$inputappend = '';
$append = ' style="background-color:#bbffff"';
echo $value->info;
?>
</td>
<td class="nowrap" align="center">
<?PHP
echo JHtml::_(	'select.genericlist',
$this->lists['agegroup'],
'agegroup['.$value->info.']',
$inputappend.'class="form-control form-control-inline" size="1" onchange="document.getElementById(\'cb' .
$i.'\').checked=true"'.$append,
'value','text',$value->agegroup_id);
echo '<br>';
?>
</td>
</tr>
<?PHP
}
?>
</table>                                                    
</td>
<td class="nowrap" align="center">
<img src= "<?php echo JURI::base( true ) ?>/components/com_sportsmanagement/assets/icons/logo_transparent.png" width="180" height="auto" >
</td>
</tr>
</table>

<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="jl_table_import_step" value="<?php echo $this->jl_table_import_step; ?>" />

<?php echo JHtml::_('form.token')."\n"; ?>
</form>

<?PHP
echo "<div>";
echo $this->loadTemplate('footer');
echo "</div>";
?>