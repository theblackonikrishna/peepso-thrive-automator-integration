<?php
/**
 * Plugin Name: Thrive Automator examples
 * Plugin URI: https://thrivethemes.com
 * Description: Various code samples and example integrations for Thrive Automator
 * Author URI: https://thrivethemes.com
 * Version: 1.0
 * Author: <a href="https://thrivethemes.com">Thrive Themes</a>
 */

/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */

use AutomatorExamples\ActionFields\General\Url;
use AutomatorExamples\ActionFields\Ultimatum\CampaignId;
use AutomatorExamples\Actions\General\Webhook;
use AutomatorExamples\Actions\Ultimatum\StartCampaign;
use AutomatorExamples\Apps\Example_App;
use AutomatorExamples\DataFields\Woocommerce\WooProductStock;
use AutomatorExamples\Triggers\Woocommerce\Stock;

/* PeepSo Thrive Automator App namespaces */
use PeepSoAutomatorExamples\Apps\PeepSo_ThriveAutomator_App;
use AutomatorExamples\Actions\PeepSoGroups;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

add_action( 'thrive_automator_init', static function () {

	thrive_automator_register_app( Example_App::class );
	/* "Webhook" action registration */
	thrive_automator_register_action_field( Url::class );
	thrive_automator_register_action( Webhook::class );
	/* end "Webhook" action registration */

	thrive_automator_register_trigger( Stock::class );

	thrive_automator_register_action_field( CampaignId::class );
	thrive_automator_register_action( StartCampaign::class );

	thrive_automator_register_data_field( WooProductStock::class );
	
	/* PeepSo Thrive Automator App Registration */
	thrive_automator_register_app( PeepSo_ThriveAutomator_App::class );
	/* PeepSo Actions */
	thrive_automator_register_action( PeepSoAddToGroup::class );
	
	
} );
