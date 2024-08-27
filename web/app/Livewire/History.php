<?php

namespace App\Livewire;

use App\Models\Modules\Customer\Models\Customer;
use App\Models\Modules\Customer\Models\GameResult;
use Livewire\Component;

class History extends Component
{
    public string $uuid;
    public array $gameResults = [];
    public int $loadCount = 3;

    public function loadResults(): void
    {
        $customer = Customer::whereHas('links', function ($query) {
            $query->where('uuid', $this->uuid)->where('active', true);
        })->firstOrFail();

        $results = GameResult::where('customer_id', $customer->id)
            ->orderBy('created_at', 'desc')
            ->take($this->loadCount)
            ->skip(count($this->gameResults))
            ->get();

        $this->gameResults = $results->toArray();
    }

    public function render()
    {
        return view('livewire.history', [
            'gameResults' => $this->gameResults,
        ]);
    }
}

