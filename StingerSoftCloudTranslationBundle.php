<?php
declare(strict_types=1);
/*
 * This file is part of the Stinger Soft AgGrid package.
 *
 * (c) Oliver Kotte <oliver.kotte@stinger-soft.net>
 * (c) Florian Meyer <florian.meyer@stinger-soft.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace StingerSoft\CloudTranslationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 */
class StingerSoftCloudTranslationBundle extends Bundle {

	/**
	 * @param $env
	 * @return array
	 */
	public static function getRequiredBundles($env): array {
		$bundles = array();
		$bundles['StingerSoftCloudTranslationBundle'] = '\\' . __CLASS__;
		return $bundles;
	}

}