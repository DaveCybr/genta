@extends('index')

@section('style-page')
    <style>
        /* Remove default background, borders, and shadows */
        /* Increase the width and height of the modal */
        .custom-modal-dialog {
            max-width: 80%;
            /* 80% of the viewport width */
            height: 100%;
            /* 80% of the viewport height */
            margin: auto;
            /* Center the modal horizontally and vertically */
        }

        .custom-modal-content {
            background: transparent;
            border: none;
            box-shadow: none;
            height: 100%;
            /* Make sure content takes full height */
        }

        /* Centering the content inside the modal with spacing */
        .modal-body {
            color: white;
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            text-align: center;
            height: 100%;
            /* Full height of the modal */
            /* padding: 50px 40px; */
            /* Add padding to top and bottom */
        }

        /* Customize the modal backdrop */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.95);
            /* Increased opacity for a darker backdrop */
        }
    </style>
@endsection
@section('content')
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Our Amazing Properties</h1>
                        <span class="color-text-a">Product List</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Product
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Property Grid Star /-->
    <section class="property-grid grid">
        <div class="container">
            <div class="row">
                @foreach ($product as $row)
                    <div class="col-md-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="{{ asset('adminnew/img/property-5.jpg') }}" alt=""
                                    class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="#">{{ $row->kategori }}
                                                {{-- <br /> Olive Road Two</a> --}}
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <a href="#" class="link-a btnModal" data-id="{{ $row->id_kategori }}">
                                            Click here to
                                            view detail
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around text-center">
                                            <li>
                                                <h4 class="card-info-title">Beds</h4>
                                                <span>{{ $row->jm_kt }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Baths</h4>
                                                <span>{{ $row->jm_km }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Pool</h4>
                                                <span>1</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="detailProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog custom-modal-dialog" role="document">
            <div class="modal-content custom-modal-content">
                <div class="row modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-page')
    <script>
        $(document).on("click", ".btnModal", function() {
            var id_kategori = $(this).data('id');

            $.ajax({
                url: "{{ url('product') }}/" + id_kategori + "/kategori",
                type: "GET",
                success: function(data) {
                    console.log(data);

                    // Clear previous content before appending new content
                    $(".modal-body").empty();

                    data.forEach(row => {
                        $(".modal-body").append(`
                        <div class="col-md-4">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="{{ asset('adminnew/img/property-5.jpg') }}" alt="" class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h2 class="card-title-a">
                                                <a href="#" id="namaVilla">${row.nama_villa}</a>
                                            </h2>
                                        </div>
                                        <div class="card-body-a">
                                            <a href="{{ url('product/') }}/${row.id_villa}/detail" class="link-a" id="linkHref">
                                                Click here to view detail
                                                <span class="ion-ios-arrow-forward"></span>
                                            </a>
                                        </div>
                                        <div class="card-footer-a">
                                            <ul class="card-info d-flex justify-content-around">
                                                <li>
                                                    <h4 class="card-info-title">Area</h4>
                                                    <span>${row.luas}</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Beds</h4>
                                                    <span>${row.jml_kmr_tidur}</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Baths</h4>
                                                    <span>${row.jml_kmr_mandi}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`);
                    });

                    // Show the modal
                    $("#detailProduct").modal("show");
                }
            });
        });
    </script>
@endsection
