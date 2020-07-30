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


namespace StingerSoft\CloudTranslationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @noinspection NullPointerExceptionInspection
	 */
	public function getConfigTreeBuilder() {
		$treeBuilder = new TreeBuilder('stinger_soft_cloud_translation');
		$root = $treeBuilder->getRootNode();

		// @formatter:off
		$root->children()
			->scalarNode('google_auth_key')
			->defaultNull()
			->end()
			->scalarNode('deepl_auth_key')
			->defaultNull()
			->end()
			->end();
		// @formatter:on

		return $treeBuilder;
	}
}