<div>
    <div x-data="{ count: 0 }">
        <span x-text="count"></span>
        <button type="button" x-on:click="count++">+</button>
    </div>
    <form wire:submit='add' class="flex flex-col gap-2">
        <input type="text" wire:model='todo'>
        @error('todo')
            <span class="error">{{ $message }}</span>
        @enderror
        <span>Current todo: {{ $todo }}</span>

        <select wire:model='priority'>
            <option value="">選択してください</option>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
        @error('priority')
            <span class="error">{{ $message }}</span>
        @enderror

        @if(session()->has('error'))
            <span class="error">{{ session('error') }}</span>
        @endif

        <div wire:loading>
            Loading...
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li>{{ $todo }}</li>
        @endforeach
    </ul>
</div>
