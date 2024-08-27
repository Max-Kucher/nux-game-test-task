<div>
    <form wire:submit.prevent="loadResults">
        <button type="submit" class="w-full text-center bg-gray-300 text-black px-4 py-2 rounded">
            History
        </button>
    </form>

    <div class="mt-4">
        @if(count($gameResults))
            <ul>
                @foreach($gameResults as $result)
                    <li class="mb-2">
                        <span>Number: {{ $result['random_number'] }}</span>
                        <span> - Result: <strong class="{{ $result['is_win'] ? 'text-green-500' : 'text-red-500' }}">
                            {{ $result['is_win'] ? 'Win' : 'Lose' }}</strong>
                        </span>
                        <span> - Win Amount: ${{ number_format($result['win_amount'], 2) }}</span>
                        <span class="text-gray-500 text-sm"> - {{ \Carbon\Carbon::parse($result['created_at'])->diffForHumans() }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
