<?php

namespace App\Services\APageLinkValidator;

use App\Models\Modules\Customer\Models\Link;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class BaseAPageLinkValidator implements APageLinkValidator
{

    public function isValid(string $uuid): bool
    {
        try {
            $link = Link::where('uuid', $uuid)->first();
        } catch (QueryException $e) {
            Log::error('Database query error while validating UUID: ' . $uuid, [
                'message' => $e->getMessage(),
            ]);

            return false;
        }

        return $link && $link->active && $link->expires_at->isFuture();
    }
}
