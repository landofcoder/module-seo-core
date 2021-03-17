<?php
/**
 * Lof
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Lof.com license that is
 * available through the world-wide-web at this URL:
 * https://www.landofcoder.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Lof
 * @package     Lof_Seo
 * @copyright   Copyright (c) Lof (https://www.landofcoder.com/)
 * @license     https://www.landofcoder.com/LICENSE.txt
 */

namespace Lof\Seo\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class ModelField
 * @package Lof\Seo\Model\Config\Source
 */
class ModelField implements ArrayInterface
{
    const GTIN8  = 'gtin8';
    const GTIN13 = 'gtin13';
    const GTIN14 = 'gtin14';
    const MPN    = 'mpn';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            [
                'label' => __('gtin8'),
                'value' => self::GTIN8
            ],
            [
                'label' => __('gtin13'),
                'value' => self::GTIN13
            ],
            [
                'label' => __('gtin14'),
                'value' => self::GTIN14
            ],
            [
                'label' => __('mpn'),
                'value' => self::MPN
            ]
        ];
    }
}
