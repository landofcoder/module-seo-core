<?php
/**
 * Lof
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Lof.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Lof
 * @package     Lof_Seo
 * @copyright   Copyright (c) Lof (https://www.landofcoder.com/)
 * @license     http://landofcoder.com/LICENSE.txt
 */

namespace Lof\Seo\Plugin\Helper;

use Magento\Catalog\Helper\Product;
use Lof\Seo\Helper\Data as HelperData;

/**
 * Class CanUseCanonicalTagForProducts
 * @package Lof\Seo\Plugin\Helper
 */
class CanUseCanonicalTagForProducts
{
    /**
     * @var HelperData
     */
    protected $_helper;

    /**
     * CanUseCanonicalTagForProducts constructor.
     *
     * @param HelperData $helper
     */
    function __construct(HelperData $helper)
    {
        $this->_helper = $helper;
    }

    /**
     * @param Product $product
     * @param $result
     *
     * @return mixed
     */
    public function afterCanUseCanonicalTag(Product $product, $result)
    {
        if ($this->_helper->isEnabled()) {
            return $this->_helper->getDuplicateConfig('product_canonical_tag');
        }

        return $result;
    }
}
