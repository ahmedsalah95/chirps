<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>

                    </div>
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
</x-app-layout>

