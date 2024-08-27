<div>
    <form wire:submit.prevent="playGame" class="space-y-4">
        <button type="submit" class="w-full bg-blue-500 text-2xl text-center text-white px-4 py-2 rounded">
            I'm filling lucky!
        </button>
    </form>

    @if($result)
        <div class="mt-4">
            <p>Your Number Is: {{ $result }}</p>
            <p>
                Result:
                <span class="{{ $win ? '' : 'text-red-500' }}">
                    {{ $win ? 'Win' : 'Lose' }}
                </span>
            </p>

            @if ($win)
                <p class="text-2xl text-blue-800">Win Amount: ${{ $winAmount }}</p>
            @endif
        </div>
    @endif
</div>
