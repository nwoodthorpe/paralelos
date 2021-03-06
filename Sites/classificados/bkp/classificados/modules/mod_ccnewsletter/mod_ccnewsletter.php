<?php
/**
* @package ccNewsletter
* @version 1.0.9
* @author  Chill Creations <info@chillcreations.com>
* @link    http://www.chillcreations.com
* @copyright Copyright (C) 2008 - 2010 Chill Creations-All rights reserved
* @license GNU/GPL, see LICENSE.php for full license.
* See COPYRIGHT.php for more copyright notices and details.

This file is part of ccNewsletter.
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
**/


// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');

global $mainframe;
$router =& $mainframe->getRouter();
/* Get Parameters details */
$parameters['style'] = $params->get('style', 'mootools');
$parameters['introduction'] = $params->get('introduction');
$parameters['name'] = $params->get('lname', 'Name');
$parameters['email'] = $params->get('lemail', 'Email');
$parameters['subscribe'] = $params->get('lsubscribe', 'Subscribe');
$parameters['unsubscribe'] = $params->get('lunsubscribe', 'Unsubscribe');
$parameters['move'] = $params->get('lmove', 'Move');
$parameters['close'] = $params->get('lclose', 'Close');
$parameters['emailwarning'] = $params->get('lclose', 'Close');
$parameters['namewarning'] = $params->get('namewarning');
$parameters['emailwarning'] = $params->get('emailwarning');
$parameters['unsubscribe_button'] = $params->get('unsubscribe_button', '0');
$parameters['article'] = $params->get('id', '0');
$parameters['showterm'] = $params->get('showterm', '0');
$parameters['terms_cond_warn'] = $params->get('terms_cond_warn', 'Check the Terms and condition!!');
$parameters['showterm_text'] = $params->get('showterm_text', 'Check the Terms and condition!!');
$parameters['popuptype'] = $params->get('popuptype', '0');

if(modccNewsletterHelper::isUserLogin())
{
	if(modccNewsletterHelper::isUserSubscribed())
	{
		$formname = "subscribeForm";
		$formaction = JRoute::_( 'index.php?option=com_ccnewsletter&view=unsubscribe', true, 0);
		$title = $params->get('lunsubscribe');
		$task = "removeSubscriberByEmail";
		$name = "";
		$email = modccNewsletterHelper::getUseremail() ;
		$subscribe_flag = 'u';
	}
	else
	{
		$formname = "subscribeFormModule";
		$formaction = JRoute::_( 'index.php?option=com_ccnewsletter&view=ccnewsletter', true, 0);
		$title = $params->get('lsubscribe');
		$task = "addSubscriber";
		$name = modccNewsletterHelper::getUsername();
		$email = modccNewsletterHelper::getUseremail() ;
		$subscribe_flag = 's';
	}
}
else
{
		$formname = "subscribeFormModule";
		$formaction = JRoute::_( 'index.php?option=com_ccnewsletter&view=ccnewsletter', true, 0);
		$title = $params->get('lsubscribe');
		$task = "addSubscriber";
		$name = "";
		$email = "" ;
		$subscribe_flag = 's';
}
require(JModuleHelper::getLayoutPath('mod_ccnewsletter'));
