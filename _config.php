<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'localhost',
	"username" => 'XXXX',
	"password" => 'XXXX',
	"database" => 'XXXX',
	"path" => '',
);

// Set the site locale
i18n::set_locale('en_GB');

// Bolt ///////////////////////////////////////////////////

if (class_exists('BoltEnvironment')) {
	BoltEnvironment::set_dev_servers(array(
		'boltdevserver.local:8092',
	));
}

// Short code handlers
//ShortcodeParser::get()->register('DealerFiles',array('ShortCodeHelper','DealerFiles'));

// Enable custom search engine
//BoltFulltextSearchable::enable();

// TinyMCE Config 
// -----------------------

// Add start and type attributes for <ol>
HtmlEditorConfig::get('cms')->setOption(
    'extended_valid_elements',
    HtmlEditorConfig::get('cms')->getOption('extended_valid_elements')
	.',ol[start|type]'
);

// Add custom styles to the editor, this allows us more control that just adding the styled from typography.css willy nilly.
HtmlEditorConfig::get('cms')->setOption('style_formats_merge', true);
HtmlEditorConfig::get('cms')->setOption(
	'style_formats',
	array(
		/* Standard Styles */
    	array(
    		'title' => 'Lead In',
    		'block' => 'p',
    		'classes' => 'leadin'
    	),
		array(
    		'title' => 'Small',
    		'block' => 'p',
    		'classes' => 'small'
    	),
		array(
    		'title' => 'Large',
    		'block' => 'p',
    		'classes' => 'large'
    	),
		
		/* Custom font styles */
		/*array(
        	'title' => 'Multiple Columns',
        	'block' => 'div',
        	'classes' => 'columns',
        	'wrapper' => true
        ),*/
		
		/*
		// EXAMPLES:
		// Selector:
		array(
    		'title' => 'Button',
    		'selector' => 'a', // selector will add to any EXISTING elements in the selection that match this string, can be comma separated list of elements
    		'classes' => 'button' // Will add this class
    	),
		// Block:
        array(
        	'title' => 'Callout Box',
        	'block' => 'h2', // Will change the selected blocks to this element
        	'classes' => 'mySpecialHeading', // Will add this class
        ),
		// Wrapper:
        array(
        	'title' => 'Callout Box',
        	'block' => 'div', // Element to wrap with
        	'classes' => 'callout',
        	'wrapper' => true // Will wrap around the entire selection
        ),
		// Inline:
        array(
        	'title' => 'Bold Red Text',
        	'inline' => 'span', // Inline element to wrap selection with
        	'classes' => 'callout',
        )
		*/
		
		/* Margins */
		array(
    		'title' => 'Margin Bottom',
    		'selector' => 'p,ul,ol,li,blockquote,address,pre,h1,h2,h3,h4,h5,h6',
    		'classes' => 'marginbottom'
    	),
		array(
    		'title' => 'No Margins',
    		'selector' => 'p,ul,ol,li,blockquote,address,pre,h1,h2,h3,h4,h5,h6',
    		'classes' => 'nomargins'
    	),
    )
);
/// DEV / DEBUG //////////////////////

//Director::set_environment_type("dev");
// Email
if(Director::isDev()) {
	SS_Log::add_writer(new SS_LogEmailWriter('chris@christopherbolt.com'), SS_Log::WARN, '<=');
	Config::inst()->update('Email', 'send_all_emails_to', "chris@christopherbolt.com");
} else {
	//Config::inst()->update('Email', 'bcc_all_emails_to', "chris@christopherbolt.com");
}