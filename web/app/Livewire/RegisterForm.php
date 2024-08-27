<?php

namespace App\Livewire;

use App\DTOs\CustomerDataDTO;
use App\Services\LinkGenerator\LinkGenerator;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $userName;
    public string $phoneNumber;
    public string $uniqueLink;

    protected array $rules = [
        'userName' => 'required|string|min:2|max:255',
        'phoneNumber' => 'required|string|min:10|max:20',
    ];

    public function generateLink(): void
    {
        $this->validate();

        $customerData = new CustomerDataDTO($this->userName, $this->phoneNumber);
        $linkGenerator = app()->make(LinkGenerator::class);

        $this->uniqueLink = $linkGenerator->generateLink($customerData);

        session()->flash('message', 'Link was generated!');
    }

    public function render(): View
    {
        return view('livewire.register-form');
    }
}
