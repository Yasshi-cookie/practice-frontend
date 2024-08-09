export default class LeafletMap {
    /**
     * @type {number} - 地図の緯度
     */
    lat;

    /**
     * @type {number} - 地図の経度
     */
    lng;

    /**
     * @type {number} - 地図のズームレベル
     */
    zoom;

    /**
     * @type {L.Map} - Leafletのマップオブジェクト
     */
    map;

    /**
     * @type {L.Marker} - Leafletのマーカーオブジェクト
     */
    marker;

    /**
     * コンストラクタ
     * @param {string} mapId - 地図のDOM要素のID
     */
    constructor(mapId) {
        const mapDom = document.getElementById(mapId);

        if (!mapDom) {
            throw new Error('地図のDOM要素が見つかりません');
        }

        this.lat = parseFloat(mapDom.dataset.lat);
        this.lng = parseFloat(mapDom.dataset.lng);
        this.zoom = parseInt(mapDom.dataset.zoom, 10);

        // マップの初期化
        this.map = L.map(mapDom).setView([this.lat, this.lng], this.zoom);

        // タイルレイヤーとマーカーの初期設定
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(this.map);

        this.marker = L.marker([this.lat, this.lng]).addTo(this.map);
        this.marker.bindPopup("Hello World").openPopup();
    }

    /**
     * 地図のズームレベルを設定する
     * @param {number} zoom - 新しいズームレベル
     */
    setZoom(zoom) {
        this.map.setZoom(zoom);
    }

    /**
     * 地図の中心座標を設定する
     * @param {number} lat - 新しい緯度
     * @param {number} lng - 新しい経度
     */
    setCenter(lat, lng) {
        this.map.panTo([lat, lng]);
    }

    /**
     * マーカーの位置を更新する
     * @param {number} lat - 新しい緯度
     * @param {number} lng - 新しい経度
     */
    updateMarker(lat, lng) {
        this.map.removeLayer(this.marker);
        this.marker = L.marker([lat, lng]).addTo(this.map);
        this.marker.bindPopup("Hello World").openPopup();
    }
}
