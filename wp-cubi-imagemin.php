<?php

/**
 * Plugin Name:         wp-cubi-imagemin
 * Plugin URI:          https://github.com/globalis-ms/wp-cubi-imagemin
 * Description:         Standalone image minification WordPress plugin
 * Author:              Pierre Dargham, Globalis Media Systems
 * Author URI:          https://www.globalis-ms.com/
 * License:             GPL2
 *
 * Version:             1.3.1
 * Requires at least:   5.0.0
 * Tested up to:        5.9.0
 */

namespace Globalis\WP\Cubi\ImageMin;

require_once __DIR__ . '/src/WonologAdaptaterLogger.php';
require_once __DIR__ . '/src/ImageMin.php';

add_filter('wp_generate_attachment_metadata', [__NAMESPACE__ . '\\ImageMin', 'optimizeMedia'], 10, 2);

if (!class_exists('WP_CLI')) {
    return;
}

require_once __DIR__ . '/src/WpCliMediaOptimizeCommand.php';

\WP_CLI::add_command('media optimize', __NAMESPACE__ . '\\WpCliMediaOptimizeCommand');
