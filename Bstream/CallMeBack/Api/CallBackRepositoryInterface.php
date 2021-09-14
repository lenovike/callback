<?php

namespace Bstream\CallMeBack\Api;

use Bstream\CallMeBack\Api\Data\CallBackInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface CallBackRepositoryInterface
 * @package Bstream\CallMeBack\Api
 */
interface CallBackRepositoryInterface
{
    /**
     * @param int $id
     * @return CallBackInterface
     * @throws NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param CallBackInterface $callBack
     * @return void
     */
    public function save(CallBackInterface $callBack);

    /**
     * @param CallBackInterface $callBack
     * @return void
     */
    public function delete(CallBackInterface $callBack);
}
