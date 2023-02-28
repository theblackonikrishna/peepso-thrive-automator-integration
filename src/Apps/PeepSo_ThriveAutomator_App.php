<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */

namespace PeepSoAutomatorExamples\Apps;

use Thrive\Automator\Items\App;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

class PeepSo_ThriveAutomator_App extends App {
	public static function get_id() {
		return 'peepso_thriveautomator_app';
	}

	public static function get_name() {
		return 'PeepSo ThriveAutomator App';
	}

	public static function get_description() {
		return 'This is the PeepSo Thrive Automator app';
	}

	public static function get_logo() {
		return 'https://www.peepso.com/wp-content/peepso/users/42279/5d7451d580-avatar-full.jpg';
	}

	/**
	 * Whether the current App is available for the current user
	 * e.g prevent premium items from being shown to free users
	 *
	 * @return bool
	 */
	public static function has_access() {
		/* NEED TO DO: Put code in here to return true if PeepSo Groups module is installed */
		return true;
	}
}
