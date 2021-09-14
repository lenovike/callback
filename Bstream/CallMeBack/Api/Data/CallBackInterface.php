<?php

namespace Bstream\CallMeBack\Api\Data;

/**
 * Interface CallBackInterface
 * @package Bstream\CallMeBack\Api\Data
 */
interface CallBackInterface
{
    const ID = 'id';
    const PHONE_NUMBER = 'phone_number';
    const CREATED_AT = 'created_at';
    const STATUS = 'status';
    const UPDATED_AT = 'updated_at';

    const STATUS_NEW = 0;
    const STATUS_IN_WORK = 1;
    const STATUS_CLOSED = 2;

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getPhoneNumber();

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @return int
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getUpdatedAt();
}
