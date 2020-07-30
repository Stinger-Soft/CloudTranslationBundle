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


interface TranslationProvider {

	public const SUPPORTS_FILES = 'translate_files';

	public function isSupported(string $action): bool;


	/**
	 * Returns an array of supported languages
	 *
	 * @return string[]
	 */
	public function getSupportedSourceLanguages(): array;

	/**
	 * Supported translation target languages
	 *
	 * @return string[]
	 */
	public function getSupportedTargetLanguages(): array;

	/**
	 * @param string $text
	 * @param string $sourceLanguage
	 * @param string $targetLanguage
	 * @param array $options
	 * @return string|null
	 */
	public function translateText(string $text, string $sourceLanguage, string $targetLanguage, array $options = []): ?string;

	/**
	 * @param string $filename
	 * @param string $sourceLanguage
	 * @param string $targetLanguage
	 * @param array $options
	 * @return string|null
	 */
	public function translateFile(string $filename, string $sourceLanguage, string $targetLanguage, array $options = []): ?string;

}