<div class="max-w-md mx-auto my-12">
    @if (session()->has('message'))
        <div class="text-green-500 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form
        wire:submit.prevent="generateLink"
        class="space-y-4"
    >
        <div>
            <label
                for="username"
                class="block text-gray-700"
            >
                Username
            </label>
            <input
                wire:model="userName"
                type="text"
                id="username"
                required
                minlength="2"
                placeholder="John Doe"
                class="w-full p-2 border rounded"
            >
            @error('username')
                <span class="text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div>
            <label
                for="phonenumber"
                class="block text-gray-700"
            >
                Phonenumber
            </label>
            <input
                wire:model.lazy="phoneNumber"
                type="tel"
                id="phonenumber"
                pattern="\+38 \([0-9]{3}\) [0-9]{3}-[0-9]{4}"
                required
                placeholder="+38 (000) 000-0000"
                class="w-full p-2 border rounded"
                x-mask="+38 (099) 999-9999"
            >
            @error('phonenumber')
                <span class="text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>

        @if (!$uniqueLink)
            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded"
            >
                Register
            </button>
        @endif
    </form>

    @if ($uniqueLink)
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
                        id="uniqueLinkInput"
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
    @endif
</div>
