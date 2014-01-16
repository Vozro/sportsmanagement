<?php 
defined( '_JEXEC' ) or die( 'Restricted access' ); 

$kmlpath = JURI::root().'tmp'.DS.$this->club->id.'-club.kml';
?>
<div style="width: 100%; float: left">
	<div class="contentpaneopen">
		<div class="contentheading">
			<?php echo JText::_('COM_SPORTSMANAGEMENT_GMAP_DIRECTIONS'); ?>
		</div>
	</div>
	<?php

if ( !JPluginHelper::isEnabled( 'system', 'plugin_googlemap3' )  )
            {
                JError::raiseWarning(500,JText::_('COM_SPORTSMANAGEMENT_ADMIN_GOOGLEMAP_NOT_ENABLED'));
                
            }
            else
            {
                //JError::raiseNotice(100,JText::_('COM_SPORTSMANAGEMENT_ADMIN_GOOGLEMAP_AVAILABLE'));
                $plugin = JPluginHelper::getPlugin('system', 'plugin_googlemap3');
                $paramsPlugin = new JRegistry($plugin->params);
    $params  = "{mosmap mapType='".$paramsPlugin->get('mapType','')."'|dir='1'|zoomWheel='1'|zoom='".$paramsPlugin->get('zoom','')."'|corzoom='0'|minzoom='0'|maxzoom='19'|showEarthMaptype='1'|showNormalMaptype='1' |showSatelliteMaptype='1' |showTerrainMaptype='1' |showHybridMaptype='1'   |kml='".$kmlpath."'|kmlrenderer='geoxml'|controltype='user'|kmlsidebar='left'|kmlsbwidth='200'|lightbox='1'|width='".$paramsPlugin->get('width','')."'|height='".$paramsPlugin->get('height','')."' |overview='1'  }";    
		echo JHTML::_('content.prepare', $params);		

            }
            		
        

                
	?>
</div>