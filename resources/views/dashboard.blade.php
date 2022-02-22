<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @auth
                    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-4 flex items-center justify-between flex-wrap sm:flex-no-wrap">
                            <div class="ml-4 mt-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    {{ __('Welcome back, ') }}{{ Auth::user()->name }}
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm leading-5 text-gray-500">
                                        {{ __('You have successfully logged in.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
</x-app-layout>
