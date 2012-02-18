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


class InmoViewInmoNew extends JView
{
	function display($tpl = null) 
	{
		//A–adimos el archivo css
		$document = JFactory::getDocument();
		$document->addStyleSheet(PATHINTERNOJOOMLA . 'plantilla.css');
		$document->addStyleSheet(PATHINTERNOJOOMLA . 'pikachoose_4.4.4/styles/bottom.css');
		//$ajaxscript="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js";
		$document->addScript(PATHINTERNOJOOMLA.'jquery.js');
		$document->addScript(PATHINTERNOJOOMLA.'pikachoose_4.4.4/lib/jquery.pikachoose.full.js');
		
        
        //Recuperamos el modelo para poder hacer uso de las funciones
			$model=$this->getModel();
			$this->item=$model->readProperty($_GET["numRef"]);
			$this->fotos=$model->readPhotos($_GET["idImagen"]);
		// Display the view
		parent::display($tpl);
	}
}
