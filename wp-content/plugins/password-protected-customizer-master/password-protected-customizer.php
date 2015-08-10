<?php

/*
Plugin Name: Password Protected Customizer
Plugin URI: http://github.com/benhuson/password-protected-customizer/
Description: This plugin allows to to add custom content to the Password Protected plugin login screen via the admin settings.
Version: 0.1
Author: Ben Huson
Text Domain: password-protected-customizer
Author URI: http://github.com/benhuson/password-protected-customizer/
License: GPLv2
*/

/*
Copyright 2012 Ben Huson (email : ben@thewhiteroom.net)

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

add_action( 'plugins_loaded', array( 'Password_Protected_Customizer', 'init' ), 20 );

class Password_Protected_Customizer {

	public static function init() {

		// Only init if Password_Protected class is available.
		if ( class_exists( 'Password_Protected' ) ) {

			add_action( 'password_protected_login_messages', array( 'Password_Protected_Customizer', 'login_messages' ) );
			add_action( 'password_protected_before_login_form', array( 'Password_Protected_Customizer', 'before_login_form' ) );
			add_action( 'password_protected_after_login_form', array( 'Password_Protected_Customizer', 'after_login_form' ) );

			add_action( 'admin_init', array( 'Password_Protected_Customizer', 'customizer_settings' ), 11 );

		}

	}

	/**
	 * Login Messages
	 *
	 * Outputs a custom message above the Password Protected login form and content.
	 *
	 * @param   string  $messages  Messages string.
	 */
	public static function login_messages( $messages ) {

		$message = get_option( 'password_protected_customizer_message' );

		if ( ! empty( $message ) ) {
			echo sprintf( '<p class="message">%s</p>', $message );
		}

	}

	/**
	 * Before Login Form
	 *
	 * Outputs custom content before the Password Protected login form.
	 */
	public static function before_login_form() {

		$my_content = get_option( 'password_protected_customizer_content_before' );

		if ( ! empty( $my_content ) ) {
			echo wpautop( wptexturize( $my_content ) );
		}

	}

	/**
	 * After Login Form
	 *
	 * Outputs custom content after the Password Protected login form.
	 */
	public static function after_login_form() {

		$my_content = get_option( 'password_protected_customizer_content_after' );

		if ( ! empty( $my_content ) ) {
			echo wpautop( wptexturize( $my_content ) );
		}

	}

	/**
	 * Customizer Settings
	 */
	public static function customizer_settings() {

		// Only do settings in admin.
		if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

			// Add settings section.
			add_settings_section(
				'password_protected_customizer',
				__( 'Login Page Customizer', 'password-protected-customizer' ),
				array( 'Password_Protected_Customizer', 'password_protected_customizer_section' ),
				'password-protected'
			);

			// Add message field
			add_settings_field(
				'password_protected_customizer_message',
				__( 'Login Message', 'password-protected-customizer' ),
				array( 'Password_Protected_Customizer', 'password_protected_customizer_message_field' ),
				'password-protected',
				'password_protected_customizer'
			);

			// Add above login field
			add_settings_field(
				'password_protected_customizer_content_before',
				__( 'Above Login Form', 'password-protected-customizer' ),
				array( 'Password_Protected_Customizer', 'password_protected_customizer_content_before_field' ),
				'password-protected',
				'password_protected_customizer'
			);

			// Add below login field
			add_settings_field(
				'password_protected_customizer_content_after',
				__( 'Below Login Form', 'password-protected-customizer' ),
				array( 'Password_Protected_Customizer', 'password_protected_customizer_content_after_field' ),
				'password-protected',
				'password_protected_customizer'
			);

			register_setting( 'password-protected', 'password_protected_customizer_message', 'wp_kses_post' );
			register_setting( 'password-protected', 'password_protected_customizer_content_before', 'wp_kses_post' );
			register_setting( 'password-protected', 'password_protected_customizer_content_after', 'wp_kses_post' );

		}

	}

	/**
	 * Customizer Section
	 */
	public static function password_protected_customizer_section() {

		printf( '<p>%s</p>', __( 'Customise the content that appears above and below the Password Protected login form.', 'password-protected-customizer' ) );
		printf( '<p>%s</p>', __( 'The logo can be changed using the <a href="http://wordpress.org/extend/plugins/login-logo/">Login Logo</a> plugin or the <a href="http://wordpress.org/plugins/uber-login-logo/">Uber Login Logo</a> plugin. These plugins will change the logo on your password entry page AND your admin login page.', 'password-protected-customizer' ) );

	}

	/**
	 * Message Field
	 */
	public static function password_protected_customizer_message_field() {

		printf( '<input name="password_protected_customizer_message" type="text" value="%s" class="large-text" placeholder="%s" />', esc_attr( get_option( 'password_protected_customizer_message' ) ), esc_attr( __( 'e.g. a password hint?', 'password-protected-customizer' ) ) );

	}

	/**
	 * Content Before Field
	 */
	public static function password_protected_customizer_content_before_field() {

		wp_editor( get_option( 'password_protected_customizer_content_before' ), 'password_protected_customizer_content_before', array(
			'textarea_rows' => 6
		) );

	}

	/**
	 * Content After Field
	 */
	public static function password_protected_customizer_content_after_field() {

		wp_editor( get_option( 'password_protected_customizer_content_after' ), 'password_protected_customizer_content_after', array(
			'textarea_rows' => 6
		) );

	}

}
