<?php

namespace App\Options;

use Log1x\AcfComposer\Options;
use StoutLogic\AcfBuilder\FieldsBuilder;

class OAbout extends Options
{
	public $name = 'Sekcja - O mnie';
	public $slug = 'oabout';
	public $title = 'Sekcja - O mnie';
	public $position = 101;
	public $capability = 'edit_posts';
	public $redirect = false;

	public function fields(): FieldsBuilder
	{
		$about = new FieldsBuilder('oabout');

		$about
			->addGroup('g_about', [
				'label' => ''
			])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
			])
			->addText('title', [
				'label' => 'Tytuł',
			])
			->addText('header', [
				'label' => 'Nagłówek',
			])
			->addWysiwyg('text', [
				'label' => 'Treść',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
			])
			->addLink('button1', [
				'label' => 'Przycisk #1',
				'return_format' => 'array',
			])
			->endGroup();
		return $about;
	}
}
