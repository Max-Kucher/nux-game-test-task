<?php

namespace App\Livewire;

use App\DTOs\CustomerDataDTO;
use App\Services\LinkGenerator\LinkGenerator;
use Livewire\Component;
use App\Models\Modules\Customer\Models\Link;

class RegenerateAPageLink extends Component
{
    public string $uuid;

    public string $generatedLink;

    public function regenerateLink()
    {
        $link = Link::where('uuid', $this->uuid)->firstOrFail();
        $customer = $link->customer;

        $link->delete();

        $customerData = new CustomerDataDTO($customer->username, $customer->phone_number);
        $linkGenerator = app()->make(LinkGenerator::class);

        $this->generatedLink = $linkGenerator->generateLink($customerData);
    }

    public function render()
    {
        return view('livewire.regenerate-a-page-link');
    }
}
