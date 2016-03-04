<?php

class MySiteConfig extends DataExtension {
		
	private static $db = array(
		'Copyright' => 'Varchar(255)',
		'ContactEmail' => 'Varchar',
		'GoogleAnalyticsCode' => 'Text'
	);
	
	public function updateCMSFields(FieldList $fields) {
		
		$fields->addFieldToTab("Root.Main", EmailField::create("ContactEmail", 'Default contact email'));				
		$fields->addFieldToTab("Root.Main", TextField::create("Copyright"));
		$fields->addFieldToTab("Root.Main", TextareaField::create("GoogleAnalyticsCode", 'Google analytics code'));
		
	}
	
}

?>