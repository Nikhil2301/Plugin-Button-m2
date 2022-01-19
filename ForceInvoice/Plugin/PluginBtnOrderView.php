<?php

namespace Lg\ForceInvoice\Plugin;

use Magento\Backend\Model\UrlInterface;
use Magento\Framework\ObjectManagerInterface;

class PluginBtnOrderView
{
    protected $object_manager;
    protected $_backendUrl;

    public function __construct(
        ObjectManagerInterface $om,
        UrlInterface $backendUrl
    ) {
        $this->object_manager = $om;
        $this->_backendUrl = $backendUrl;
    }

    public function beforeSetLayout(\Magento\Sales\Block\Adminhtml\Order\View $subject)
    {
        $status = $subject->getOrder()->getStatus();
        if (($status == "complete" || $status == "canceled") && !$subject->getOrder()->hasInvoices()) {
        $url = $this->_backendUrl->getUrl('forceinvoice/forceinvoice/index/order_id/' . $subject->getOrderId());
        $subject->addButton(
            'sendordersms',
            [
                'label' => __('Force Invoice'),
                'onclick' => "setLocation('" . $url . "')",
                'class' => 'ship'
            ]
        );
        }
        return null;
    }
}
