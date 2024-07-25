<div>
    <form>
        <label for="title">Title</label>

        <input type="text" id="title" wire:model.live='title'>

        Current title: {{ $title }}
    </form>
</div>
