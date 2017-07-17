<?php

// Exit if accessed directly
	defined( 'ABSPATH' ) || exit;

/* Uninstall Plugin */

// if not uninstalled plugin
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) 
	exit(); // out!


/*esle:
	if uninstalled plugin, this options will be deleted
*/
delete_option('tcbd_auto_refresh_time');
delete_option('tcbd_auto_screen');