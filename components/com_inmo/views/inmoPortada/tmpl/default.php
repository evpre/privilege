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
	 <script src="/privilege/components/com_inmo/slideshowPortada/js/slideshow.js" type="text/javascript"></script>
	 <script src="/privilege/components/com_inmo/slideshowPortada/js/slideshow.kenburns.js" type="text/javascript"></script>
	
		<script>
		window.addEvent('domready', function(){			
			var data = { <?php for($i=0;$i<count($this->fotosPortada);$i++){?>
				'<?php echo $this->fotosPortada[$i]['2']?>' : { caption: '<?php echo $i?>'},
			<?php }?>		
					};
			new Slideshow.KenBurns('kenburns', data, { duration: 2000, height: 300, hu: '<?php echo JURI::base().'components/com_inmo/uploaded'?>', width: 650 });
		});
	</script>
</head>
<body>
	<div class= "todo">
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
	<div id="kenburns" class="slideshow">
		<img src="<?php echo JURI::base()."components/com_inmo/resizedPhotos/".$this->fotosPortada['0']['2']?>" alt="1">
	</div>
	</div>
</body>
</HTML>