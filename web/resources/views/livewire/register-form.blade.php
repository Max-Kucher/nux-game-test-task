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
            @error('userName')
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
            @error('phoneNumber')
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
        <x-a-page-link-actions :uniqueLink="$uniqueLink" />
    @endif
</div>
