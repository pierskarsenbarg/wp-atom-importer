<?php
/*
Plugin Name: WP Atom Importer
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Tool to import atom feed into wordpress
Version: The Plugin's Version Number, e.g.: 1.0
Author: Piers Karsenbarg
Author URI: http://example.com
License: A "Slug" license name e.g. GPL2
*/


if ( !defined('WP_LOAD_IMPORTERS') )
	return;

// Load Importer API
require_once ABSPATH . 'wp-admin/includes/import.php';

if ( !class_exists( 'WP_Importer' ) ) {
	$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	if ( file_exists( $class_wp_importer ) )
		require_once $class_wp_importer;
}

if(class_exists('WP_IMPORTER'))
{
	class Atom_Importer extends WP_Importer {
		function Atom_Importer(){}
		function run()
		{
			if(empty($_GET['step'])){
				$step = 0;
			}
			else
			{
				$step = (int)$_GET['step'];
			}
			$this->header();
			switch($step){
				case 0: 
					echo 'step 1';
					break;
			}
			$this->footer();
		}

		function header(){
			echo '<div class="wrap">';
			screen_icon();
			echo '<h2>Import Atom feed</h2>';
		}

		function footer(){
			echo '</div>';
		}
	}

	$atom_import = new Atom_Importer();
	register_importer('wp-atom-importer','Atom Importer','Import posts from an atom feed',array($atom_import,'run'));

}