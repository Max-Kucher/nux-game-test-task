<?php

namespace App\Services\APageLinkValidator;

interface APageLinkValidator
{
    public function isValid(string $uuid): bool;
}
