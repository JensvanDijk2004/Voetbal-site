<x-app-layout>
    <style>
        .nav-link {
            text-decoration : none; /* Verwijder standaard onderstreping */
        }

        body {
            overflow-x : hidden;
        }

        .nav-link.active {
            text-decoration : underline; /* Voeg onderstreping toe als actief */
        }
    </style>
    @if (session()->has('message'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400"
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
    <div class="flex justify-between">
        <div
            class="relative bg-gradient-to-r from-green-600 to-green-700 to bg-green-500 h-96 py-4 px-4 border-b-4 w-full text-white flex flex-col">
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
                    <a href="{{ route('team.show', $team) }}"
                       class="nav-link {{ request()->routeIs('team.show', $team) ? 'active' : '' }}">
                        {{ __('Programma') }}
                    </a>
                </nav>
                <nav class="mr-4">
                    <a href="{{ route('team.result.show', $team) }}"
                       class="nav-link {{ request()->routeIs('team.result.show', $team) ? 'active' : '' }}">
                        {{ __('Uitslagen') }}
                    </a>
                </nav>
                <nav>
                    <a href="{{ route('team.player.show', $team) }}"
                       class="nav-link {{ request()->routeIs('team.player.show', $team) ? 'active' : '' }}">
                        {{ __('Spelers') }}
                    </a>
                </nav>
            </div>
            <div class="ml-auto">
                <div class="h-72 w-72 flex items-center justify-center">
                    <img class="max-h-full max-w-full object-cover rounded-full"
                         src="{{ asset('/storage/'. $team->logo) }}">
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-4xl sm:px-6 lg:px-8">
            <div class="max-w-3xl bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6 font-extrabold text-xl ">
                    Gegevens Spelers
                    <div class="py-5 flex flex-wrap justify-between">

                        @foreach($usersInTeam as $key => $user)
                            <div class="w-1/3 flex justify-center mb-4">
                                <div class="bg-white shadow-xl rounded-lg py-3 flex-grow">
                                    <div class="photo-wrapper p-2">
                                        @if($user->admin === 1)
                                            <img class="w-auto h-32 rounded-full mx-auto" src="{{ asset('/storage/'. $user->team->logo) }}" alt="{{ $user->name }}">
                                        @else
                                            <img class="w-auto h-auto rounded-full mx-auto" src="{{ $images[$key] }}" alt="{{ $user->name }}">
                                        @endif
                                    </div>
                                    <div class="p-2">
                                        <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ $user->name }}</h3>
                                        <div class="text-center text-gray-400 text-xs font-semibold">
                                            @if (Auth::check() && Auth::user()->id === $team->creator_id)
                                                <form action="{{ route('team.delete', [$team, $user]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-green-600 text-base hover:text-green-900">
                                                        Verwijderen
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    @if (Auth::check() && Auth::user()->id === $team->creator_id)
                        <x-primary-button id="openModalMinus">
                            {{ __('Spelers toevoegen') }}
                        </x-primary-button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="myModalMinus"
         class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white shadow-md rounded-lg p-8 w-1/2 mx-auto">
            <header>
                <h2 class="text-2xl font-semibold mb-4">Spelers toevoegen</h2>
            </header>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Naam
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Leeftijd
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Geslacht
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acties
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $user->age }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $user->gender }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('team.join', [$team, $user]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:text-green-900">Toevoegen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.getElementById('openModalMinus').addEventListener('click', function () {
            document.getElementById('myModalMinus').classList.remove('hidden')
        })

        document.getElementById('myModalMinus').addEventListener('click', function (e) {
            if (e.target === this) {
                this.classList.add('hidden')
            }
        })
    </script>
</x-app-layout>
