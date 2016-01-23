<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://heikomamerow.de
 * @since      1.0.0
 *
 * @package    Transposh_Sitemaps
 * @subpackage Transposh_Sitemaps/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Transposh_Sitemaps
 * @subpackage Transposh_Sitemaps/includes
 * @author     Heiko Mamerow <mail@heikomamerow.de>
 */
class Transposh_Sitemaps_Deactivator {

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate() {

        $dir = get_home_path() . 'wp-content/plugins/transposh-translation-filter-for-wordpress/widgets/transposh-sitemaps/';

        function rrmdir($dir) {
            if (is_dir($dir)) {
                $objects = scandir($dir);
                foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                        if (is_dir($dir . "/" . $object))
                            rrmdir($dir . "/" . $object);
                        else
                            unlink($dir . "/" . $object);
                    }
                }
                rmdir($dir);
            }
        }

    }

}
