<?php
/**
 * Plugin Name:       Hostaway Integration
 * Plugin URI:        https://github.com/thanhdat5/hostaway-integration
 * Description:       WordPress Plugin for Hostaway. Set up dynamic room pricing rules.
 * Version:           0.0.1
 * Requires at least: 5.7
 * Requires PHP:      8.0
 * Author:            Hiplab
 * Author URI:        https://github.com/thanhdat5
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hostaway_integration
 * Domain Path:       /languages
 * Tags: hostaway, risenshinerentals, booking
 */

declare ( strict_types=1 );

namespace J7\HostawayIntegration;

if ( \class_exists( 'J7\HostawayIntegration\Plugin' ) ) {
	return;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Class Plugin
 */
final class Plugin {
	use \J7\WpUtils\Traits\PluginTrait;
	use \J7\WpUtils\Traits\SingletonTrait;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->init(
			[
				'app_name'    => 'hostaway-integration',
				'github_repo' => 'https://github.com/thanhdat5/hostaway-integration',
				'callback'    => [ Bootstrap::class, 'instance' ],
			]
		);
	}
}

Plugin::instance();
