<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modelitem');

class InmoModelInmoPortada extends JModelItem
{
	protected $item, $fotosPortada, $localidades;
	/**
	 * Get the message
	 * @return string The message to be displayed to the user
	 */

	public function leerFotosPortada(){
		// *** 1) Initialise / load image
		//$this->ids = new stdClass();
		$db = JFactory::getDBO();
		$query= "select * from #__fotos where portada=1";
		$db->setQuery($query);
		$this->fotosPortada=$db->loadRowList();
		return $this->fotosPortada;		
	}
	public function leerLocalidades(){
		$db = JFactory::getDBO();
		$query= "select localidad from #__localidades";
		$db->setQuery($query);
		$this->localidades=$db->loadResultArray();
		return $this->localidades;		
	}
}

?>
