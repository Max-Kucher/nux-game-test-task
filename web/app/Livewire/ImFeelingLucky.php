<?php

namespace App\Livewire;

use App\Contracts\Game\Game;
use Livewire\Component;

class ImFeelingLucky extends Component
{
    public string $uuid;
    public int $result;
    public bool $win;
    public float $winAmount;

    private Game $game;

    public function boot(Game $game): void
    {
        $this->game = $game;
    }

    public function playGame()
    {
        $this->game->initialize([
            'uuid' => $this->uuid,
        ]);

        $gameResult = $this->game->play();
        $this->result = $gameResult->getNumber();
        $this->win = $gameResult->isWin();
        $this->winAmount = $gameResult->getWinAmount();
    }

    public function render()
    {
        return view('livewire.im-feeling-lucky');
    }
}
