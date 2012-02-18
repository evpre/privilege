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

<head>
		<script language="javascript">
			$(document).ready(
				function (){
					$("#pikame").PikaChoose({carousel:true});
				});
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

<div class="todo">
	<div class="pikachoose">
	<h1><?php echo $this->item[1]; ?></h1>
	<ul id="pikame" class="jcarousel-skin-pika">
		<?php for($i=0;$i<count($this->fotos);$i++){?>
					<li><img src="<?php echo PATHINTERNOJOOMLA."uploaded/".$this->fotos[$i]?>"/><span></span></li>
			
		<?php }?>
		
	</ul>
	</div>
<div CLASS=prueba>
	<p>Numero de referencia: <b><?php echo $this->item[2]; ?></b></p>
	<p>Tipo: <b><?php echo $this->item[3]; ?></b></p>
	<p>Precio: <b><?php echo $this->item[4]; ?></b></p>
	<p>Poblacion: <b><?php echo $this->item[5]; ?></b></p>
	<p>Numero de habitaciones: <b><?php echo $this->item[6]; ?></b></p>
	<p>Numero de ba–os: <b><?php echo $this->item[7]; ?></b></p>
	<p>M2 construidos: <b><?php echo $this->item[8]; ?></b></p>
	<p>M2 de la parcela: <b><?php echo $this->item[9]; ?></b></p>
	<p>A–o de construccion: <b><?php echo $this->item[10]; ?></b></p>
	<?php if (JFactory::getUser()->id){?>
	<a href="<?php echo "index.php/editar?id=".$this->item[0]?>"><button><font color="#cc0000"><strong>Modificar</strong></font></button></a>
		<form action="index.php" method="post">   
			<input type="hidden" name="id" value="<?php echo $this->item[0]?>">		
  			<input type="hidden" name="option" value="com_inmo" />  
  			<input type="hidden" name="task" value="borrarPropiedad" />  
  
  			<input type="submit" value="Borrar" onClick="return confirmSubmit()"/>  
		</form> 
	<?php }?>
	</div>
</div>