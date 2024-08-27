<?php

namespace App\Services\Game;

use App\Contracts\Game\Game;
use App\Contracts\Game\GameResult;
use App\Contracts\Game\GameResultSubscriber;
use App\DTOs\GameResult as GameResultDTO;
use App\Models\Modules\Customer\Models\Customer;

class LuckyGame implements Game
{
    private Customer $customer;

    public function __construct(private readonly GameResultSubscriber $subscriber)
    { }

    /**
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function initialize(array $data): void
    {
        if (empty($data['uuid'])) {
            throw new \Exception('No uuid specified');
        }

        $uuid = $data['uuid'];

        $this->customer = Customer::whereHas('links', function ($query) use ($uuid) {
            $query->where('uuid', $uuid)->where('active', true);
        })->firstOrFail();
    }


    public function play(): GameResult
    {
        $number = rand(1, 1000);
        $win = $number % 2 === 0;
        $winAmount = 0;

        if ($win) {
            if ($number > 900) {
                $winAmount = $number * 0.7;
            } elseif ($number > 600) {
                $winAmount = $number * 0.5;
            } elseif ($number > 300) {
                $winAmount = $number * 0.3;
            } else {
                $winAmount = $number * 0.1;
            }
        }

        $gameResultDTO = new GameResultDTO($number, $win, $winAmount);
        $this->subscriber->handle($this->customer, $gameResultDTO);

        return $gameResultDTO;
    }
}
