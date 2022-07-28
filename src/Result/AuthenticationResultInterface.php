<?php

namespace LMS\Result;

interface AuthenticationResultInterface
{
    public function getName(): string;
    public function getEmail(): string;
    public function getBirthDate(): string;
    public function getPhone(): string;
    public function getPreferredBranch(): string;
    public function getAddress(): array;
    public function getOnHold(): array;
    public function getDefaultInterestPeriod(): int;
    public function isEmailNotification(): bool;
    public function isSmsNotification(): bool;
}
