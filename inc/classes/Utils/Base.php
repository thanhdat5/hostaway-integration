<?php
/**
 * Base
 */

declare (strict_types = 1);

namespace J7\HostawayIntegration\Utils;

if (class_exists('J7\HostawayIntegration\Utils\Base')) {
	return;
}
/**
 * Class Base
 */
abstract class Base {
	const BASE_URL      = '/';
	const APP_SELECTOR = '#hostaway_integration';
	const API_TIMEOUT   = '30000';
	const DEFAULT_IMAGE = 'http://1.gravatar.com/avatar/1c39955b5fe5ae1bf51a77642f052848?s=96&d=mm&r=g';
}
