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

namespace Lof\Seo\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Lof\Seo\Helper\Data as HelperData;

/**
 * Class RemoveSchemaObserver
 * @package Lof\Seo\Observer
 */
class RemoveSchemaObserver implements ObserverInterface
{
    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * RemoveSchemaObserver constructor.
     *
     * @param HelperData $helperData
     */
    public function __construct(HelperData $helperData)
    {
        $this->_helperData = $helperData;
    }

    /**
     * @param Observer $observer
     *
     * @return $this|void
     */
    public function execute(Observer $observer)
    {
        $layout = $observer->getData('layout');

        if (!$this->_helperData->isEnabled()) {
            return $this;
        }

        if ($this->_helperData->getRichsnippetsConfig('enable_product')) {
            $layout->getUpdate()->addHandle('lofseo_remove_schema');
        }

        return $this;
    }
}
