<div class="mt-4 space-y-4">
    <div class="relative">
        <div
            class="relative"
            x-data="{ copied: false }"
        >
            <input
                value="{{ $uniqueLink }}"
                readonly
                class="w-full bg-gray-200 text-gray-700 pl-4 pr-8 py-2 rounded"
                x-ref="uniqueLinkInput"
            />

            <button
                @click="navigator.clipboard.writeText($refs.uniqueLinkInput.value).then(() => { copied = true; setTimeout(() => copied = false, 2000); })"
                class="absolute flex items-center px-2 right-0 top-0 bottom-0 rounded bg-gray-200 text-gray-700 hover:bg-gray-400 hover:text-gray-900"
            >
                        <span x-show="!copied">
                            Copy
                        </span>
                <span
                    x-show="copied"
                    x-cloak
                >
                            Copied!
                        </span>
            </button>
        </div>
    </div>

    <a
        href="{{ $uniqueLink }}"
        target="_blank"
        class="block text-center bg-blue-500 text-white px-4 py-2 rounded"
    >
        Visit A page
    </a>
</div>
