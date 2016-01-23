<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://heikomamerow.de
 * @since             1.0.0
 * @package           Transposh_Sitemaps
 *
 * @wordpress-plugin
 * Plugin Name:       Transposh Sitemaps
 * Plugin URI:        https://github.com/HeikoMamerow/transposh-sitemaps
 * Description:       Creates different kinds of sitemaps for Transposh driven websites.
 * Version:           1.0.0
 * Author:            Heiko Mamerow
 * Author URI:        https://heikomamerow.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       transposh-sitemaps
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-transposh-sitemaps-activator.php
 */
function activate_transposh_sitemaps() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-transposh-sitemaps-activator.php';
    Transposh_Sitemaps_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-transposh-sitemaps-deactivator.php
 */
function deactivate_transposh_sitemaps() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-transposh-sitemaps-deactivator.php';
    Transposh_Sitemaps_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_transposh_sitemaps');
register_deactivation_hook(__FILE__, 'deactivate_transposh_sitemaps');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-transposh-sitemaps.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_transposh_sitemaps() {

    $plugin = new Transposh_Sitemaps();
    $plugin->run();
}

run_transposh_sitemaps();
