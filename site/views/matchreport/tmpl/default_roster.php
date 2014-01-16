<?php 
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.modal');
?>
<!-- START: game roster -->
<!-- Show Match players -->
<?php
if (!empty($this->matchplayerpositions))
{
?>

<h2><?php echo JText::_('COM_SPORTSMANAGEMENT_MATCHREPORT_STARTING_LINE-UP'); ?></h2>		
	<table class="matchreport">
		<?php
		foreach ($this->matchplayerpositions as $pos)
		{
			$personCount=0;
			foreach ($this->matchplayers as $player)
			{
				if ($player->pposid==$pos->pposid)
				{
					$personCount++;
				}
			}

			if ($personCount > 0)
			{
				?>
				<tr><td colspan="2" class="positionid"><?php echo JText::_($pos->name); ?></td></tr>
				<tr>
					<!-- list of home-team -->
					<td class="list">
						<div style="text-align: right; ">
							<ul style="list-style-type: none;">
								<?php
								foreach ($this->matchplayers as $player)
								{
								  if ( $player->trikot_number != 0 )
								  {
                  $player->jerseynumber = $player->trikot_number;
                  }
                  
									if ($player->pposid==$pos->pposid && $player->ptid==$this->match->projectteam1_id)
									{
										?>
										<li <?php echo ($this->config['show_player_picture'] == 2 ? 'class="list_pictureonly_left"' : 'class="list"') ?>>
											<?php
											$player_link = sportsmanagementHelperRoute::getPlayerRoute($this->project->slug,$player->team_slug,$player->person_slug);
											$prefix = $player->jerseynumber ? $player->jerseynumber."." : null;
											$match_player = sportsmanagementHelper::formatName($prefix,$player->firstname,$player->nickname,$player->lastname, $this->config["name_format"]);
											$isFavTeam = in_array( $player->team_id, explode(",",$this->project->fav_team));

                                            if ( ($this->config['show_player_profile_link'] == 1) || (($this->config['show_player_profile_link'] == 2) && ($isFavTeam)) )
                                            {
												if ($this->config['show_player_picture'] == 2) {
													echo '';
												} else {
												
                        if ( $this->config['show_player_profile_link_alignment'] == 0 )
												{
                        echo JHTML::link($player_link,$match_player.JHTML::image(JURI::root().'images/com_sportsmanagement/database/teamplayers/shirt.php?text='.$player->jerseynumber,$player->jerseynumber,array('title'=> $player->jerseynumber)));
                        }
													//echo JHTML::link($player_link,$match_player);
                          //echo JHTML::link($player_link,$match_player.JHTML::image(JURI::root().'images/com_sportsmanagement/database/teamplayers/shirt.php?text='.$player->jerseynumber,$player->jerseynumber,array('title'=> $player->jerseynumber)));
												}
                                            } else {
												if ($this->config['show_player_picture'] == 2) {
													echo '';
												} else {
													echo $match_player;
												}
                                            }

                                            if (($this->config['show_player_picture'] == 1) || ($this->config['show_player_picture'] == 2))
                                            {
                                                $imgTitle=($this->config['show_player_profile_link'] == 1) ? JText::sprintf('COM_SPORTSMANAGEMENT_MATCHREPORT_PIC', $match_player) : $match_player;
                                                $picture=$player->picture;
                                                if ((empty($picture)) || ($picture == sportsmanagementHelper::getDefaultPlaceholder("player") ) || !file_exists( $picture ) )
                                                {
                                                    $picture = $player->ppic;
                                                }
                                                if ( !file_exists( $picture ) )
                                                {
                                                    $picture = sportsmanagementHelper::getDefaultPlaceholder("player");
                                                }
                                                if ( ($this->config['show_player_picture'] == 2) && ($this->config['show_player_profile_link'] == 1) ){
												/*
                                                	echo JHTML::link($player_link,sportsmanagementHelper::getPictureThumb($picture,
																													$imgTitle,
																													$this->config['player_picture_width'],
																													$this->config['player_picture_height']));
												*/
                                                ?>
                                                

<a href="<?php echo JURI::root().$picture;?>" title="<?php echo $imgTitle;?>" class="modal">
<img src="<?php echo JURI::root().$picture;?>" alt="<?php echo $imgTitle;?>" width="<?php echo $this->config['player_picture_width'];?>" />
</a>
                                                
                                                <?PHP
                                                echo JHTML::link($player_link,JHTML::image($picture, $imgTitle, array('title' => $imgTitle,'width' => $this->config['player_picture_width'] )));
                                                ?>
                                                </a>
                                                <?PHP
                                                } else {
													/*
                                                    echo sportsmanagementHelper::getPictureThumb($picture,
																							$imgTitle,
																							$this->config['player_picture_width'],
																							$this->config['player_picture_height']);
													
                                                    */
                                                    ?>
<a href="<?php echo JURI::root().$picture;?>" title="<?php echo $imgTitle;?>" class="modal">
<img src="<?php echo JURI::root().$picture;?>" alt="<?php echo $imgTitle;?>" width="<?php echo $this->config['player_picture_width'];?>" />
</a>                                               
                                               
                                                <?PHP
                                                    echo JHTML::image($picture, $imgTitle, array('title' => $imgTitle,'width' => $this->config['player_picture_width'] ));
                        ?>
                                                </a>
                                                <?PHP
                        if ( $this->config['show_player_profile_link_alignment'] == 1 )
												{
												echo '<br>';
                        echo JHTML::link($player_link,$match_player.JHTML::image(JURI::root().'images/com_sportsmanagement/database/teamplayers/shirt.php?text='.$player->jerseynumber,$player->jerseynumber,array('title'=> $player->jerseynumber)));
                        }
                                                    
                                                    echo '&nbsp;';
                                                }
                                            }
											?>
										</li>
									<?php
									}
								}
								?>
							</ul>
						</div>
					</td>
					<!-- list of guest-team -->
					<td class="list">
						<div style="text-align: left;">
							<ul style="list-style-type: none;">
								<?php
								foreach ($this->matchplayers as $player)
								{
								
								  if ( $player->trikot_number != 0 )
								  {
                  $player->jerseynumber = $player->trikot_number;
                  }
                  
									if ($player->pposid==$pos->pposid && $player->ptid==$this->match->projectteam2_id)
									{
										?>
										<li <?php echo ($this->config['show_player_picture'] == 2 ? 'class="list_pictureonly_right"' : 'class="list"') ?>>
											<?php
											$player_link=sportsmanagementHelperRoute::getPlayerRoute($this->project->slug,$player->team_slug,$player->person_slug);
											$prefix = $player->jerseynumber ? $player->jerseynumber."." : null;
											$match_player=sportsmanagementHelper::formatName($prefix,$player->firstname,$player->nickname,$player->lastname, $this->config["name_format"]);
											$isFavTeam = in_array( $player->team_id, explode(",",$this->project->fav_team));

                                            if (($this->config['show_player_picture'] == 1) || ($this->config['show_player_picture'] == 2))
                                            {
                                                $imgTitle=($this->config['show_player_profile_link'] == 1) ? JText::sprintf('COM_SPORTSMANAGEMENT_MATCHREPORT_PIC', $match_player) : $match_player;
                                                $picture=$player->picture;
                                                if ((empty($picture)) || ($picture == sportsmanagementHelper::getDefaultPlaceholder("player") ) || !file_exists( $picture ) )
                                                {
                                                    $picture = $player->ppic;
                                                }
                                                if ( !file_exists( $picture ) )
                                                {
                                                    $picture = sportsmanagementHelper::getDefaultPlaceholder("player");
                                                }
                                                 if ( ($this->config['show_player_picture'] == 2) && ($this->config['show_player_profile_link'] == 1) ){
													/*
                                                    echo JHTML::link($player_link,sportsmanagementHelper::getPictureThumb($picture,
																													$imgTitle,
																													$this->config['player_picture_width'],
																													$this->config['player_picture_height']));
                                                    */
                                                    echo JHTML::link($player_link,JHTML::image($picture, $imgTitle, array('title' => $imgTitle,'width' => $this->config['player_picture_width'] )));                                                                
												                            if ( $this->config['show_player_profile_link_alignment'] == 1 )
												                            {
                                                    echo '<br>';
                                                    echo JHTML::link($player_link,JHTML::image(JURI::root().'images/com_sportsmanagement/database/teamplayers/shirt.php?text='.$player->jerseynumber,$player->jerseynumber,array('title'=> $player->jerseynumber)).$match_player);
                                                    }
                                                } else {
													/*
                                                    echo sportsmanagementHelper::getPictureThumb($picture,
																							$imgTitle,
																							$this->config['player_picture_width'],
																							$this->config['player_picture_height']);
													*/                         ?>
    
<a href="<?php echo JURI::root().$picture;?>" title="<?php echo $imgTitle;?>" class="modal">
<img src="<?php echo JURI::root().$picture;?>" alt="<?php echo $imgTitle;?>" width="<?php echo $this->config['player_picture_width'];?>" />
</a>
                                                <?PHP
                                                    
                                                    echo JHTML::image($picture, $imgTitle, array('title' => $imgTitle,'width' => $this->config['player_picture_width'] ));
                                                    
                                                     ?>
                                                     </a>
                                                     <?PHP
                                                    if ( $this->config['show_player_profile_link_alignment'] == 1 )
												                            {
                                                    echo '<br>';
                                                    echo JHTML::link($player_link,JHTML::image(JURI::root().'images/com_sportsmanagement/database/teamplayers/shirt.php?text='.$player->jerseynumber,$player->jerseynumber,array('title'=> $player->jerseynumber)).$match_player);
                                                    }
                                                    echo '&nbsp;';
                                                }
                                            }

											if ( ($this->config['show_player_profile_link'] == 1) || (($this->config['show_player_profile_link'] == 2) && ($isFavTeam)) )
                                            {
												if ($this->config['show_player_picture'] == 2) {
													echo '';
												} else {
													//echo JHTML::link($player_link,$match_player);
												if ( $this->config['show_player_profile_link_alignment'] == 0 )
												{
                          echo JHTML::link($player_link,JHTML::image(JURI::root().'images/com_sportsmanagement/database/teamplayers/shirt.php?text='.$player->jerseynumber,$player->jerseynumber,array('title'=> $player->jerseynumber)).$match_player);
                        }
                          
												}
                                            } else {
												if ($this->config['show_player_picture'] == 2) {
													echo '';
												} else {
													//echo JHTML::link($player_link,JHTML::image(JURI::root().'images/com_sportsmanagement/database/teamplayers/shirt.php?text='.$player->jerseynumber,$player->jerseynumber,array('title'=> $player->jerseynumber)).$match_player);
                          echo $match_player;
												}
                                            }
											?>
										</li>
										<?php
									}
								}
								?>
							</ul>
						</div>
					</td>
				</tr>
				<?php
			}
		}
		?>
	</table>
	<?php
}
?>
<!-- END of Match players -->
<br />

<!-- END: game roster -->