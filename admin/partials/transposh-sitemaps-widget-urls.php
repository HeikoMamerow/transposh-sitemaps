<?php

/**
 * Content for widget file of url list
 *
 * Show list of all sites with transposh translation.
 * This function does the actual HTML for the widget.
 *
 * @link       https://heikomamerow.de
 * @since      1.0.0
 *
 * @package    Transposh_Sitemaps
 * @subpackage Transposh_Sitemaps/admin/partials
 */
?>

<?php

class tpw_sitemap_txt_list {

    function tp_widget_do($args) {
        //Delete English and German from array
        foreach ($args as $subKey => $subArray) {
            if ($subArray['lang'] == English) {
                unset($args[$subKey]);
            }
            if ($subArray['lang'] == German) {
                unset($args[$subKey]);
            }
        }

        foreach ($args as $langrecord) {
//            include 'config.php';

            $args = array(
                'meta_key' => 'xml-sitemap_filter',
                'meta_value' => '1'
            );
            $pages = get_pages($args);
            foreach ($pages as $page) {
                $page1 = get_site_url() . "/{$langrecord['isocode']}/" . $page->post_name . ".htm\n";

                echo $page1;
            }
        }
    }

}
