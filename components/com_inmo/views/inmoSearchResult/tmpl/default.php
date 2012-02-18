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