<?php

namespace Bstream\CallMeBack\Controller\Front;

use Bstream\CallMeBack\Api\Data\CallBackInterface;
use Bstream\CallMeBack\Model\CallBackFactory;
use Bstream\CallMeBack\Model\MailSender;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Bstream\CallMeBack\Api\CallBackRepositoryInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class Create extends Action
{
    /**
     * @var CallBackFactory
     */
    private $callBackFactory;

    /**
     * @var CallBackRepositoryInterface
     */
    private $callBackRepository;

    /**
     * @var MailSender
     */
    private $mailSender;

    /**
     * Create constructor.
     *
     * @param Context $context
     * @param CallBackFactory $callBackFactory
     * @param CallBackRepositoryInterface $callBackRepository
     * @param MailSender $mailSender
     */
    public function __construct(
        Context $context,
        CallBackFactory $callBackFactory,
        CallBackRepositoryInterface $callBackRepository,
        MailSender $mailSender
    ) {
        parent::__construct($context);
        $this->callBackFactory = $callBackFactory;
        $this->callBackRepository = $callBackRepository;
        $this->mailSender = $mailSender;
    }

    /**
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $response = [];
        $phoneNumber = $this->getRequest()->getPost('phonenumber');

        if (!empty($phoneNumber)) {
            $callBackRequest = $this->callBackFactory->create()->setData([
                CallBackInterface::PHONE_NUMBER => $phoneNumber,
                CallBackInterface::CREATED_AT => date("Y-m-d H:i:s", time())
            ]);
            $this->callBackRepository->save($callBackRequest);
            $this->mailSender->send($phoneNumber, $callBackRequest->getId());
            $response[] = __('Thanks for the appeal! Your application number #%1', $callBackRequest->getId());
        } else {
            $response[] = __("Data error");
        }

        $resultJson->setData($response);

        return $resultJson;
    }
}
