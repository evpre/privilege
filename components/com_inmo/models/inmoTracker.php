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

class InmoModelInmoTracker extends JModelItem
{
	protected $item, $fotos, $resizeObj, $ids, $fotosPortada, $localidades;
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

	public function readAllProperties(){
		// *** 1) Initialise / load image
		//$this->ids = new stdClass();
		$db = JFactory::getDBO();
		$query= "select * from #__inmo";
		$db->setQuery($query);
		$this->ids=$db->loadRowList();
		for($i=0;$i<count($this->ids);$i++){
			$query= "select foto_url from #__fotos where casa_id=".$this->ids[$i]['0']." AND portada=1";
			$db->setQuery($query);
			$unafoto=$db->loadRow();
			$this->fotosPortada[$i]=$unafoto[0];	
		}
		return array($this->ids, $this->fotosPortada);
		
	}
	
	public function searchProperties($nHabMax, $precioMin, $precioMax, $localidad,$tipo){
		// *** 1) Initialise / load image
		$this->ids = new stdClass();
		$db = JFactory::getDBO();
		if($precioMax!="0")
			$query0=" where precio <=".$precioMax;
		else $query0=" where precio <=1000000000";
		if($localidad!="0")
			$query1=" AND poblacion='".$localidad."'";
		else $query1="";
		if($nHabMax!="0")
			$query2=" AND nhabitacions = ".$nHabMax;
		else $query2="";
		if($precioMin!="0") $query3=" AND precio>=".$precioMin;
		else $query3="";
		if($tipo!="0") $query4 = " AND tipo='".$tipo."'";
		else $query4="";
		$query= "select * from #__inmo".$query0.$query1.$query2.$query3.$query4;
		$db->setQuery($query);
		$this->ids=$db->loadRowList();
		for($i=0;$i<count($this->ids);$i++){
			$query= "select foto_url from #__fotos where casa_id=".$this->ids[$i]['0']." AND portada=1;";
			$db->setQuery($query);
			$unafoto=$db->loadRow();
			$this->fotosPortada[$i]=$unafoto[0];	
		}
		return array($this->ids, $this->fotosPortada);
		
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
