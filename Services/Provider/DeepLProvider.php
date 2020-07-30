<?php
declare(strict_types=1);
/*
 * This file is part of the Stinger Soft Cloud Translation package.
 *
 * (c) Oliver Kotte <oliver.kotte@stinger-soft.net>
 * (c) Florian Meyer <florian.meyer@stinger-soft.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace StingerSoft\CloudTranslationBundle\Services\Provider;


use BabyMarkt\DeepL\DeepL;

class DeepLProvider implements TranslationProvider {

	/**
	 * @var DeepL
	 */
	protected $connector;

	/**
	 *
	 */
	public function __construct() {
		$this->connector = new DeepL('');
	}

	public const CAPABILITIES = [
//		TranslationProvider::SUPPORTS_FILES
	];

	public function isSupported(string $action): bool {
		return in_array($action, self::CAPABILITIES, true);
	}

	public function getSupportedSourceLanguages(): array {
		return [
			'EN',
			'DE',
			'FR',
			'ES',
			'PT',
			'IT',
			'NL',
			'PL',
			'RU'
		];
	}

	public function getSupportedTargetLanguages(): array {
		return [
			'EN',
			'DE',
			'FR',
			'ES',
			'PT',
			'IT',
			'NL',
			'PL',
			'RU'
		];
	}

	public function translateText(string $text, string $sourceLanguage, string $targetLanguage, array $options = []): ?string {
		return $this->connector->translate($text, $sourceLanguage, $targetLanguage);
	}

	public function translateFile(string $filename, string $sourceLanguage, string $targetLanguage, array $options = []): ?string {
		return null;
	}
}