<?php

/**
 * Plugin Name: Elementor Iframe Widget
 * Plugin URI: https://jakubforman.eu/personal-projects/elementor-iframe-widget/
 * Description: Adding iframe widget in Elementor page builder.
 * Version: 1.1
 * Author: Jakub Josef Forman
 * Author URI: http://jakubforman.eu
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: elementor-iframe-widget
 * Domain Path: /languages/
 */

use jayjay666\ElementorIframeWidget\Plugin;

defined('ABSPATH') || exit;

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function runPlugin()
{

    include_once __DIR__."/src/Plugin.php";
    $plugin = new Plugin();
    $plugin->run();

}

runPlugin();

