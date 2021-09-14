<?php

namespace Bstream\CallMeBack\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class CallBackBtn
 * @package Bstream\CallMeBack\Block
 */
class CallBackBtn extends Template
{
    /**
     * @return string
     */
    public function getActionUrlCreate()
    {
        //@TODO move it to ViewModel and use General Template Block
        return $this->_urlBuilder->getUrl('callmeback/record/create');
    }
}
