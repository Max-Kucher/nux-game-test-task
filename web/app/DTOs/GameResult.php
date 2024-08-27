<?php

namespace App\DTOs;

readonly class GameResult implements \App\Contracts\Game\GameResult
{
    public function __construct(
        private int   $number,
        private bool  $win,
        private float $winAmount
    ) { }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function isWin(): bool
    {
        return $this->win;
    }

    public function getWinAmount(): float
    {
        return $this->winAmount;
    }
}
