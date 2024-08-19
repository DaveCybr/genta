@extends('index')

@section('style-page')
    <!-- Bootstrap CSS File -->
    <link href="{{ asset('adminnew/lib2/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminnew/lib2/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminnew/lib2/ionicons/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminnew/lib2/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('leaflet-package/leaflet/dist/leaflet.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />


    <link rel="stylesheet" href="{{ asset('adminnew/css/siteplan.css') }}">
@endsection
@section('content')
    <div class="click-closed"></div>

    <!--/ Nav End /-->

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ $product->nama_villa }}</h1>
                        <span class="color-text-a">Canggu Berawa, 80363 Bali</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="property-grid.html">Product</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $product->nama_villa }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Property Single Star /-->
    <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="property-single-carousel" style="max-height: 80vh"
                        class="owl-carousel owl-arrow gallery-property">
                        <div class="carousel-item-b" style="max-height: 80vh">
                            <img src="{{ asset('adminnew/img/Asih/Fasad-Siang.png') }}" alt="">
                        </div>
                        <div class="carousel-item-b" style="max-height: 80vh">
                            <img src="{{ asset('adminnew/img/Asih/Toilet1.png') }}" alt="">
                        </div>
                        <div class="carousel-item-b" style="max-height: 80vh">
                            <img src="{{ asset('adminnew/img/Asih/Living.png') }}" alt="">
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="property-summary">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d ">
                                            <h3 class="title-d">Quick Summary</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list">
                                        <li class="d-flex justify-content-between">
                                            <strong>Villa ID:</strong>
                                            <span>{{ $product->id_villa }} </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Location:</strong>
                                            <span>Canggu, Bali</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Villa Type:</strong>
                                            <span>{{ $product->kategori }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Status:</strong>
                                            <span>{{ $product->status }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Area:</strong>
                                            <span>{{ $product->luas }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Beds:</strong>
                                            <span>{{ $product->jml_kmr_tidur }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Baths:</strong>
                                            <span>{{ $product->jml_kmr_mandi }} </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Garage:</strong>
                                            <span>1</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 section-md-t3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Villa Description</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="property-description">
                                <p class="description color-text-a">
                                    {{ $product->uraian }}
                                </p>
                                <p class="description color-text-a no-margin">
                                    The villa features four luxurious bedrooms, each with an en-suite bathroom, and ample
                                    parking space. Every corner of this villa offers beautiful views and maximum comfort,
                                    making it the perfect place for an unforgettable holiday in Bali.
                                </p>
                            </div>
                            <div class="row section-t3">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Amenities</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-list color-text-a">
                                <ul class="list-a no-margin">
                                    <li>Balcony</li>
                                    <li>25-Year Leasehold</li>
                                    <li>Private Pool</li>
                                    <li>Parking</li>
                                    <li>Fully Furnished</li>
                                    <li>Two-Story Building</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video"
                                    role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans"
                                    role="tab" aria-controls="pills-plans" aria-selected="false">Siteplan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map"
                                    role="tab" aria-controls="pills-map" aria-selected="false">Location</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-video" role="tabpanel"
                                aria-labelledby="pills-video-tab">
                                <iframe src="{{ asset('adminnew/img/genta_v.mp4') }}" width="100%" height="460"
                                    frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                            <div class="tab-pane fade" id="pills-plans" role="tabpanel"
                                aria-labelledby="pills-plans-tab">
                                <div id="map" style="height: 460px; width:100%;max-width: none;max-height: none;">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1828.432901719649!2d115.14980810226294!3d-8.645387999305282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOMKwMzgnNDMuNCJTIDExNcKwMDknMDEuOSJF!5e1!3m2!1sen!2sid!4v1724000590354!5m2!1sen!2sid"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row section-t3">
                            <div class="col-sm-12">
                                <div class="title-box-d">
                                    <h3 class="title-d">Contact Agent</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <img src="{{ asset('adminnew/img/agent-4.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="property-agent">
                                    <h4 class="title-agent">Admin Genta</h4>
                                    <p class="color-text-a">
                                        Welcome! I am Admin Genta, here to assist you with all your property needs. With
                                        years of experience in the industry, I offer professional and knowledgeable
                                        services. Feel free to contact me for more information or if you need help buying or
                                        selling property.
                                    </p>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between">
                                            <strong>Phone:</strong>
                                            <span class="color-text-a">+62 851-4248-6430</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Email:</strong>
                                            <span class="color-text-a">genta@gmail.com</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Addres:</strong>
                                            <span class="color-text-a">Jl. Krisna 1, Canggu - Bali</span>
                                        </li>
                                    </ul>
                                    <div class="socials-a">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="https://www.instagram.com/Genta.Villa/">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="property-contact">
                                    <form class="form-a">
                                        <div class="row">
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-a" id="inputName"
                                                        placeholder="Name *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <input type="email"
                                                        class="form-control form-control-lg form-control-a"
                                                        id="inputEmail1" placeholder="Email *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45"
                                                        rows="8" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-a">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <!--/ Property Single End /-->
@endsection
@section('script-page')
    <!-- JavaScript Libraries -->

    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBk3G1CxJJW3mGVsNAeAlIpkHOckzhuHmA"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="{{ asset('leaflet-package/leaflet-draw/dist/leaflet.draw.js') }}"></script>
    <script src="{{ asset('leaflet-package/leaflet-routing-machine/dist/leaflet-routing-machine.js') }}"></script>
    <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
    <script>
        var mapopts = {
            zoomSnap: 0.1,
        };
        var map = L.map("map", mapopts).setView([-8.645222, 115.150243], 19.5);

        var streetmap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 24,
        });

        var hybridMutant = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: "hybrid",
        }).addTo(map);

        // Data polygon dari PHP ke JavaScript
        var polygons = {{ $product->polygon }};

        // Looping melalui data polygon
        polygons.forEach(function(row, index) {
            if (row.polygon) {
                var polygonCoords = JSON.parse(row.polygon);

                if (polygonCoords) {
                    // Buat lapisan polygon dari data polygon yang sudah disimpan
                    var polygonLayer = L.polygon(polygonCoords, {
                        color: 'blue'
                    }).addTo(map);

                }
            } else {
                console.error("Null polygon data for index", index);
            }
        });

        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
            if (e.target.id === 'pills-plans-tab') {
                map.invalidateSize(); // Ini akan memaksa Leaflet untuk merender peta dengan benar
            }
        });
    </script>
@endsection
