window.addEvent('domready', function() {


	//  effet de fading
	
	$('fade').setStyles({display:'block', opacity:0});
	$('fade').fade('in');

	
	var lien = $('main_menu').getElements('a');
	
	lien.each(function(element) {
	var fx = new Fx.Morph('fade', {duration:500, wait:true}, {transition: Fx.Transitions.Cubic.easeOut});
	
	element.addEvent('mousedown', function(){
				fx.start({
					opacity:0
				});
			});		
		});
	
	
});