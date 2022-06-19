<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
      integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
      crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div
        x-data="{
            state: $wire.entangle('{{ $getStatePath() }}'),
            searchResults: [],
            search: '',
            map: null,
            center: {{ json_encode($center()) }},
            marker: null,
        }"
        x-init="
            state.lat = state ? state.lat : '';
            state.lng = state ? state.lng : '';

            map = L.map($refs.map, {}).setView([center.lat, center.lng], 4);

            if (state.lat && state.lng) {
              marker = new L.marker({lat: state.lat, lng: state.lng}, {draggable: true}).addTo(map);
              marker.on('click', function () {
                map.removeLayer(marker);
              });
              marker.on('dragend', function (event) {
                const position = event.target.getLatLng();
                state.lng = position.lat;
                state.lng = position.lng;
              });
            }

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap',
            }).addTo(map);

            map.on('click', function(e) {
              if (marker) {
                map.removeLayer(marker);
              }

              state.lat = e.latlng.lat;
              state.lng = e.latlng.lng;
              marker = new L.marker(e.latlng, {draggable: true}).addTo(map);
              marker.on('click', function () {
                map.removeLayer(marker);
              });
              marker.on('dragend', function (event) {
                const position = event.target.getLatLng();
                state.lng = position.lat;
                state.lng = position.lng;
              });
            });
        "
        wire:ignore
    >
        <div
            x-ref="map"
            id="map"
            style="height: 500px"
            class="rounded-lg"
        ></div>

        <div class="mt-2">
            <input type="text"
                   placeholder="{{ __('Search') }}"
                   class="block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 dark:bg-gray-700 dark:text-white border-gray-300 dark:border-gray-600"
                   x-model="search"
                   @keydown.enter.prevent="
                        fetch('https://nominatim.openstreetmap.org/search?format=json&limit=5&q=' + search)
                            .then(res => res.json())
                            .then(res => searchResults = res)
                  "
            />

            <ul class="bg-white rounded-lg">
                <template x-for="searchResult in searchResults">
                    <li x-text="searchResult.display_name"
                        x-on:click="
                            searchResults = [];
                            search = searchResult.display_name;
                            state.lat = searchResult.lat;
                            state.lng = searchResult.lon;
                            map.setView([searchResult.lat, searchResult.lon], 15);
                        "
                        class="p-2 cursor-pointer hover:bg-gray-100"
                    ></li>
                </template>
            </ul>

            <div class="grid grid-cols-2 gap-10">
                <input type="text"
                       placeholder="{{ __('Lat') }}"
                       class="block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 dark:bg-gray-700 dark:text-white border-gray-300 dark:border-gray-600"
                       x-model="state.lat"
                />

                <input type="text"
                       placeholder="{{ __('Lng') }}"
                       class="block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 dark:bg-gray-700 dark:text-white border-gray-300 dark:border-gray-600"
                       x-model="state.lng"
                />
            </div>
        </div>
    </div>
</x-forms::field-wrapper>
