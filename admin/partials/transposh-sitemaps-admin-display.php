<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://heikomamerow.de
 * @since      1.0.0
 *
 * @package    Transposh_Sitemaps
 * @subpackage Transposh_Sitemaps/admin/partials
 */
?>

<h1>Transposh Sitemaps</h1>

<?php
// Check for active transposh plugin
if (is_plugin_active('transposh-translation-filter-for-wordpress/transposh.php')) {

    /*
     * Create transposh widget
     * The widget has to be in the widgets subdirectory of the transpos plugin
     * More infos: http://trac.transposh.org/wiki/WidgetWritingGuide
     */

    $path_to_widget = get_home_path() . 'wp-content/plugins/transposh-translation-filter-for-wordpress/widgets/transposh-sitemaps/';

    // Create directory in transposh
    if (!file_exists($path_to_widget)) {
        mkdir($path_to_widget, 0755);
    }

    $path_to_src_url = plugin_dir_path(dirname(dirname(__FILE__))) . 'admin/partials/transposh-sitemaps-widget-urls.php';
    $path_to_dest_url = $path_to_widget . 'transposh-sitemaps-widget-urls.php';

    // Copy file to directory in transposh
    if (!file_exists($path_to_widget . 'transposh-sitemaps-widget-urls.php')) {
        copy($path_to_src_url, $path_to_dest_url);
    }
//    $include_transpoh_widget_urls = include 'transposh-sitemaps-widget-urls.php';
//    $widget_filename = 'tpw_transposh-widgets-url-list.php';
//    $widget_url = get_home_path() . 'wp-content/plugins/transposh-translation-filter-for-wordpress/widgets/transposh-sitemaps/' . $widget_filename;
//    $widget_handle = fopen($widget_url, 'w') or die("can't open file");
//    fwrite($widget_handle, $include_transpoh_widget_urls);
//    fclose($widget_handle);

    /*
     * Url list
     */

    // Collect pages
    $urllist_pages = '';
    $the_query = new WP_Query(array(
        'post_type' => 'any',
        'posts_per_page' => '-1',
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'name'
    ));
    while ($the_query->have_posts()) :
        $the_query->the_post();
        $urllist_pages .= get_permalink() . "\n";
    endwhile;

    // Create txt file and write collectet pages as url list
    $urllist_filename = 'url-file.txt';
    $urllist_name = plugin_dir_path(dirname(dirname(__FILE__))) . 'sitemaps/' . $urllist_filename;
    $urllist_handle = fopen($urllist_name, 'w') or die("can't open file");
    fwrite($urllist_handle, $urllist_pages);
    fclose($urllist_handle);

    $urllist_url = plugin_dir_url(dirname(dirname(__FILE__))) . $urllist_filename;

    echo '<p>' . esc_html__('All publish pages & posts', 'transposh-sitemaps') . ': <a href="' . $urllist_url . '">' . $urllist_url . '</a></p>';
} else {


    esc_html_e('Please install & activate <a href="https://wordpress.org/plugins/transposh-translation-filter-for-wordpress/">Transposh</a> plugin first, then come back. :-)', 'transposh-sitemaps');
}