<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('URL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('urlshortner.shorten') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="destination_url" :value="__('destination_url')" />
            <x-text-input id="destination_url" class="block mt-1 w-full" type="url" name="destination_url" :value="old('destination_url')" autofocus/>
            <x-input-error :messages="$errors->get('destination_url')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> -->

            <x-primary-button class="ml-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>


    <div class="container mx-auto p-6">
    <table class="min-w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">View</th>
            </tr>
        </thead>
        <tbody>

        @foreach($urls as $url)
            <tr class="hover:bg-gray-100">
                <td class="px-6 py-4 whitespace-no-wrap">
                    {{$url->destination}}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    <a href="{{route('redirect',['url' => $url->slug])}}" target="_blank">
                    {{$url->slug}}
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                {{$url->view}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

        </div>
    </div>
</x-app-layout>
