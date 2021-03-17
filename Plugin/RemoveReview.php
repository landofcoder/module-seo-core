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
 * @copyright   Copyright (c) Lof (http://www.landofcoder.com/)
 * @license     https://www.landofcoder.com/LICENSE.txt
 */

namespace Lof\Seo\Plugin;

use Magento\Review\Block\Product\ReviewRenderer;
use Lof\Seo\Helper\Data as HelperData;

/**
 * Class RemoveReview
 * @package Lof\Seo\Plugin
 */
class RemoveReview
{
    protected $_helperData;

    /**
     * RemoveReview constructor.
     *
     * @param HelperData $helperData
     */
    public function __construct(HelperData $helperData)
    {
        $this->_helperData = $helperData;
    }

    /**
     * @param ReviewRenderer $subject
     * @param $result
     *
     * @return mixed
     */
    public function afterGetReviewsSummaryHtml(ReviewRenderer $subject, $result)
    {
        if (!$this->_helperData->isEnabled()) {
            return $result;
        }

        if ($this->_helperData->getRichsnippetsConfig('enable_product')
            && $subject->getRequest()->getFullActionName() === 'catalog_product_view') {
            $review = [
                'itemprop="aggregateRating"',
                'itemscope',
                'itemtype="http://schema.org/AggregateRating"',
                'itemprop="ratingValue"',
                'itemprop="bestRating"',
                'itemprop="reviewCount"'
            ];

            $result = str_replace($review, '', $result);
        }

        return $result;
    }
}
