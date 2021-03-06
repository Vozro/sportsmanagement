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

defined('_JEXEC') or die('Restricted access');

//Ordering allowed ?
$ordering=($this->sortColumn == 'a.ordering');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.modal');

$templatesToLoad = array('footer','listheader');
sportsmanagementHelper::addTemplatePaths($templatesToLoad, $this);
?>
	<div class="table-responsive" id="editcell">
		<table class="<?php echo $this->table_data_class; ?>">
			<thead>
				<tr>
					<th width="5"><?php echo JText::_('COM_SPORTSMANAGEMENT_GLOBAL_NUM'); ?></th>
					<th width="20"><input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this);" /></th>
					
					<th class="title">
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUBS_NAME_OF_CLUB','a.name',$this->sortDirection,$this->sortColumn); ?>
					</th>
					<th>
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUBS_WEBSITE','a.website',$this->sortDirection,$this->sortColumn); ?>
					</th>
                    
                    <th>
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUB_UNIQUE_ID','a.unique_id',$this->sortDirection,$this->sortColumn); ?>
					</th>
                    
					<th width="20">
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUBS_L_LOGO','a.logo_big',$this->sortDirection,$this->sortColumn); ?>
					</th>
					<th width="20">
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUBS_M_LOGO','a.logo_middle',$this->sortDirection,$this->sortColumn); ?>
					</th>
					<th width="20">
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUBS_S_LOGO','a.logo_small',$this->sortDirection,$this->sortColumn); ?>
					</th>
					
                    <th width="">
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUB_POSTAL_CODE','a.zipcode',$this->sortDirection,$this->sortColumn); ?>
					<br />
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUBS_CITY','a.location',$this->sortDirection,$this->sortColumn); ?>
					<br />
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUB_ADDRESS','a.address',$this->sortDirection,$this->sortColumn); ?>
					</th>
                    
                    
                    
                    <th width="">
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUBS_LATITUDE','a.latitude',$this->sortDirection,$this->sortColumn); ?>
					<br />
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUBS_LONGITUDE','a.longitude',$this->sortDirection,$this->sortColumn); ?>
					</th>
                    
                    
                    
                    <th width="">
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUBS_COUNTRY','a.country',$this->sortDirection,$this->sortColumn); ?>
					</th>
                    <th width="">
						<?php echo JHtml::_('grid.sort','COM_SPORTSMANAGEMENT_ADMIN_CLUBS_COUNTRY','a.country',$this->sortDirection,$this->sortColumn); ?>
					</th>
					<th width="">
						<?php
						echo JHtml::_('grid.sort','JGRID_HEADING_ORDERING','a.ordering',$this->sortDirection,$this->sortColumn);
						echo JHtml::_('grid.order',$this->items, 'filesave.png', 'clubs.saveorder');
						?>
					</th>
					<th width="1%">
						<?php echo JHtml::_('grid.sort','JGRID_HEADING_ID','a.id',$this->sortDirection,$this->sortColumn); ?>
					</th>
				</tr>
			</thead>
			<tfoot><tr><td colspan="12"><?php echo $this->pagination->getListFooter(); ?></td>
            <td colspan='6'>
            <?php echo $this->pagination->getResultsCounter();?>
            </td>
            </tr></tfoot>
			<tbody>
				<?php
				$k=0;
                
				for ($i=0,$n=count($this->items); $i < $n; $i++)
				{
					$row =& $this->items[$i];
					$link = JRoute::_('index.php?option=com_sportsmanagement&task=club.edit&id='.$row->id);
					$link2 = JRoute::_('index.php?option=com_sportsmanagement&view=teams&club_id='.$row->id);
					$canEdit = $this->user->authorise('core.edit','com_sportsmanagement');
                    $canCheckin = $this->user->authorise('core.manage','com_checkin') || $row->checked_out == $this->user->get ('id') || $row->checked_out == 0;
                    $checked = JHtml::_('jgrid.checkedout', $i, $this->user->get ('id'), $row->checked_out_time, 'clubs.', $canCheckin);
					?>
					<tr class="<?php echo "row$k"; ?>">
						<td class="center">
                        <?php
                        echo $this->pagination->getRowOffset($i);
                        ?>
                        </td>
                        <td class="center">
                        <?php 
                        echo JHtml::_('grid.id', $i, $row->id);  
                        ?>
                        </td>
						<?php
                        
							$inputappend='';
							?>
							<td class="center">
                            <?php
                            ?>
                                <a href="<?php echo $link2; ?>">
									<?php
									$imageTitle = JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_SHOW_TEAMS');
                                    $attribs['title'] = $imageTitle;
									echo JHtml::_('image','administrator/components/com_sportsmanagement/assets/images/icon-16-Teams.png',
													$imageTitle, $attribs);
									?>
								</a>
                                
                            <?php if ($row->checked_out) : ?>
						<?php echo JHtml::_('jgrid.checkedout', $i, $row->editor, $row->checked_out_time, 'clubs.', $canCheckin); ?>
					<?php endif; ?>
					<?php if ($canEdit) : ?>
						<a href="<?php echo JRoute::_('index.php?option=com_sportsmanagement&task=club.edit&id='.(int) $row->id); ?>">
							<?php echo $this->escape($row->name); ?></a>
					<?php else : ?>
							<?php echo $this->escape($row->name); ?>
					<?php endif; ?>
                        
                        
                        
                        <?php //echo $checked; ?>
                        
                        <?php //echo $row->name; ?>
                        <p class="smallsub">
						<?php echo JText::sprintf('JGLOBAL_LIST_ALIAS', $this->escape($row->alias));?></p>    
							</td>
							<?php
						
						?>
						
                        
                        </td>
						<td>
							<?php
							if ($row->website != ''){echo '<a href="'.$row->website.'" target="_blank">';}
							echo $row->website;
							if ($row->website != ''){echo '</a>';}
							?>
						</td>
                        <td><?php echo $row->unique_id; ?></td>
						<td class="center">
							<?php
							if ($row->logo_big == '')
							{
								$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_NO_IMAGE');
								echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/information.png',
												$imageTitle,'title= "'.$imageTitle.'"');

							}
							elseif ($row->logo_big == sportsmanagementHelper::getDefaultPlaceholder("clublogobig"))
							{
								$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_DEFAULT_IMAGE');
								echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/information.png',
												$imageTitle,'title= "'.$imageTitle.'"');
?>
<a href="<?php echo JURI::root().$row->logo_big;?>" title="<?php echo $imageTitle;?>" class="modal">
<img src="<?php echo JURI::root().$row->logo_big;?>" alt="<?php echo $imageTitle;?>" width="20" />
</a>
<?PHP                                                
							} else {
								if (JFile::exists(JPATH_SITE.DS.$row->logo_big)) {
									$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_CUSTOM_IMAGE');
									echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/ok.png',
													$imageTitle,'title= "'.$imageTitle.'"');
?>
<a href="<?php echo JURI::root().$row->logo_big;?>" title="<?php echo $imageTitle;?>" class="modal">
<img src="<?php echo JURI::root().$row->logo_big;?>" alt="<?php echo $imageTitle;?>" width="20" />
</a>
<?PHP                                                    
								} else {
									$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_NO_IMAGE');
									echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/delete.png',
													$imageTitle,'title= "'.$imageTitle.'"');
								}
							}
							?>
						</td>
						<td class="center">
							<?php
							if ($row->logo_middle == '')
							{
								$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_NO_IMAGE');
								echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/information.png',
												$imageTitle,'title= "'.$imageTitle.'"');
							}
							elseif ($row->logo_middle == sportsmanagementHelper::getDefaultPlaceholder("clublogomedium"))
							{
								$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_DEFAULT_IMAGE');
								echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/information.png',
												$imageTitle,'title= "'.$imageTitle.'"');
?>
<a href="<?php echo JURI::root().$row->logo_middle;?>" title="<?php echo $imageTitle;?>" class="modal">
<img src="<?php echo JURI::root().$row->logo_middle;?>" alt="<?php echo $imageTitle;?>" width="20" />
</a>
<?PHP                                                
							} else {
								if (JFile::exists(JPATH_SITE.DS.$row->logo_middle)) {
									$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_CUSTOM_IMAGE');
									echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/ok.png',
													$imageTitle,'title= "'.$imageTitle.'"');
?>
<a href="<?php echo JURI::root().$row->logo_middle;?>" title="<?php echo $imageTitle;?>" class="modal">
<img src="<?php echo JURI::root().$row->logo_middle;?>" alt="<?php echo $imageTitle;?>" width="20" />
</a>
<?PHP                                                    
                                                    
								} else {
									$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_NO_IMAGE');
									echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/delete.png',
													$imageTitle,'title= "'.$imageTitle.'"');
								}
							}
							?>
						</td>
						<td class="center">
							<?php
							if ($row->logo_small == '')
							{
								$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_NO_IMAGE');
								echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/information.png',
												$imageTitle,'title= "'.$imageTitle.'"');
							}
							elseif ($row->logo_small == sportsmanagementHelper::getDefaultPlaceholder("clublogosmall"))
							{
								$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_DEFAULT_IMAGE');
								echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/information.png',
				  								$imageTitle,'title= "'.$imageTitle.'"');
?>
<a href="<?php echo JURI::root().$row->logo_small;?>" title="<?php echo $imageTitle;?>" class="modal">
<img src="<?php echo JURI::root().$row->logo_small;?>" alt="<?php echo $imageTitle;?>" width="20" />
</a>
<?PHP                                                 
							} else {
								if (JFile::exists(JPATH_SITE.DS.$row->logo_small)) {
									$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_CUSTOM_IMAGE');
									echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/ok.png',
													$imageTitle,'title= "'.$imageTitle.'"');
?>
<a href="<?php echo JURI::root().$row->logo_small;?>" title="<?php echo $imageTitle;?>" class="modal">
<img src="<?php echo JURI::root().$row->logo_small;?>" alt="<?php echo $imageTitle;?>" width="20" />
</a>
<?PHP                                                     
								} else {
									$imageTitle=JText::_('COM_SPORTSMANAGEMENT_ADMIN_CLUBS_NO_IMAGE');
									echo JHtml::_(	'image','administrator/components/com_sportsmanagement/assets/images/delete.png',
													$imageTitle,'title= "'.$imageTitle.'"');
								}
							}
						
/*
<td class=""><?php echo $row->zipcode; ?></td>
<td class=""><?php echo $row->location; ?></td>
<td class=""><?php echo $row->address; ?></td>
*/                        
                        	?>
						</td>
                        <td class="">
								<input<?php echo $inputappend; ?>	type="text" size="10" class="form-control form-control-inline"
																	name="zipcode<?php echo $row->id; ?>"
																	value="<?php echo $row->zipcode; ?>"
																	onchange="document.getElementById('cb<?php echo $i; ?>').checked=true" />
							<br />
								<input<?php echo $inputappend; ?>	type="text" size="30" class="form-control form-control-inline"
																	name="location<?php echo $row->id; ?>"
																	value="<?php echo $row->location; ?>"
																	onchange="document.getElementById('cb<?php echo $i; ?>').checked=true" />
						<br />
								<input<?php echo $inputappend; ?>	type="text" size="30" class="form-control form-control-inline"
																	name="address<?php echo $row->id; ?>"
																	value="<?php echo $row->address; ?>"
																	onchange="document.getElementById('cb<?php echo $i; ?>').checked=true" />
							</td>
                            
                        <td class="">
                        <?php echo $row->latitude; ?>
                        <br />
                        <?php echo $row->longitude; ?>
                        </td>
                        <td class="center">
                        <?php 
                        $append =' onchange="document.getElementById(\'cb'.$i.'\').checked=true" ';
                        echo JHtml::_(	'select.genericlist',$this->lists['nation'],'country'.$row->id,
												'class="form-control form-control-inline" size="1"'.$append,'value','text',$row->country); 
                        ?>
                        </td>
                        <td class="center"><?php echo JSMCountries::getCountryFlag($row->country); ?></td>
						<td class="order">
							<span>
								<?php echo $this->pagination->orderUpIcon($i,$i > 0 ,'clubs.orderup','JLIB_HTML_MOVE_UP',true); ?>
							</span>
							<span>
								<?php echo $this->pagination->orderDownIcon($i,$n,$i < $n,'clubs.orderdown','JLIB_HTML_MOVE_DOWN',true);
								$disabled=true ?  '' : 'disabled="disabled"';
								?>
							</span>
							<input  type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>" <?php echo $disabled; ?>
									class="form-control form-control-inline" style="text-align: center" />
						</td>
						<td class="center"><?php echo $row->id; ?></td>
					</tr>
					<?php
					$k=1 - $k;
				}
				?>
			</tbody>
		</table>
	</div>
	
