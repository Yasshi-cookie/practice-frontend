<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Map extends Component
{
    public $zoom = 8;
    public $lat = 35.681236;
    public $lng = 139.767125;

    public function render()
    {
        return view('livewire.map');
    }

    public function update(Request $request): void
    {
        $this->lat = $request->lat;
        $this->lng = $request->lng;
        $this->zoom = $request->zoom;
    }

    public function updatedZoom(): void
    {
        $this->dispatch('onChangedZoom', zoom: $this->zoom);
    }

    public function updatedLat(): void
    {
        $this->dispatch('onChangedCenterAndMarker', lat: $this->lat, lng: $this->lng);
    }

    public function updatedLng(): void
    {
        $this->dispatch('onChangedCenterAndMarker', lat: $this->lat, lng: $this->lng);
    }

    public function exception($e, $stopPropagation) {
        if($e instanceof NotFoundException) {
            $stopPropagation();
        }
    }
}
