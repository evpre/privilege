<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modelitem');
require_once(getcwd().'/components/com_inmo/configuracion.php');
include(PATHINTERNOPHP."classResizeImage/resize-class.php");

class InmoModelInmoForm extends JModelItem
{
	protected $item;

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
	
	function guardarPropiedad($nombrePropiedad,$numeroReferencia,$tipoVivienda,$precio,$poblacion,$nHabitaciones,$nBanyos,$m2Construidos,$m2Parcela,$anyoConstruccion,$piscina,$piscinaComunitaria,$vistasAlMar,$comodidades,$distancias){
		
		
		//-------------Guardamos las fotos
		$numeroFotos=0;
   	 	$uploaded_files = array();
    	$upload_directory =PATHINTERNOPHP.'uploaded/'; //set upload directory
    /**
     * we get a $_FILES['images'] array ,
     * we procee this array while iterating with simple for loop 
     * you can check this array by print_r($_FILES['images']); 
     */
    	for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
        	if ($_FILES['images']['name'][$i] != '') { //check if file field empty or not
        		$numeroFotos++;
            	$uploaded_files[] = $_FILES['images']['name'][$i];
            	$newdirectory= $upload_directory.$numeroReferencia.$i.$_FILES['images']['name'][$i];
            	echo $newdirectory;
            	if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $newdirectory)) {
            	}
 
        	}
 
   	 	}
	//-------------Fin de guardar fotos

		$nuevaPropiedad= new StdClass;
		$nuevaPropiedad->id=NULL;
		$nuevaPropiedad->nombrePropiedad=$nombrePropiedad;
		$nuevaPropiedad->numeroReferencia=$numeroReferencia;
		$nuevaPropiedad->tipo=$tipoVivienda;
		$nuevaPropiedad->precio=$precio;
		$nuevaPropiedad->poblacion=$poblacion;
		$nuevaPropiedad->nhabitacions=$nHabitaciones;
		$nuevaPropiedad->nbanyos=$nBanyos;
		$nuevaPropiedad->m2Construidos=$m2Construidos;
		$nuevaPropiedad->m2Parcela=$m2Parcela;
		$nuevaPropiedad->anyoConstruccion=$anyoConstruccion;
		$nuevaPropiedad->piscina=$piscina;
		$nuevaPropiedad->piscinaComunitaria=$piscinaComunitaria;
		$nuevaPropiedad->vistasAlMar=$vistasAlMar;
		$nuevaPropiedad->comodidades=$comodidades;
		$nuevaPropiedad->distancias=$distancias;
		$db = JFactory::getDBO();
		$db->insertObject('#__inmo', $nuevaPropiedad,'id');
		$queryIdCasa="SELECT id from #__inmo where numeroReferencia=".$numeroReferencia."";
		$db->setQuery($queryIdCasa);
		$resultCasaId=$db->loadRow();
		for($i=0;$i<$numeroFotos;$i++){
			$nuevaFoto=new StdClass;
			$nuevaFoto->id=NULL;
			$nuevaFoto->casa_id=$resultCasaId[0];
			$nuevaFoto->foto_url=$numeroReferencia.$i.$_FILES['images']['name'][$i];
			if($i==0)
				$nuevaFoto->portada=1;
			$db->insertObject('#__fotos', $nuevaFoto, 'id');
			}
		}
		
		public function guardarFotoPortada($fotoPortada){
			$resizeObj = new resize(PATHINTERNOJOOMLA."uploaded/".$fotoPortada."");
			//echo $resizeObj;
			// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			$resizeObj -> resizeImage(120, 120, 'auto');
			// *** 3) Save image
			$resizeObj -> saveImage(PATHINTERNOPHP."resizedPhotos/".$fotoPortada, 100);
			unset($resizeObj);	
		}
}
?>