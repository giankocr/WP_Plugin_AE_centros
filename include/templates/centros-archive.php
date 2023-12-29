<?php
/*
Template Name: Centros Educativos Privados
*/
get_header();

$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_name = $queried_object->slug;
?>
<div class="container-fluid text-center">
    <div class="row justify-content-center mx-2 ">
        <?php
        $args = array(
            'numberposts' => 100,
            'post_type' => 'centroseducativos',
            'meta_query' => array(
                array(
                    'key' => 'anunciante',
                    'compare' => '=',
                    'value' => 1
                )
            ),
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $term_name,
                    'operator' => 'IN'
                )
            ),
            /*'meta_key'			=> 'prioridad',
                                 'orderby'			=> 'meta_value',*/
            'meta_key' => 'prioridad',
            'orderby' => 'meta_value_num',
            //'orderby'			=> 'meta_value',
            'meta_type' => 'NUMERIC',
            'order' => 'ASC',
            'pagination' => true,
            'no_found_rows' => true,
            'posts_per_page' => -1,
            'ignore_stickie_posts' => true
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()):
            while ($the_query->have_posts()):
                $the_query->the_post();
                anunciantes($the_query);

            endwhile;
        endif;
        wp_cache_set('my_result', $the_query);
        wp_reset_query();
        ?>
    </div>
</div>

<div class="container-fluid text-center ">
    <div class="row justify-content-center mx-1">
            <?php
            $args2 = array(
                'numberposts' => 100,
                'post_type' => 'centroseducativos',
                'meta_key' => 'anunciante',
                'meta_value' => 0,
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $term_name,
                        'operator' => 'IN'
                    )
                ),
                'order' => 'ASC',
                'orderby' => 'title',
                'pagination' => true,
                'no_found_rows' => true,
                'posts_per_page' => -1,
                'ignore_stickie_posts' => true
            );
            $the_query2 = new WP_Query($args2);
            if ($the_query2->have_posts()):
                while ($the_query2->have_posts()):
                    $the_query2->the_post();
                    no_anunciantes($the_query2);
                endwhile;
            endif;
            wp_cache_set('my_result', $the_query2);
            wp_reset_query();

            ?>
        </div>
    </div>

    </br>
    <div class="text-center botom ">
        <a href="<?php echo get_home_url().'/centros-educativos-privados'; ?>" class='btn btn-lg btn-primary volvermapa' onClick="">
            Volver al mapa</a>
        <a href="<?php echo get_page_link(); ?>" class='btn btn-lg btn-danger volvermapa'>
            Registre su centro educativo</a>
    </div>
</div>
<?php

function no_anunciantes($post)
{
    include WPS_DIRECTORY_PATH . 'include/templates/centros_no_anunciantes.php';
}
function anunciantes($post)
{
    include WPS_DIRECTORY_PATH . 'include/templates/centros_anunciantes.php';
}

get_footer();
?>