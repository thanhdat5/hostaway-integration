<?php
/**
 * Bootstrap
 */

declare (strict_types = 1);

namespace J7\HostawayIntegration;

use J7\HostawayIntegration\Utils\Base;
use Kucrut\Vite;

if ( class_exists( 'J7\HostawayIntegration\Bootstrap' ) ) {
	return;
}
/**
 * Class Bootstrap
 */
final class Bootstrap {
	use \J7\WpUtils\Traits\SingletonTrait;

	/**
	 * Constructor
	 */
	public function __construct() {
		\add_action( 'admin_enqueue_scripts', [ __CLASS__, 'admin_enqueue_script' ], 99 );
		\add_action( 'wp_enqueue_scripts', [ __CLASS__, 'frontend_enqueue_script' ], 99 );
		\add_action( 'admin_menu', [ __CLASS__, 'hostaway_integration_admin' ], 99 );
	}

	/**
	 * Admin Enqueue script
	 * You can load the script on demand
	 *
	 * @return void
	 */
	public static function admin_enqueue_script(): void {
		self::enqueue_script();
	}


	/**
	 * Front-end Enqueue script
	 * You can load the script on demand
	 *
	 * @return void
	 */
	public static function frontend_enqueue_script(): void {
		self::enqueue_script();
	}

	/**
	 * Enqueue script
	 * You can load the script on demand
	 *
	 * @return void
	 */
	public static function enqueue_script(): void {

		Vite\enqueue_asset(
			Plugin::$dir . '/js/dist',
			'js/src/main.tsx',
			[
				'handle'    => Plugin::$kebab,
				'in-footer' => true,
			]
		);

		$post_id = \get_the_ID();

		\wp_localize_script(
			Plugin::$kebab,
			Plugin::$snake . '_data',
			[
				'env' => [
					'siteUrl'       => \untrailingslashit( \site_url() ),
					'ajaxUrl'       => \untrailingslashit( \admin_url( 'admin-ajax.php' ) ),
					'userId'        => \get_current_user_id(),
					'postId'        => $post_id,
					'APP_NAME'      => Plugin::$app_name,
					'KEBAB'         => Plugin::$kebab,
					'SNAKE'         => Plugin::$snake,
					'BASE_URL'      => Base::BASE_URL,
					'APP_SELECTOR' => Base::APP_SELECTOR,
					'API_TIMEOUT'   => Base::API_TIMEOUT,
					'nonce'         => \wp_create_nonce( Plugin::$kebab ),
				],
			]
		);

		\wp_localize_script(
			Plugin::$kebab,
			'wpApiSettings',
			[
				'root'  => \untrailingslashit( \esc_url_raw( rest_url() ) ),
				'nonce' => \wp_create_nonce( 'wp_rest' ),
			]
		);
	}

	/**
	 * Add Admin menu
	 * Add Hostaway Integration menu
	 *
	 * @return void
	 */
	public static function hostaway_integration_admin() {
		add_menu_page(
			'Hostaway Integration Setting',
			'Hostaway Integration',
			'manage_options',
			'hostaway-integration',
			[ __CLASS__, 'hostaway_integration_page_content' ],
			'dashicons-tag',
			3
		);
	}
	/**
	 * Render Hostaway Integration Setting page
	 *
	 * @return void
	 */
	public static function hostaway_integration_page_content() {
		echo '<div id="hostaway_integration"></div>';
	}
}
