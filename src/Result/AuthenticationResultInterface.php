<?php

namespace LMS\Result;

interface AuthenticationResultInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getBirthDate(): string;

    /**
     * @return string
     */
    public function getPhone(): string;

    /**
     * @return string
     */
    public function getPreferredBranch(): string;

    /**
     * @return array
     */
    public function getAddress(): array;

    /**
     * @return array
     */
    public function getOnHold(): array;

    /**
     * @return int
     */
    public function getDefaultInterestPeriod(): int;

    /**
     * @return bool
     */
    public function isEmailNotification(): bool;

    /**
     * @return bool
     */
    public function isSmsNotification(): bool;
}
