<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class proces extends Block
{
	public $name = 'Treść, zdjęcie i kafelki (proces)';
	public $description = 'proces';
	public $slug = 'proces';
	public $category = 'formatting';
	public $icon = 'align-pull-left';
	public $keywords = ['tresc', 'zdjecie'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
		'anchor' => true,
		'customClassName' => true,
	];

	public function fields()
	{
		$proces = new FieldsBuilder('proces');

		$proces
			->setLocation('block', '==', 'acf/proces')
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Treść oraz zdjęcie (proces)',
				'open' => false,
				'multi_expand' => true,
			])

			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_proces', ['label' => ''])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array',
				'preview_size' => 'medium',
				'conditional_logic' => [[[
					'field' => 'media_type',
					'operator' => '==',
					'value' => 'image',
				]]],
			])
			->addText('title', ['label' => 'Tytuł'])
			->addText('header', ['label' => 'Nagłówek - sekcji'])
			->addWysiwyg('txt', [
				'label' => 'Treść',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
			])

			->endGroup()

			->addTab('Kafelki', ['placement' => 'top'])
			->addRepeater('r_proces', [
				'label' => 'Kafelki',
				'layout' => 'table',
				'min' => 1,
				'button_label' => 'Dodaj kafelek'
			])

			->addImage('card_image', [
				'label' => 'Obraz',
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
			])

			->addText('card_title', [
				'label' => 'Nagłówek',
			])
			->addTextarea('card_text', [
				'label' => 'Opis',
			])
->addSelect('card_background', [
    'label' => 'Kolor tła kafelka',
    'choices' => [
        'bg-card-100' => 'Zieleń 100',
        'bg-card-200' => 'Zieleń 200',
        'bg-card-300' => 'Zieleń 300',
        'bg-card-400' => 'Zieleń 400',
        'bg-card-500' => 'Zieleń 500',
    ],
    'default_value' => 'bg-card-100',
])


			->endRepeater()

			/*--- USTAWIENIA BLOKU ---*/
			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', [
				'label' => 'ID',
			])
			->addText('section_class', [
				'label' => 'Dodatkowe klasy CSS',
			])
			->addTrueFalse('nolist', [
				'label' => 'Brak punktatorów',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność (zdjęcie po prawej)',
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
					'section-gray' => 'Szare',
					'section-brand' => 'Marki',
					'section-gradient' => 'Gradient',
					'section-dark' => 'Ciemne',
					'section-soft-green' => 'Jasno zielone',
				],

				'default_value' => 'none',
				'allow_null' => 0,
			]);

		return $proces;
	}

	public function with(): array
	{
		$fields = [
			'g_proces' => get_field('g_proces'),
			'r_proces' => get_field('r_proces'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),

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
}
