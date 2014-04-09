<?php

/**
 * ce-tracking
 * 
 * Copyright (C) 2014 Scyfel (Christian Barkowsky & Jan Theofel)
 * Copyright (C) 2010-2013 Jan Theofel <jan@theofel.com>
 * Copyright (C) ETES GmbH 2009
 * 
 * @package ce-tracking
 * @author  Christian Barkowsky <http://christianbarkowsky.de>
 * @author  Jan Theofel <contao@theofel.com>
 * @link    http://scyfel.de
 * @license LGPL
 */
 

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['cookie'] = '{type_legend},type;{cookie_legend},cookieName,cookieValue,cookieExpire,cookieReplace;{redirect_legend},cookieZCheckCookie,cookieRedirect';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'cookieRedirect';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['cookieRedirect'] = 'cookieJumpTo';


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['cookieName'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['cookieName'],
	'inputType'		=> 'text',
	'exclude'		=> true,
	'eval'			=> array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
	'sql'           => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['cookieValue'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['cookieValue'],
	'inputType'		=> 'text',
	'exclude'		=> true,
	'eval'			=> array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
	'sql'           => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['cookieExpire'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['cookieExpire'],
	'inputType'		=> 'text',
	'exclude'		=> true,
	'eval'			=> array('mandatory'=>true, 'maxlength'=>255, 'rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'           => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['cookieReplace'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['cookieReplace'],
	'inputType'		=> 'checkbox',
	'exclude'		=> true,
	'eval'			=> array('tl_class'=>'w50 m12'),
	'sql'           => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['cookieRedirect'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['cookieRedirect'],
	'inputType'		=> 'checkbox',
	'exclude'		=> true,
	'eval'			=> array('submitOnChange'=>true, 'tl_class'=>'clr'),
	'sql'           => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['cookieJumpTo'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_content']['cookieJumpTo'],
	'exclude'           => true,
	'inputType'         => 'pageTree',
	'foreignKey'        => 'tl_page.title',
	'eval'              => array('fieldType'=>'radio', 'mandatory'=>true),
	'sql'               => "int(10) unsigned NOT NULL default '0'",
	'relation'          => array('type'=>'hasOne', 'load'=>'eager')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['cookieZCheckCookie'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['cookieZCheckCookie'],
	'inputType'		=> 'checkbox',
	'exclude'		=> true,
	'eval'			=> array('tl_class'=>'clr'),
	'sql'           => "char(1) NOT NULL default '0'"
);
