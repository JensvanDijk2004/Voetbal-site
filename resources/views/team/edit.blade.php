<x-app-layout>
    <div class="min-w-screen min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 bg-gray-100">
        <div class=" bg-white text-gray-700 rounded-lg shadow-xl w-full max-w-xl">
            <div class="py-5 flex flex-col items-center justify-center">
                <h1 class="font-bold text-3xl text-gray-900 mb-4">Team Wijzigen</h1>
                <p class="text-gray-600">Vul de gegevens in van het geselecteerde team</p>
            </div>
            <div
                class="bg-white text-gray-700 rounded-lg shadow-xl w-full max-w-xl p-5 grid gap-8 grid-cols-1 md:grid-cols-2">
                <form method="POST" action="{{ route('team.update', $team) }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('put')
                    <div class="space-y-4">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block w-full" type="text" name="name"
                                          value="{{ old('name', $team->name) }}" />
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <x-input-label for="logo" :value="__('Logo')" />
                            <input id="logo" class="hidden" type="file" name="logo"
                                   onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" />
                            <label for="logo" class="cursor-pointer">
                                <span class="text-sm text-gray-500">Selecteer een afbeelding</span>
                            </label>
                        </div>
                        <div class="flex">
                            <x-primary-button>
                                {{ __('Team Wijzigen') }}
                            </x-primary-button>
                        </div>
                </form>
                <form action="{{ route('team.destroy', $team) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                </form>
            </div>
            <div>
                <img id="preview" src="{{ asset('/storage/'. $team->logo) }}">
            </div>
        </div>
    </div>
</x-app-layout>
