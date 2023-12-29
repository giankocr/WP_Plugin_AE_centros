<?php
/**
 * Enqueue the main Plugin user scripts and styles
 * @method plugin_enqueue_scripts
 */
function ae_plugin_enqueue_scripts()
{
    wp_register_style('ae-style', WPS_DIRECTORY_URL . '/assets/build/css/style.css', array(), null);
    wp_register_script('ae-script', WPS_DIRECTORY_URL . '/assets/build/js/scripts.js', array(), null, true);
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), null, true);
    wp_enqueue_style('ae-style');
    wp_enqueue_script('ae-script');
    wp_enqueue_script('jquery');

wp_register_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' );
wp_register_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array( 'jquery' ), '1.16.0', true );
wp_register_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array( 'jquery', 'popper-js' ), '4.5.2', true );
wp_enqueue_style( 'bootstrap-css' );
wp_enqueue_script( 'bootstrap-js' );
wp_enqueue_script( 'popper-js' );
}

add_action('wp_enqueue_scripts', 'ae_plugin_enqueue_scripts');


/**
 * @param mixed $archive_template
 * 
 * @return [type]
 */
function custom_post_type_archive_template($archive_template)
{
    global $post;
    $archive_template = WPS_DIRECTORY_PATH . 'include/templates/centros-archive.php';

    return $archive_template;
}
add_filter('archive_template', 'custom_post_type_archive_template');

