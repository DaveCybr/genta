var mapopts = {
	zoomSnap: 0.4,
};

var map = L.map("map", mapopts).setView([-8.1733118, 113.7009312], 18);

var roadMutant = L.gridLayer
	.googleMutant({
		maxZoom: 24,
		type: "roadmap",
	})
	.addTo(map);

var hybridMutant = L.gridLayer.googleMutant({
	maxZoom: 24,
	type: "hybrid",
});

var grid = L.gridLayer({
	attribution: "Debug tilecoord grid",
});

grid.createTile = function (coords) {
	var tile = L.DomUtil.create("div", "tile-coords");
	tile.style.border = "1px solid black";
	tile.style.lineHeight = "256px";
	tile.style.textAlign = "center";
	tile.style.fontSize = "20px";
	tile.innerHTML = [coords.x, coords.y, coords.z].join(", ");

	return tile;
};

// Adding Scale Control
L.control.scale({ position: "bottomright" }).addTo(map);

var geocoder = L.Control.Geocoder.nominatim();
if (typeof URLSearchParams !== "undefined" && location.search) {
	// parse /?geocoder=nominatim from URL
	var params = new URLSearchParams(location.search);
	var geocoderString = params.get("geocoder");
	if (geocoderString && L.Control.Geocoder[geocoderString]) {
		console.log("Using geocoder", geocoderString);
		geocoder = L.Control.Geocoder[geocoderString]();
	} else if (geocoderString) {
		console.warn("Unsupported geocoder", geocoderString);
	}
}

// Add Bhumi Persil layer as an overlay with checkbox control
L.control
	.layers(
		{
			Roadmap: roadMutant,
			Hybrid: hybridMutant,
		},
		{
			"Tilecoord grid": grid,
		},
		{
			collapsed: false,
		}
	)
	.addTo(map);

var geocoder = L.Control.Geocoder.nominatim();
var control = L.Control.geocoder({
	query: "",
	placeholder: "Search here...",
	geocoder: geocoder,
}).addTo(map);

// Add Fullscreen Control
L.control.fullscreen().addTo(map);
