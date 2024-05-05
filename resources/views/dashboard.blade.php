<x-app-layout>
    <div class="relative bg-gradient-to-r from-green-600 to-green-700 to bg-green-500 h-32 py-4 px-4 border-b-4 w-full text-white flex items-center">
        <h2 class="font-semibold text-xl text-white leading-tight ml-4">
            {{ __('Dashboard') }}
        </h2>
    </div>

    <div class="py-24 flex flex-col md:flex-row">
        <div class="md:w-1/2 min-h-screen py-0 px-6">
            <h1 class="text-lg font-medium">Top 5 teams</h1>
            <div class="mt-6 overflow-x-auto">
                <div class="shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full text-sm">
                        <thead class="text-xs uppercase font-medium bg-gray-300">
                            <tr>
                                <th></th>
                                <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                    Club
                                </th>
                                <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                    P
                                </th>
                                <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                    W
                                </th>
                                <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                    D
                                </th>
                                <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                    L
                                </th>
                                <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                    PTS
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-sm">
                            @foreach($teams as $team)
                                <tr class="bg-opacity-20">
                                    <td class="pl-4">
                                        {{ $index++ }}
                                    </td>
                                    <td class="flex px-6 py-4 whitespace-nowrap items-center">
                                        <a href="{{ route('team.show', $team) }}" class="flex items-center">
                                            <img style="width: 18px; height: 18px;" src="{{ asset('/storage/'. $team->logo) }}" class="mr-2">
                                            <span class="font-medium">{{ $team->name }}</span>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{
                                            $team->gamesHomeTeam()->where('played', 1)->count() +
                                            $team->gamesAwayTeam()->where('played', 1)->count()
                                        }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{
                                            $team->gamesHomeTeam()->where('played', 1)->where('home_score', '>', 'away_team_score')->count() +
                                            $team->gamesAwayTeam()->where('played', 1)->where('away_score', '>', 'home_team_score')->count()
                                        }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{
                                            $team->gamesHomeTeam()->where('played', 1)->where('home_score', '=', 'away_team_score')->count() +
                                            $team->gamesAwayTeam()->where('played', 1)->where('away_score', '=', 'home_team_score')->count()
                                        }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{
                                            $team->gamesHomeTeam()->where('played', 1)->where('home_score', '<', 'away_team_score')->count() +
                                            $team->gamesAwayTeam()->where('played', 1)->where('away_score', '<', 'home_team_score')->count()
                                        }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $team->points }}
                                    </td>
                                    </a>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            @if($usersInTeam !== [])
                <h1 class="text-lg font-medium">Spelers in jouw team</h1>
                <div class="mt-6 overflow-x-auto">
                    <div class="shadow overflow-hidden sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-300 text-xs uppercase font-medium">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                        Naam
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                        Leeftijd
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                        Geslacht
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                                @foreach($usersInTeam as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($user->id === Auth::user()->id)
                                                <p class="font-semibold">{{ $user->name }}</p>
                                            @else
                                                {{ $user->name }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $user->age }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $user->gender }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h1 class="text-lg font-medium">Spelers in jouw team</h1>
                <img class="w-1/2 h-1/2" src="/img/img.png" alt="Beschrijving van de afbeelding">
            @endif
        </div>
        <div class="md:w-1/2 min-h-screen py-0 px-6">
            <h1 class="text-lg font-medium">Belangrijk nieuws</h1>
            <div class="flex-1 py-6">
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden relative max-w-4xl w-full max-5xl:">
                    <div class="p-6">
                        <h1 class="text-black font-extrabold text-2xl mb-6 text-center">Voetbalwedstrijd om 13:00 Gecanceld</h1>
                        <div class="mx-auto mb-6">
                            <img src="/img/Test.png" alt="Beschrijving van de afbeelding">
                        </div>
                        <p>
                            Door extreme weersomstandigheden zoals zware regenval, onweersbuien en sterke wind kunnen we de wedstrijd niet door laten gaan vanwegen veiligheidsmaatregelen.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
