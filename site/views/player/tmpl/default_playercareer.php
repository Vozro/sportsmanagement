<?php defined('_JEXEC') or die('Restricted access');

if (count($this->historyPlayer) > 0)
{
	?>
	<!-- Player history START -->
	<h2><?php echo JText::_('COM_SPORTSMANAGEMENT_PERSON_PLAYING_CAREER'); ?></h2>
	<table width="96%" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<table id="playerhistory">
					<tr class="sectiontableheader">
						<th class="td_l"><?php echo JText::_('COM_SPORTSMANAGEMENT_PERSON_COMPETITION');
							?></th>
						<th class="td_l"><?php echo JText::_('COM_SPORTSMANAGEMENT_PERSON_SEASON');
							?></th>
						<th class="td_l"><?php echo JText::_('COM_SPORTSMANAGEMENT_PERSON_TEAM');
							?></th>
						<th class="td_l"><?php echo JText::_('COM_SPORTSMANAGEMENT_PERSON_POSITION');
							?></th>
					</tr>
					<?php
					$k=0;
					foreach ($this->historyPlayer AS $station)
					{
						$link1=sportsmanagementHelperRoute::getPlayerRoute($station->project_slug,$station->team_slug,$this->person->slug);
						$link2=sportsmanagementHelperRoute::getTeamInfoRoute($station->project_slug,$station->team_slug);
						?>
						<tr class="<?php echo ($k==0)? $this->config['style_class1'] : $this->config['style_class2']; ?>">
							<td class="td_l">
							<?php 
								echo JHtml::link($link1,$station->project_name);
							?></td>
							<td class="td_l"><?php echo $station->season_name;
								?></td>
							<td class="td_l"><?php 
							if ($this->config['show_playercareer_teamlink'] == 1) {
								echo JHtml::link($link2,$station->team_name);
							} else {
								echo $station->team_name;
							}
							?></td>
							<td class="td_l"><?php echo JText::_($station->position_name);
								?></td>
						</tr>
						<?php
						$k=(1-$k);
					}
					?>
				</table>
			</td>
		</tr>
	</table>

	<!-- Player history END -->
	<?php
}
?>
