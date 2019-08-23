<?php 
function cu_post_types(){
	// Echipa post type
	 register_post_type('echipa', array(
	'supports' => array('title','editor','thumbnail'),	
	'has_archive' => true,        
	'public' => true,
        'menu_icon' => 'dashicons-admin-users',
        'labels' => array(
        'name' => 'Echipa',
	'add_new_item' => 'Adagă membru nou',
	'singular_name' => 'Membru'
        )
    ));

	register_post_type('hobby', array(
		'supports' => array('title','editor','thumbnail'),
		'has_archive' => true,
		'public' => true,
		'menu_icon' => 'dashicons-admin-users',
		'labels' => array(
			'name' => 'Hobby',
			'add_new_item' => 'Adagă hobby nou',
			'singular_name' => 'Hobby'
		)
	));

	register_post_type('proiecte', array(
		'supports' => array('title','editor','thumbnail'),
		'has_archive' => true,
		'public' => true,
		'menu_icon' => 'dashicons-admin-users',
		'labels' => array(
			'name' => 'Proiect',
			'add_new_item' => 'Adagă proiect nou',
			'singular_name' => 'Proiect'
		)
	));



}

add_action('init', 'cu_post_types');
 ?>
