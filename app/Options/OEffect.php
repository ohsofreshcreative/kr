<?php

namespace App\Options;

use Log1x\AcfComposer\Options;
use StoutLogic\AcfBuilder\FieldsBuilder;

class OEffect extends Options
{
	public $name = 'Sekcja - Efekty';
	public $slug = 'oeffect';
	public $title = 'Sekcja - Efekty';
	public $position = 101;
	public $capability = 'edit_posts';
	public $redirect = false;


	public function fields(): FieldsBuilder
	{
		$effect = new FieldsBuilder('oeffect');


		$effect
			->addTab('Wybrane realizacje', [
				'placement' => 'top'
			])

			->addRelationship('selected_work_items', [
				'label' => 'Wybrane realizacje',
				'post_type' => [
					'work'
				],
				'filters' => [
					'search'
				],
				'return_format' => 'object',
				'max' => 2,
			])


			->addGroup('g_effect', [
				'label' => 'Treść sekcji'
			])

				->addText('title', [
					'label' => 'Tytuł',
				])

				->addText('header', [
					'label' => 'Nagłówek'
				])

				->addWysiwyg('text', [
					'label' => 'Opis',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => true,
				])
				->addLink('button1', [
					'label' => 'Przycisk',
					'return_format' => 'array',
				])
			->endGroup();
		return $effect;
	}
}