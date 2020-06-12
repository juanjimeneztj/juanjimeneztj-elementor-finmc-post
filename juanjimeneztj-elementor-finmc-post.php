<?php
/**
 * Plugin Name: JUANJIMENEZTJ Posts FinMC/SIP Extension
 * Description: Custom Elementor extension/plugin to display articles on websites related to the company Sir Isaac Publishing/Financial Media Corp. By Juan Jimenez.
 * Plugin URI:  https://github.com/juanjimeneztj/juanjimeneztj-elementor-finmc-post
 * Version:     1.0.4
 * Author:      Juan Jimenez
 * Author URI:  https://juanjimeneztj.com/
 * Text Domain: juanjimeneztj-posts-juanjimeneztj-posts-elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

final class juanjimeneztj_finmc_posts {

	const VERSION = '1.0.4';

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	const MINIMUM_PHP_VERSION = '7.0';

	public function __construct() {

		// Load translation
		add_action( 'init', array( $this, 'i18n' ) );

		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	public function i18n() {
		load_plugin_textdomain( 'juanjimeneztj-finmc-post' );
	}

	public function init() {

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

		require_once( 'plugin.php' );
	}

	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'juanjimeneztj-finmc-post' ),
			'<strong>' . esc_html__( 'Juan Jimenez FinMC Post', 'juanjimeneztj-finmc-post' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'juanjimeneztj-finmc-post' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'juanjimeneztj-finmc-post' ),
			'<strong>' . esc_html__( 'Juan Jimenez FinMC Post', 'juanjimeneztj-finmc-post' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'juanjimeneztj-finmc-post' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'juanjimeneztj-finmc-post' ),
			'<strong>' . esc_html__( 'Juan Jimenez FinMC Post', 'juanjimeneztj-finmc-post' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'juanjimeneztj-finmc-post' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}

// Instantiate juanjimeneztj_finmc_posts.
new juanjimeneztj_finmc_posts();
