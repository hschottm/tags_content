<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Helmut Schottmüller 2009
 * @author     Helmut Schottmüller <helmut.schottmueller@aurealis.de>
 * @package    tags
 * @license    LGPL
 * @filesource
 */

/**
 * Class tl_module_tags_articles
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2009
 * @author     Helmut Schottmüller <helmut.schottmueller@aurealis.de>
 * @package    Controller
 */
class tl_module_tags_content extends tl_module
{
}

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['tagcloudcontent']    = '{title_legend},name,headline,type;{size_legend},tag_maxtags,tag_buckets,tag_named_class,tag_on_page_class,tag_show_reset;{template_legend:hide},cloud_template;{tagextension_legend},tag_related,tag_topten;{redirect_legend},tag_jumpTo,keep_url_params;{datasource_legend},tag_content_pages;{expert_legend:hide},cssID';


/**
 * Add fields to tl_module
 */

$GLOBALS['TL_DCA']['tl_module']['fields']['tag_content_pages'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['tag_content_pages'],
	'inputType'               => 'pageTree',
	'eval'                    => array('fieldType'=>'radio', 'helpwizard'=>false, 'mandatory' => true),
	'sql'                     => "blob NULL"
);

?>