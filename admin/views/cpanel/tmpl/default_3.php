<?php
/** SportsManagement ein Programm zur Verwaltung für alle Sportarten
* @version         1.0.05
* @file                agegroup.php
* @author                diddipoeler, stony, svdoldie und donclumsy (diddipoeler@arcor.de)
* @copyright        Copyright: © 2013 Fussball in Europa http://fussballineuropa.de/ All rights reserved.
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
* SportsManagement ist Freie Software: Sie können es unter den Bedingungen
* der GNU General Public License, wie von der Free Software Foundation,
* Version 3 der Lizenz oder (nach Ihrer Wahl) jeder späteren
* veröffentlichten Version, weiterverbreiten und/oder modifizieren.
*
* SportsManagement wird in der Hoffnung, dass es nützlich sein wird, aber
* OHNE JEDE GEWÄHRLEISTUNG, bereitgestellt; sogar ohne die implizite
* Gewährleistung der MARKTFÄHIGKEIT oder EIGNUNG FÜR EINEN BESTIMMTEN ZWECK.
* Siehe die GNU General Public License für weitere Details.
*
* Sie sollten eine Kopie der GNU General Public License zusammen mit diesem
* Programm erhalten haben. Wenn nicht, siehe <http://www.gnu.org/licenses/>.
*
* Note : All ini files need to be saved as UTF-8 without BOM
*/
 
// Disallow direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.html.html.bootstrap');
?> 
<div id="jsm" class="admin override">

<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>




<section class="content-block" role="main">

<div class="row-fluid">
<div class="span7">
<div class="well well-small">  

<div class="module-title nav-header"><?php echo JText::_('COM_SPORTSMANAGEMENT_D_HEADING_BASIS_DATA') ?>
</div>
<hr class="hr-condensed">      

<div id="dashboard-icons" class="btn-group">

<a class="btn" href="index.php?option=com_sportsmanagement&view=sportstypes">
<img src="components/com_sportsmanagement/assets/icons/sportarten.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_SPORTSTYPES') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_SPORTSTYPES') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=seasons">
<img src="components/com_sportsmanagement/assets/icons/saisons.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_SEASONS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_SEASONS') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=leagues">
<img src="components/com_sportsmanagement/assets/icons/ligen.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_LEAGUES') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_LEAGUES') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=jlextfederations">
<img src="components/com_sportsmanagement/assets/icons/federation.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_FEDERATIONS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_FEDERATIONS') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=jlextcountries">
<img src="components/com_sportsmanagement/assets/icons/laender.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_COUNTRIES') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_COUNTRIES') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=jlextassociations">
<img src="components/com_sportsmanagement/assets/icons/landesverbaende.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_ASSOCIATIONS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_ASSOCIATIONS') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=positions">
<img src="components/com_sportsmanagement/assets/icons/positionen.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_POSITIONS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_POSITIONS') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=eventtypes">
<img src="components/com_sportsmanagement/assets/icons/ereignisse.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_EVENTS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_EVENTS') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=agegroups">
<img src="components/com_sportsmanagement/assets/icons/altersklassen.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_AGEGROUPS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_AGEGROUPS') ?></span>
</a>     
        
</div> 

<hr class="hr-condensed"> 
<div class="module-title nav-header"><?php echo JText::_('COM_SPORTSMANAGEMENT_D_HEADING_PERSONAL_DATA') ?>
</div>
<hr class="hr-condensed">    
<div id="dashboard-icons" class="btn-group">

<a class="btn" href="index.php?option=com_sportsmanagement&view=clubs">
<img src="components/com_sportsmanagement/assets/icons/vereine.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_CLUBS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_CLUBS') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=teams">
<img src="components/com_sportsmanagement/assets/icons/mannschaften.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_TEAMS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_TEAMS') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=persons">
<img src="components/com_sportsmanagement/assets/icons/personen.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_PERSONS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_PERSONS') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=playgrounds">
<img src="components/com_sportsmanagement/assets/icons/spielorte.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_VENUES') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_VENUES') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=rosterpositions">
<img src="components/com_sportsmanagement/assets/icons/spielfeldpositionen.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_ROSTER_POSITION') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_ROSTER_POSITION') ?></span>
</a>

</div> 

<hr class="hr-condensed"> 
<div class="module-title nav-header"><?php echo JText::_('COM_SPORTSMANAGEMENT_D_HEADING_SPECIAL_FUNCTION') ?>
</div>
<hr class="hr-condensed">    
<div id="dashboard-icons" class="btn-group">

<a class="btn" href="index.php?option=com_sportsmanagement&view=extrafields">
<img src="components/com_sportsmanagement/assets/icons/extrafelder.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_EXTRAFIELDS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_EXTRAFIELDS') ?></span>
</a>

<a class="btn" href="index.php?option=com_sportsmanagement&view=statistics">
<img src="components/com_sportsmanagement/assets/icons/statistik.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_STATISTICS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_STATISTICS') ?></span>
</a>

<a class="btn" href="index.php?option=com_sportsmanagement&view=clubnames">
<img src="components/com_sportsmanagement/assets/icons/statistik.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_CLUBNAMES') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_CLUBNAMES') ?></span>
</a>

<a class="btn" href="index.php?option=com_sportsmanagement&view=github">
<img src="components/com_sportsmanagement/assets/icons/github.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_GITHUB') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_GITHUB') ?></span>
</a>

</div>

<hr class="hr-condensed"> 
<div class="module-title nav-header"><?php echo JText::_('COM_SPORTSMANAGEMENT_D_HEADING_IMPORT_EXPORT_FUNCTION') ?>
</div>
<hr class="hr-condensed">    
<div id="dashboard-icons" class="btn-group">

<a class="btn" href="index.php?option=com_sportsmanagement&view=jlxmlimports&layout=default">
<img src="components/com_sportsmanagement/assets/icons/xmlimport.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_XML_IMPORT') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_XML_IMPORT') ?></span>
</a>

<a class="btn" href="index.php?option=com_sportsmanagement&view=smextxmleditors&layout=default">
<img src="components/com_sportsmanagement/assets/icons/xmleditor.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_XML_EDITOR') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_XML_EDITOR') ?></span>
</a>

<a class="btn" href="index.php?option=com_sportsmanagement&view=smimageimports&layout=default">
<img src="components/com_sportsmanagement/assets/icons/imageimport.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_IMAGE_IMPORT') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_IMAGE_IMPORT') ?></span>
</a>

<a class="btn" href="index.php?option=com_sportsmanagement&view=joomleagueimports&layout=default">
<img src="components/com_sportsmanagement/assets/icons/joomleague.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_JOOMLEAGUE_IMPORT') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_JOOMLEAGUE_IMPORT') ?></span>
</a>

</div> 

<hr class="hr-condensed"> 
<div class="module-title nav-header"><?php echo JText::_('COM_SPORTSMANAGEMENT_D_HEADING_INSTALL_TOOLS') ?>
</div>
<hr class="hr-condensed">    
<div id="dashboard-icons" class="btn-group">

<a class="btn" href="index.php?option=com_sportsmanagement&view=updates">
<img src="components/com_sportsmanagement/assets/icons/updates.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_UPDATES') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_UPDATES') ?></span>
</a>

<a class="btn" href="index.php?option=com_sportsmanagement&view=databasetools">
<img src="components/com_sportsmanagement/assets/icons/datenbanktools.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_TOOLS') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_TOOLS') ?></span>
</a>
<a class="btn" href="index.php?option=com_sportsmanagement&view=smquotes">
<img src="components/com_sportsmanagement/assets/icons/zitate.png" alt="<?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_QUOTES') ?>" /><br />
<span><?php echo JText::_('COM_SPORTSMANAGEMENT_D_MENU_QUOTES') ?></span>
</a>

</div> 

<hr class="hr-condensed">  


      
</div>
</div>

<div class="span5">
					<div class="well well-small">
						<div class="center">
							<img src="components/com_sportsmanagement/assets/icons/boxklein.png" width="200"/>
						</div>
						<hr class="hr-condensed">
						<dl class="dl-horizontal">
							<dt><?php echo JText::_('COM_SPORTSMANAGEMENT_VERSION') ?>:</dt>
							<dd><?php echo JText::sprintf( '%1$s', sportsmanagementHelper::getVersion() ); ?></dd>
                            
							<dt><?php echo JText::_('COM_SPORTSMANAGEMENT_DEVELOPERS') ?>:</dt>
							<dd><?php echo JText::_('COM_SPORTSMANAGEMENT_DEVELOPER_TEAM'); ?></dd>

							
                            <dt><?php echo JText::_('COM_SPORTSMANAGEMENT_SITE_LINK') ?>:</dt>
							<dd><a href="http://www.fussballineuropa.de" target="_blank">fussballineuropa</a></dd>
							
                            <dt><?php echo JText::_('COM_SPORTSMANAGEMENT_COPYRIGHT') ?>:</dt>
							<dd>&copy; 2014 fussballineuropa, All rights reserved.</dd>
							
                            <dt><?php echo JText::_('COM_SPORTSMANAGEMENT_LICENSE') ?>:</dt>
							<dd>GNU General Public License</dd>
						</dl>
                        
<div class="center">


<?PHP
$start = 1;
// Define slides options
$slidesOptions = array(
            "active" => "slide1_id" // It is the ID of the active tab.
        );
// Define tabs options for version of Joomla! 3.0
$tabsOptions = array(
            "active" => "tab1_id" // It is the ID of the active tab.
        );  

echo JHtml::_('bootstrap.startAccordion', 'slide-group-id', $slidesOptions);
                   

if (is_array($this->importData))
	{
		foreach ($this->importData as $key => $value)
		{
		  echo JHtml::_('bootstrap.addSlide', 'slide-group-id', JText::_($key), 'slide'.$start.'_id');
            echo $value;
            echo JHtml::_('bootstrap.endSlide'); 
            $start++;
		}
	}
if (is_array($this->importData2))
	{
		foreach ($this->importData2 as $key => $value)
		{
			 echo JHtml::_('bootstrap.addSlide', 'slide-group-id', JText::_($key), 'slide'.$start.'_id');
            echo $value;
            echo JHtml::_('bootstrap.endSlide'); 
            $start++;
		}
	}
echo JHtml::_('bootstrap.endAccordion');
?>
</div>                         
                        
     </div>                   
                        
					

					

				</div>
                
</div>


                
</section>
</div>
</div>
