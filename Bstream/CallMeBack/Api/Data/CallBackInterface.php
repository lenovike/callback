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
    public function getId() : ?int;

    /**
     * @return string
     */
    public function getPhoneNumber() : ?string;

    /**
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @return string
     */
    public function getUpdatedAt(): ?string;
}
