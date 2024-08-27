<?php

namespace App\Services\LinkGenerator;

use App\Contracts\CustomerDataInterface;
use App\Models\Modules\Customer\Models\Customer;
use Illuminate\Support\Str;

class BaseLinkGenerator implements LinkGenerator
{
    public function generateLink(CustomerDataInterface $customerData): string
    {
        $customer = Customer::firstOrCreate([
            'username' => $customerData->getUserName(),
            'phone_number' => $customerData->getPhoneNumber(),
        ]);

        $link = $customer->links()->create([
            'uuid' => Str::uuid(),
            'expires_at' => now()->addSeconds(config('link_generation.expires_timeout')),
            'active' => true,
        ]);

        return route('a-page', ['uuid' => $link->uuid]);
    }
}
