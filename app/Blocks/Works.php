<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Works extends Block
{
	public $name = 'Realizacje';
	public $description = 'works';
	public $slug = 'works';
	public $category = 'formatting';
	public $icon = 'screenoptions';
	public $keywords = ['tresc', 'zdjecie', 'oferta'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
		'anchor' => true,
		'customClassName' => true,
	];

	public function fields()
	{
		$works = new FieldsBuilder('works');

		$works
			->setLocation('block', '==', 'acf/works') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Realizacje',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- GROUP ---*/
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_works', ['label' => ''])
			->addMessage('Informacja', 'Ten blok automatycznie wyświetla podstrony realizacji przypisane do bieżącej strony nadrzędnej. Aby zarządzać elementami, przejdź do sekcji „Oferta" w panelu administratora i dodaj lub edytuj podstrony podrzędne.')
			->endGroup()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', [
				'label' => 'ID',
			])
			->addText('section_class', [
				'label' => 'Dodatkowe klasy CSS',
			])
			->addTrueFalse('bgshape', [
				'label' => 'Kształt w tle',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('nolist', [
				'label' => 'Brak punktatorów',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('wide', [
				'label' => 'Szeroka kolumna',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gap', [
				'label' => 'Większy odstęp',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addSelect('background', [
				'label' => 'Kolor tła',
				'choices' => [
					'none' => 'Brak (domyślne)',
					'section-white' => 'Białe',
					'section-light' => 'Jasne',
					'section-brand' => 'Marki',
					'section-gradient' => 'Gradient',
					'section-dark' => 'Ciemne',
				],
				'default_value' => 'none',
				'ui' => 0, // Ulepszony interfejs
				'allow_null' => 0,
			]);

		return $works;
	}

	public function with(): array
	{
		$works_query = new \WP_Query([
			'post_type'      => 'work',
			'post_parent'    => 0,
			'posts_per_page' => -1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_status'    => 'publish',
		]);

		$work_items = [];
		foreach ($works_query->posts as $post) {
			$thumb_id = get_post_thumbnail_id($post->ID);
			$icon = get_field('work_icon', $post->ID);

			$ship_name = get_field('ship_name', $post->ID) ?: get_field('nazwa_statku', $post->ID);
			$imo = get_field('imo', $post->ID) ?: get_field('ship_imo', $post->ID) ?: get_field('number_imo', $post->ID);
			$unit_type = get_field('unit_type', $post->ID) ?: get_field('typ_jednostki', $post->ID) ?: get_field('type', $post->ID);
			$realization_place = get_field('realization_place', $post->ID) ?: get_field('miejsce_realizacji', $post->ID) ?: get_field('place', $post->ID);

			$work_items[] = [
				'id'                 => $post->ID,
				'title'              => $post->post_title,
				'excerpt'            => get_the_excerpt($post),
				'url'                => get_permalink($post->ID),
				'image_url'          => $thumb_id ? wp_get_attachment_image_url($thumb_id, 'large') : null,
				'image_alt'          => $thumb_id ? get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : '',
				'icon_url'           => $icon['url'] ?? null,
				'icon_alt'           => $icon['alt'] ?? '',
				'ship_name'          => $ship_name,
				'imo'                => $imo,
				'unit_type'          => $unit_type,
				'realization_place'  => $realization_place,
			];
		}
		wp_reset_postdata();

		$fields = [
			'g_works'    => get_field('g_works'),
			'work_items' => $work_items,
			'block_title' => get_field('block-title'),

			'section_id'   => get_field('section_id'),
			'section_class' => get_field('section_class'),

			'bgshape' => (bool) get_field('bgshape'),
			'flip'    => (bool) get_field('flip'),
			'wide'    => (bool) get_field('wide'),
			'nomt'    => (bool) get_field('nomt'),
			'gap'     => (bool) get_field('gap'),
			'nolist'  => (bool) get_field('nolist'),

			'background' => get_field('background') ?: 'none',
		];

		$fields['sectionClass'] = SectionClasses::fromMap($fields, [
			'flip'   => 'order-flip',
			'wide'   => 'wide',
			'nomt'   => '!mt-0',
			'gap'    => 'wider-gap',
			'nolist' => 'no-list',
		]);

		return $fields;
	}
}
