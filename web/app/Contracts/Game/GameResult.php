<?php

namespace App\Contracts\Game;

interface GameResult
{
    // Should be reworked
    public function getNumber(): int;

    public function isWin(): bool;

    public function getWinAmount(): float;
}
