<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

JLoader::import('joomla.filesystem.file');

JHtml::_('behavior.framework', true);

$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;
$config = JFactory::getConfig();
$this->language = $doc->language;
$this->direction = $doc->direction;

$bootstrap = explode(',', $templateparams->get('bootstrap'));
$jinput = JFactory::getApplication()->input;
$option = $jinput->get('option', '', 'cmd');

if (in_array($option, $bootstrap))
{
	// Load optional rtl Bootstrap css and Bootstrap bugfixes
	JHtml::_('bootstrap.loadCss', true, $this->direction);
}

$doc->addStyleSheet(JURI::base() . 'templates/system/css/system.css');
// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');


JHtml::_('bootstrap.framework');
// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
		<meta name="HandheldFriendly" content="true" />
		<meta name="apple-mobile-web-app-capable" content="YES" />

		<jdoc:include type="head" />
	</head>
	<body>
		<div id="topbg"></div>
		<div class="container">
		  <div class="row-fluid">		
			<div class="header span12">
				<jdoc:include type="modules" name="header-top" />
				<jdoc:include type="modules" name="header-middle" /> 
				<jdoc:include type="modules" name="header-bottom" />  
			</div>
		 </div>
		  <div class="row-fluid"> 
			<div class="nav span12">
				<jdoc:include type="modules" name="menu" />
			</div>
		  </div>
		  <div class="row-fluid"> 
			<div class="main span12">			
				<div id="sidebarLeft" class="span2">t
					<jdoc:include type="modules" name="left-top" />
					<jdoc:include type="modules" name="left-middle" /> 
					<jdoc:include type="modules" name="left-bottom" />
				</div>
				<div id="sidebarRight" class="span2">t
					<jdoc:include type="modules" name="right-top" />
					<jdoc:include type="modules" name="right-middle" /> 
					<jdoc:include type="modules" name="right-bottom" />
				</div>
				<div id="content" class="span8">
					<jdoc:include type="component" />
				</div>
			</div>
		  </div>
			<div class="footmain" style="clear:both">
				<jdoc:include type="modules" name="footer-top" />
				<jdoc:include type="modules" name="footer-middle" /> 
				<jdoc:include type="modules" name="footer-bottom" />
			</div>
					<footer style="clear:both">
			<span class="info_foot">&copy; Lycée Robert Doisneau - Corbeil 2013</span>
			<span class="info_foot"> <a href="/sitejoomla/index.php/mentions-legales">Mentions l&eacute;gales</a></span>
			<span class="info_foot"><a href="#top" id="back-top">Haut de page</a></span>
</footer>
		</div>

	</body>
</html>