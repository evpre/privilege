<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modelitem');
require_once(getcwd().'/components/com_inmo/configuracion.php');
include(PATHINTERNOPHP."classResizeImage/resize-class.php");
class InmoModelInmoEdit extends JModelItem
{
	protected $item, $fotos;
		
		public function guardarFotoPortada($fotoPortada){
			$resizeObj = new resize(PATHINTERNOJOOMLA."uploaded/".$fotoPortada."");
			//echo $resizeObj;
			// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			$resizeObj -> resizeImage(120, 120, 'auto');
			// *** 3) Save image
			$resizeObj -> saveImage(PATHINTERNOPHP."resizedPhotos/".$fotoPortada, 100);
			unset($resizeObj);	
		}
		
		public function readProperty($id){	
			$db = JFactory::getDBO();
			$query= "select * from #__inmo where id=".$id.";";
			$db->setQuery($query);
			$this->item=$db->loadRow();
			return $this->item;
		}
	
		public function readPhotos($id){
			$db = JFactory::getDBO();
			$query= "select id, foto_url, portada from #__fotos where casa_id=".$id." order by id;";
			$db->setQuery($query);
			$this->fotos=$db->loadRowList();
			return $this->fotos;
		}
		public function modificarPropiedad($id,$nombrePropiedad,$numeroReferencia,$tipoVivienda,$precio,$poblacion,$nHabitaciones,$nBanyos,$m2Construidos,$m2Parcela,$anyoConstruccion,$piscina,$piscinaComunitaria,$vistasAlMar,$comodidades,$distancias,$portada){
			echo $portada."HOLA";
			$nuevaPropiedad= new StdClass;
			$nuevaPropiedad->id=$id;
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
			//$query= "update #__inmo set  where numeroReferencia=".$numeroReferencia.";";
			//$db->setQuery($query);
			$db->updateObject('#__inmo', $nuevaPropiedad, 'id');
			$query="select id from #__fotos where casa_id=".$id." order by portada DESC limit 1";
			$db->setQuery($query);
			$aux=$db->loadResult();
			$fotoAntigua= new stdClass();
			$fotoAntigua->id=$aux;
			$fotoAntigua->portada=0;
			$db->updateObject('#__fotos', $fotoAntigua, 'id');
			$query="select id, foto_url from #__fotos where casa_id=".$id." order by id";
			$db->setQuery($query);
			$aux=$db->loadRowList();
			$fotoNueva= new stdClass();
			$fotoNueva->id=$aux[$portada]['0'];
			$fotoNueva->portada=1;
			$db->updateObject('#__fotos', $fotoNueva, 'id');
			$numeroFotos=0;
   	 		$uploaded_files = array();
    		$upload_directory =PATHINTERNOPHP.'uploaded/'; //set upload directory
    		for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
        		if ($_FILES['images']['name'][$i] != '') { //check if file field empty or not
        			$numeroFotos++;
            		$uploaded_files[] = $_FILES['images']['name'][$i];
            		$indice=$i+count($aux);
            		$newdirectory= $upload_directory.$numeroReferencia.$indice.$_FILES['images']['name'][$i];
            		echo $newdirectory;
            		if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $newdirectory)) {
            		}
    	    	}
   		 	}
			for($i=0;$i<$numeroFotos;$i++){
				$nuevaFoto=new StdClass;
				$nuevaFoto->id=NULL;
				$nuevaFoto->casa_id=$id;
				$indice=$i+count($aux);
				$nuevaFoto->foto_url=$numeroReferencia.$indice.$_FILES['images']['name'][$i];
				$db->insertObject('#__fotos', $nuevaFoto, 'id');
			}
			return $aux[$portada]['1'];
		}
		
		public function borrarFoto($idfoto){
			$db = JFactory::getDBO();
			$query = "select casa_id, foto_url, portada from #__fotos where id=".$idfoto."";
			$db->setQuery($query);
			$fotoaBorrar=$db->loadRow();
			unlink(PATHINTERNOPHP.'uploaded/'.$fotoaBorrar[1]);
			unlink(PATHINTERNOPHP.'resizedPhotos/'.$fotoaBorrar[1]);
			$query = "delete from #__fotos where id=".$idfoto."";
			$db->setQuery($query);
			$db->query();
			print_r($fotoaBorrar);
			$query = "select id from #__fotos where casa_id=".$fotoaBorrar[0]."";
			$db->setQuery($query);
			$siquedauno=$db->loadResultArray();
			if(count($siquedauno)==1 || $fotoaBorrar[2]==1){
				$ultimafoto=new stdClass();
				$ultimafoto->id=$siquedauno[0];
				$ultimafoto->portada=1;
				$db->updateObject('#__fotos', $ultimafoto, 'id');
				}
			
		}
		public function borrarPropiedad($id){
			$db = JFactory::getDBO();
			$query = "delete from #__inmo where id=".$id."";
			//echo $query;
			$db->setQuery($query);
			$db->query(); 
			$query = "select foto_url from #__fotos where casa_id=".$id."";
			$db->setQuery($query);
			$fotosaBorrar=$db->loadResultArray();
			print_r($fotosaBorrar);
			for($i=0;$i<count($fotosaBorrar);$i++){
				unlink(PATHINTERNOPHP.'uploaded/'.$fotosaBorrar[$i]);
				unlink(PATHINTERNOPHP.'resizedPhotos/'.$fotosaBorrar[$i]);
			}
			$query = "delete from #__fotos where casa_id=".$id."";
		//	echo $query;
			$db->setQuery($query);
			$db->query(); 
			
		}
}
?>