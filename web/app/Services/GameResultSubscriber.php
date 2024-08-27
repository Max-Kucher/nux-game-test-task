<?php

namespace App\Services;

use App\Contracts\Game\GameResult as GameResultInterface;
use App\Contracts\Game\GameResultSubscriber as GameResultSubscriberInterface;
use App\Models\Modules\Customer\Models\GameResult;
use App\Models\Modules\Customer\Models\Customer;

class GameResultSubscriber implements GameResultSubscriberInterface
{
    public function handle(Customer $customer, GameResultInterface $gameResult): void
    {
        $result = new GameResult();
        $result->customer_id = $customer->id;
        $result->random_number = $gameResult->getNumber();
        $result->is_win = $gameResult->isWin();
        $result->win_amount = $gameResult->getNumber();
        $result->save();
    }
}
