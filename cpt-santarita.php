<?php
/*
Plugin Name: Santa Rita CPT
Plugin URI:
Description: Agrega contenido personalizado para la página de santa rita
Version:     1.0
Author:      Orlando Reynoso
Author URI:  http://www.orlandoreynoso.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

/*============= cargando archivos==============*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

if(file_exists(dirname(__FILE__).'/pastorales/cpt-pastorales.php')){
	require_once dirname( __FILE__ ) . '/pastorales/cpt-pastorales.php';
}



?>
