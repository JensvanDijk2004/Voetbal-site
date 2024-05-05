<x-app-layout>
    <style>
        .nav-link {
            text-decoration : none; /* Verwijder standaard onderstreping */
        }
        body{
            overflow-x: hidden;
        }

        .nav-link.active {
            text-decoration : underline; /* Voeg onderstreping toe als actief */
        }
    </style>
    @if (session()->has('message'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif
    <div class="flex justify-between">
        <div class="relative bg-gradient-to-r from-green-600 to-green-700 to bg-green-500 h-96 py-4 px-4 border-b-4 w-full text-white flex flex-col">
            <div class="absolute bottom-16 px-32 w-full font-extrabold text-4xl">
                {{ $team->name }}
                @if (Auth::check() && Auth::user()->id === $team->creator_id)
                    <div class="flex items-center ml-auto mr-4">
                        <a href="{{ route('team.edit', $team) }}">
                            <x-primary-button class="">Team bewerken</x-primary-button>
                        </a>
                    </div>
                @endif
            </div>
            <div class="flex row-start-0 absolute bottom-0">
                <nav class="mr-4">
                    <a href="{{ route('team.show', $team) }}" class="nav-link {{ request()->routeIs('team.show', $team) ? 'active' : '' }}">
                        {{ __('Programma') }}
                    </a>
                </nav>
                <nav class="mr-4">
                    <a href="{{ route('team.result.show', $team) }}" class="nav-link {{ request()->routeIs('team.result.show', $team) ? 'active' : '' }}">
                        {{ __('Uitslagen') }}
                    </a>
                </nav>
                <nav>
                    <a href="{{ route('team.player.show', $team) }}" class="nav-link {{ request()->routeIs('team.player.show', $team) ? 'active' : '' }}">
                        {{ __('Spelers') }}
                    </a>
                </nav>
            </div>
            <div class="ml-auto mr-8">
                <div class="h-72 w-72 flex items-center justify-center">
                    <img class="max-h-full max-w-full object-cover rounded-full" src="{{ asset('/storage/'. $team->logo) }}">
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-4xl sm:px-6 lg:px-8">
            <div class="max-w-3xl bg-white rounded-lg shadow-md overflow-hidden">
                <div class="border-b border-green-300 flex justify-center px-6 py-4">
                    <h2 class="text-xl font-semibold text-green-700">Programma</h2>
                </div>
                @foreach ($games as $game)
                    <a href="{{ route('game.program.show', $game) }}">
                        <div class="flex justify-evenly py-2">
                            <div class="flex flex-row w-full items-center justify-end">
                                @if ($game->homeTeam->id == $team->id)
                                    <span class="text-base font-semibold items-center text-gray-700 px-6"><strong>{{ $game->homeTeam->name }}</strong></span>
                                @else
                                    <span class="text-base items-center text-gray-700 px-6">{{ $game->homeTeam->name }}</span>
                                @endif
                                <img src="{{ asset('/storage/'. $game->homeTeam->logo) }}" class="w-12 h-12 mr-0"
                                     alt="{{ $game->homeTeam->name }}">
                            </div>
                            <div class="flex flex-row w-1/2 justify-center items-center">
                                <span class="text-lg font-extrabold text-gray-700">{{ $game->time }}</span>
                            </div>
                            <div class="flex flex-row w-full items-center justify-start">
                                <img src="{{ asset('/storage/'. $game->awayTeam->logo) }}" class="w-12 h-12 ml-0"
                                     alt="{{ $game->awayTeam->name }}">
                                @if ($game->awayTeam->id == $team->id)
                                    <span class="text-base font-semibold items-center text-gray-700 px-6"><strong>{{ $game->awayTeam->name }}</strong></span>
                                @else
                                    <span class="text-base items-center text-gray-700 px-6">{{ $game->awayTeam->name }}</span>
                                @endif
                            </div>
                        </div>
                    </a>
                    <hr class="border-green-300">
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
