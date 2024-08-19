@extends('admin.main')

@section('title', 'Data Villa')

@section('style-vendor')
    <link rel="stylesheet" href="{{ asset('leaflet-package/leaflet/dist/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('leaflet-package/leaflet-draw/dist/leaflet.draw.css') }}">
    <link rel="stylesheet" href="{{ asset('leaflet-package/leaflet-routing-machine/dist/leaflet-routing-machine.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-fullscreen/dist/leaflet.fullscreen.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.locatecontrol@0.73.0/dist/L.Control.Locate.min.css" />

    <style>
        .custom-vertex-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: white;
            /* Warna sesuai dengan shapeOptions Anda */
            border: 2px solid grey;
        }

        .leaflet-top,
        .leaflet-left {
            transform: translate3d (0, 0, 0);
            will-change: transform;
        }

        .gm-style-cc {
            display: none;
        }

        .leaflet-control-attribution {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">MAP VILLA {{ $villa->nama_villa }}</h4>
        <form id="form-edit" method="post">
            @csrf
            <div class="mb-3 d-flex justify-content-end">
                <a class="btn btn-secondary" href="/datavilla">Kembali</a>
                <button type="submit" id="update" class="btn btn-success ms-2">Update changes</button>
            </div>
            <div id="error-edit" class="alert alert-danger border" role="alert" style="display: none">
            </div>
            <div id="success-edit" class="alert alert-success border" role="alert" style="display: none">
            </div>
            <input type="hidden" id="editVillaId" value="{{ $villa->id_villa }}" name="id_villa">
            <div class="input-group mb-3">
                <input type="text" name="luas" class="form-control" value="{{ $villa->luas }}" id="luaspolygon" />
                <span class="input-group-text">m²</span>
            </div>
            <div id="map" class="mb-3" style="height: 500px;"></div>
            <input required type="hidden" class="form-control" value="{{ $villa->polygon }}" name="polygon"
                id="gambar_poliygon_peta">
        </form>
    </div>
@endsection

@section('script-page')
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBk3G1CxJJW3mGVsNAeAlIpkHOckzhuHmA"></script>
    <script src="{{ asset('leaflet-package/leaflet/dist/leaflet.js') }}"></script>
    <script src="{{ asset('leaflet-package/leaflet-draw/dist/leaflet.draw.js') }}"></script>
    <script src="{{ asset('leaflet-package/leaflet-routing-machine/dist/leaflet-routing-machine.js') }}"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://unpkg.com/leaflet-fullscreen/dist/Leaflet.fullscreen.min.js"></script>
    <script src="https://unpkg.com/leaflet.locatecontrol@0.73.0/dist/L.Control.Locate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Turf.js/3.6.3/turf.min.js"></script>
    <script>
        $(document).ready(function() {

            var luasField = $('#luaspolygon');
            var luasValue = luasField.val();
            luasField.val(luasValue.replace(' m²', ''));

            $('#form-edit').submit(function(e) {
                e.preventDefault();
                $('#update').html('Updating..');
                var formData = new FormData(this);
                var villaId = $('#editVillaId').val();
                var alert = document.getElementById("success");

                $.ajax({
                    url: "{{ url('mapvilla/updatemap') }}/" + villaId,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 'success') {
                            $('#update').html('Update');
                            setTimeout(() => {
                                window.location.href = "{{ route('datavilla') }}";
                            }, 1000);
                            $('#success-edit').text("Polygon berhasil disimpan").fadeIn().delay(
                                1000).fadeOut();
                            // Update baris tabel yang ada
                        } else {
                            $('#update').html('Update');
                            $('#error-edit').text("ada kesalahan").fadeIn().delay(1000)
                                .fadeOut();
                        }
                    },
                    error: function(xhr) {
                        var error = JSON.parse(xhr.responseText);
                        $('#error-edit').text(error.error).fadeIn().delay(2000).fadeOut();
                        $('#update').html('Update');
                    }
                });
            });
        });
    </script>
    <script>
        var map = L.map('map').setView([-8.645222, 115.150243], 19);

        var savedPolygon = {!! $villa->polygon ?? 'null' !!}; // Muat data polygon yang sudah disimpan

        if (savedPolygon) {
            // Buat lapisan polygon dari data polygon yang sudah disimpan
            var polygonLayer = L.polygon(savedPolygon, {
                color: 'blue'
            }).addTo(map);
        }

        var streetmap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 24,
        });

        var roadMutant = L.gridLayer
            .googleMutant({
                maxZoom: 24,
                type: "roadmap",
            });

        var hybridMutant = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: "hybrid",
        }).addTo(map);

        var grid = L.gridLayer({
            attribution: "Debug tilecoord grid",
        });

        grid.createTile = function(coords) {
            var tile = L.DomUtil.create("div", "tile-coords");
            tile.style.border = "1px solid black";
            tile.style.lineHeight = "256px";
            tile.style.textAlign = "center";
            tile.style.fontSize = "20px";
            tile.innerHTML = [coords.x, coords.y, coords.z].join(", ");

            return tile;
        };

        // Add Bhumi Persil layer as an overlay with checkbox control
        L.control.layers({
            Roadmap: roadMutant,
            Hybrid: hybridMutant,
            Street: streetmap,
        }, {
            "Tilecoord grid": grid,
        }, {
            collapsed: false,
        }).addTo(map);

        var geocoder = L.Control.Geocoder.nominatim();
        var control = L.Control.geocoder({
            placeholder: "Cari lokasi...",
            geocoder: geocoder
        }).addTo(map);

        var customIcon = new L.DivIcon({
            className: "custom-vertex-icon",
            iconSize: [10, 10],
            iconAnchor: [5, 5],
        });
        // Mengaktifkan fungsi menggambar poligon
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);
        var drawControl = new L.Control.Draw({
            draw: {
                polygon: {
                    icon: customIcon, // Menambahkan customIcon ke konfigurasi polygon
                },

                polyline: false,
                circlemarker: false,
                rectangle: false,
                circle: false,
                marker: false,
            },
            edit: {
                featureGroup: drawnItems,
            },
        });

        map.addControl(drawControl);

        map.on("draw:created", function(e) {
            var layer = e.layer;
            var popupContent = "Your polygon is done!";
            drawnItems.addLayer(layer);
            layer
                .bindPopup(popupContent, {
                    keepInView: true,
                    closeButton: true,
                    autoClose: false,
                    autoPan: false,
                })
                .openPopup();

            // Check if it's a polygon layer
            if (layer instanceof L.Polygon) {
                calculateAndFillArea(layer);
            }
        });

        function calculateAndFillArea(layer) {
            if (layer instanceof L.Polygon) {
                // Mendapatkan data koordinat poligon
                var latlngs = layer.getLatLngs()[0];
                var coordinates = [];
                for (var i = 0; i < latlngs.length; i++) {
                    coordinates.push([latlngs[i].lat, latlngs[i].lng]);
                }

                // Pastikan ada minimal 4 titik koordinat untuk membentuk poligon
                if (coordinates.length < 4) {
                    alert("The polygon must have at least 4 points.");
                    return;
                }

                // Tambahkan titik pertama kembali ke array koordinat sebagai titik terakhir
                coordinates.push([latlngs[0].lat, latlngs[0].lng]);

                // Mengisi elemen "polygon" dengan data koordinat poligon dalam format JSON
                document.getElementById("gambar_poliygon_peta").value = JSON.stringify([coordinates]);

                var turfPolygon = turf.polygon([coordinates]);
                var area = turf.area(turfPolygon);

                // Mengisi nilai pada elemen "luas" input dengan hasil perhitungan
                var formattedArea = area.toFixed(2);
                document.getElementById("luaspolygon").value = formattedArea;



            }
        }
    </script>
@endsection
