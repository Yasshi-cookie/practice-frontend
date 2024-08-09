<div>
    {{-- zoom、緯度経度の入力フォーム --}}
    <form wire:submit.prevent="update">
        <label for="zoom">Zoom</label>
        <input type="number" wire:model.live.debounce.500="zoom">
        @error('zoom')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="lat">Latitude</label>
        <input type="number" step="0.01" wire:model.live.debounce.500="lat">
        @error('lat')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="lng">Longitude</label>
        <input type="number" step="0.01" wire:model.live.debounce.500="lng">
        @error('lng')
            <span class="error">{{ $message }}</span>
        @enderror
    </form>

    <div wire:ignore id="map"
        data-lat="{{ $lat }}"
        data-lng="{{ $lng }}"
        data-zoom="{{ $zoom }}"
    >
    </div>

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</div>
