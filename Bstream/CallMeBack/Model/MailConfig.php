<?php

namespace Bstream\CallMeBack\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class MailConfig
{
    /**
     * Recipient email config path
     */
    const XML_PATH_EMAIL_RECIPIENT = 'callback/email/recipient_email';

    /**
     * Recipient email copy config path
     */
    const XML_PATH_EMAIL_COPY_RECIPIENT = 'callback/email/recipient_email_copy';

    /**
     * Sender email config path
     */
    const XML_PATH_EMAIL_SENDER = 'callback/email/sender_email_identity';

    /**
     * Email template config path
     */
    const XML_PATH_EMAIL_TEMPLATE = 'callback/email/email_template';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * MailConfig constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return string
     */
    public function emailTemplate() : string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_PATH_EMAIL_TEMPLATE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return string
     */
    public function emailSender() : string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_PATH_EMAIL_SENDER,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return string
     */
    public function getCopyRecipient() : string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_PATH_EMAIL_COPY_RECIPIENT,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return string
     */
    public function emailRecipient() : string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_PATH_EMAIL_RECIPIENT,
            ScopeInterface::SCOPE_STORE
        );
    }
}
