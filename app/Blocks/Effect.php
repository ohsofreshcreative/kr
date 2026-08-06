<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Effect extends Block
{
	public $name = 'Sekcja - Efekty';
	public $description = 'effect';
	public $slug = 'effect';
	public $category = 'formatting';
	public $icon = 'images-alt';
	public $keywords = ['tresc', 'effect',];
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
		$effect = new FieldsBuilder('effect');

		$effect
			->setLocation('block', '==', 'acf/effect')
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Efekty',
				'open' => false,
				'multi_expand' => true,
			])
			->addTab('Elementy', ['placement' => 'top'])
			->addMessage('Informacja', 'Sekcję "Efekty" edytujemy klikając w menu panelu administratora „Sekcja - Efekty".')

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', ['label' => 'ID'])
			->addText('section_class', ['label' => 'Dodatkowe klasy CSS'])
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
					'section-gray' => 'Szare',
					'section-brand' => 'Marki',
					'section-gradient' => 'Gradient',
					'section-dark' => 'Ciemne',
				],
				'default_value' => 'none',
				'ui' => 0,
				'allow_null' => 0,
			]);

		return $effect;
	}

public function with(): array
{

	$fields = [

		'g_effect' => get_field('g_effect', 'option'),

		'selected_work_items' => get_field(
			'selected_work_items',
			'option'
		),
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
