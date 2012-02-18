<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.form.helper');

JFormHelper::loadFieldClass('list');

class JFormFieldInmo extends JFormFieldList
{
	protected $type = 'Inmo';

	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,nombrePropiedad');
		$query->from('#__inmo');
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		$options = array();
		if($messages){
			foreach($messages as $message){
				$options[] = JHtml::_('select.option', $message->id, $message->nombrePropiedad);
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
