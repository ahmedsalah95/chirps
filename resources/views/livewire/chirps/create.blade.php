<?php

use function Livewire\Volt\{state,rules};

state(['message' => '']);
rules(['message' => 'required|string|max:255']);
$store = function () {
    $validated = $this->validate();

    auth()->user()->chirps()->create($validated);

    $this->message = '';
    $this->dispatch('chirp-created');
};

?>

<div>
    <form wire:submit="store">
{{--        <textarea--}}
{{--            wire:model="message"--}}
{{--            placeholder="{{ __('We can hear you!') }}"--}}
{{--            class="block w-full border-indigo-300 focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"--}}
{{--        ></textarea>--}}

        {{--        --}}

        <div class="flex items-center px-3 py-2 rounded-lg  dark:bg-indigo-400">

               <textarea
                   wire:model="message"
                   placeholder="{{ __('We can hear you!') }}"
                   class="block w-full border-indigo-300 focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
               ></textarea>
            <button type="submit" class="inline-flex justify-center p-2 text-indigo-600 rounded-full cursor-pointer hover:bg-indigo-100">
                <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                </svg>
                <span class="sr-only">Send message</span>
            </button>
        </div>

        {{--        --}}


        <x-input-error :messages="$errors->get('message')" class="mt-2" />
{{--        <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>--}}
    </form>
</div>
