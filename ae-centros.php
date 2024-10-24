<?php

/**
 * AE Centros
 *
 * @package     ae_centros
 * @author      gianko.com
 * @copyright   2023 Gianko.com
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: AE Centros
 * Plugin URI:
 * Description: Directorio de centros educativos.
 * Version:     0.0.2
 * Author:      Giancarlos Villalobos
 * Author URI:  http://gianko.com
 * Text Domain: Directorio de centros educativos
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined('ABSPATH') || die('Not Authorized!');
define('WPS_FILE', __FILE__);
define('WPS_DIRECTORY', __DIR__);
define('WPS_TEXT_DOMAIN', plugin_basename( WPS_DIRECTORY ));
define('WPS_PLUGIN_NAME', plugin_basename( WPS_DIRECTORY ));
define('WPS_DIRECTORY_BASENAME', plugin_basename( WPS_FILE ) );
define('WPS_DIRECTORY_PATH', plugin_dir_path(WPS_FILE));
define('WPS_DIRECTORY_URL', plugin_dir_url( WPS_FILE));


require_once WPS_DIRECTORY . '/include/main-class.php';
require_once WPS_DIRECTORY . '/include/admin-centros-list.php';
require_once WPS_DIRECTORY . '/include/shortcode-centros.php';
require_once WPS_DIRECTORY . '/include/init.php';
