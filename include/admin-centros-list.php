<?/**
 * Summary.
 *
 * Description.
 *
 * @since Version 3 digits
 */


function add_cpt_post_names_to_main_query( $query ) {
	
    // Bail if this is not the main query.
    if ( ! $query->is_main_query() ) {
        return;
    }

    // Bail if this query doesn't match our very specific rewrite rule.
    if ( ! isset( $query->query['page'] ) || 2 !== count( $query->query ) ) {
        return;
    }

    // Bail if we're not querying based on the post name.
    if ( empty( $query->query['name'] ) ) {
        return;
    }

    // Add CPT to the list of post types WP will include when it queries based on the post name.
    $query->set( 'post_type', array( 'post', 
     'page','centros_educativos_heredia','centros_educativos_sanjose',
    'centros_educativos_cartago','centros_educativos_limon',
    'centros_educativos_puntarenas','centros_educativos_guanacaste','centros_educativos_alajuela',
     'centroseducativos' ) );
}
add_action( 'pre_get_posts', 'add_cpt_post_names_to_main_query' );

/*-------------------------------------------------------------------------------
Custom Columns
-------------------------------------------------------------------------------*/

add_filter( 'manage_centroseducativos_posts_columns', 'set_custom_edit_centroseducativos_columns' );

function set_custom_edit_centroseducativos_columns( $columns ) {
$date = $colunns['date'];
unset( $columns['date'] );

$columns['provincias'] = __( 'Provincia', 'provincias' );
$columns['anunciante'] = __( 'Anunciante', 'anunciante' ); 
$columns['prioridad'] = __( 'Prioridad', 'prioridad' );
$columns['asociado'] = __( 'Asociado', 'asociado' );
$columns['logo'] = __( 'Logo', 'thumbnail' );


return $columns;
}
add_action( 'manage_centroseducativos_posts_custom_column' , 'custom_centroseducativos_column', 10, 2 );

function custom_centroseducativos_column( $column, $post_id ) {
switch ( $column ) {

// display a thumbnail logo
case 'logo' :
  echo get_the_post_thumbnail( $post_id, 'thumbnail' );
  break;

// display a list of the custom taxonomy terms assigned to the post 
case 'provincias' :
  $terms = get_the_term_list( $post_id , 'provincias' , '' , ', ' , '' );
  echo is_string( $terms ) ? $terms : '—';
  break;

// display the value of an ACF (Advanced Custom Fields) field
case 'prioridad' :
  if (get_field( 'prioridad', $post_id ) ){
    echo get_field( 'prioridad', $post_id );
  }else{
    echo 0;
  }
      break;
case 'anunciante' :
if (get_field( 'anunciante', $post_id ) == 1){
    echo 'SI';
}else{
    echo 'NO';
}
  break;
  case 'asociado' :
if (get_field( 'asociado', $post_id ) == 1){
    echo 'SI';
}else{
    echo 'NO';
}
  break;

}
}

/*-------------------------------------------------------------------------------
Sortable Columns
-------------------------------------------------------------------------------*/

add_filter( 'manage_edit-centroseducativos_sortable_columns', 'set_custom_centroseducativos_sortable_columns' );

function set_custom_centroseducativos_sortable_columns( $columns ) {
$columns['prioridad'] = 'prioridad';
$columns['anunciante'] = 'anunciante';
return $columns;
}

/*-------------------------------------------------------------------------------
Custom slug
-------------------------------------------------------------------------------*/


