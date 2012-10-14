<?php

namespace Contao;

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
 * @copyright  Helmut Schottmüller 2008 
 * @author     Helmut Schottmüller <typolight@aurealis.de>
 * @package    tags 
 * @license    LGPL 
 * @filesource
 */


/**
 * Class ModuleTagCloudContent
 *
 * @copyright  Helmut Schottmüller 2009
 * @author     Helmut Schottmüller <typolight@aurealis.de>
 * @package    Controller
 */
class ModuleTagCloudContent extends \ModuleTagCloud
{
	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### TAGCLOUD Content ###';

			return $objTemplate->parse();
		}

		$this->strTemplate = (strlen($this->cloud_template)) ? $this->cloud_template : $this->strTemplate;

		$taglist = new TagListContentElements();
		$taglist->addNamedClass = $this->tag_named_class;
		if ($this->tag_on_page_class) $this->checkForContentElementOnPage = true;
		if (strlen($this->tag_maxtags)) $taglist->maxtags = $this->tag_maxtags;
		if (strlen($this->tag_buckets) && $this->tag_buckets > 0) $taglist->buckets = $this->tag_buckets;
		if (strlen($this->tag_content_pages)) $taglist->content_pages = deserialize($this->tag_content_pages, TRUE);
		$this->arrTags = $taglist->getTagList();
		if ($this->tag_topten) $this->arrTopTenTags = $taglist->getTopTenTagList();
		if (strlen($this->Input->get('tag')) && $this->tag_related)
		{
			$relatedlist = (strlen($this->Input->get('related'))) ? preg_split("/,/", $this->Input->get('related')) : array();
			$this->arrRelated = $taglist->getRelatedTagList(array_merge(array($this->Input->get('tag')), $relatedlist));
		}
		if (count($this->arrTags) < 1)
		{
			return '';
		}
		return Module::generate();
	}
}

?>