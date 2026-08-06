<?php

namespace App\Options;

use Log1x\AcfComposer\Options;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Oreviews extends Options
{
	public $name = 'Opinie';
	public $slug = 'oreviews';
	public $title = 'Opinie';
	public $position = 101;
	public $capability = 'edit_posts';
	public $redirect = false;

	public function fields(): FieldsBuilder
	{
		$oreviews = new FieldsBuilder('oreviews');

		$oreviews
			->addText('title', [
				'label' => 'Tytuł',
			])
			->addText('header', ['label' => 'Nagłówek'])
			->addRepeater('r_reviews', [
				'label'        => 'Opinie',
				'layout'       => 'table',
				'min'          => 1,
				'max'          => 50,
				'button_label' => 'Dodaj opinię',
			])

			->addTextarea('txt', [
				'label'     => 'Treść opinii',
				'rows'      => 4,
				'new_lines' => 'br',
			])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
			])
			->addText('name', [
				'label' => 'Imię i nazwisko',
			])
			->addText('position', [
				'label' => 'Stanowisko',
			])
			->addDatePicker('date', [
				'label' => 'Data',
				'display_format' => 'd.m.Y',
				'return_format' => 'Y-m-d',
				'first_day' => 1,
			])
			->addSelect('icon', [
				'label' => 'Ikona',
				'choices' => [
					'google' => 'Google',
					'linkedin' => 'LinkedIn',
					'facebook' => 'Facebook',
				],
				'default_value' => 'LinkedIn',
				'return_format' => 'value',
			])
			->endRepeater();

		return $oreviews;
	}
}
