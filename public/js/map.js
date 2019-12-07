class CreateMap {
    constructor(mapId, longitude, latitude, zoom, accessToken) {
        this.mapId = mapId;
        this.longitude = longitude;
        this.latitude = latitude;
        this.zoom = zoom;
        this.accessToken = accessToken;

        var mymap = L.map(`${this.mapId}`).setView([`${this.longitude}`, `${this.latitude}`], `${this.zoom}`);

        this.displayMap = function() {
            L.tileLayer("https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}", {
                attribution:
                    'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: "mapbox.streets",
                accessToken
            }).addTo(mymap);
        };

        this.addClusters = function() {
            let cluster = L.markerClusterGroup();
            let markers = L.marker([43.653226, -79.3831843]).addTo(cluster);

            mymap.addLayer(cluster);
        };

        this.disableEnableZoomMap = function() {
            // Disable Map Zoom
            mymap.scrollWheelZoom.disable();

            // Togglr if Map clicked activate ZOOM..
            mymap.on("click", function() {
                if (mymap.scrollWheelZoom.enabled()) {
                    mymap.scrollWheelZoom.disable();
                } else {
                    mymap.scrollWheelZoom.enable();
                }
            });
        };
    }
}
