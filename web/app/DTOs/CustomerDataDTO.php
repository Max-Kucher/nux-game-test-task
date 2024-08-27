<?php

namespace App\DTOs;

use App\Contracts\CustomerDataInterface;

readonly class CustomerDataDTO implements CustomerDataInterface
{
    public function __construct(
        private string $userName,
        private string $phoneNumber
    ) { }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
