<?php

namespace Bstream\CallMeBack\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class CallBack
 * @package Bstream\CallMeBack\Model\ResourceModel
 */
class CallBack extends AbstractDb
{
	protected function _construct() {
        $this->_init('bstream_callback', 'id');
    }
}
