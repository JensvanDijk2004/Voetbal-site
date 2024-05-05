<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Team
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Logo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Creator Id
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aanmaak Datum
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Verwijderen?
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($teams as $team)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $team->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $team->logo }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $team->creator_id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $team->created_at }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('admin.destroy', $team->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button mt-1 "> Team Verwijderen</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .button {
        --color          : #ff0000;
        padding          : 0.4em 0.7em;
        background-color : transparent;
        border-radius    : .3em;
        position         : relative;
        overflow         : hidden;
        cursor           : pointer;
        transition       : .5s;
        font-weight      : 400;
        font-size        : 17px;
        border           : 1px solid;
        font-family      : inherit;
        text-transform   : uppercase;
        color            : var(--color);
        z-index          : 1;
    }

    .button::before, .button::after {
        content          : '';
        display          : block;
        width            : 50px;
        height           : 50px;
        transform        : translate(-50%, -50%);
        position         : absolute;
        border-radius    : 50%;
        z-index          : -1;
        background-color : var(--color);
        transition       : 1s ease;
    }

    .button::before {
        top  : -1em;
        left : -1em;
    }

    .button::after {
        left : calc(100% + 1em);
        top  : calc(100% + 1em);
    }

    .button:hover::before, .button:hover::after {
        height : 410px;
        width  : 410px;
    }

    .button:hover {
        color : rgb(255, 255, 255);
    }

    .button:active {
        filter : brightness(.8);
    }
</style>
