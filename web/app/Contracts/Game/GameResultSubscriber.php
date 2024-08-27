<?php

namespace App\Contracts\Game;

use App\Models\Modules\Customer\Models\Customer;

interface GameResultSubscriber
{
    public function handle(Customer $customer, GameResult $gameResult): void;
}
