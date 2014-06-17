<?php
/*
 *
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */
//define('NHP_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('NHP_Options')){
	require_once( dirname( __FILE__ ) . '/options/options.php' );
}

/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = false;

//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
//$args['google_api_key'] = '***';

//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;

//Add HTML before the form
$args['intro_text'] = __('<p>Complete theme options</p>', 'nhp-opts');

//Setup custom links in the footer for share icons


//Choose to disable the import/export feature
//$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = 'orion2_options';

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Orion2 Options', 'nhp-opts');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('Orion2 Theme Options', 'nhp-opts');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'orion_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
$args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 27;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

//Want to disable the sections showing as a submenu in the admin? uncomment this line
//$args['allow_sub_menu'] = false;




$sections = array();

$sections[] = array(
				'title' => __('General settings', 'nhp-opts'),
				'desc' => __('<p class="description">General theme settings</p>', 'nhp-opts'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array(
					array(
						'id' => 'logo', //must be unique
						'type' => 'upload', //builtin fields include:
										  //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
						'title' => __('Logo', 'nhp-opts'),
						'sub_desc' => __('Upload your own logo', 'nhp-opts'),
						'desc' => __('Upload PNG transparent file', 'nhp-opts'),
						'std' => get_site_url() . '/wp-content/themes/orion2/img/orionlogo.png' //This is a default value, used to set the options on theme activation, and if the user hits the Reset to defaults Button
 						),
					array(
						'id' => 'blogname',
						'type' => 'text',
						'title' => __('Site name', 'nhp-opts'),
						'std' => 'Orion WP'
						),
					)
				);


$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_107_text_resize.png',
				'title' => __('Banner settings', 'nhp-opts'),
				'desc' => __('<p class="description">Intro banner setting</p>', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => 'banner_background',
						'type' => 'upload',
						'title' => __('Banner background', 'nhp-opts'),
						'sub_desc' => __('big image, minimum 795px height', 'nhp-opts'),
						'std' => get_site_url() . '/wp-content/themes/orion2/img/banner.jpg',
 						),
					array(
						'id' => 'banner_icon',
						'type' => 'upload',
						'title' => __('Banner icon', 'nhp-opts'),
						'sub_desc' => __('Banner icon', 'nhp-opts'),
						'std' => get_site_url() . '/wp-content/themes/orion2/img/jellythemes.png',
 						),
					array(
						'id' => 'banner_title',
						'type' => 'text',
						'title' => __('Banner title', 'nhp-opts'),
						'sub_desc' => __('You decide.', 'nhp-opts'),
						'std' => 'Orion'
						),

					array(
						'id' => 'banner_desc',
						'type' => 'editor',
						'title' => __('Banner text', 'nhp-opts'),
						'std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <div class="bannerfoot"><img src="' . get_site_url() . '/wp-content/themes/orion2/img/bannerfooter.png" /></div>'
						)
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_150_check.png',
				'title' => __('Contact info', 'nhp-opts'),
				'desc' => __('<p class="description">Complete contact info</p>', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => 'email',
						'type' => 'text',
						'title' => 'Contact form e-mail',
						'sub_desc' => 'This is the e-mail where you\'ll receive all the messages from the contact page',
						'std' => get_bloginfo('admin_email')
						),
					array(
						'id' => 'phone',
						'type' => 'text',
						'title' => __('Phone number', 'nhp-opts'),
						'std' => '123456789'
						),
					array(
						'id' => 'skype',
						'type' => 'text',
						'title' => __('Skype user', 'nhp-opts'),
						'std' => 'Orion'
						),
					array(
						'id' => 'longitude_coord',
						'type' => 'text',
						'title' => __('Location longitude coordinate', 'nhp-opts'),
						'std' => '41.61759'
						),
					array(
						'id' => 'latitude_coord',
						'type' => 'text',
						'title' => __('Location latitude coordinate', 'nhp-opts'),
						'std' => '0.620015'
						),
					array(
						'id' => 'twitter',
						'type' => 'text',
						'title' => __('Twitter url', 'nhp-opts'),
						'validate' => 'url'
						),
					array(
						'id' => 'facebook',
						'type' => 'text',
						'title' => __('Facebook url', 'nhp-opts'),
						'validate' => 'url'
						),
					array(
						'id' => 'forest',
						'type' => 'text',
						'title' => __('Forest url', 'nhp-opts'),
						'validate' => 'url'
						),
					array(
						'id' => 'flickr',
						'type' => 'text',
						'title' => __('Flickr url', 'nhp-opts'),
						'validate' => 'url'
						),
					array(
						'id' => 'vimeo',
						'type' => 'text',
						'title' => __('Vimeo url', 'nhp-opts'),
						'validate' => 'url'
						),
					array(
						'id' => 'google',
						'type' => 'text',
						'title' => __('Google+ url', 'nhp-opts'),
						'validate' => 'url'
						),
					)
				);


	$tabs = array();

	if (function_exists('wp_get_theme')){
		$theme_data = wp_get_theme();
		$theme_uri = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author = $theme_data->get('Author');
		$version = $theme_data->get('Version');
		$tags = $theme_data->get('Tags');
	}

	$theme_info = '<div class="nhp-opts-section-desc">';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'nhp-opts').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'nhp-opts').$author.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'nhp-opts').$version.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'nhp-opts').implode(', ', $tags).'</p>';
	$theme_info .= '</div>';



	$tabs['theme_info'] = array(
					'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_195_circle_info.png',
					'title' => __('Theme Information', 'nhp-opts'),
					'content' => $theme_info
					);

	if(file_exists(trailingslashit(get_stylesheet_directory()).'README.html')){
		$tabs['theme_docs'] = array(
						'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_071_book.png',
						'title' => __('Documentation', 'nhp-opts'),
						'content' => nl2br(file_get_contents(trailingslashit(get_stylesheet_directory()).'README.html'))
						);
	}//if

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 *
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 *
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){

	$error = false;
	$value =  'just testing';
	/*
	do your validation

	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/

	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;

}//function
?>