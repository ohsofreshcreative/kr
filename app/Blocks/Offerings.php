<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Offerings extends Block
{
	public $name = 'Offerings';
	public $description = 'Oferta dla firm i klientów prywatnych';
	public $slug = 'offerings';
	public $category = 'formatting';
	public $icon = 'screenoptions';
	public $keywords = ['oferta', 'services', 'solutions'];

	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
		'anchor' => true,
		'customClassName' => true,
	];

	public function fields()
	{
		$offerings = new FieldsBuilder('offerings');

		$offerings
			->setLocation('block', '==', 'acf/offerings')
			->addText('block-title', [
				'label' => 'Tytuł',
			])
			->addAccordion('accordion1', [
				'label' => 'Oferta',
				'open' => false,
			])
			->addTab('Elementy', [
				'placement' => 'top'
			])
			->addGroup('g_offerings', [
				'label' => ''
			])
			->addText('title', [
				'label' => 'Tytuł'
			])
			->addText('header', [
				'label' => 'Nagłówek'
			])
			->endGroup()
			->addTab('Wybrane elementy', [
				'placement' => 'top'
			])
			->addRelationship('selected_offer_items', [
				'label' => 'Oferta dla firm',
				'post_type' => ['offer'],
				'filters' => ['search'],
				'return_format' => 'object',
			])
			->addRelationship('selected_private_items', [
				'label' => 'Oferta dla klientów prywatnych',
				'post_type' => ['private_offer'],
				'filters' => ['search'],
				'return_format' => 'object',
			])
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->addTab('Ustawienia bloku', [
				'placement' => 'top'
			])
			->addText('section_id', [
				'label' => 'ID',
			])
			->addText('section_class', [
				'label' => 'Dodatkowe klasy CSS',
			])
			->addTrueFalse('bgshape', [
				'label' => 'Kształt w tle',
				'ui' => 1,
			])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
			])
			->addTrueFalse('wide', [
				'label' => 'Szeroka kolumna',
				'ui' => 1,
			])
			->addTrueFalse('nomt', [
				'label' => 'Bez marginesu góra',
				'ui' => 1,
			])
			->addTrueFalse('gap', [
				'label' => 'Większy odstęp',
				'ui' => 1,
			])
			->addSelect('background', [
				'label' => 'Kolor tła',
				'choices' => [
					'none' => 'Brak',
					'section-white' => 'Białe',
					'section-light' => 'Jasne',
					'section-brand' => 'Marki',
					'section-gradient' => 'Gradient',
					'section-dark' => 'Ciemne',
					'bg-card-100' => 'Kremowa zieleń',
				],
				'default_value' => 'none',
			]);

		return $offerings;
	}

	public function with(): array
	{
		$offers = get_field('selected_offer_items');

		if (empty($offers)) {
			$query = new \WP_Query([
				'post_type' => 'offer',
				'post_parent' => 0,
				'posts_per_page' => -1,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_status' => 'publish',
			]);

			$offers = $query->posts;
			wp_reset_postdata();
		}

		$private = get_field('selected_private_items');

		if (empty($private)) {
			$query = new \WP_Query([
				'post_type' => 'private_offer',
				'post_parent' => 0,
				'posts_per_page' => -1,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_status' => 'publish',
			]);

			$private = $query->posts;
			wp_reset_postdata();
		}

		$fields = [
			'g_offerings' => get_field('g_offerings'),
			'block_title' => get_field('block-title'),
			'button' => get_field('button'),
			'offer_items' => $this->formatItems($offers),
			'private_items' => $this->formatItems($private),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'bgshape' => (bool) get_field('bgshape'),
			'flip' => (bool) get_field('flip'),
			'wide' => (bool) get_field('wide'),
			'nomt' => (bool) get_field('nomt'),
			'gap' => (bool) get_field('gap'),
			'background' => get_field('background') ?: 'none',
		];

		$fields['sectionClass'] = SectionClasses::fromMap($fields, [
			'flip' => 'order-flip',
			'wide' => 'wide',
			'nomt' => '!mt-0',
			'gap' => 'wider-gap',
		]);

		return $fields;
	}

	private function formatItems($posts): array
	{
		$items = [];

		if (empty($posts)) {
			return $items;
		}

		foreach ($posts as $post) {

			$thumb_id = get_post_thumbnail_id($post->ID);

			$items[] = [
				'id' => $post->ID,
				'title' => $post->post_title,
				'url' => get_permalink($post->ID),
				'icon_url' => $thumb_id ? wp_get_attachment_image_url($thumb_id, 'full') : null,
				'icon_alt' => $thumb_id ? get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : '',
			];

		}

		return $items;
	}
}