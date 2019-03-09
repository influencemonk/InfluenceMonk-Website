<?php
/*
Plugin Name: MalCare WordPress Security, Firewall & Malware Scanner
Plugin URI: https://www.malcare.com
Description: WordPress Security, Firewall and Malware Scanner
Author: MalCare Security
Author URI: https://www.malcare.com
Version: 1.86.1
Network: True
 */

/*  Copyright 2017  MalCare  (email : support@malcare.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Global response array */

if (!defined('ABSPATH')) exit;
global $bvcb, $bvresp;

require_once dirname( __FILE__ ) . '/main.php';
$bvmain = new MalCare();

register_uninstall_hook(__FILE__, array('MalCare', 'uninstall'));
register_activation_hook(__FILE__, array($bvmain, 'activate'));
register_deactivation_hook(__FILE__, array($bvmain, 'deactivate'));

add_action('wp_footer', array($bvmain, 'footerHandler'), 100);

if (is_admin()) {
	require_once dirname( __FILE__ ) . '/admin.php';
	$bvadmin = new MCAdmin($bvmain);
	add_action('admin_init', array($bvadmin, 'initHandler'));
	add_filter('all_plugins', array($bvadmin, 'initBranding'));
	add_filter('plugin_row_meta', array($bvadmin, 'hidePluginDetails'), 10, 2);
	if ($bvmain->info->isMultisite()) {
		add_action('network_admin_menu', array($bvadmin, 'menu'));
	} else {
		add_action('admin_menu', array($bvadmin, 'menu'));
	}
	add_filter('plugin_action_links', array($bvadmin, 'settingsLink'), 10, 2);
	add_action('admin_notices', array($bvadmin, 'activateWarning'));
	add_action('admin_enqueue_scripts', array($bvadmin, 'mcsecAdminMenu'));
}

if ((array_key_exists('bvreqmerge', $_POST)) || (array_key_exists('bvreqmerge', $_GET))) {
	  $_REQUEST = array_merge($_GET, $_POST);
}

if ((array_key_exists('bvplugname', $_REQUEST)) &&
		stristr($_REQUEST['bvplugname'], $bvmain->plugname)) {
	require_once dirname( __FILE__ ) . '/callback.php';
	$bvcb = new BVCallback($bvmain);
	$bvresp = new BVResponse();
	if ($bvcb->preauth() === 1) {
		if ($bvcb->authenticate() === 1) {
			if (array_key_exists('afterload', $_REQUEST)) {
				add_action('wp_loaded', array($bvcb, 'execute'));
			} else {
				$bvcb->execute();
			}
		} else {
			$bvcb->terminate(false, array_key_exists('bvdbg', $_REQUEST));
		}
	}
} else {
	if ($bvmain->isProtectModuleEnabled()) {
	require_once dirname( __FILE__ ) . '/protect.php';
	$bvprotect = new BVProtect($bvmain);
	$bvprotect->init();
	require_once dirname( __FILE__ ) . '/ipstore.php';
	$bvipstore = new BVIPStore($bvmain);
	$bvipstore->init();
}

	##DYNSYNCMODULE##
}