<?php

namespace App\Contracts;

interface CustomerDataInterface
{
    public function getUserName(): string;

    public function getPhoneNumber(): string;
}
