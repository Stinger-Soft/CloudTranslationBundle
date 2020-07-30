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


use Google\Cloud\Translate\V2\TranslateClient;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class GoogleProvider implements TranslationProvider {

	public const PARAMETER_LICENSE_KEY = 'google_auth_key';

	public const MODEL_STANDARD = 'base';

	public const MODEL_PREMIUM = 'nmt';

	public const CAPABILITIES = [
//		TranslationProvider::SUPPORTS_FILES
	];

	/**
	 * @var string
	 */
	protected string $model = self::MODEL_STANDARD;

	/**
	 * @var TranslateClient
	 */
	protected TranslateClient $connector;

	public function __construct(ParameterBagInterface $parameterBag) {
		$this->connector = new TranslateClient([
			'key' => $parameterBag->get(self::PARAMETER_LICENSE_KEY),
		]);
	}


	public function isSupported(string $action): bool {
		return in_array($action, self::CAPABILITIES, true);
	}

	public function getSupportedSourceLanguages(): array {
		return $this->connector->languages();
	}

	public function getSupportedTargetLanguages(): array {
		return $this->connector->languages();
	}


	public function translateText(string $text, string $sourceLanguage, string $targetLanguage, array $options = []): ?string {
		$result = $this->connector->translate($text, [
			'target' => $targetLanguage,
			'source' => $sourceLanguage,
			'model'  => $this->model
		]);
		return $result['text'];
	}

	public function translateFile(string $filename, string $sourceLanguage, string $targetLanguage, array $options = []): ?string {
		return null;
	}
}