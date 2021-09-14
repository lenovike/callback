<?php

namespace Bstream\CallMeBack\Model\ResourceModel\CallBack;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Bstream\CallMeBack\Model\ResourceModel\CallBack
 */
class Collection extends AbstractCollection
{

	protected function _construct() {
        $this->_init(
            \Bstream\CallMeBack\Model\CallBack::class,
            \Bstream\CallMeBack\Model\ResourceModel\CallBack::class
        );
    }
}
