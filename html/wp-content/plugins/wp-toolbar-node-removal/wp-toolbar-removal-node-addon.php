<?php

/*
Plugin Name: √ WP ToolBar Removal Node (Add-On)
Plugin URI: http://slangji.wordpress.com/wp-toolbar-node-removal/
Description: Completely Remove ToolBar, Node, Group, Link, Frontend and Backend Admin Bar for Third Party (free only) Plugins on WP 3.3+ 3.4+ 3.5+ 3.6+ (only). The configuration of this plugin is Automattic! Work under <a href="http://www.gnu.org/licenses/gpl-2.0.html" title"GPLv2 or later License compatible">GPLv2</a> or later License. <a href="http://www.gnu.org/prep/standards/standards.html" title"GNU Style indentation coding standard compatible">GNU Style</a> indentation compatible. | <a href="http://slangji.wordpress.com/donate/" title="Free Donation">Donate</a> | <a href="http://slangji.wordpress.com/contact/" title="Send Me Bug and Suggestion">Contact</a> | <a href="http://wordpress.org/extend/plugins/wp-toolbar-removal/" title="Remove ToolBar Frontend Backend User Profile and Code">ToolBar Removal?</a>
Version: 2013.0612.0831
Author: sLa
Author URI: http://slangji.wordpress.com/
Requires at least: 3.3
Tested up to: 3.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Indentation: GNU Style
Indentation URI: http://www.gnu.org/prep/standards/standards.html
 *
 * WP ToolBar Removal Node - Completely Remove ToolBar, Node, Group, Link, Frontend and Backend Admin Bar for Third Party (free only) Plugins on WP 3.3+ 3.4+ 3.5+ 3.6+ (only).
 *
 * Copyright (C) 2009-2013 [sLaNGjI's](http://slangji.wordpress.com/slangjis/) (email: <slangji[at]gmail[dot]com>)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](http://wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see [GNU General Public Licenses](http://www.gnu.org/licenses/),
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301, USA.
 *
 * √ DISCLAIMER
 *
 * The license under which the WordPress software is released is the GPLv2 (or later) from the
 * Free Software Foundation. A copy of the license is included with every copy of WordPress.
 *
 * Part of this license outlines requirements for derivative works, such as plugins or themes.
 * Derivatives of WordPress code inherit the GPL license.
 *
 * There is some legal grey area regarding what is considered a derivative work, but we feel
 * strongly that plugins and themes are derivative work and thus inherit the GPL license.
 *
 * The license for this software can be found on [Free Software Foundation](http://www.gnu.org/licenses/gpl-2.0.html) and as license.txt into this plugin package.
 *
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * √ VIOLATIONS
 *
 * [Violations of the GNU Licenses](http://www.gnu.org/licenses/gpl-violation.en.html)
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * √ GUIDELINES
 *
 * This software meet [Detailed Plugin Guidelines](http://wordpress.org/extend/plugins/about/guidelines/) paragraphs 1,4,10,12,13,16,17 quality requirements.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * √ CODING
 *
 * This software implement [GNU style](http://www.gnu.org/prep/standards/standards.html) coding standard indentation.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * √ VALIDATION
 *
 * This readme.txt rocks. Seriously. Flying colors. It meet the specifications according to WordPress [Readme Validator](http://wordpress.org/extend/plugins/about/validator/) directives.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 */

/**
 * @package ToolBar Removal Node (Add-On)
 * @subpackage WordPress PlugIn
 * @description Completely Remove ToolBar, Node, Group, Link, on Frontend and Backend Admin.
 * @since 3.3.0
 * @version 2013.0612.0831
 * @status DEVELOPMENT (Release) Code in Becoming!
 * @author sLa
 * @license GPLv2 or later
 * @indentation GNU Style
 */

if ( !function_exists( 'add_action' ) )
	{
		header( 'HTTP/0.9 403 Forbidden' );
		header( 'HTTP/1.0 403 Forbidden' );
		header( 'HTTP/1.1 403 Forbidden' );
		header( 'Status: 403 Forbidden' );
		header( 'Connection: Close' );
			exit();
	}

function wptbr_ngra( $wp_toolbar ) {

		// WordPress Node Removal
		$wp_toolbar->remove_node( 'root-default' );
		//$wp_toolbar->remove_node( 'network-admin' );

		$wp_toolbar->remove_node( 'wp-logo' );
		$wp_toolbar->remove_node( 'wp-logo-default' );
		$wp_toolbar->remove_node( 'about' );
		$wp_toolbar->remove_node( 'wp-logo-external' );
		$wp_toolbar->remove_node( 'wporg' );
		$wp_toolbar->remove_node( 'documentation' );
		$wp_toolbar->remove_node( 'support-forums' );
		$wp_toolbar->remove_node( 'feedback' );

		$wp_toolbar->remove_node( 'site-name' );
		$wp_toolbar->remove_node( 'site-name-default' );
		$wp_toolbar->remove_node( 'view-site' );

		$wp_toolbar->remove_node( 'comments' );
		$wp_toolbar->remove_node( 'updates' );
		$wp_toolbar->remove_node( 'view' );

		$wp_toolbar->remove_node( 'edit' );

		$wp_toolbar->remove_node( 'new-content' );
		$wp_toolbar->remove_node( 'new-content-default' );
		$wp_toolbar->remove_node( 'new-post' );
		$wp_toolbar->remove_node( 'new-media' );
		$wp_toolbar->remove_node( 'new-link' );
		$wp_toolbar->remove_node( 'new-page' );
		$wp_toolbar->remove_node( 'new-user' );

		$wp_toolbar->remove_node( 'top-secondary' );
		$wp_toolbar->remove_node( 'my-account' );
		$wp_toolbar->remove_node( 'user-actions' );
		$wp_toolbar->remove_node( 'user-info' );
		$wp_toolbar->remove_node( 'edit-profile' );
		$wp_toolbar->remove_node( 'logout' );

		$wp_toolbar->remove_node( 'search' );

		//$wp_admin_bar->remove_menu( 'get-shortlink' );
		//$wp_admin_bar->remove_menu( 'dashboard' );
		//$wp_admin_bar->remove_menu( 'my-account-with-avatar' );
		//$wp_admin_bar->remove_menu( 'appearance' );
		//$wp_admin_bar->remove_menu( 'themes' );
		//$wp_admin_bar->remove_menu( 'widgets' );
		//$wp_admin_bar->remove_menu( 'menus' );
		//$wp_admin_bar->remove_menu( 'background' );
		//$wp_admin_bar->remove_menu( 'header' );
		//$wp_admin_bar->remove_menu( 'wrap' );
		//$wp_admin_bar->remove_menu( 'button' );
		//$wp_admin_bar->remove_menu( 'adminbarsearch' );
		//$wp_admin_bar->remove_menu( 'comments' );
		//$wp_admin_bar->remove_menu( 'network-admin' );

		// WordPress Network Multisite Node Removal
		$wp_toolbar->remove_node( 'my-sites' );
		$wp_toolbar->remove_node( 'my-sites-list' );
		$wp_toolbar->remove_node( 'blog-1' );
		$wp_toolbar->remove_node( 'blog-1-default' );
		$wp_toolbar->remove_node( 'blog-1-d' );
		$wp_toolbar->remove_node( 'blog-1-n' );
		$wp_toolbar->remove_node( 'blog-1-c' );
		$wp_toolbar->remove_node( 'blog-1-v' );
		$wp_toolbar->remove_node( 'blog-2' );
		$wp_toolbar->remove_node( 'blog-2-default' );
		$wp_toolbar->remove_node( 'blog-2-d' );
		$wp_toolbar->remove_node( 'blog-2-n' );
		$wp_toolbar->remove_node( 'blog-2-c' );
		$wp_toolbar->remove_node( 'blog-2-v' );
		$wp_toolbar->remove_node( 'blog-3' );
		$wp_toolbar->remove_node( 'blog-3-default' );
		$wp_toolbar->remove_node( 'blog-3-d' );
		$wp_toolbar->remove_node( 'blog-3-n' );
		$wp_toolbar->remove_node( 'blog-3-c' );
		$wp_toolbar->remove_node( 'blog-3-v' );
		$wp_toolbar->remove_node( 'blog-4' );
		$wp_toolbar->remove_node( 'blog-4-default' );
		$wp_toolbar->remove_node( 'blog-4-d' );
		$wp_toolbar->remove_node( 'blog-4-n' );
		$wp_toolbar->remove_node( 'blog-4-c' );
		$wp_toolbar->remove_node( 'blog-4-v' );
		$wp_toolbar->remove_node( 'blog-5' );
		$wp_toolbar->remove_node( 'blog-5-default' );
		$wp_toolbar->remove_node( 'blog-5-d' );
		$wp_toolbar->remove_node( 'blog-5-n' );
		$wp_toolbar->remove_node( 'blog-5-c' );
		$wp_toolbar->remove_node( 'blog-5-v' );
		$wp_toolbar->remove_node( 'blog-6' );
		$wp_toolbar->remove_node( 'blog-6-default' );
		$wp_toolbar->remove_node( 'blog-6-d' );
		$wp_toolbar->remove_node( 'blog-6-n' );
		$wp_toolbar->remove_node( 'blog-6-c' );
		$wp_toolbar->remove_node( 'blog-6-v' );
		$wp_toolbar->remove_node( 'blog-7' );
		$wp_toolbar->remove_node( 'blog-7-default' );
		$wp_toolbar->remove_node( 'blog-7-d' );
		$wp_toolbar->remove_node( 'blog-7-n' );
		$wp_toolbar->remove_node( 'blog-7-c' );
		$wp_toolbar->remove_node( 'blog-7-v' );
		$wp_toolbar->remove_node( 'blog-8' );
		$wp_toolbar->remove_node( 'blog-8-default' );
		$wp_toolbar->remove_node( 'blog-8-d' );
		$wp_toolbar->remove_node( 'blog-8-n' );
		$wp_toolbar->remove_node( 'blog-8-c' );
		$wp_toolbar->remove_node( 'blog-8-v' );
		$wp_toolbar->remove_node( 'blog-9' );
		$wp_toolbar->remove_node( 'blog-9-default' );
		$wp_toolbar->remove_node( 'blog-9-d' );
		$wp_toolbar->remove_node( 'blog-9-n' );
		$wp_toolbar->remove_node( 'blog-9-c' );
		$wp_toolbar->remove_node( 'blog-9-v' );

		// WP Super Cache Node Removal
		//$wp_toolbar->remove_node( 'delete-cache' );

		// WordPress SEO by Yoast Node Removal
		$wp_toolbar->remove_node( 'wpseo-menu' );
		$wp_toolbar->remove_node( 'wpseo-menu-default' );
		$wp_toolbar->remove_node( 'wpseo-kwresearch' );
		$wp_toolbar->remove_node( 'wpseo-kwresearch-default' );
		$wp_toolbar->remove_node( 'wpseo-adwordsexternal' );
		$wp_toolbar->remove_node( 'wpseo-googleinsights' );
		$wp_toolbar->remove_node( 'wpseo-wordtracker' );
		$wp_toolbar->remove_node( 'wpseo-settings' );
		$wp_toolbar->remove_node( 'wpseo-settings-default' );
		$wp_toolbar->remove_node( 'wpseo-titles' );
		$wp_toolbar->remove_node( 'wpseo-social' );
		$wp_toolbar->remove_node( 'wpseo-xml' );
		$wp_toolbar->remove_node( 'wpseo-permalinks' );
		$wp_toolbar->remove_node( 'wpseo-internal-links' );
		$wp_toolbar->remove_node( 'wpseo-rss' );

		// NextGen Gallery Node Removal
		$wp_toolbar->remove_node( 'ngg-menu' );
		$wp_toolbar->remove_node( 'ngg-menu-default' );
		$wp_toolbar->remove_node( 'ngg-menu-overview' );
		$wp_toolbar->remove_node( 'ngg-menu-add-gallery' );
		$wp_toolbar->remove_node( 'ngg-menu-manage-gallery' );
		$wp_toolbar->remove_node( 'ngg-menu-manage-album' );
		$wp_toolbar->remove_node( 'ngg-menu-tags' );
		$wp_toolbar->remove_node( 'ngg-menu-options' );
		$wp_toolbar->remove_node( 'ngg-menu-style' );
		$wp_toolbar->remove_node( 'ngg-menu-about' );

		// CloudFlare Node Removal
		$wp_toolbar->remove_node( 'cloudflare' );
		$wp_toolbar->remove_node( 'cloudflare-default' );
		$wp_toolbar->remove_node( 'cloudflare-my-websites' );
		$wp_toolbar->remove_node( 'cloudflare-analytics' );
		$wp_toolbar->remove_node( 'cloudflare-account' );

		// W3 Total Cache Node Removal
		$wp_toolbar->remove_node( 'w3tc' );
		$wp_toolbar->remove_node( 'w3tc-default' );
		$wp_toolbar->remove_node( 'w3tc-empty-caches' );
		$wp_toolbar->remove_node( 'w3tc-faq' );
		$wp_toolbar->remove_node( 'w3tc-support' );

		// BackWPup Node Removal
		$wp_toolbar->remove_node( 'backwpup' );
		$wp_toolbar->remove_node( 'backwpup-default' );
		$wp_toolbar->remove_node( 'backwpup-jobs' );
		$wp_toolbar->remove_node( 'backwpup-logs' );
		$wp_toolbar->remove_node( 'backwpup-backups' );

		// WP Calendar Node Removal
		$wp_toolbar->remove_node( 'my-calendar' );

		// Polylang Node Removal
		$wp_toolbar->remove_node( 'languages​​' );
		
		// Jigoshop Admin Bar Addition Node Removal
		$wp_toolbar->remove_node( 'ddw-jigoshop-admin-bar' );
		$wp_toolbar->remove_node( 'ddw-jigoshop-admin-bar-default' );

		// FaceBook AWD Node Removal
		$wp_toolbar->remove_node( 'awd_fcbk' );
		$wp_toolbar->remove_node( 'awd_fcbk-default' );
		$wp_toolbar->remove_node( 'awd_fcbk_submenu0' );
		$wp_toolbar->remove_node( 'awd_fcbk_submenu1' );
		$wp_toolbar->remove_node( 'awd_fcbk_submenu2' );
		$wp_toolbar->remove_node( 'awd_fcbk_submenu3' );
		$wp_toolbar->remove_node( 'awd_fcbk_submenu4' );

		// PageLines Node Removal
		$wp_toolbar->remove_node( 'pagelines_settings_adminbar' );
		$wp_toolbar->remove_node( 'pl_settings' );
		$wp_toolbar->remove_node( 'pl_settings-default' );
		$wp_toolbar->remove_node( 'pl_dashboard' );
		$wp_toolbar->remove_node( 'pl_main_settings' );
		$wp_toolbar->remove_node( 'pl_special' );
		$wp_toolbar->remove_node( 'pl_templates' );
		$wp_toolbar->remove_node( 'pl_extend' );

		//$wp_toolbar->remove_node( '' );

	}
	add_action( 'admin_bar_menu', 'wptbr_ngra', 999 );

function wptbr_ngra_ab () { global $wp_admin_bar;

		$wp_admin_bar->remove_menu( 'root-default' );
		$wp_admin_bar->remove_menu( 'network-admin' );

		$wp_admin_bar->remove_menu( 'get-shortlink' );
		$wp_admin_bar->remove_menu( 'dashboard' );
		$wp_admin_bar->remove_menu( 'my-account-with-avatar' );
		$wp_admin_bar->remove_menu( 'appearance' );
		$wp_admin_bar->remove_menu( 'themes' );
		$wp_admin_bar->remove_menu( 'widgets' );
		$wp_admin_bar->remove_menu( 'menus' );
		$wp_admin_bar->remove_menu( 'background' );
		$wp_admin_bar->remove_menu( 'header' );
		$wp_admin_bar->remove_menu( 'wrap' );
		$wp_admin_bar->remove_menu( 'button' );
		$wp_admin_bar->remove_menu( 'adminbarsearch' );

		// WP Super Cache Node Removal
		$wp_admin_bar->remove_menu( 'delete-cache' );

		// WP Socializer Node Removal
		$wp_admin_bar->remove_menu( 'wpsr_adminbar_menu' );
		$wp_admin_bar->remove_menu( 'wpsr_adminbar_menu-default' );
		$wp_admin_bar->remove_menu( 'edit-the-templates' );
		$wp_admin_bar->remove_menu( 'help' );
		
		// WP Memory Load db size Indicator Node Removal
		$wp_admin_bar->remove_menu( 'wp_memory_db_indicator' );

		// WP Really Simple Health Node Removal
		$wp_admin_bar->remove_menu( 'my-item1' );
		$wp_admin_bar->remove_menu( 'my-item2' );
		$wp_admin_bar->remove_menu( 'my-item3' );

		//$wp_admin_bar->remove_menu( '' );

	}
	add_action( 'wp_before_admin_bar_render', 'wptbr_ngra_ab', 999 );

if ( !function_exists( 'hide_admin_bar_search' ) )
	{
		// WordPress Search Form Box Node Removal
		function hide_admin_bar_search ()
	{

?>
<style type="text/css">#wpadminbar #adminbarsearch{display:none}</style>
<?php
	}
	add_action( 'admin_head', 'hide_admin_bar_search', 999 );
	add_action( 'wp_head', 'hide_admin_bar_search', 999 );
}

	function wptbr_ngra_rbcb()
		{
			if ( has_filter( 'wp_head', '_admin_bar_bump_cb' ) )
				{
					remove_filter( 'wp_head', '_admin_bar_bump_cb' );
				}
		}
	add_filter( 'wp_head', 'wptbr_ngra_rbcb', 1 );

	function wptbr_ngra_ras()
		{
			echo '<style type="text/css">#adminmenushadow,#adminmenuback{background-image:none}</style>';
		}
	add_action( 'admin_head', 'wptbr_ngra_ras' );

	function wptbr_ngra_spab_init()
		{
			add_filter( 'show_wp_pointer_admin_bar', '__return_false' );
		}
	add_filter( 'init', 'wptbr_ngra_spab_init', 9 );

function wptbr_ngra_nfo () {

		echo"\n<!--Plugin ToolBar Node Removal 2013.0612.0831 Active-->\n\n";

	}
	add_action( 'wp_head', 'wptbr_ngra_nfo', 999 );
	add_action( 'wp_footer', 'wptbr_ngra_nfo', 999 );

?>