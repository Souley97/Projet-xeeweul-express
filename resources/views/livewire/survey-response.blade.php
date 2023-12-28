<!-- resources/views/livewire/survey-response.blade.php -->
<x-layout-app>
<div class="bg-white p-4 rounded shadow-md">
    <h2 class="text-lg font-bold">{{ $questions[$currentQuestionIndex]->text }}</h2>
    <ul>
        @foreach ($questions[$currentQuestionIndex]->options as $option)
            <li>
                <label>
                    <input type="radio" wire:model="userResponses.{{ $currentQuestionIndex }}" value="{{ $option->id }}">
                    {{ $option->text }}
                </label>
            </li>
        @endforeach
    </ul>
    <div class="mt-4">
        @if ($currentQuestionIndex > 0)
            <button wire:click="previousQuestion" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Précédent</button>
        @endif
        @if ($currentQuestionIndex < count($questions) - 1)
            <button wire:click="nextQuestion" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Suivant</button>
        @else
            <button wire:click="submitResponse" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Terminer le sondage</button>
        @endif
    </div>
</div>
</x-layout-app>
