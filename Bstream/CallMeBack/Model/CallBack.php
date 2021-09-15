<?php

namespace Bstream\CallMeBack\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Bstream\CallMeBack\Api\Data\CallBackInterface;

/**
 * Class CallBack
 * @package Bstream\CallMeBack\Model
 */
class CallBack extends AbstractExtensibleModel implements CallBackInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\CallBack::class);
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->getData(CallBackInterface::ID) ? (int)$this->getData(CallBackInterface::ID) : null;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return (string)$this->getData(CallBackInterface::PHONE_NUMBER);
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return (string)$this->getData(CallBackInterface::CREATED_AT);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return (int)$this->getData(CallBackInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(CallBackInterface::UPDATED_AT);
    }
}
