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

use Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory;
use Magento\Framework\Option\ArrayInterface;

/**
 * Class ProductAttribute
 * @package Lof\Shopbybrand\Model\Config\Source
 */
class Attribute implements ArrayInterface
{
    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * Attribute constructor.
     *
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->_collectionFactory = $collectionFactory;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $attributes   = $this->_collectionFactory->create()->addVisibleFilter();
        $arrAttribute = [];

        foreach ($attributes as $attribute) {
            $arrAttribute[] = [
                'label' => $attribute->getFrontendLabel(),
                'value' => $attribute->getAttributeCode()
            ];
        }

        return $arrAttribute;
    }
}
