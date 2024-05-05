<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 text-black flex items-center justify-between">
                    <div class="flex items-center">
                        <a class="mr-4">
                            <img src="/img/VoetbalLogo.png" class="rounded-full min-h-20 min-h-20 mb-4" alt="Profielfoto">
                        </a>
                        <div class="flex flex-col">
                            <div class="font-extrabold text-3xl mb-4">Lorem ipsum dolor sit amet consectetur adipiscing.</div>
                            <div class="flex flex-wrap">
                                <div class="w-full md:w-2/3 pr-4 mb-4 md:mb-0 text-base text-gray-400">
                                    Lorem ipsum dolor sit amet consectetur adipiscing elit massa consectetur in molestie augue sed sed augue nibh et quis nibh faucibus sem non cursus lectus nibh
                                    volutpat aliquam sed est nibh adipiscing hendrerit rhoncus, sed
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-8">
        <div class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 items-center">

                <div class="p-6 text-black font-extrabold text-3xl col-span-1">
                    Lorem ipsum dolor sit amet consectetur adipiscing.
                    <p class="mt-4 text-base text-gray-400">Lorem ipsum dolor sit amet consectetur adipiscing elit massa consectetur in molestie augue sed sed augue nibh et quis nibh faucibus sem non
                                                            cursus lectus nibh volutpat aliquam sed est nibh adipiscing hendrerit rhoncus, sed dolor tortor pellentesque quis molestie volutpat volutpat
                                                            euismod sit non sit sed.</p><br>
                </div>

                <div class="p-6 col-span-1 flex justify-end relative"> <!-- Voeg 'relative' toe aan de container om absolute positionering mogelijk te maken -->
                    <div>
                        <img src="img/HomePage1.png" class="rounded-t-3xl rounded-b-3xl max-w-lg h-160 relative z-0"> <!-- Voeg 'relative' en 'z-10' toe voor z-index om de stackvolgorde te beheren -->
                    </div>
                    <div class="absolute bottom-0 left-0">
                        <img src="img/HomePage2.png" class="rounded-t-3xl rounded-b-3xl max-w-80 h-160 -mb-8 ml-8"> <!-- Voeg negatieve marges toe om de overlap te creëren -->
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr class="my-10 border-gray-700 w-4/5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-black">
            <div>
                <h2 class="text-xl font-bold mb-4">Pages</h2>
                <ul>
                    <li><a href="/" class="text-gray-400 hover:text-black">Home</a></li>
                    <li><a href="dashboard" class="text-gray-400 hover:text-black">Dashboard</a></li>
                    <li><a href="team" class="text-gray-400 hover:text-black">Teams</a></li>
                </ul>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-4">Contact Us</h2>
                <ul>
                    <li><a href="#" class="text-gray-400 hover:text-black">ContactUs@Example.com</a></li>
                    <li><a href="tel:061234567890" class="text-gray-400 hover:text-black">06-1234567890</a></li>
                </ul>
            </div>
            <div class="flex items-center justify-center">
                <img src="/img/VoetbalLogo.png" alt="Description of your image" class="w-44 h-44">
            </div>
        </div>
    </div>

    <br>
</x-app-layout>
