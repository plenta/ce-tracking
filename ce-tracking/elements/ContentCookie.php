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


namespace Scyfel;


class ContentCookie extends \ContentElement
{

	protected $strTemplate = 'ce_html';


	/**
	 * Set the cookie and redirect if required.
	 */
	 public function generate()
	 {
		 if (TL_MODE == 'BE')
		 {
			 $objTemplate = new \BackendTemplate('be_wildcard');
			 $objTemplate->wildcard = '### TRACKING COOKIE ###';

			 return $objTemplate->parse();
		}

		parent::generate();

		$blnCookie = false;
		$varCookie = \Input::cookie($this->cookieName);

		if (!strlen($varCookie) || $this->cookieReplace)
		{
			$this->setCookie($this->cookieName, $this->cookieValue, time() + $this->cookieExpire);
			$blnCookie = true;
		}
		elseif (strlen($varValue))
		{
			// Extend life of the cookie
			$this->setCookie($this->cookieName, $varCookie, time() + $this->cookieExpire);
			$blnCookie = true;
		}

		// Redirect visitor
		if ($this->cookieRedirect && strlen($this->cookieJumpTo))
		{
			$objRedirectPage = \PageModel::findPublishedById($this->cookieJumpTo));

			if ($objRedirectPage !== null)
			{
				$this->redirect($this->generateFrontendUrl($objRedirectPage->row()));
			}
		}

		return '';
	}


	/**
	 * This function does nothing but is required cause it is abstract in parent class.
	 */
	 protected function compile() {}
}
