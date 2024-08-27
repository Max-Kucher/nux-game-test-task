<?php

namespace App\Contracts\Game;

interface Game
{
    public function initialize(array $data): void;

    public function play(): GameResult;
}
