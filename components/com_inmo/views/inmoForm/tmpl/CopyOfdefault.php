<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;
?>
<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>
<?php
if ($_POST['enviar']) {
	//-------------Guardamos las fotos
	$numeroFotos=0;
    $uploaded_files = array();
    $upload_directory ='/Applications/MAMP/htdocs/costaBlanca/components/com_inmo/uploaded/'; //set upload directory
    //echo  $upload_directory;
    /**
     * we get a $_FILES['images'] array ,
     * we procee this array while iterating with simple for loop 
     * you can check this array by print_r($_FILES['images']); 
     */
    //print_r($_FILES['images']);
    for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
        if ($_FILES['images']['name'][$i] != '') { //check if file field empty or not
        	$numeroFotos++;
            $uploaded_files[] = $_FILES['images']['name'][$i];
            $newdirectory= $upload_directory.$_POST[numeroReferencia].$i.$_FILES['images']['name'][$i];
            echo $newdirectory;
            if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $newdirectory)) {
            }
 
        }
 
    }
	//-------------Fin de guardar fotos
	
echo "Nombre: <b>" . $_POST[nombrePropiedad] . "</b><BR>";
echo "Numero referencia: " . $_POST[numeroReferencia] . "<BR>";
echo "Tipo: " . $_POST[tipoVivienda] . "<BR>";
echo "<a href='$PHP_SELF'>VOLVER AL FORMULARIO</a>";
$nuevaPropiedad= new StdClass;
$nuevaPropiedad->id=NULL;
$nuevaPropiedad->nombrePropiedad=$_POST[nombrePropiedad];
$nuevaPropiedad->numeroReferencia=$_POST[numeroReferencia];
$nuevaPropiedad->tipo=$_POST[tipoVivienda];
$nuevaPropiedad->precio=$_POST[precio];
$nuevaPropiedad->poblacion=$_POST[poblacion];
$nuevaPropiedad->nhabitacions=$_POST[nhabitaciones];
$nuevaPropiedad->nbanyos=$_POST[nbanyos];
$nuevaPropiedad->m2Construidos=$_POST[m2Construidos];
$nuevaPropiedad->m2Parcela=$_POST[m2Parcela];
$nuevaPropiedad->anyoConstruccion=$_POST[anyoConstruccion];
$nuevaPropiedad->piscina=$_POST[piscina];
$nuevaPropiedad->piscinaComunitaria=$_POST[piscinaComunitaria];
$nuevaPropiedad->vistasAlMar=$_POST[vistasAlMar];
$nuevaPropiedad->comodidades=$_POST[comodidades];
$nuevaPropiedad->distancias=$_POST[distancias];
$db = JFactory::getDBO();
$db->insertObject('#__inmo', $nuevaPropiedad,'id');
$queryIdCasa="SELECT id from #__inmo where numeroReferencia=".$_POST[numeroReferencia]."";
$db->setQuery($queryIdCasa);
$resultCasaId=$db->loadRow();
echo "Y el resultado es: ". $resultCasaId[0];
for($i=0;$i<$numeroFotos;$i++){
	$nuevaFoto=new StdClass;
	$nuevaFoto->id=NULL;
	$nuevaFoto->casa_id=$resultCasaId[0];
	$nuevaFoto->foto_url=$_POST[numeroReferencia].$i.$_FILES['images']['name'][$i];
	$db->insertObject('#__fotos', $nuevaFoto, 'id');
	}
}
else {
?>
<HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
</head>
<BODY>
<FORM METHOD="post" enctype="multipart/form-data" ACTION="<?php echo $PHP_SELF ?>">
<p>Nombre de la Propiedad <input type="text" name="nombrePropiedad" size="30" value=""></p>
<p>Numero de Referencia <input type="text" name="numeroReferencia" size="30" value=""></p>
<p>Tipo de Vivienda
<select size="1" name="tipoVivienda">
<option selected value="villa">villa</option>
<option value="apartamento">apartamento</option>
<option value="adosado">adosado</option>
</select></p>
<p>Precio <input type=text name="precio" size="30" value=""></p>
<p>Poblacion <input type="text" name="poblacion" size="30" value=""></p>
<p>Numero de habitaciones <input type="text" name="nhabitaciones" size="30" value=""></p>
<p>Numero de ba–os <input type="text" name="nbanyos" size="30" value=""></p>
<p>m2 Construidos <input type="text" name="m2Construidos" size="30" value=""></p>
<p>m2 Parcela <input type="text" name="m2Parcela" size="30" value=""></p>
<p>A–o de Construccion <input type="text" name="anyoConstruccion" size="30" value=""></p>
<p>Piscina <input type="checkbox" name="piscina" value="OFF"></p>
<p>Piscina Comunitaria <input type="checkbox" name="piscinaComunitaria" value="OFF"></p>
<p>Vistas al Mar <input type="checkbox" name="vistasAlMar" value="OFF"></p>
<p>Comodidades</p> <textarea rows="5" name="comodidades" cols="20"></textarea>
<p>Distancias</p><textarea rows="5" name="distancias" cols="20"></textarea>
<p>Agregue una foto</p><div id="file_container">
    <input name="images[]" type="file"  />
    <br />
  </div>
  <a href="javascript:void(0);" onClick="add_file_field();">Agregar una mas</a><br />
<!--  
<p>ÀTe gusta el futbol ? <input type="checkbox" name="futbol" value="ON"></p>
<p>ÀCual es tu sexo?</p>
<blockquote>
<p>Hombre<input type="radio" value="hombre" checked name="sexo"></p>
<p>Mujer <input type="radio" name="sexo" value="mujer"></p>
</blockquote>
<p>Aficiones</p>
<p><textarea rows="5" name="aficiones" cols="28"></textarea></p>-->
<p><input type="submit" value="Enviar datos" name="enviar"> 
<!--  <input type="res-left: 50"> <input type="reset" value="Restablecer" name="B2"></p>-->
</FORM>
</BODY>
</HTML>
<?php 
}
?>