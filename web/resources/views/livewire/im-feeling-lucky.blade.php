<div>
    <form wire:submit.prevent="playGame" class="space-y-4">
        <button type="submit" class="w-full bg-blue-500 text-2xl text-center text-white px-4 py-2 rounded">
            I'm filling lucky!
        </button>
    </form>

    @if($result)
        <div class="mt-4">
            <p>Random Number: {{ $result }}</p>
            <p>Result: {{ $win ? 'Win' : 'Lose' }}</p>
            <p>Win Amount: ${{ $winAmount }}</p>
        </div>
    @endif
</div>
