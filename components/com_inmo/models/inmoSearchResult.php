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

class InmoModelInmoSearchResult extends JModelItem
{
	protected $item, $fotos, $resizeObj, $ids, $fotosPortada;
	/**
	 * Get the message
	 * @return string The message to be displayed to the user
	 */
	
	public function searchProperties($nHabMin,$nHabMax, $precioMin, $precioMax){
		// *** 1) Initialise / load image
		$this->ids = new stdClass();
		$db = JFactory::getDBO();
		$query= "select * from #__inmo where nhabitacions >= ".$nHabMin." 
			AND nhabitacions <= ".$nHabMax . " AND precio>=".$precioMin." AND precio<=".$precioMax.";";
		$db->setQuery($query);
		$this->ids=$db->loadRowList();
		for($i=0;$i<count($this->ids);$i++){
			$query= "select foto_url from #__fotos where casa_id=".$this->ids[$i]['0']." order by id;";
			$db->setQuery($query);
			$unafoto=$db->loadRow();
			$this->fotosPortada[$i]=$unafoto[0];	
		}
		return array($this->ids, $this->fotosPortada);
		
	}	
}

?>
