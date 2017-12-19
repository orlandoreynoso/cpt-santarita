<?php

/* == Agreagando una taxonomia ==*/

function taxonomia_noticia(){
$labels = array(
	'name'              => _x( 'Tipo de noticia', 'taxonomy general name' ),
	'singular_name'     => _x( 'Tipo de noticia', 'taxonomy singular name' ),
	'search_items'      => __( 'Buscar Tipo de noticia' ),
	'all_items'         => __( 'Todos los Tipo de noticias' ),
	'parent_item'       => __( 'Tipo de noticia Padre' ),
	'parent_item_colon' => __( 'Tipo de noticia Padre:' ),
	'edit_item'         => __( 'Editar Tipo de noticia' ),
	'update_item'       => __( 'Actualizar Tipo de noticia' ),
	'add_new_item'      => __( 'Agregar Nuevo Tipo de noticia' ),
	'new_item_name'     => __( 'Nuevo Tipo de noticia' ),
	'menu_name'         => __( 'Tipo de noticia' ),
);

$args = array(
	'hierarchical'      => true,
	'labels'            => $labels,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite' => array( 'slug' => 'tipo-noticia' ),
);

register_taxonomy( 'tipo-noticia', array( 'noticias' ), $args );

}

add_action( 'init', 'taxonomia_noticia' );

/*====== METABOXES PARA noticias USANDO CMB2 ===================*/

add_action( 'cmb2_admin_init', 'campos_noticias' );

function campos_noticias() {
	$prefix = 'info_noticias_';

	$metabox_eventos = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Metaboxes campos noticias', 'cmb2' ),
		'object_types'  => array('noticias'), // Post type
	) );

	$metabox_eventos->add_field( array(
	  'name'       => __( 'dato_noticia', 'cmb2' ),
	  'desc'       => __( 'Mes de la noticias', 'cmb2' ),
	  'id'         => $prefix . 'dato_noticia',
	  'type'       => 'text',
	) ); 

	$metabox_eventos->add_field( array(
		'name' => __( 'Date noticia', 'cmb2' ),
		'desc'       => __( 'fecha de la noticias', 'cmb2' ),
		'id'         => $prefix . 'date_noticia',
		'type' => 'text_date',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		// 'date_format' => 'l jS \of F Y',
	) );

	$metabox_eventos->add_field( array(
		'name' => __( 'Date noticia dos', 'cmb2' ),
		'desc'       => __( 'fecha de la noticias dos', 'cmb2' ),
		'id'         => $prefix . 'datetwo_noticia',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		// 'date_format' => 'l jS \of F Y',
	) );

}




/*=========== Custom Post Type noticias =================================*/

add_action( 'init', 'crear_post_type_noticias', 0 );

function crear_post_type_noticias() {

// Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'noticias', 'Post Type General Name', 'molino9' ),
		'singular_name'       => _x( 'noticias', 'Post Type Singular Name', 'molino9' ),
		'menu_name'           => __( 'noticias', 'molino9' ),
		'parent_item_colon'   => __( 'noticias Padre', 'molino9' ),
		'all_items'           => __( 'Todas las noticias', 'molino9' ),
		'view_item'           => __( 'Ver noticias', 'molino9' ),
		'add_new_item'        => __( 'Agregar Nuevo noticias', 'molino9' ),
		'add_new'             => __( 'Agregar Nuevo noticias', 'molino9' ),
		'edit_item'           => __( 'Editar noticias', 'molino9' ),
		'update_item'         => __( 'Actualizar noticias', 'molino9' ),
		'search_items'        => __( 'Buscar noticias', 'molino9' ),
		'not_found'           => __( 'No encontrado', 'molino9' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'molino9' ),
	);

// Otras opciones para el post type

	$args = array(
		'label'               => __( 'noticias', 'molino9' ),
		'description'         => __( 'noticias news and reviews', 'molino9' ),
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
	register_post_type( 'noticias', $args );

}



?>
