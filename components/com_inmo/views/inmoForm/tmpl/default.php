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
<HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
</head>
<BODY>
<FORM METHOD="post" enctype="multipart/form-data" ACTION="index.php">
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
<p>Piscina <input type="checkbox" name="piscina" value="piscina"></p>
<p>Piscina Comunitaria <input type="checkbox" name="piscinaComunitaria" value="piscinaCom"></p>
<p>Vistas al Mar <input type="checkbox" name="vistasAlMar" value="vistas"></p>
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
<input type="hidden" name="option" value="com_inmo" />  
<input type="hidden" name="task" value="guardarPropiedad" />  
<p><input type="submit" value="Enviar datos" name="enviar"> 
<!--  <input type="res-left: 50"> <input type="reset" value="Restablecer" name="B2"></p>-->
</FORM>
</BODY>
</HTML>
