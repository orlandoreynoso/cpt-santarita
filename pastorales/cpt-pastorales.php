<?php

/* == Agreagando una taxonomia ==*/

function taxonomia_pastoral(){
$labels = array(
	'name'              => _x( 'Tipo de pastoral', 'taxonomy general name' ),
	'singular_name'     => _x( 'Tipo de pastoral', 'taxonomy singular name' ),
	'search_items'      => __( 'Buscar Tipo de pastoral' ),
	'all_items'         => __( 'Todos los Tipo de pastorals' ),
	'parent_item'       => __( 'Tipo de pastoral Padre' ),
	'parent_item_colon' => __( 'Tipo de pastoral Padre:' ),
	'edit_item'         => __( 'Editar Tipo de pastoral' ),
	'update_item'       => __( 'Actualizar Tipo de pastoral' ),
	'add_new_item'      => __( 'Agregar Nuevo Tipo de pastoral' ),
	'new_item_name'     => __( 'Nuevo Tipo de pastoral' ),
	'menu_name'         => __( 'Tipo de pastoral' ),
);

$args = array(
	'hierarchical'      => true,
	'labels'            => $labels,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite' => array( 'slug' => 'tipo-pastoral' ),
);

register_taxonomy( 'tipo-pastoral', array( 'pastorales' ), $args );

}

add_action( 'init', 'taxonomia_pastoral' );

/*====== METABOXES PARA pastorales USANDO CMB2 ===================*/

add_action( 'cmb2_admin_init', 'campos_pastorales' );

function campos_pastorales() {
	$prefix = 'info_ref_';

	$metabox_eventos = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Metaboxes campos pastorales', 'cmb2' ),
		'object_types'  => array('pastorales'), // Post type
	) );

	$metabox_eventos->add_field( array(
	  'name'       => __( 'dato_pastoral', 'cmb2' ),
	  'desc'       => __( 'Mes de la pastorales', 'cmb2' ),
	  'id'         => $prefix . 'dato_pastoral',
	  'type'       => 'text',
	) ); 

	$metabox_eventos->add_field( array(
		'name' => __( 'Date pastoral', 'cmb2' ),
		'desc'       => __( 'fecha de la pastorales', 'cmb2' ),
		'id'         => $prefix . 'date_pastoral',
		'type' => 'text_date',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		// 'date_format' => 'l jS \of F Y',
	) );

	$metabox_eventos->add_field( array(
		'name' => __( 'Date pastoral dos', 'cmb2' ),
		'desc'       => __( 'fecha de la pastorales dos', 'cmb2' ),
		'id'         => $prefix . 'datetwo_pastoral',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		// 'date_format' => 'l jS \of F Y',
	) );

}




/*=========== Custom Post Type pastorales =================================*/

add_action( 'init', 'crear_post_type_pastorales', 0 );

function crear_post_type_pastorales() {

// Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'pastorales', 'Post Type General Name', 'molino9' ),
		'singular_name'       => _x( 'pastorales', 'Post Type Singular Name', 'molino9' ),
		'menu_name'           => __( 'pastorales', 'molino9' ),
		'parent_item_colon'   => __( 'pastorales Padre', 'molino9' ),
		'all_items'           => __( 'Todas las pastorales', 'molino9' ),
		'view_item'           => __( 'Ver pastorales', 'molino9' ),
		'add_new_item'        => __( 'Agregar Nuevo pastorales', 'molino9' ),
		'add_new'             => __( 'Agregar Nuevo pastorales', 'molino9' ),
		'edit_item'           => __( 'Editar pastorales', 'molino9' ),
		'update_item'         => __( 'Actualizar pastorales', 'molino9' ),
		'search_items'        => __( 'Buscar pastorales', 'molino9' ),
		'not_found'           => __( 'No encontrado', 'molino9' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'molino9' ),
	);

// Otras opciones para el post type

	$args = array(
		'label'               => __( 'pastorales', 'molino9' ),
		'description'         => __( 'pastorales news and reviews', 'molino9' ),
		'labels'              => $labels,
		// Todo lo que soporta este post type
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions','page-attributes','post-formats'),
		/* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
		* Uno sin hierarchical es como los posts
		*/
		'taxonomies'            => array( 'familiar' ),
		'hierarchical'        => true, /*  Es un comportamiento como las páginas  */
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-format-video',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	// Por ultimo registramos el post type
	register_post_type( 'pastorales', $args );

}



?>
