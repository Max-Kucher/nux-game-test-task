<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $userName;
    public string $phoneNumber;
    public string $uniqueLink;

    public function generateLink(): void
    {
        $this->validate([
            'userName' => 'required|string|min:2|max:255',
            'phoneNumber' => 'required|string|min:10|max:20',
        ]);

        $this->uniqueLink = route('a-page', ['uuid' => Str::uuid()]);

        session()->flash('message', 'Link was generated!');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
