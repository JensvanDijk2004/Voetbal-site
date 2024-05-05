<x-app-layout>
    <div class="relative bg-gradient-to-r from-green-600 to-green-700 to bg-green-500 h-32 py-4 px-4 border-b-4 w-full text-white flex items-center">
    </div>

    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8 mt-2">
        <span class="text-gray-800 font-bold text-2xl">Wedstrijd</span>
        <div class="flex items-center justify-between mb-6 mt-4">
            <div class="flex flex-col items-center">
                <img src="{{ asset('/storage/'. $game->homeTeam->logo) }}" class="w-44 h-44 mb-2"
                     alt="{{ $game->homeTeam->name }}">
                <span class="text-gray-800 font-bold text-2xl">{{ $game->homeTeam->name }}</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="mb-1 w-px w-0.5 h-12 bg-green-700 mx-4"></div>
                <div class="font-bold text-gray-800 text-2xl">{{ $game->time }}</div>
                <div class="mt-1 w-px w-0.5 h-12 bg-green-700 mx-4"></div>
            </div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('/storage/'. $game->awayTeam->logo) }}" class="w-44 h-44 mb-2"
                     alt="{{ $game->awayTeam->name }}">
                <span class="text-gray-800 font-bold text-2xl">{{ $game->awayTeam->name }}</span>
            </div>
        </div>

        <div class="border-t-2 border-gray-300 pt-6">
        </div>
        <div class="flex flex justify-between w-1/2">
            <p><span class="opacity-50">Wedstrijdnummer:</span> <span>{{ $game->id }}</span></p>
            <div class="flex justify-center">
                <p><span class="opacity-50">Veld:</span> <span>{{ $game->field }}</span></p>
            </div>
        </div>
        <p class="mt-2"><span class="opacity-50">Scheidsrechter:</span> <span>{{ $game->refereeName->name }}</span></p>

    </div>
</x-app-layout>
