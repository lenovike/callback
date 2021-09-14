<?php

namespace Bstream\CallMeBack\Model;

use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\App\Area;
use Psr\Log\LoggerInterface;

/**
 * Class MailSender
 * @package Bstream\CallMeBack\Model
 */
class MailSender
{
    /**
     * @var MailConfig
     */
    private $mailConfig;

    /**
     * @var TransportBuilder
     */
    private $transportBuilder;

    /**
     * @var StateInterface
     */
    private $inlineTranslation;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Mail constructor.
     *
     * @param MailConfig $mailConfig
     * @param TransportBuilder $transportBuilder
     * @param StateInterface $inlineTranslation
     * @param StoreManagerInterface $storeManager
     * @param LoggerInterface $logger
     */
    public function __construct(
        MailConfig $mailConfig,
        TransportBuilder $transportBuilder,
        StateInterface $inlineTranslation,
        StoreManagerInterface $storeManager,
        LoggerInterface $logger
    ) {
        $this->mailConfig = $mailConfig;
        $this->transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;
        $this->storeManager = $storeManager;
        $this->logger = $logger;
    }

    /**
     * @param $phone
     * @param $appNumber
     *
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function send($phone, $appNumber)
    {
        $this->inlineTranslation->suspend();
        $templateVars = [
            'phone' => $phone,
            'appNumber'=> $appNumber
        ];
        try {
            $transport = $this->transportBuilder
                ->setTemplateIdentifier($this->mailConfig->emailTemplate())
                ->setTemplateOptions(
                    [
                        'area' => Area::AREA_FRONTEND,
                        'store' => $this->storeManager->getStore()->getId()
                    ]
                )
                ->setTemplateVars($templateVars)
                ->setFrom($this->mailConfig->emailSender())
                ->addTo($this->mailConfig->emailRecipient())
                ->addBcc($this->mailConfig->getCopyRecipient())
                ->getTransport();
            try {
                $transport->sendMessage();
            } catch (\Exception $exception) {
                $this->logger->error($exception->getMessage());
            }

        } finally {
            $this->inlineTranslation->resume();
        }
    }
}
