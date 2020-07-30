<?php


namespace Services\Provider;


use PHPUnit\Framework\TestCase;
use StingerSoft\CloudTranslationBundle\Services\Provider\GoogleProvider;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

class GoogleProviderTest extends TestCase {


	public function testTranslate(): void {
		$bag = new ParameterBag();
		$bag->set(GoogleProvider::PARAMETER_LICENSE_KEY, file_get_contents(__DIR__.'/../../google.txt'));
		$translator = new GoogleProvider($bag);
		$result = $translator->translateText('Awesome! Hell Yeah!', 'en', 'de');
		self::assertNotNull($result);
		self::assertNotEmpty($result);
	}

	public function testSupportedLanguages(): void {
		$bag = new ParameterBag();
		$bag->set(GoogleProvider::PARAMETER_LICENSE_KEY, file_get_contents(__DIR__.'/../../google.txt'));
		$translator = new GoogleProvider($bag);
		$languages = $translator->getSupportedSourceLanguages();
		self::assertNotEmpty($languages);

		$languages = $translator->getSupportedTargetLanguages();
		self::assertNotEmpty($languages);

	}

}