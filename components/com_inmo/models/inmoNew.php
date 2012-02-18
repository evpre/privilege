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

class InmoModelInmoNew extends JModelItem
{
	protected $item, $fotos;

	/**
	 * Get the message
	 * @return string The message to be displayed to the user
	 */
	public function getItem() 
	{
		if (!isset($this->item)) {
			$id = JRequest::getInt('id');
			// Get a TableHelloWorld instance
			$table = $this->getTable('Inmo', 'InmoTable');

			// Load the message
			$table->load($id);

			// Assign the message
			$this->item = $table->numeroReferencia;
		}
		return $this->item;
	}
	public function readProperty($numReference){	
			$db = JFactory::getDBO();
			$query= "select * from #__inmo where numeroReferencia=".$numReference.";";
			$db->setQuery($query);
			$this->item=$db->loadRow();
			return $this->item;
	}
	public function readPhotos($numReference){
		$db = JFactory::getDBO();
		$query= "select foto_url from #__fotos where casa_id=".$numReference.";";
		$db->setQuery($query);
		$this->fotos=$db->loadResultArray();
		return $this->fotos;
	}
}

?>
