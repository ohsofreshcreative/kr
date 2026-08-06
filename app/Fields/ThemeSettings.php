<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ThemeSettings extends Field
{
	public function fields(): array
	{
		$theme = new FieldsBuilder('theme_settings');

		$theme
			->setLocation('options_page', '==', 'theme-settings')
			->addImage('logo', [
				'label' => 'Logo',
				'return_format' => 'array', // lub 'url' / 'id'
				'preview_size' => 'medium',
				'library' => 'all',
			])
			->addImage('logo_footer', [
				'label' => 'Logo Stopka',
				'return_format' => 'array', // lub 'url' / 'id'
				'preview_size' => 'medium',
				'library' => 'all',
			])

			->addGroup('g_contact_info', [
				'label' => 'Dane kontaktowe i logo',
				'layout' => 'block',
			])

			->addText('phone', [
				'label' => 'Telefon',
			])
			->addText('mail', [
				'label' => 'Adres e-mail',
			])
			->endGroup()
			->addRepeater('social_media', [
				'label' => 'Media społecznościowe',
				'layout' => 'table',
				'button_label' => 'Dodaj link',
			])
			->addText('link', [
				'label' => 'URL linku',
			])
			->addSelect('icon', [
				'label' => 'Ikona',
				'choices' => [
					'facebook' => 'Facebook',
					'instagram' => 'Instagram',
					'youtube' => 'Youtube',
				],
			])
			->endRepeater();
		return [$theme];
	}
}
