<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://knowhalim.com
 * @since             1.0.0
 * @package           Tourhand-jap-quiz
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Learn Japanese Quiz
 * Plugin URI:        https://tourhand.com
 * Description:       Use this simple \'learn Japanese\' plugin for your travel website or language school website.
 * Version:           1.0.0
 * Author:            Halim
 * Author URI:        https://knowhalim.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tourhand-jap-quiz
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TOURHAND_JAP_QUIZ_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tourhand-jap-quiz-activator.php
 */
function activate_tourhand_jap_quiz() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tourhand-jap-quiz-activator.php';
	Tourhand_jap_quiz_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tourhand-jap-quiz-deactivator.php
 */
function deactivate_tourhand_jap_quiz() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tourhand-jap-quiz-deactivator.php';
	Tourhand_jap_quiz_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tourhand_jap_quiz' );
register_deactivation_hook( __FILE__, 'deactivate_tourhand_jap_quiz' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tourhand-jap-quiz.php';

if (!defined('tourhand_PATH'))
    define('tourhand_PATH', plugin_dir_path(__FILE__));
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tourhand_jap_quiz() {

	$plugin = new Tourhand_jap_quiz();
	$plugin->run();

}
run_tourhand_jap_quiz();
