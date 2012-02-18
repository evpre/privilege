<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class InmoController extends JController
{
	function realizarBusqueda (){
		$nHabMax = JRequest::getVar('nHabMax');
		$precioMin = JRequest::getVar('precioMin');
		$precioMax = JRequest::getVar('precioMax');
		$localidad = JRequest::getVar('localidad');
		$tipo = JRequest::getVar('tipo');
		$this->setRedirect('index.php/buscar?buscar=true&nHabMax='.$nHabMax.'&precioMin='.$precioMin.'&precioMax='.$precioMax.'&localidad='.$localidad.'&tipo='.$tipo); 
	}
	function guardarPropiedad(){
		$nombrePropiedad = JRequest::getVar('nombrePropiedad');  
		$numeroReferencia = JRequest::getVar('numeroReferencia');
		$tipoVivienda = JRequest::getVar('tipoVivienda');  
		$precio = JRequest::getVar('precio');  
		$poblacion = JRequest::getVar('poblacion');		
		$nHabitaciones = JRequest::getVar('nhabitaciones');  
		$nBanyos = JRequest::getVar('nbanyos');  
		$m2Construidos = JRequest::getVar('m2Construidos');  
		$m2Parcela = JRequest::getVar('m2Parcela');  
		$anyoConstruccion = JRequest::getVar('anyoConstruccion');  
		$piscina = JRequest::getVar('piscina'); 
		if($piscina!='piscina')
			$piscina=1; 
		$piscinaComunitaria = JRequest::getVar('piscinaComunitaria');  
		if($piscinaComunitaria!='piscinaCom')
			$piscinaComunitaria=1; 
		$vistasAlMar = JRequest::getVar('vistasAlMar');  
		if($vistasAlMar!='vistas')
			$vistasAlMar=1;
		$comodidades = JRequest::getVar('comodidades');  
		$distancias = JRequest::getVar('distancias');  
		
		$fotoPortada=$numeroReferencia.'0'.$_FILES['images']['name']['0'];
		$modelo = $this->getModel('inmoForm');  
   		$modelo->guardarPropiedad($nombrePropiedad,$numeroReferencia,$tipoVivienda,$precio,$poblacion,$nHabitaciones,$nBanyos,$m2Construidos,$m2Parcela,$anyoConstruccion,$piscina,$piscinaComunitaria,$vistasAlMar,$comodidades,$distancias);
   		$modelo->guardarFotoPortada($fotoPortada);
   		$this->setRedirect('index.php/anadir-vivienda', 'Propiedad agregada correctamente'); 
	}
	
	function modificarPropiedad(){
		$id = JRequest::getVar('id');
		$nombrePropiedad = JRequest::getVar('nombrePropiedad');  
		$numeroReferencia = JRequest::getVar('numeroReferencia');
		$tipoVivienda = JRequest::getVar('tipoVivienda');  
		$precio = JRequest::getVar('precio');  
		$poblacion = JRequest::getVar('poblacion');		
		$nHabitaciones = JRequest::getVar('nhabitaciones');  
		$nBanyos = JRequest::getVar('nbanyos');  
		$m2Construidos = JRequest::getVar('m2Construidos');  
		$m2Parcela = JRequest::getVar('m2Parcela');  
		$anyoConstruccion = JRequest::getVar('anyoConstruccion');  
		$piscina = JRequest::getVar('piscina'); 
		if($piscina!='piscina')
			$piscina=1; 
		$piscinaComunitaria = JRequest::getVar('piscinaComunitaria');
		if($piscinaComunitaria!='piscinaCom')
			$piscinaComunitaria=1; 
		$vistasAlMar = JRequest::getVar('vistasAlMar');  
		if($vistasAlMar!='vistas')
			$vistasAlMar=1;
		$comodidades = JRequest::getVar('comodidades');  
		$distancias = JRequest::getVar('distancias');  
		$portada = JRequest::getVar('radioValue');
		$modelo = $this->getModel('inmoEdit');  
   		$fotoPortada=$modelo->modificarPropiedad($id,$nombrePropiedad,$numeroReferencia,$tipoVivienda,$precio,$poblacion,$nHabitaciones,$nBanyos,$m2Construidos,$m2Parcela,$anyoConstruccion,$piscina,$piscinaComunitaria,$vistasAlMar,$comodidades,$distancias,$portada);
   		$modelo->guardarFotoPortada($fotoPortada);
   		$this->setRedirect('index.php/ver?numRef='.$numeroReferencia.'&idImagen='.$id, 'Propiedad modificada correctamente'); 
	}
	
	function borrarPropiedad(){
		$id=JRequest::getVar('id');
		$modelo=$this->getModel('inmoEdit');
		$modelo->borrarPropiedad($id);
		$this->setRedirect('index.php', 'Propiedad borrada correctamente');
	}
}
