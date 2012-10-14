<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package Tags_content
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao\TagListContentElements' => 'system/modules/tags_content/classes/TagListContentElements.php',

	// Modules
	'Contao\ModuleTagCloudContent'  => 'system/modules/tags_content/modules/ModuleTagCloudContent.php',
));
