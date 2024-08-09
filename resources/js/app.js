import './bootstrap';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import LeafletMap from './LeafletMap';

window.Alpine = Alpine;

Livewire.start();

const map = new LeafletMap('map');

Livewire.on('onChangedZoom', (event) => {
    console.log('onChangedZoom', event.zoom);
    map.setZoom(event.zoom);
});

Livewire.on('onChangedCenterAndMarker', (event) => {
    console.log('onChangedCenterAndMarker', event.lat, event.lng);
    map.updateMarker(event.lat, event.lng);
    map.setCenter(event.lat, event.lng);
});
