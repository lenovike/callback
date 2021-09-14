<?php

namespace Bstream\CallMeBack\Ui\Component\Listing;

use Bstream\CallMeBack\Api\Data\CallBackInterface;
use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    /**
     * @var array
     */
    protected $options;

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => CallBackInterface::STATUS_NEW,
                'label' => __('New'),
            ],
            [
                'value' => CallBackInterface::STATUS_IN_WORK,
                'label' => __('In Work'),
            ],
            [
                'value' => CallBackInterface::STATUS_CLOSED,
                'label' => __('Closed'),
            ]
        ];
    }
}
