<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="background-image: url('https://images.pexels.com/photos/2472854/pexels-photo-2472854.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); background-size: cover; position: relative;">
                    <div class="absolute inset-0 bg-black opacity-25"></div>
                    <div class="relative">
                        <div class="flex h-80 items-center justify-center">
                            <div class="text-center">
                                <h1 class="text-4xl font-bold mb-4"> {{ __("Welcome to Chirper") }}</h1>
                                <p class="text-xl mb-4">write your ideas</p>
                                <a href="{{ route('chirps') }}" wire:navigate>
                                    <x-primary-button>
                                        Start Now
                                    </x-primary-button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
