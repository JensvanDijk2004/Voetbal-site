<x-app-layout>
    @if (session()->has('message'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:text-green-400"
             role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">

            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 px-2 mb-4">
                <a href="{{ route('admin.user.index') }}">
                    <div class="bg-white border border-gray-300 shadow-md rounded-md">
                        <div class="bg-white border border-gray-300 shadow-md rounded-md flex items-center justify-center p-4">
                            <img src="{{ asset('img/adminEdit.png') }}" class="w-12 h-auto mb-2">
                            <h2 class="text-lg font-semibold mb-0">Overzicht Spelers</h2>
                            <br>
                            <br>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 px-2 mb-4">
                <a href="{{ route('admin.delete.index') }}">
                    <div class="bg-white border border-gray-300 shadow-md rounded-md">
                        <div class="bg-white border border-gray-300 shadow-md rounded-md flex items-center justify-center p-4">
                            <img src="{{ asset('img/AdminDelete.png') }}" class="w-12 h-auto mb-2 mr-2">
                            <h2 class="text-lg font-semibold mb-0">Teams Verwijderen</h2>
                            <br>
                            <br>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 px-2 mb-4">
                <a id="openModal">
                    <div class="bg-white border border-gray-300 shadow-md rounded-md">
                        <div class="bg-white border border-gray-300 shadow-md rounded-md flex items-center justify-center p-4">
                            <img src="{{ asset('img/icons8-planner.png') }}" class="w-12 h-auto mb-2 mr-2">
                            <h2 class="text-lg font-semibold mb-0">Wedstijden generen</h2>
                            <br>
                            <br>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 px-2 mb-4">
                <a href="{{ route('game.playedGames') }}">
                    <div class="bg-white border border-gray-300 shadow-md rounded-md">
                        <div class="bg-white border border-gray-300 shadow-md rounded-md flex items-center justify-center p-4">
                            <img src="{{ asset('img/icons8-soccer_ball.png') }}" class="w-12 h-auto mb-2 mr-2">
                            <h2 class="text-lg font-semibold mb-0">Wedstijd score invullen</h2>
                            <br>
                            <br>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div id="myModal" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white shadow-md rounded-lg p-8 w-2/5 mx-auto">
            <header>
                <h2 class="text-2xl font-semibold mb-4">Wedstrijd generen</h2>
            </header>
            <form action="{{ route('game.store') }}" method="post" class="flex flex-col space-y-2" enctype="multipart/form-data">
                @csrf
                <label for="field" class="text-black">Velden:</label>
                <input type="number" name="field" id="field" value="{{ old('field') }}" autofocus class="border-gray-300 rounded-md shadow-sm">
                @error('field')
                <div class="text-red-700 mt-2">{{ $message }}</div>
                @enderror

                <label for="field" class="text-black">Starttijd:</label>
                <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}" class="border-gray-300 rounded-md shadow-sm">
                @error('start_time')
                <div class="text-red-700 mt-2">{{ $message }}</div>
                @enderror

                <label for="field" class="text-black">Eindtijd:</label>
                <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}" class="border-gray-300 rounded-md shadow-sm">
                @error('end_time')
                <div class="text-red-700 mt-2">{{ $message }}</div>
                @enderror
                <div class="flex flex-wrap mt-4">
                    <div class="w-full sm:w-1/3 pr-3">
                        <label for="field" class="text-black">Duur wedstrijd:</label>
                        <input type="number" name="time" id="time" value="{{ old('time') }}" placeholder="Minuten" class="border-gray-300 rounded-md shadow-sm w-32">
                        @error('time')
                        <div class="text-red-700 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/3 pr-3">
                        <label for="time_break" class="text-black">Duur rust:</label>
                        <input type="number" name="time_break" id="time_break" value="{{ old('time_break') }}" placeholder="Minuten" class="border-gray-300 rounded-md shadow-sm w-32">
                        @error('time_break')
                        <div class="text-red-700 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/3 pr-3">
                        <label for="time_between" class="text-black">Tussen wedstrijd:</label>
                        <input type="number" name="time_between" id="time_between" value="{{ old('time_between') }}" placeholder="Minuten" class="border-gray-300 rounded-md shadow-sm w-32">
                        @error('time_between')
                        <div class="text-red-700 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <x-primary-button class="mt-2">
                    {{ __('Wedstrijd generen') }}
                </x-primary-button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('openModal').addEventListener('click', function () {
            document.getElementById('myModal').classList.remove('hidden')
        })

        document.getElementById('myModal').addEventListener('click', function (e) {
            if (e.target === this) {
                this.classList.add('hidden')
            }
        })
    </script>
</x-app-layout>
