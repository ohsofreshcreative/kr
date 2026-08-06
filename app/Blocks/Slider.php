<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Slider extends Block
{
	public $name = 'Slider - Oferta';
	public $description = 'slider';
	public $slug = 'slider';
	public $category = 'formatting';
	public $icon = 'image-flip-horizontal';
	public $keywords = ['slider', 'oferta'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$slider = new FieldsBuilder('slider');

		$slider
			->setLocation('block', '==', 'acf/slider')
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Slider - Oferta',
				'open' => false,
				'multi_expand' => true,
			])
			->addTab('Treści', ['placement' => 'top'])
			->addText('title', ['label' => 'Tytuł'])
			->addWysiwyg('text', [
				'label' => 'Treść',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
			])
			->addText('slider_title', ['label' => 'Tytuł sekcji'])
			->addSelect('post_type', [
	'label' => 'Typ wpisów',
	'choices' => [
		'offer' => 'Oferta dla firm',
		'private_offer' => 'Oferta dla klientów prywatnych',
		'work' => 'Realizacje',
	],
	'default_value' => 'offer',
	'ui' => 1,
])

->addRelationship('slider_offers', [
	'label'         => 'Wybrane wpisy (kolejność ma znaczenie)',
	'post_type'     => ['offer', 'private_offer', 'work'],
	'filters'       => ['search'],
	'return_format' => 'object',
	'instructions'  => 'Jeśli pole pozostanie puste, wyświetlą się wszystkie wpisy z wybranego typu.',
])
			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', ['label' => 'ID'])
			->addText('section_class', ['label' => 'Dodatkowe klasy CSS'])
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('bgshape', [
				'label' => 'Kształt w tle',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addSelect('background', [
				'label' => 'Kolor tła',
				'choices' => [
					'none'              => 'Brak (domyślne)',
					'section-white'     => 'Białe',
					'section-light'     => 'Jasne',
					'section-gray'      => 'Szare',
					'section-brand'     => 'Marki',
					'section-gradient'  => 'Gradient',
					'section-dark'      => 'Ciemne',
					'section-light-green' => 'Jasno zielone',
				],
				'default_value' => 'none',
				'ui' => 0,
				'allow_null' => 0,
			]);

		return $slider;
	}

	public function with(): array
	{
$postType = get_field('post_type') ?: 'offer';

$selected = get_field('slider_offers') ?: [];

if (empty($selected)) {
	$offers_query = new \WP_Query([
		'post_type'      => $postType,
		'post_parent'    => 0,
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post_status'    => 'publish',
	]);
	$selected = $offers_query->posts;
	wp_reset_postdata();

		}

		$slides = [];
		foreach ($selected as $post) {
			$thumb_id = get_post_thumbnail_id($post->ID);
			$icon     = get_field('offer_icon', $post->ID);
			$slides[] = [
				'title'     => $post->post_title,
				'excerpt'   => get_the_excerpt($post),
				'url'       => get_permalink($post->ID),
				'image_url' => $thumb_id ? wp_get_attachment_image_url($thumb_id, 'large') : null,
				'image_alt' => $thumb_id ? get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : '',
				'icon_url'  => $icon['url'] ?? null,
				'icon_alt'  => $icon['alt'] ?? '',
			];
		}

		$fields = [
			'title' => get_field('title'),
			'text'  => get_field('text'),
			'slides'       => $slides,
			'slider_title' => get_field('slider_title'),
			'section_id'   => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'nomt'         => (bool) get_field('nomt'),
			'bgshape' => (bool) get_field('bgshape'),
			'background'   => get_field('background') ?: 'none',
		];

		$fields['sectionClass'] = SectionClasses::fromMap($fields, [
			'nomt' => '!mt-0',
		]);

		return $fields;
	}
}
