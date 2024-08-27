<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Modules\Customer\Models\Link;

class DeactivateAPageLink extends Component
{
    public string $uuid;

    public bool $redirect = false;

    public function deactivateLink()
    {
        Link::where('uuid', $this->uuid)->delete();

        return redirect()->to(route('home'));
    }

    public function render()
    {
        return view('livewire.deactivate-a-page-link');
    }
}
