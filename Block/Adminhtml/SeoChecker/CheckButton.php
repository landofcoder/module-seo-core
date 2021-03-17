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

namespace Lof\Seo\Block\Adminhtml\SeoChecker;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Lof\Seo\Helper\Data;

/**
 * Class CheckButton
 * @package Lof\Seo\Block\Adminhtml\SeoChecker
 */
class CheckButton implements ButtonProviderInterface
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * CheckButton constructor.
     *
     * @param Data $helper
     */
    public function __construct(Data $helper)
    {
        $this->helper = $helper;
    }

    /**
     * @return array
     */
    public function getButtonData()
    {
        if (!$this->helper->isEnabled()) {
            return [];
        }

        return [
            'label'      => __('Check On-page'),
            'class'      => 'action-secondary save',
            'on_click'   => 'jQuery("#mageplaza-seo-form").attr("action", "http://seo.landofcoder.com").submit();',
            'sort_order' => 85
        ];
    }
}
