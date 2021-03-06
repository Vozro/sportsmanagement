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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');


jimport('joomla.html.parameter.element.timezones');


/**
 * sportsmanagementViewJLXMLImports
 * 
 * @package   
 * @author 
 * @copyright diddi
 * @version 2014
 * @access public
 */
class sportsmanagementViewJLXMLImports extends sportsmanagementView
{
	
	/**
	 * sportsmanagementViewJLXMLImports::init()
	 * 
	 * @param mixed $tpl
	 * @return
	 */
	public function init ($tpl = null)
	{
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$option = $jinput->getCmd('option');
        // Get a refrence of the page instance in joomla
		$document = JFactory::getDocument();
        $model = JModelLegacy::getInstance('jlxmlimport', 'sportsmanagementmodel');
        $document->addScript ( JUri::root(true).'/administrator/components/'.$option.'/assets/js/jlxmlimports.js' );
        
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' getLayout <br><pre>'.print_r($this->getLayout(),true).'</pre>'),'');
        
        $this->title = JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_TITLE_1_3');
        $this->icon = 'xmlimports';
		$uri = JFactory::getURI();
		$config = JComponentHelper::getParams('com_media');
        $upload_maxsize = JComponentHelper::getParams('com_media')->get('upload_maxsize','200');
		$post = $jinput->post->getArray(array());
		$files = $jinput->getString('files');
		$this->request_url	= $uri->toString();
		$this->upload_maxsize	= $upload_maxsize;
        $this->config	= $config;
        $this->projektfussballineuropa	= $model->getDataUpdateImportID();

		if ( $this->getLayout() == 'form' || $this->getLayout() == 'form_3' )
		{
			$this->_displayForm($tpl);
			return;
		}
        
        if ( $this->getLayout() == 'update' || $this->getLayout() == 'update_3' )
		{
			$this->_displayUpdate($tpl);
			return;
		}

		if ( $this->getLayout() == 'info' || $this->getLayout() == 'info_3' )
		{
			$this->_displayInfo($tpl);
			return;
		}

		if ( $this->getLayout() == 'selectpage' || $this->getLayout() == 'selectpage_3' )
		{
			$this->_displaySelectpage($tpl);
			return;
		}

		
        //// Set toolbar items for the page
//        $stylelink = '<link rel="stylesheet" href="'.JURI::root().'administrator/components/com_sportsmanagement/assets/css/jlextusericons.css'.'" type="text/css" />' ."\n";
//        $document->addCustomTag($stylelink);
        // Set toolbar items for the page
        
//		JToolBarHelper::title(JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_TITLE_1_3'),'xmlimports');
//		
//
//		$uri = JFactory::getURI();
//		$config = JComponentHelper::getParams('com_media');
//        $upload_maxsize = JComponentHelper::getParams('com_media')->get('upload_maxsize','200');
//		$post = JRequest::get('post');
//		$files = JRequest::get('files');
//
//		$this->assign('request_url',$uri->toString());
//		$this->assignRef('upload_maxsize',$upload_maxsize);
//        $this->assignRef('config',$config);
//        $this->assign('projektfussballineuropa',$model->getDataUpdateImportID() );
        
        //parent::addToolbar();

		//parent::display($tpl);
	}

	
    /**
     * sportsmanagementViewJLXMLImports::_displayUpdate()
     * 
     * @param mixed $tpl
     * @return void
     */
    private function _displayUpdate($tpl)
	{
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$option = $jinput->getCmd('option');
       //$project_id = (int) $app->getUserState($option.'project', 0);
       //$app->enqueueMessage(JText::_('_displayUpdate project_id -> '.'<pre>'.print_r($project_id ,true).'</pre>' ),'');
       $model = JModelLegacy::getInstance('jlxmlimport', 'sportsmanagementmodel');
	   $data = $model->getData();
       $update_matches = $model->getDataUpdate(); 
       $this->xml	= $data;
       $this->importData	= $update_matches;
       $this->projektfussballineuropa	= $model->getDataUpdateImportID();
       $this->option	= $option;
       
       // Get a refrence of the page instance in joomla
		$document	= JFactory::getDocument();
        // Set toolbar items for the page
        $stylelink = '<link rel="stylesheet" href="'.JURI::root().'administrator/components/com_sportsmanagement/assets/css/jlextusericons.css'.'" type="text/css" />' ."\n";
        $document->addCustomTag($stylelink);
       // Set toolbar items for the page
		$this->title = JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_TITLE_1_4');
        $this->icon = 'xmlimport';
        JToolBarHelper::back('JPREV','index.php?option=com_sportsmanagement&view=cpanel');
		
        $this->setLayout('update');
        //parent::addToolbar();
        
	   //parent::display($tpl);
    }  
    
     
    /**
     * sportsmanagementViewJLXMLImports::_displayForm()
     * 
     * @param mixed $tpl
     * @return void
     */
    private function _displayForm($tpl)
	{
		$mtime			= microtime();
		$mtime 			= explode(" ",$mtime);
		$mtime			= $mtime[1] + $mtime[0];
		$starttime		= $mtime;
		
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$option = $jinput->getCmd('option');
		$document		= JFactory::getDocument();
		$db				= sportsmanagementHelper::getDBConnection();
		$uri			= JFactory::getURI();
        $config['dbo'] = sportsmanagementHelper::getDBConnection(); 
		$model			= JModelLegacy::getInstance('jlxmlimport', 'sportsmanagementmodel');
		$data			= $model->getData();
		$uploadArray	= $app->getUserState($option.'uploadArray', array());
		// TODO: import timezone
		$value  		= isset($data['project']->timezone) ? $data['project']->timezone: null;
		
        
        // Get the list of time zones from the server.
		$zones = DateTimeZone::listIdentifiers();
        
        $projectid = $jinput->getInt('project_id', 0);
        //$app->enqueueMessage(JText::_('_displayForm projectid<br><pre>'.print_r($projectid,true).'</pre>'),'Error');
        //$app->enqueueMessage(JText::_('_displayForm groups<br><pre>'.print_r($groups,true).'</pre>'),'Error');
        //$lists['timezone']=$groups;
        $lists['timezone'] = JHtml::_('select.genericList', $zones, 'timezone', 'class="inputbox" ', 'value', 'text', $value);
        //$lists['timezone']= JHtml::_('select.genericlist', array(), 'timezone', ' class="inputbox"', 'value', 'text', $value);
		
		$whichfile = $app->getUserState($option.'whichfile');
		$this->option	= $option;
        $this->whichfile	= $whichfile;
        $projectidimport = $app->getUserState($option.'projectidimport');
        $this->projectidimport	= $projectidimport;
		//$countries=new Countries();
		$this->uploadArray	= $uploadArray;
		$this->starttime	= $starttime;
        // diddi
		$this->countries	= JSMCountries::getCountryOptions();
        
		$this->request_url	= $uri->toString();
		$this->xml	= $data;
        // diddi
        $mdl = JModelLegacy::getInstance('leagues', 'sportsmanagementModel');
		$this->leagues	= $mdl->getLeagues();
        // diddi
        $mdl = JModelLegacy::getInstance('seasons', 'sportsmanagementModel');
		$this->seasons	= $mdl->getSeasons();
        // diddi
        $mdl = JModelLegacy::getInstance('sportstypes', 'sportsmanagementModel');
		$this->sportstypes	= $mdl->getSportsTypes();
        
		$this->admins	= $model->getUserList(false);
		$this->editors	= $model->getUserList(false);
		$this->templates	= $model->getTemplateList();
        // diddi
        $mdl = JModelLegacy::getInstance('teams', 'sportsmanagementModel');
		$this->teams	= $mdl->getTeamListSelect();
        // diddi
        $mdl = JModelLegacy::getInstance('clubs', 'sportsmanagementModel');
		$this->clubs	= $mdl->getClubListSelect();
        // diddi
        $mdl = JModelLegacy::getInstance('eventtypes', 'sportsmanagementModel');
		$this->events	= $mdl->getEventList();
        // diddi
        //$mdl = JModelLegacy::getInstance("positions", "sportsmanagementModel",$config);
        $mdl = JModelLegacy::getInstance('positions', 'sportsmanagementModel');
		$this->positions	= $mdl->getPositionListSelect();
		$this->parentpositions	= $mdl->getParentsPositions();
        // diddi
        $mdl = JModelLegacy::getInstance('playgrounds', 'sportsmanagementModel');
		$this->playgrounds	= $mdl->getPlaygroundListSelect();
        
        $mdl = JModelLegacy::getInstance('jlxmlimport', 'sportsmanagementmodel');
		//$this->jlxmlimport ?
        // diddi
        $mdl = JModelLegacy::getInstance('persons', 'sportsmanagementModel');
		$this->persons	= $mdl->getPersonListSelect();
        // diddi
        $mdl = JModelLegacy::getInstance('statistics', 'sportsmanagementModel');
		$this->statistics	= $mdl->getStatisticListSelect();
        
		$this->OldCountries	= $model->getCountryByOldid();
		$this->import_version	= $model->import_version;
		$this->lists	= $lists;
		
		$this->show_debug_info	= JComponentHelper::getParams($option)->get('show_debug_info', 0);
    
	//	// Get a refrence of the page instance in joomla
//		$document	= JFactory::getDocument();
//        // Set toolbar items for the page
//        $stylelink = '<link rel="stylesheet" href="'.JURI::root().'administrator/components/com_sportsmanagement/assets/css/jlextusericons.css'.'" type="text/css" />' ."\n";
//        $document->addCustomTag($stylelink);
        // Set toolbar items for the page
		$this->title = JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_TITLE_2_3');
        $this->icon = 'xmlimport';
        
		JToolBarHelper::custom('jlxmlimport.insert','upload','upload',Jtext::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_START_BUTTON'), false); // --> bij clicken op import wordt de insert view geactiveerd
		JToolBarHelper::back('JPREV','index.php?option=com_sportsmanagement&view=cpanel');
		
        //parent::addToolbar();
        
        $document->addScript(JURI::root(true).'/administrator/components/com_sportsmanagement/assets/js/sm_functions.js');
        $js ="registerproject('".JURI::base()."','".$projectid."','".$app->getCfg('sitename')."','1');". "\n";
        $document->addScriptDeclaration( $js );
        
        $this->setLayout('form');

		//parent::display($tpl);
	}

	/**
	 * sportsmanagementViewJLXMLImports::_displayInfo()
	 * 
	 * @param mixed $tpl
	 * @return void
	 */
	private function _displayInfo($tpl)
	{
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$option = $jinput->getCmd('option');
        $mtime 		= microtime();
		$mtime		= explode(" ",$mtime);
		$mtime		= $mtime[1] + $mtime[0];
		$starttime	= $mtime;
        $config['dbo'] = sportsmanagementHelper::getDBConnection(); 
		$model 		= JModelLegacy::getInstance('jlxmlimport', 'sportsmanagementmodel',$config);
		//$post		= $jinput->get('post');
		
        $data2  = $jinput->post->getArray(array());
        //var_dump($data2);
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' data2 <br><pre>'.print_r($data2,true).'</pre>'),'');
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' jinput <br><pre>'.print_r($jinput,true).'</pre>'),'');
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' post <br><pre>'.print_r($post,true).'</pre>'),'');
        
		//// Get a refrence of the page instance in joomla
//		$document	= JFactory::getDocument();
//        // Set toolbar items for the page
//        $stylelink = '<link rel="stylesheet" href="'.JURI::root().'administrator/components/com_sportsmanagement/assets/css/jlextusericons.css'.'" type="text/css" />' ."\n";
//        $document->addCustomTag($stylelink);
        // Set toolbar items for the page
   		$this->title = JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_TITLE_3_3');
        $this->icon = 'xmlimport';

			

		$this->starttime	= $starttime;
        
        $this->importData	= $model->importData($data2);
		$this->postData	= $data2;
        
//		$this->importData	= $model->importData($post);
//		$this->postData	= $post;
        $this->option	= $option;
                
        JToolBarHelper::divider();
        JToolBarHelper::back('JPREV','index.php?option=com_sportsmanagement&view=projects');
		
        $this->setLayout('info');
        
        //parent::addToolbar();
		
        //parent::display($tpl);
	}

	/**
	 * sportsmanagementViewJLXMLImports::_displaySelectpage()
	 * 
	 * @param mixed $tpl
	 * @return void
	 */
	private function _displaySelectpage($tpl)
	{
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$option = $jinput->getCmd('option');
		$document 	= JFactory::getDocument();
		$db 		= sportsmanagementHelper::getDBConnection();
		$uri 		= JFactory::getURI();
		$model 		= JModelLegacy::getInstance('JLXMLImport', 'sportsmanagementmodel');
		$lists 		= array();

		$this->request_url	= $uri->toString();
		$this->selectType	= $app->getUserState($option.'selectType');
		$this->recordID	= $app->getUserState($option.'recordID');
        $this->option	= $option;

		switch ($this->selectType)
		{
			case '10':   { // Select new Club
						$this->clubs	= $model->getNewClubListSelect();
						$clublist = array();
						$clublist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_SELECT_CLUB'));
						$clublist = array_merge($clublist, $this->clubs);
						$lists['clubs'] = JHtml::_(	'select.genericlist', $clublist, 'clubID', 'class="inputbox select-club" onchange="javascript:insertNewClub(\''.$this->recordID.'\')" ', 'value', 'text', 0);
						unset($clubteamlist);
						}
						break;
			case '9':   { // Select Club & Team
						$this->clubsteams	= $model->getClubAndTeamListSelect();
						$clubteamlist = array();
						$clubteamlist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_SELECT_CLUB_AND_TEAM'));
						$clubteamlist = array_merge($clubteamlist,$this->clubsteams);
						$lists['clubsteams'] = JHtml::_('select.genericlist', $clubteamlist, 'teamID', 'class="inputbox select-team" onchange="javascript:insertClubAndTeam(\''.$this->recordID.'\')" ', 'value', 'text', 0);
						unset($clubteamlist);
						}
						break;
			case '8':	{ // Select Statistics
						$mdl = JModelLegacy::getInstance('statistics', 'sportsmanagementModel');
                        $this->statistics	= $mdl->getStatisticListSelect();
						$statisticlist = array();
						$statisticlist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_SELECT_STATISTIC'));
						$statisticlist = array_merge($statisticlist, $this->statistics);
						$lists['statistics'] = JHtml::_('select.genericlist', $statisticlist, 'statisticID', 'class="inputbox select-statistic" onchange="javascript:insertStatistic(\''.$this->recordID.'\')" ');
						unset($statisticlist);
						}
						break;

			case '7':	{ // Select ParentPosition
						$mdl = JModelLegacy::getInstance('positions', 'sportsmanagementModel');
                        $this->parentpositions	= $mdl->getParentsPositions();
						$parentpositionlist = array();
						$parentpositionlist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_SELECT_PARENT_POSITION'));
						$parentpositionlist = array_merge($parentpositionlist, $this->parentpositions);
						$lists['parentpositions'] = JHtml::_('select.genericlist', $parentpositionlist, 'parentPositionID', 'class="inputbox select-parentposition" onchange="javascript:insertParentPosition(\''.$this->recordID.'\')" ');
						unset($parentpositionlist);
						}
						break;

			case '6':	{ // Select Position
						$mdl = JModelLegacy::getInstance('positions', 'sportsmanagementModel');
                        $this->positions	= $mdl->getPositionListSelect();
						$positionlist = array();
						$positionlist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_SELECT_POSITION'));
						$positionlist = array_merge($positionlist, $this->positions);
						$lists['positions'] = JHtml::_('select.genericlist', $positionlist, 'positionID', 'class="inputbox select-position" onchange="javascript:insertPosition(\''.$this->recordID.'\')" ');
						unset($positionlist);
						}
						break;

			case '5':	{ // Select Event
						$mdl = JModelLegacy::getInstance('eventtypes', 'sportsmanagementModel');
                        $this->events	= $mdl->getEventList();
						$eventlist = array();
						$eventlist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_SELECT_EVENT'));
						$eventlist = array_merge($eventlist, $this->events);
						$lists['events'] = JHtml::_('select.genericlist', $eventlist, 'eventID', 'class="inputbox select-event" onchange="javascript:insertEvent(\''.$this->recordID.'\')" ');
						unset($eventlist);
						}
						break;

			case '4':	{ // Select Playground
						$mdl = JModelLegacy::getInstance('playgrounds', 'sportsmanagementModel');
                        $this->playgrounds	= $mdl->getPlaygroundListSelect();
						$playgroundlist = array();
						$playgroundlist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_SELECT_PLAYGROUND'));
						$playgroundlist = array_merge($playgroundlist, $this->playgrounds);
						$lists['playgrounds'] = JHtml::_('select.genericlist', $playgroundlist, 'playgroundID', 'class="inputbox select-playground" onchange="javascript:insertPlayground(\''.$this->recordID.'\')" ');
						unset($playgroundlist);
						}
						break;

			case '3':	{ // Select Person
                        $mdl = JModelLegacy::getInstance('persons', 'sportsmanagementModel');
						$this->persons	= $mdl->getPersonListSelect();
						$personlist = array();
						$personlist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_SELECT_PERSON'));
						$personlist = array_merge($personlist, $this->persons);
						$lists['persons'] = JHtml::_('select.genericlist', $personlist, 'personID', 'class="inputbox select-person" onchange="javascript:insertPerson(\''.$this->recordID.'\')" ');
						unset($personlist);
						}
						break;

			case '2':	{ // Select Club
						$mdl = JModelLegacy::getInstance('clubs', 'sportsmanagementModel');
                        $this->clubs	= $mdl->getClubListSelect();
						$clublist = array();
						$clublist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_SELECT_CLUB'));
						$clublist = array_merge($clublist, $this->clubs);
						$lists['clubs'] = JHtml::_('select.genericlist', $clublist, 'clubID', 'class="inputbox select-club" onchange="javascript:insertClub(\''.$this->recordID.'\')" ');
						unset($clublist);
						}
						break;

			case '1':
			default:	{ // Select Team
                        $mdl = JModelLegacy::getInstance('teams', 'sportsmanagementModel');
						$this->teams	= $mdl->getTeamListSelect();
                        $mdl = JModelLegacy::getInstance('clubs', 'sportsmanagementModel');
						$this->clubs	= $mdl->getClubListSelect();
						$teamlist = array();
						$teamlist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_SELECT_TEAM'));
						$teamlist = array_merge($teamlist, $this->teams);
						$lists['teams'] = JHtml::_('select.genericlist', $teamlist, 'teamID', 'class="inputbox select-team" onchange="javascript:insertTeam(\''.$this->recordID.'\')" ','value','text',0);
						unset($teamlist);
						}
						break;
		}

		$this->lists	= $lists;
		// Set page title
		$pageTitle = JText::_('COM_SPORTSMANAGEMENT_ADMIN_XML_IMPORT_ASSIGN_TITLE');
		$document->setTitle($pageTitle);
        
        $this->setLayout('selectpage');

		//parent::display($tpl);
	}

}
?>
