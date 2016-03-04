<?php
/**
 * Plug-ins for additional functionality in your LeftAndMain classes.
 * 
 * @package framework
 * @subpackage admin
 */
class MySiteLeftAndMain extends LeftAndMainExtension {

	public function init() {
		parent::init();
		#Requirements::javascript(BOLTTOOLS_DIR.'/thirdparty/livequery/jquery.livequery.js');
		Requirements::javascript('mysite/javascript/leftandmain.js');
		Requirements::css('mysite/css/leftandmain.css');
	}

}
