<?PHP



defined('_JEXEC') or die('Restricted access');
$templatesToLoad = array('footer','listheader');
sportsmanagementHelper::addTemplatePaths($templatesToLoad, $this);
JHtml::_( 'behavior.tooltip' );


$attribs['width'] = '20px';
$attribs['height'] = 'auto';

/*
// welche joomla version ?
if(version_compare(JVERSION,'3.0.0','ge')) 
{
echo $this->loadTemplate('joomla3');
}
else
{
echo $this->loadTemplate('joomla2');    
}
*/

?>
<table class="table" >

<?PHP
//for($a=0; $a < sizeof($this->commitlist); $a++  )
foreach( $this->commitlist as $key => $value   )
{
?>
<tr>
<td>
<?PHP
$new_date = substr($value->commit->author->date,0,10).' '.substr($value->commit->author->date,11,8);
//echo $value->commit->author->date;
$timestamp = sportsmanagementHelper::getTimestamp($new_date);
//$date = JFactory::getDate( $timestamp );
//echo $date;
//echo $new_date;
echo date("d.m.Y H:i:s",$timestamp);  
?>
</td>
<td>
<?PHP
echo $value->commit->author->name;
?>
</td>
<td>

<a class="btn btn-small btn-info" href="<?php echo $value->html_url; ?>" target="_blank">
<span class="octicon octicon-mark-github"></span> <?php echo $value->commit->message; ?>
</a>
        
</td>
<td>

<!--
<a class="btn btn-small btn-warning" href="https://issues.joomla.org/tracker/<?php echo $this->trackerAlias; ?>/<?php echo $item->pull_id; ?>" target="_blank">
<i class="icon-joomla"></i> <?php echo \JText::_('COM_PATCHTESTER_JISSUE'); ?>
</a>
-->

<?PHP
//echo $value->author->avatar_url;
echo JHtml::image($value->author->avatar_url, $value->commit->author->name, $attribs, true, false);
?>
</td>


</tr>
<?PHP
}
?>

</table>

