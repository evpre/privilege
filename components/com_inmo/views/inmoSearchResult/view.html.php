<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
require_once(getcwd().'/components/com_inmo/configuracion.php');


class InmoViewInmoSearchResult extends JView
{
	function display($tpl = null) 
	{
		// Assign data to the view
		//$this->item = $this->get('item');
		$document = JFactory::getDocument();
		$document->addStyleSheet(PATHINTERNOJOOMLA . 'plantilla.css');
		$document->addScript(PATHINTERNOJOOMLA . 'funciones.js');
		$document->addScript(PATHINTERNOJOOMLA . 'ajax.js');
		
		if($_GET['buscar']==true){
			$model=$this->getModel();
			list($this->ids,$this->fotosPortada)=$model->searchProperties($_GET['nHabMin'],$_GET['nHabMax'],$_GET['precioMin'],$_GET['precioMax']);
			}
		else {
			$model=$this->getModel();
			list($this->ids,$this->fotosPortada)=$model->readAllProperties();
			}
			
		// Display the view
		parent::display($tpl);
	}
}
