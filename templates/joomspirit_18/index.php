<?php
/**
* @copyright	Copyright (C) 2009 - JoomSpirit. All rights reserved.
*/
defined('_JEXEC') or die('Restricted access');
$path = $this->baseurl.'/templates/'.$this->template;
$width = $this->params->get('width');
$width_left = $this->params->get('width_left');
$width_right = $this->params->get('width_right');
$user1_width = $this->params->get('user1_width');
$user3_width = $this->params->get('user3_width');
$user4_width = $this->params->get('user4_width');
$user6_width = $this->params->get('user6_width');
$color_link_content = $this->params->get('color_link_content');
$color_active_link = $this->params->get('color_active_link');
$color_title = $this->params->get('color_title');
$js='<div class="js" ><a id="jslink" target="_blank" href="http://www.joomspirit.com" title="template joomla">template joomla</a></div>';
if ($this->params->get('fontSize') == '') 
	{ $fontSize ='12px'; } 
else { $fontSize = $this->params->get('fontSize'); }
JHTML::_('behavior.mootools');
include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/php/layout.php');
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?'.'>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>

<jdoc:include type="head" />
<!-- style sheet links -->
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/main.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/moomenuh.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/nav.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/dynamic_css.php&#63;color_active_link=<?php echo substr($color_active_link, 1) ; ?>&amp;color_link_content=<?php echo substr($color_link_content, 1) ; ?>&amp;color_title=<?php echo substr($color_title, 1) ; ?>" />
<!--[if lt IE 8]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie7.css" type="text/css" />
<![endif]-->

<!--[if lt IE 7]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie6.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/lib/js/iepngfix_tilebg.js"></script>
<style type="text/css">
* { behavior: url(<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/lib/js/iepngfix.htc) }
</style>
<![endif]-->
<!-- MOOMENU HORIZONTAL-->
<!--  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/lib/js/UvumiDropdown.js"></script>
<script type="text/javascript">
	var menu = new UvumiDropdown('main_menu');
</script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/lib/js/tooltips.js"></script>
-->
</head>
<body <?php echo ('style="font-size:'.$fontSize.';"'); ?>>
<div id="wrapper" <?php echo ('style="width:'.$width.';"');?>>
		
		<div id="header">
		
			<?php if($this->countModules('logo')) : ?>
			<div id="logo" >	
				<jdoc:include type="modules" name="logo" style="joomspirit" />
			</div>
			<?php endif; ?>
			
			
			<!--	Main nav	-->
			<?php if ($this->countModules( 'menu' )) : ?>
			<div id="nav_main">
				<jdoc:include type="modules" name="menu" style="xhtml" />
			</div>
			<?php endif; ?>
						
		</div>	<!-- end of header-->
		
		<!--	Top module	-->
		<div id="top">
		<?php if ($this->countModules( 'top' )) : ?>
			<jdoc:include type="modules" name="top" style="xhtml" />
		<?php endif; ?>		
		</div>
	
		<div id="main">
			<?php if($this->countModules('breadcrumb') ) : ?>
			<div id="breadcrumb">
				<jdoc:include type="modules" name="breadcrumb" style="xhtml" />
			</div>
			<div class="clr"></div>
			<?php endif; ?>
			
			<!--	left module	-->
			<?php if ($this->countModules( 'left' )) : ?>
			<div id="left" style="width:<?php echo $width_left ; ?>;">
				<jdoc:include type="modules" name="left" style="joomspirit" />
			</div>
			<?php endif; ?>
			<!--	right module	-->
			<?php if ($this->countModules( 'right' )) : ?>
			<div id="right" style="width:<?php echo $width_right ; ?>;">
				<jdoc:include type="modules" name="right" style="joomspirit" />
			</div>
			<?php endif; ?>
			
			
			<div id="content">
			
				<!--  USER 1, 2, 3 -->
				<?php if($this->countModules('user1') || $this->countModules('user2') || $this->countModules('user3')) : ?>
				<div id="users_top">
															
					<?php if($this->countModules('user1')) : ?>
					<div class="user1" <?php echo ('style="width:'.$user1_width.';"');?>>
						<jdoc:include type="modules" name="user1" style="joomspirit" />
					</div>
					<?php endif; ?>
										
					<?php if($this->countModules('user3')) : ?>
					<div class="user3" <?php echo ('style="width:'.$user3_width.';"');?>>
						<jdoc:include type="modules" name="user3" style="joomspirit" />
					</div>
					<?php endif; ?>
				
					<?php if($this->countModules('user2')) : ?>
					<div class="user2">
						<jdoc:include type="modules" name="user2" style="joomspirit" />
					</div>
					<?php endif; ?>
				
					<div class="clr"></div>
										
				</div>
				<?php endif; ?>  <!--	END OF USERS TOP	-->		
			
				<!--  MAIN COMPONENT -->
				<div id="main_component">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<?php echo$copy; ?>
				</div>
			
				<!--  USER 4, 5, 6 -->
				<?php if($this->countModules('user4') || $this->countModules('user5') || $this->countModules('user6')) : ?>
				<div id="users_bottom">
															
					<?php if($this->countModules('user4')) : ?>
					<div class="user4" <?php echo ('style="width:'.$user4_width.';"');?>>
						<jdoc:include type="modules" name="user4" style="joomspirit" />
					</div>
					<?php endif; ?>
										
					<?php if($this->countModules('user6')) : ?>
					<div class="user6" <?php echo ('style="width:'.$user6_width.';"');?>>
						<jdoc:include type="modules" name="user6" style="joomspirit" />
					</div>
					<?php endif; ?>
				
					<?php if($this->countModules('user5')) : ?>
					<div class="user5">
						<jdoc:include type="modules" name="user5" style="joomspirit" />
					</div>
					<?php endif; ?>
				
					<div class="clr"></div>
										
				</div>
				<?php endif; ?>  <!--	END OF USERS BOTTOM	-->				
			
			
			</div>	<!-- end of content	-->
			<div class="clr"></div>
			
		
		</div>	<!-- end of main -->
		
	
		<!--	Footer	-->
		<div id="footer">
					
			<?php if ($this->countModules('syndicate')) : ?>
			<div id="syndicate">
				<jdoc:include type="modules" name="syndicate" style="xhtml" />
			</div>
			<?php endif; ?>
			
			<?php if($this->countModules('bottom_menu')) : ?>
			<div id="bottom_menu">
				<jdoc:include type="modules" name="bottom_menu" style="xhtml" />
			</div>
			<?php endif; ?>
					
			<?php if($this->countModules('adress')) : ?>
			<div id="adress">
				<jdoc:include type="modules" name="adress" style="xhtml" />
			</div>
			<?php endif; ?>
													
		</div>
		<?php echo $js ; ?>
	
	
</div>
</body>
</html>