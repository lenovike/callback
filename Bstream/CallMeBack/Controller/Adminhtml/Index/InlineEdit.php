<?php

namespace Bstream\CallMeBack\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Bstream\CallMeBack\Api\CallBackRepositoryInterface;

/**
 * Class InlineEdit
 * @package Bstream\CallMeBack\Controller\Adminhtml\Index
 */
class InlineEdit extends Action
{
    /**
     * @var CallBackRepositoryInterface
     */
    private $callBackRepository;

    /**
     * InlineEdit constructor.
     *
     * @param Context $context
     * @param CallBackRepositoryInterface $callBackRepository
     */
    public function __construct(
        Context $context,
        CallBackRepositoryInterface $callBackRepository
    ) {
        parent::__construct($context);
        $this->callBackRepository = $callBackRepository;
    }

    public function execute()
    {
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        $postItems = $this->getRequest()->getParam('items', []);

        $response = ['messages' => []];

        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            $response['messages'] = __('Please correct the data sent.');
            return $resultJson->setData($response);
        }

        //we have only 1 record here so no problem with this
        foreach ($postItems as $postItem) {
            $callback = $this->callBackRepository->getById($postItem['id']);
            $callback->setStatus($postItem['status']);
            $callback->setUpdatedAt(date_format(date_create($postItem['updated_at']), "Y-m-d H:i:s"));
            $this->callBackRepository->save($callback);
            $response['messages'] = __('You successfully saved changes for request #%1', $callback->getId());
        }

        $resultJson->setData($response);
        return $resultJson;
    }
}
