<?php

namespace App\Contracts\Game;

interface Game
{
    public function play(): GameResult;
}
