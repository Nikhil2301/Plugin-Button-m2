<?php

namespace Lg\ForceInvoice\Controller\Adminhtml\Forceinvoice;

class Index extends \Magento\Backend\App\Action
{
	protected $resultPageFactory;

	public function __construct(
		
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	) {
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{
		$new = $this->getRequest()->getParam('order_id');
		// print_r($new);exit;

		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend(__('Manage Grid'));
		return $resultPage;
	}
}
