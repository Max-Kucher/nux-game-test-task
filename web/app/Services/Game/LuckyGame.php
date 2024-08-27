<?php

namespace App\Services\Game;

use App\Contracts\Game\Game;
use App\Contracts\Game\GameResult;
use App\DTOs\GameResult as GameResultDTO;

class LuckyGame implements Game
{

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

        return new GameResultDTO($number, $win, $winAmount);
    }
}
