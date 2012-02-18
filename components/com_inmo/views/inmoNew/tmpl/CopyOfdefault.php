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
<head>
<link rel="stylesheet" href="http://localhost:8888/costaBlanca/components/com_inmo/classCarrousel/_web.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://localhost:8888/costaBlanca/components/com_inmo/classCarrousel/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://localhost:8888/costaBlanca/components/com_inmo/classCarrousel/mootools-1.2-core.js"></script>
<script type="text/javascript" src="http://localhost:8888/costaBlanca/components/com_inmo/classCarrousel/_class.noobSlide.packed.js"></script>
<script type="text/javascript">
	window.addEvent('domready',function(){
		var startItem = 3; //or   0   or any
		var thumbs_mask7 = $('thumbs_mask7').setStyle('left',(startItem*60-568)+'px').set('opacity',0.8);
		var fxOptions7 = {property:'left',duration:1000, transition:Fx.Transitions.Back.easeOut, wait:false}
		var thumbsFx = new Fx.Tween(thumbs_mask7,fxOptions7);
		var nS7 = new noobSlide({
			box: $('box7'),
			items: [0,1,2,3,4,5,6,7],
			handles: $$('#thumbs_handles7 span'),
			fxOptions: fxOptions7,
			onWalk: function(currentItem){
				thumbsFx.start(currentItem*60-568);
			},
			startItem: startItem
		});
		//walk to first with fx
		nS7.walk(0);
	});
	</script>
</head>
<h2>Sample 7</h2>
<div class="total">
<div class="sample">
	<div class="mask7">
		<div id="box7">
			<span><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img1.jpg" alt="Photo" /></span>
			<span><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img2.jpg" alt="Photo" /></span>
			<span><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img3.jpg" alt="Photo" /></span>
			<span><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img4.jpg" alt="Photo" /></span>
			<span><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img5.jpg" alt="Photo" /></span>
			<span><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img6.jpg" alt="Photo" /></span>
			<span><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img7.jpg" alt="Photo" /></span>
			<span><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img8.jpg" alt="Photo" /></span>
		</div>
	</div>

	<div id="thumbs7">
		<div class="thumbs">
			<div><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img1.jpg" alt="Photo Thumb" /></div>
			<div><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img2.jpg" alt="Photo Thumb" /></div>
			<div><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img3.jpg" alt="Photo Thumb" /></div>
			<div><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img4.jpg" alt="Photo Thumb" /></div>
			<div><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img5.jpg" alt="Photo Thumb" /></div>
			<div><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img6.jpg" alt="Photo Thumb" /></div>
			<div><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img7.jpg" alt="Photo Thumb" /></div>
			<div><img src="http://localhost:8888/costaBlanca/components/com_inmo/uploaded/img8.jpg" alt="Photo Thumb" /></div>
		</div>

		<div id="thumbs_mask7"></div>

		<p id="thumbs_handles7">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</p>
	</div>
</div>
<div CLASS=prueba><p>Nombre de la propiedad: <b><?php echo $this->item[0]; ?></b></p>
	<p>Numero de referencia: <b><?php echo $this->item[1]; ?></b></p>
	<p>Tipo: <b><?php echo $this->item[2]; ?></b></p></div>
</div>
	