<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://heikomamerow.de
 * @since      1.0.0
 *
 * @package    Transposh_Sitemaps
 * @subpackage Transposh_Sitemaps/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Transposh_Sitemaps
 * @subpackage Transposh_Sitemaps/includes
 * @author     Heiko Mamerow <mail@heikomamerow.de>
 */
class Transposh_Sitemaps_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'transposh-sitemaps',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
