<?php

namespace AutomatorExamples\Actions\General;


use PeepSoAutomatorExamples\Apps\PeepSo_ThriveAutomator_App;
use Thrive\Automator\Items\Action;

/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

/**
 * Class Webhook
 *
 * @package AutomatorExamples\Actions
 */
class PeepSoAddToGroup extends Action {


	/**
	 * Unique app identifier
	 *
	 * @return string
	 */
	public static function get_id() {
		return 'peepso-add-to-group';
	}

	/**
	 * Array of action-field keys, required for the action to be setup:
	 *  - URL where to send the request
	 *
	 * @return string[]
	 */
	public static function get_required_action_fields() {
		return [ 'webhook_url' ];
	}

	/**
	 * Thumbnail for action
	 *
	 * @return string
	 */
	public static function get_image() {
		return PeepSo_ThriveAutomator_App::get_image();
	}

	/**
	 * Action name
	 *
	 * @return string
	 */
	public static function get_name() {
		return 'Add to Group';
	}

	/**
	 * Name of the action provider
	 *
	 * @return string
	 */
	public static function get_app_id() {
		return PeepSo_ThriveAutomator_App::get_id();
	}

	/**
	 * Action description
	 *
	 * @return string
	 */
	public static function get_description() {
		return __( 'Adds user to a PeepSo group' );
	}

	/**
	 * Array of data-object keys required in order to run the action
	 *
	 * User data is required - this will POSTed via the webhook request
	 */
	public static function get_required_data_objects() {
		return [ 'user_data' ];
	}

	/**
	 * Actual action handler
	 */
	public function do_action( $data ) {
		global $automation_data;
		if ( empty( $automation_data->get( 'user_data' ) ) ) {
			return false;
		}
		$user_data   = $automation_data->get( 'user_data' ) ?? null;
	
		$webhook_url = $this->get_automation_data( 'webhook_url' )['value'] ?? null;
		if ( $user_data && $webhook_url ) {

			$user_id = $user_data->get_value( 'user_id' ) ?? null;

			if ( $user_id && $group_id ) {
				$PeepSoGroupUser = new PeepSoGroupUser($group_id, $user_id);
				//user join group
				$PeepSoGroupUser->member_join();
			}
		
		}
	}
}
