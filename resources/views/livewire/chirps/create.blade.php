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
        <textarea
            wire:model="message"
            placeholder="{{ __('We can hear you!') }}"
            class="block w-full border-indigo-300 focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
    </form>
</div>
