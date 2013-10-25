<?php
/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme/plugin as outlined in the terms and conditions.
 *  For more information, please read:
 *  - http://www.advancedcustomfields.com/terms-conditions/
 *  - http://www.advancedcustomfields.com/resources/getting-started/including-lite-mode-in-a-plugin-theme/
 */ 

// Add-ons 
// include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-gallery/acf-gallery.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_a-brief-primer',
		'title' => 'A Brief Primer',
		'fields' => array (
			array (
				'key' => 'field_52178704984cc',
				'label' => 'How to add a new video',
				'name' => '',
				'type' => 'message',
				'message' => '<p>
	For really, really good reasons (*cough* bandwidth *cough*), we require that the actual videos are hosted on an external media server. Because we aren\'t uploading them directly into Wordpress, we have to deal with a few extra steps.
	</p>
	<ol>
	<li>
	Walk through the <b>LibraryLearn Options</b> below. This will guide you through the grunt work.
	</li>
	<li>
	Choose relevant <b>Categories</b> on the right and <b>tag</b> away. 
	<p>
	<b>Important:</b> Videos can exist in more than one sub-category, but please choose just <b>one (1) top-level category</b>.
	</p>
	</li>
	
	<li>
	Write any additional content, thoughts, link-out to library guides or other resources, or post you transcript in the main content area below. 
	</li>
	
	<li>
	Write a brief summary of the video in the same-titled area below the main content. This blurb sells your video and it\'s what shows in series and lists. If you write more than three sentences, then the content won\'t look suspiciously sparse or format stupidly next to its thumbnail :). 
	
	<blockquote>In this video, Sylvester Stalone shows you how to navigate the library website. Watch as he left-clicks through the social obstacles that stand between him and the heavyweight championship of the world. In his gruff, hard-to-understand way, he\'ll also explain browser support. </blockquote>
	</li>
	
	<li>
	As you scroll, you\'ll come across <b>WordPress SEO by Yoast</b>, this is wildly important for discoverability. Please take a moment and fill this part out (only three fields). 
	</li>
	</ol>',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'academy_video',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_librarylearn-options',
		'title' => 'LibraryLearn Options',
		'fields' => array (
			array (
				'key' => 'field_51fbbffdd4a43',
				'label' => 'Special Templating',
				'name' => 'academy_video_format',
				'type' => 'select',
				'instructions' => '<p>We can handle two different kinds of <em>templates</em> for presenting videos:
	<ol>
	<li>
	 <b>Standard (Individual Components)</b> <br>You have all the individual pieces of your video (.mp4, .webm, .jpg, .srt / .vtt) and they have been uploaded to the library\'s media server. Videos in this way will be presented within the <b><video></b> element, adapt to any screen, and otherwise look pretty dashing.
	
	<p><small><b>Browser Support</b> [for reference]: Internet Explorer 9+, Google Chrome 3.0 +, Firefox 3.5 +, Opera 10.5 +, Safari 3.1 +</small></p>
	</li>
	
	<li><b>Adobe Captivate</b> <br>Captivate project files need to be similarly uploaded, and these pages LibraryLearn will present within with an iframe.</li>
	</ol>
	</p>',
				'required' => 1,
				'choices' => array (
					'standard' => 'Standard (Individual Components)',
					'captivate' => 'Adobe Captivate',
					'' => '',
				),
				'default_value' => 'standard: Standard HTML5 Video',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_51fbc4b6054fc',
				'label' => 'The Checklist!',
				'name' => 'academy_checklist',
				'type' => 'checkbox',
				'instructions' => '<p>
	Let\'s make sure we have everything we need.
	</p>',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_51fbbffdd4a43',
							'operator' => '==',
							'value' => 'standard',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'Primary Video (.webm)' => 'Primary Video (.webm)',
					'Fallback Video (.mp4)' => 'Fallback Video (.mp4)',
					'Screenshot (.jpg)' => '16:9 Screenshot (.jpg)',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_51fbc748fe5a8',
				'label' => 'The File Name',
				'name' => 'academy_video_file',
				'type' => 'text',
				'instructions' => '<p>
	As you know, each component shares its file name. LibraryLearn needs to know <b>the root</b>, which fore instance may look like <b>apa--citation_management(05-2013)</b>.
	</p>
	<p><small>
	<b>Did this make you go, "Huh!?"</b> Please review <a href="http://sherman.library.nova.edu/sites/labs/knowledgebase/file-naming-guidelines-for-webvideo-files/" target="new" title="File Naming Guidelines">the NSU Libraries\' file naming guidelines</a>.
	</small></p>',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_51fbc4b6054fc',
							'operator' => '==',
							'value' => 'Primary Video (.webm)',
						),
						array (
							'field' => 'field_51fbc4b6054fc',
							'operator' => '==',
							'value' => 'Fallback Video (.mp4)',
						),
						array (
							'field' => 'field_51fbc4b6054fc',
							'operator' => '==',
							'value' => 'Screenshot (.jpg)',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'apa--citation_management(05-2013)',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52179444baf36',
				'label' => 'Accessibility',
				'name' => 'accessibility',
				'type' => 'checkbox',
				'instructions' => 'Are you providing captions or a transcript? Bonus points for both.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_51fbbffdd4a43',
							'operator' => '==',
							'value' => 'standard',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'Captions (.srt / .vtt )' => 'Captions (.srt / .vtt )',
					'Transcript' => 'Transcript',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_52179690e134c',
				'label' => 'Transcript',
				'name' => '',
				'type' => 'message',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_52179444baf36',
							'operator' => '==',
							'value' => 'Transcript',
						),
					),
					'allorany' => 'all',
				),
				'message' => '<p>
	Copy your transcript into the main content area below. Please be careful and avoid copying-and-pasting from a Word document. 
	</p>',
			),
			array (
				'key' => 'field_521cacfa1738d',
				'label' => 'Captivate URL',
				'name' => 'captivate_url',
				'type' => 'text',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_51fbbffdd4a43',
							'operator' => '==',
							'value' => 'captivate',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'academy_video',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
}
?>