<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://knowhalim.com
 * @since      1.0.0
 *
 * @package    Tourhand-jap-quiz
 * @subpackage Tourhand-jap-quiz/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Tourhand-jap-quiz
 * @subpackage Tourhand-jap-quiz/includes
 * @author     Halim <contact@knowhalim.com>
 */
class Tourhand_jap_quiz_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'tourhand-jap-quiz',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
