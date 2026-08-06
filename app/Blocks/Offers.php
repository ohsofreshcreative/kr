<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Offers extends Block
{
	public $name = 'Oferta';
	public $description = 'offers';
	public $slug = 'offers';
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
		$offers = new FieldsBuilder('offers');

		$offers
			->setLocation('block', '==', 'acf/offers')
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Oferta',
				'open' => false,
				'multi_expand' => true,
			])
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_offers', ['label' => ''])
			->addText('title', ['label' => 'Tytuł'])
			->addText('header', ['label' => 'Nagłówek'])
		
			->addMessage('Informacja', 'Ten blok automatycznie wyświetla podstrony oferty przypisane do bieżącej strony nadrzędnej. Aby zarządzać elementami, przejdź pdo sekcji „Oferta" w panelu administratora i dodaj lub edytuj podstrony podrzędne.')
			->endGroup()

			->addTab('Wybrane oferty', ['placement' => 'top'])
			->addRelationship('selected_offer_items', [
				'label' => 'Wybrane oferty dla firm',
				'post_type' => ['offer'],
				'filters' => ['search'],
				'return_format' => 'object',
			])
			->addRelationship('selected_personal_items', [
				'label' => 'Wybrane oferty indywidualne',
				'post_type' => ['personal'],
				'filters' => ['search'],
				'return_format' => 'object',
			])
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])

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
					'bg-card-100 ' => 'Kremowa zieleń',
				],
				'default_value' => 'none',
				'ui' => 0,
				'allow_null' => 0,
			]);

		return $offers;
	}

	public function with(): array
	{
		$selected_offers = get_field('selected_offer_items');

		if (!empty($selected_offers)) {
			$posts_offer = $selected_offers;
		} else {
			$offers_query = new \WP_Query([
				'post_type'      => 'offer',
				'post_parent'    => 0,
				'posts_per_page' => -1,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'post_status'    => 'publish',
			]);
			$posts_offer = $offers_query->posts;
			wp_reset_postdata();
		}

		$offer_items = $this->formatItems($posts_offer);

		$selected_personal = get_field('selected_personal_items');

		if (!empty($selected_personal)) {
			$posts_personal = $selected_personal;
		} else {
			$personal_query = new \WP_Query([
				'post_type'      => 'personal',
				'post_parent'    => 0,
				'posts_per_page' => -1,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'post_status'    => 'publish',
			]);
			$posts_personal = $personal_query->posts;
			wp_reset_postdata();
		}

		$personal_items = $this->formatItems($posts_personal);

		$fields = [
			'g_offers'       => get_field('g_offers'),
			'block_title'    => get_field('block-title'),
			'button'         => get_field('button'),
			'offer_items'    => $offer_items,
			'personal_items' => $personal_items,

			'section_id'     => get_field('section_id'),
			'section_class'  => get_field('section_class'),

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

	private function formatItems($posts): array
	{
		$formatted = [];
		if (empty($posts)) return $formatted;

		foreach ($posts as $post) {
			$thumb_id = get_post_thumbnail_id($post->ID);
			$icon     = get_field('offer_icon', $post->ID);
			$formatted[] = [
				'id'        => $post->ID,
				'title'     => $post->post_title,
				'excerpt'   => get_the_excerpt($post),
				'url'       => get_permalink($post->ID),
				'image_url' => $thumb_id ? wp_get_attachment_image_url($thumb_id, 'large') : null,
				'image_alt' => $thumb_id ? get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : '',
				'icon_url'  => $icon['url'] ?? null,
				'icon_alt'  => $icon['alt'] ?? '',
			];
		}

		return $formatted;
	}
}