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
		<script src="<?php echo PATHINTERNOPHP."ajax.js"?>">language="JavaScript"></script>
	</head>
	<div id="cuerpoBuscador" class="cuerpoBuscador">
	<div class="buscador">
		<form action="index.php" method="post">  
			<h3>BUSCADOR</h3>
			<div class="buscadorIzquierda">
			<p>Poblacion</p>
			<select size="1" name="localidad">
				<option selected value="0">-selecciona-</option>
				<?php for ($i=0;$i<count($this->localidades);$i++){?>
				<option value="<?php echo $this->localidades[$i]?>"><?php echo $this->localidades[$i]?></option>
				<?php }?>
			</select>
			<p>Precio entre</p>
			<select size="1" name="precioMin">
				<option selected value="0">-selecciona-</option>
				<option value="50000">50.000</option>
				<option value="100000">100.000</option>
				<option value="200000">200.000</option>
				<option value="500000">500.000</option>
				<option value="1000000">1.000.000</option>
			</select>
 			<p>N¼ de habitaciones</p>
			<select size="1" name="nHabMax">
				<option selected value="0">-selecciona-</option>
				<?php for ($i=1;$i<10;$i++){?>
				<option value="<?php echo $i?>"><?php echo $i?></option>
				<?php }?>
			</select>
			<input class="botonBuscar" type="submit" value="buscar"/>  
  			</div>
  			<div class="buscadorDerecha">
  				<p>Tipo de propiedad</p>
				<select size="1" name="tipo">
					<option selected value="0">-selecciona-</option>
					<option value="apartamento">apartamento</option>
					<option value="villa">villa</option>
					<option value="adosado">adosado</option>
			</select>
  			<p>y</p>
				<select size="1" name="precioMax">
					<option selected value="0">-selecciona-</option>
					<option value="100000">100.000</option>
					<option value="200000">200.000</option>
					<option value="500000">500.000</option>
					<option value="1000000">1.000.000</option>
					<option value="2000000">2.000.000</option>
			</select>  			
			</div>
  			<input type="hidden" name="option" value="com_inmo" />  
  			<input type="hidden" name="task" value="realizarBusqueda" />  
		</form> 
	</div>
		<div class="resultadoCompleto">
		<?php for($i=0;$i<count($this->ids);$i++){?>
		<div class="resultadoBusqueda">
			<div class="rbImagen">
				<a href=index.php/ver?numRef=<?php echo $this->ids[$i]['2']?>&idImagen=<?php echo $this->ids[$i]['0']?>><img src="<?php echo JURI::base()."components/com_inmo/resizedPhotos/".$this->fotosPortada[$i].""?>"/></a>
				</div>
			<div class="rbTexto"><p><b><?php echo $this->ids[$i]['1'];?></b>, <?php echo $this->ids[$i]['5'];?></p>
			<p>Numero de habitaciones: <?php echo $this->ids[$i]['6'];?></p>
			<p> Precio: <?php echo $this->ids[$i]['4'];?></p>
			</div>
			
		</div>
		<?php }?>
		</div>
	</div>	
</HTML>