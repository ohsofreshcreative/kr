<?php

/*--- CPT - Oferta dla firm ---*/

add_action('init', function () {
	register_post_type('offer', [
		'label'         => 'Oferta dla firm',
		'labels'        => [
			'name'               => 'Oferta dla firm',
			'singular_name'      => 'Oferta dla firmy',
			'menu_name'          => 'Oferta dla firm',
			'all_items'          => 'Wszystkie oferty',
			'add_new'            => 'Dodaj nową',
			'add_new_item'       => 'Dodaj nową ofertę',
			'edit_item'          => 'Edytuj ofertę',
			'new_item'           => 'Nowa oferta',
			'view_item'          => 'Zobacz ofertę',
			'view_items'         => 'Zobacz oferty',
			'search_items'       => 'Szukaj ofert',
			'not_found'          => 'Nie znaleziono ofert',
			'not_found_in_trash' => 'Brak ofert w koszu',
			'parent_item_colon'  => 'Oferta nadrzędna:',
		],
		'public'        => true,
		'hierarchical'  => true,
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-cart',
		'menu_position' => 20,
		'supports'      => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
		'show_in_rest'  => true,
		'rewrite'       => ['slug' => 'oferta-dla-firm', 'with_front' => false],
	]);
});

add_action('init', function () {
	register_taxonomy('offer_category', ['offer'], [
		'label'        => 'Kategorie ofert',
		'labels'       => [
			'name'              => 'Kategorie ofert',
			'singular_name'     => 'Kategoria oferty',
			'search_items'      => 'Szukaj kategorii',
			'all_items'         => 'Wszystkie kategorie',
			'parent_item'       => 'Kategoria nadrzędna',
			'parent_item_colon' => 'Kategoria nadrzędna:',
			'edit_item'         => 'Edytuj kategorię',
			'update_item'       => 'Aktualizuj kategorię',
			'add_new_item'      => 'Dodaj nową kategorię',
			'new_item_name'     => 'Nazwa nowej kategorii',
			'menu_name'         => 'Kategorie',
		],
		'hierarchical' => true,
		'public'       => true,
		'show_in_rest' => true,
		'rewrite'      => ['slug' => 'kategoria-ofert-firm', 'with_front' => false],
	]);
});

/*--- CPT - Oferta dla klientów prywatnych ---*/

add_action('init', function () {
	register_post_type('private_offer', [
		'label'         => 'Oferta dla klientów prywatnych',
		'labels'        => [
			'name'               => 'Oferta dla klientów prywatnych',
			'singular_name'      => 'Oferta prywatna',
			'menu_name'          => 'Oferta prywatna',
			'all_items'          => 'Wszystkie oferty',
			'add_new'            => 'Dodaj nową',
			'add_new_item'       => 'Dodaj nową ofertę',
			'edit_item'          => 'Edytuj ofertę',
			'new_item'           => 'Nowa oferta',
			'view_item'          => 'Zobacz ofertę',
			'view_items'         => 'Zobacz oferty',
			'search_items'       => 'Szukaj ofert',
			'not_found'          => 'Nie znaleziono ofert',
			'not_found_in_trash' => 'Brak ofert w koszu',
			'parent_item_colon'  => 'Oferta nadrzędna:',
		],
		'public'        => true,
		'hierarchical'  => true,
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-groups',
		'menu_position' => 21,
		'supports'      => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
		'show_in_rest'  => true,
		'rewrite'       => ['slug' => 'oferta-prywatna', 'with_front' => false],
	]);
});

add_action('init', function () {
	register_taxonomy('private_offer_category', ['private_offer'], [
		'label'        => 'Kategorie ofert',
		'labels'       => [
			'name'              => 'Kategorie ofert',
			'singular_name'     => 'Kategoria oferty',
			'search_items'      => 'Szukaj kategorii',
			'all_items'         => 'Wszystkie kategorie',
			'parent_item'       => 'Kategoria nadrzędna',
			'parent_item_colon' => 'Kategoria nadrzędna:',
			'edit_item'         => 'Edytuj kategorię',
			'update_item'       => 'Aktualizuj kategorię',
			'add_new_item'      => 'Dodaj nową kategorię',
			'new_item_name'     => 'Nazwa nowej kategorii',
			'menu_name'         => 'Kategorie',
		],
		'hierarchical' => true,
		'public'       => true,
		'show_in_rest' => true,
		'rewrite'      => ['slug' => 'kategoria-ofert-prywatnych', 'with_front' => false],
	]);
});

/*--- Kolumna kategorii - Oferta dla firm ---*/

add_filter('manage_offer_posts_columns', function ($columns) {
	return [
		'cb'             => $columns['cb'],
		'title'          => $columns['title'],
		'offer_category' => 'Kategoria',
		'date'           => $columns['date'],
	];
});

add_action('manage_offer_posts_custom_column', function ($column, $post_id) {
	if ($column === 'offer_category') {
		$terms = get_the_terms($post_id, 'offer_category');

		if (!empty($terms) && !is_wp_error($terms)) {
			$links = array_map(function ($term) {
				return '<a href="' . esc_url(add_query_arg([
					'post_type' => 'offer',
					'offer_category' => $term->slug,
				], admin_url('edit.php'))) . '">' . esc_html($term->name) . '</a>';
			}, $terms);

			echo implode(', ', $links);
		} else {
			echo '—';
		}
	}
}, 10, 2);

/*--- Kolumna kategorii - Oferta prywatna ---*/

add_filter('manage_private_offer_posts_columns', function ($columns) {
	return [
		'cb'                     => $columns['cb'],
		'title'                  => $columns['title'],
		'private_offer_category' => 'Kategoria',
		'date'                   => $columns['date'],
	];
});

add_action('manage_private_offer_posts_custom_column', function ($column, $post_id) {
	if ($column === 'private_offer_category') {
		$terms = get_the_terms($post_id, 'private_offer_category');

		if (!empty($terms) && !is_wp_error($terms)) {
			$links = array_map(function ($term) {
				return '<a href="' . esc_url(add_query_arg([
					'post_type' => 'private_offer',
					'private_offer_category' => $term->slug,
				], admin_url('edit.php'))) . '">' . esc_html($term->name) . '</a>';
			}, $terms);

			echo implode(', ', $links);
		} else {
			echo '—';
		}
	}
}, 10, 2);


add_action('init', function () {
	register_post_type('work', [
		'label'         => 'realizacje',
		'labels'        => [
			'name'               => 'Realizacje',
			'singular_name'      => 'Realizacja',
			'menu_name'          => 'Realizacje',
			'all_items'          => 'Wszystkie realizacje',
			'add_new'            => 'Dodaj nową',
			'add_new_item'       => 'Dodaj nową realizację',
			'edit_item'          => 'Edytuj realizację',
			'new_item'           => 'Nowa realizacja',
			'view_item'          => 'Zobacz realizację',
			'view_items'         => 'Zobacz realizacje',
			'search_items'       => 'Szukaj realizacji',
			'not_found'          => 'Nie znaleziono realizacji',
			'not_found_in_trash' => 'Brak realizacji w koszu',
			'parent_item_colon'  => 'Realizacja nadrzędna:',
		],
		'public'        => true,
		'hierarchical'  => true,
		'has_archive'   => true,
		'menu_position' => 20,
		'supports'      => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
		'show_in_rest'  => true,
		'rewrite'       => ['slug' => 'realizacja', 'with_front' => false],
	]);
});

// add_action('init', function () {
// 	register_taxonomy('offer_category', ['offer'], [
// 		'label'        => 'Kategorie ofert',
// 		'labels'       => [
// 			'name'              => 'Kategorie ofert',
// 			'singular_name'     => 'Kategoria oferty',
// 			'search_items'      => 'Szukaj kategorii',
// 			'all_items'         => 'Wszystkie kategorie',
// 			'parent_item'       => 'Kategoria nadrzędna',
// 			'parent_item_colon' => 'Kategoria nadrzędna:',
// 			'edit_item'         => 'Edytuj kategorię',
// 			'update_item'       => 'Aktualizuj kategorię',
// 			'add_new_item'      => 'Dodaj nową kategorię',
// 			'new_item_name'     => 'Nazwa nowej kategorii',
// 			'menu_name'         => 'Kategorie',
// 		],
// 		'hierarchical' => true,
// 		'public'       => true,
// 		'show_in_rest' => true,
// 		'rewrite'      => ['slug' => 'kategoria-oferty', 'with_front' => false],
// 	]);
// });