<div class="flex">
    <div class="w-1/2">
        @if (session()->has('message'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session()->get('message') }}</span>
                </div>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session()->get('error') }}</span>
                </div>
            </div>
        @endif

        <table class="min-w-full divide-y divide-gray-200 m-4">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thuisteam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Uitteam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($games as $game)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $game->homeTeam->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $game->awayTeam->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button wire:click="editGameResult({{ $game->id }})" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Uitslag toevoegen</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($selectedGame)
        <div class="w-1/2 ml-8 m-4">
            <form wire:submit.prevent="scoreGame">
                <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                    <div class="mb-4">
                        <label class="block text-lg font-medium text-gray-700 mb-2">Thuisteam: <span class="text-xl font-bold">{{ $homeTeam }}</span></label>
                        <label for="homeScore" class="block text-sm font-medium text-gray-700">Thuisscore</label>
                        <input id="homeScore"
                               wire:model.live="homeScore"
                               type="number"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('homeScore') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-lg font-medium text-gray-700 mb-2">Uitteam: <span class="text-xl font-bold">{{ $awayTeam }}</span></label>
                        <label for="awayScore" class="block text-sm font-medium text-gray-700">Uitscore</label>
                        <input id="awayScore"
                               wire:model.live="awayScore"
                               type="number"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('awayScore') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    @if($homeScore === 0 || $homeScore === ''|| $homeScore > 25)
                    @else
                        <span class="text-xl font-bold">{{ $homeTeam }}</span>
                        @for($i = 0; $i < $homeScore; $i++)
                            <div>
                                Doelpunt {{ $i + 1 }}:
                                <select wire:model="goalsHome.{{ $i }}.player_id" style=" width: 220px;" class="mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none weight-select autofocus">
                                    <option value="" selected disabled>Kies een speler</option>
                                    @foreach($homeTeamPlayers as $players)
                                        <option value="{{ $players->id }}">
                                            {{ $players->name }}
                                        </option>
                                    @endforeach
                                </select><br>
                                <label for="weight" class="text-black">Minute:</label>
                                <input placeholder="Minute doelpunt {{ $i + 1 }}"
                                       type="number"
                                       wire:model="goalsHome.{{ $i }}.minute"
                                       class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none amount">
                            </div>
                        @endfor
                    @endif

                    @if($awayScore === 0 || $awayScore === '' || $awayScore > 25)
                    @else
                        <span class="text-xl font-bold">{{ $awayTeam }}</span>
                        @for($i = 0; $i < $awayScore; $i++)
                            <div>
                                Doelpunt {{ $i + 1 }}:
                                <select wire:model="goalsAway.{{ $i }}.player_id" style=" width: 220px;" class="mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none weight-select autofocus">
                                    <option value="" selected disabled>Kies een speler</option>
                                    @foreach($awayTeamPlayers as $players)
                                        <option value="{{ $players->id }}">
                                            {{ $players->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('goalsAway') <span class="text-red-500">{{ $message }}</span> @enderror
                                <br>
                                <label for="weight" class="text-black">Minute:</label>
                                <input placeholder="Minute doelpunt {{ $i + 1 }}"
                                       type="number"
                                       wire:model="goalsAway.{{ $i }}.minute"
                                       class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none amount">
                                @error('goalsAway') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        @endfor
                    @endif

                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Opslaan</button>
                </div>
            </form>
        </div>
    @endif
</div>
