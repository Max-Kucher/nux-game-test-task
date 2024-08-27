<?php

namespace App\Services\LinkGenerator;

use App\Contracts\CustomerDataInterface;

interface LinkGenerator
{
    public function generateLink(CustomerDataInterface $customerData): string;
}
