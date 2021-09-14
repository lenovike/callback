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
    public function getId()
    {
        return $this->_getData(CallBackInterface::ID);
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->getData(CallBackInterface::PHONE_NUMBER);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(CallBackInterface::CREATED_AT);
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->getData(CallBackInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(CallBackInterface::UPDATED_AT);
    }
}
