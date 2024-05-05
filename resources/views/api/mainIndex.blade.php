<x-app-layout>
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
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('API') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 px-2 mb-4">
                <div class="bg-white border border-gray-300 shadow-md rounded-md">
                    <a id="openModalPlanned">
                        <div class="bg-white border border-gray-300 shadow-md rounded-md flex items-center justify-center p-4">
                            <img src="{{ asset('img/icons8-planner.png') }}" class="w-12 h-auto mb-2 mr-2">
                            <h2 class="text-lg font-semibold mb-0">Geplande wedstrijden api</h2>
                            <br>
                            <br>
                        </div>
                    </a>
                </div>
            </div>

            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 px-2 mb-4">
                <div class="bg-white border border-gray-300 shadow-md rounded-md">
                    <a id="openModalPlayed">
                        <div class="bg-white border border-gray-300 shadow-md rounded-md flex items-center justify-center p-4">
                            <img src="{{ asset('img/icons8-soccer_ball.png') }}" class="w-12 h-auto mb-2 mr-2">
                            <h2 class="text-lg font-semibold mb-0">Gespeelde wedstrijden api</h2>
                            <br>
                            <br>
                        </div>
                    </a>
                </div>
            </div>

            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 px-2 mb-4">
                <div class="bg-white border border-gray-300 shadow-md rounded-md">
                    <a id="generateApiKey">
                        <div class="bg-white border border-gray-300 shadow-md rounded-md flex items-center justify-center p-4">
                            <img src="{{ asset('img/api-key.png') }}" class="w-12 h-auto mb-2 mr-2">
                            <h2 class="text-lg font-semibold mb-0">API Genereren</h2>
                        </div>
                    </a>
                </div>
            </div>

            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 px-2 mb-4">
                <div class="">
                    <div class="bg-white border border-gray-300 shadow-md rounded-md">
                        <a id="openModalOverview">
                            <div class="bg-white border border-gray-300 shadow-md rounded-md flex items-center justify-center p-4">
                                <img src="{{ asset('img/api-overview.png') }}" class="w-12 h-auto mb-2 mr-2">
                                <h2 class="text-lg font-semibold mb-0">API Overzicht</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

    <div id="myModalPlanned" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white shadow-md rounded-lg p-8 w-1/4 mx-auto">
            <form method="POST" action="{{ route('api.planned') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="form-group">
                    <label for="apiKeyInput">API-sleutel:</label>
                    <input type="password" class="form-control" id="apiKeyInput" name="apiKeyInput" required>
                </div>
                <div class="text-danger" id="apiKeyError"></div>
                <x-primary-button class="mt-2">
                    {{ __('Indienen') }}
                </x-primary-button>
            </form>
        </div>
    </div>

    <div id="myModalPlayed" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white shadow-md rounded-lg p-8 w-1/4 mx-auto">
            <form method="POST" action="{{ route('api.played') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="form-group">
                    <label for="apiKeyInput">API-sleutel:</label>
                    <input type="password" class="form-control" id="apiKeyInput" name="apiKeyInput" required>
                </div>
                <div class="text-danger" id="apiKeyError"></div>
                <x-primary-button class="mt-2">
                    {{ __('Indienen') }}
                </x-primary-button>
            </form>
        </div>
    </div>

    <div id="myModalOverview" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white shadow-md rounded-lg p-8 w-1/4 mx-auto">
            <form method="POST" action="{{ route('api.overview') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="form-group">
                    <label for="apiKeyInputOverview">API-sleutel:</label>
                    <input type="password" class="form-control" id="apiKeyInput" name="apiKeyInput" required>
                </div>
                <div class="text-danger" id="apiKeyErrorOverview"></div>
                <x-primary-button class="mt-2">
                    {{ __('Indienen') }}
                </x-primary-button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('openModalPlanned').addEventListener('click', function() {
            document.getElementById('myModalPlanned').classList.remove('hidden');
        });

        document.getElementById('openModalPlayed').addEventListener('click', function() {
            document.getElementById('myModalPlayed').classList.remove('hidden');
        });

        document.getElementById('openModalOverview').addEventListener('click', function() {
            document.getElementById('myModalOverview').classList.remove('hidden');
        });

        document.getElementById('myModalPlanned').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });

        document.getElementById('myModalPlayed').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });

        document.getElementById('myModalOverview').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });

        document.getElementById('generateApiKey').addEventListener('click', function() {
            fetch("{{ route('api.generate') }}")
                .then(response => response.json())
                .then(data => {
                    const apiKey = data.api_key;
                    const tempInput = document.createElement('input');
                    tempInput.value = apiKey;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);
                    alert("API-sleutel is gekopieerd naar het klembord: " + apiKey);
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</x-app-layout>
