<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-300 border-b border-gray-200">
                    You're logged in!<br><br>
                </div>
                <div class="p-6 bg-blue-600 border-b border-gray-200">
                    <a href="{{route('addGymMember')}}">Click here to add a new gym member</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

