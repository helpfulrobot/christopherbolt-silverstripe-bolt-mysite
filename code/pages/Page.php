<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		// Only add custom fields if we are not in the blog....
		if (!stristr($this->ClassName, 'Blog')) {
			
			//$fields->addFieldToTab("Root.Design", new ImageField('HeaderImage', 'Header image'));
			
		}
				
		return $fields;
	}

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array ();

	public static $themeFolderAndSubfolder = '';
		
	public function init() {
		
		// Caching, only set this for sites that will not be updated often, can override this on page controllers
		// Should not be set in admin as causes problems with the CMS
		if (Versioned::get_reading_mode() == 'Stage.Live' && !$this->request->getVar('stage')) HTTP::set_cache_age(86400);
		
		parent::init();
		Requirements::set_force_js_to_bottom(true);
		
		// Setup requirements		
		$currentTheme = SSViewer::current_theme();
		self::$themeFolderAndSubfolder = 'themes/'.$currentTheme;
		BoltSiteTree::setupRequirements(
			// css array
			array(
				self::$themeFolderAndSubfolder.'/css/reset.css',
				self::$themeFolderAndSubfolder.'/css/base.css',
				self::$themeFolderAndSubfolder.'/thirdparty/jquery-focuspoint/css/focuspoint.css',
				self::$themeFolderAndSubfolder.'/css/layout.css',
				self::$themeFolderAndSubfolder.'/css/typography.css',
				self::$themeFolderAndSubfolder.'/css/form.css',
			),
			// JS array
			array(
				THIRDPARTY_DIR."/jquery/jquery.js",
				BOLTTOOLS_DIR."/javascript/placeholderfields.js",
				self::$themeFolderAndSubfolder.'/thirdparty/jquery-focuspoint/js/jquery.focuspoint.js',
				self::$themeFolderAndSubfolder.'/thirdparty/jquery-cycle2/jquery.cycle2.min.js',
				self::$themeFolderAndSubfolder.'/thirdparty/jquery-cycle2/plugins/jquery.cycle2.swipe.min.js',
				self::$themeFolderAndSubfolder.'/javascript/mysite.js',
			)
		);
	}
}