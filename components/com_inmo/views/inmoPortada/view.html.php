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


class InmoViewInmoPortada extends JView
{
	function display($tpl = null) 
	{
		// Assign data to the view
		//$this->item = $this->get('item');
		$document = JFactory::getDocument();
		$document->addStyleSheet(PATHINTERNOJOOMLA . 'plantilla.css');
		$document->addStyleSheet(PATHINTERNOJOOMLA . 'slideshowPortada/css/slideshow.css');
		//$document->addScript(PATHINTERNOJOOMLA . 'slideshowPortada/js/mootools-1.3.2-core.js');
		//$document->addScript(PATHINTERNOJOOMLA . 'slideshowPortada/js/mootools-1.3.2.1-more.js');
		//$document->addScript(PATHINTERNOJOOMLA . 'slideshowPortada/js/slideshow.js');
		//$document->addScript(PATHINTERNOJOOMLA . 'slideshowPortada/js/slideshow.kenburns.js');
				
		
		
		$model=$this->getModel();
		$this->fotosPortada=$model->leerFotosPortada();
		$this->localidades=$model->leerLocalidades();
					
		// Display the view
		parent::display($tpl);
	}
}
