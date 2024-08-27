<div class="flex-1">
    <button
        wire:click.prevent="regenerateLink"
        class="w-full text-center bg-blue-500 text-white px-4 py-2 rounded"
    >
        Regenerate link
    </button>

    @if ($generatedLink)
        <x-a-page-link-actions :uniqueLink="$generatedLink" />
    @endif
</div>
