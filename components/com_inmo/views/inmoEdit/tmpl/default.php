<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;
require_once(getcwd().'/components/com_inmo/configuracion.php');
?>

<HTML>
<head>
<?php
header('Content-Type: text/html; charset=UTF-8'); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script language="javascript">
	function getRadioButtonSelectedValue(ctrl){
		if(!ctrl.length){
			document.editar.radioValue.value=0;}
   	 	for(i=0;i<ctrl.length;i++)
        	if(ctrl[i].checked) document.editar.radioValue.value=i;
    		}
	</script>
	<script language="JavaScript">
			function confirmSubmit(){	
				var agree=confirm("Esta seguro de que quiere borrar?");
				if (agree)
					return true ;
				else
					return false ;
				}
		</script>
</head>
<body>
<form name="editar" method="post" enctype="multipart/form-data" ACTION="index.php">
<p>Nombre de la Propiedad <input type="text" name="nombrePropiedad" size="30" value="<?php echo $this->item[1]?>"></p>
<p>Numero de Referencia <input type="text" name="numeroReferencia" size="30" value="<?php echo $this->item[2]?>"></p>
<p>Tipo de Vivienda
<select size="1" name="tipoVivienda">

<option selected value="<?php echo $this->item[3]?>"><?php echo $this->item[3]?></option>
<option value="vacio"></option>
<option value="villa">villa</option>
<option value="apartamento">apartamento</option>
<option value="adosado">adosado</option>
</select></p>
<p>Precio <input type=text name="precio" size="30" value="<?php echo $this->item[4]?>"></p>
<p>Poblacion <input type="text" name="poblacion" size="30" value="<?php echo $this->item[5]?>"></p>
<p>Numero de habitaciones <input type="text" name="nhabitaciones" size="30" value="<?php echo $this->item[6]?>"></p>
<p>Numero de ba–os <input type="text" name="nbanyos" size="30" value="<?php echo $this->item[7]?>"></p>
<p>m2 Construidos <input type="text" name="m2Construidos" size="30" value="<?php echo $this->item[8]?>"></p>
<p>m2 Parcela <input type="text" name="m2Parcela" size="30" value="<?php echo $this->item[9]?>"></p>
<p>A–o de Construccion <input type="text" name="anyoConstruccion" size="30" value="<?php echo $this->item[10]?>"></p>
<p>Piscina <input type="checkbox" name="piscina" value="piscina"<?php if($this->item[11]==0) echo " checked";?>></p>
<p>Piscina Comunitaria <input type="checkbox" name="piscinaComunitaria" value="piscinaCom"<?php if($this->item[12]==0) echo " checked";?>></p>
<p>Vistas al Mar <input type="checkbox" name="vistasAlMar" value="vistas" <?php if($this->item[13]==0) echo " checked";?>></p>
<p>Comodidades</p> <textarea rows="5" name="comodidades" cols="20"></textarea>
<p>Distancias</p><textarea rows="5" name="distancias" cols="20"></textarea>
<p>Fotos: </p>
<?php for($i=0;$i<count($this->fotos);$i++){?>
		<img src="<?php echo JURI::base()."components/com_inmo/uploaded/".$this->fotos[$i]['1'];?>" height="120"/> <input type="radio" name="portada" value="<?php echo $i?>" <?php if ($this->fotos[$i]['2']==1) echo " checked"?>> <a href="index.php/editar?id=<?php echo $this->item[0]?>&borrar=true&idfoto=<?php echo $this->fotos[$i]['0']?>" onClick="return confirmSubmit()"> Borrar</a><br>
<?php }?>
<p>Agregue una foto</p><div id="file_container">
    <input name="images[]" type="file"  />
    <br />
  </div>
  <a href="javascript:void(0);" onClick="add_file_field();">Agregar una mas</a><br />

<input type="hidden" name="id" value="<?php echo $this->item[0]?>" />  
<input type="hidden" name="radioValue" value="" />  
<input type="hidden" name="option" value="com_inmo" />  
<input type="hidden" name="task" value="modificarPropiedad" />  
<p><input type="submit" value="guardar cambios" name="guardar" onclick="return getRadioButtonSelectedValue(portada)"> 
</form>
</body>
</HTML>
