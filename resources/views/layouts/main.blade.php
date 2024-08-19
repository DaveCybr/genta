@extends('index')
@section('content')
    <div class="intro intro-carousel">
        <div id="carousel" class="owl-carousel owl-theme">
            <div class="carousel-item-a intro-item bg-image"
                style="background-image: url('{{ asset('adminnew/img/Asih/Fasad-Siang.png') }}');">
                <div class="overlay overlay-a"></div>
                <div class="intro-content display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="intro-body">
                                        <p class="intro-title-top">
                                            Canggu, Bali <br />
                                            80571
                                        </p>
                                        <h1 class="intro-title mb-4">
                                            <span class="color-b">A01 </span> Astika <br />
                                            Serenity
                                        </h1>
                                        <p class="intro-subtitle intro-price">
                                            <a href="{{ url('siteplan') }}"
                                                class="btn btn-custom-large btn-outline-primary text-white">
                                                VIEW DETAIL
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item-a intro-item bg-image"
                style="background-image: url('{{ asset('adminnew/img/Asih/Fasad-Malam.png') }}');">
                <div class="overlay overlay-a"></div>
                <div class="intro-content display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="intro-body">
                                        <p class="intro-title-top">
                                            Canggu, Bali <br />
                                            68168
                                        </p>
                                        <h1 class="intro-title mb-4">
                                            <span class="color-b">A02 </span> Asih <br />
                                            Tirta Nirwana
                                        </h1>
                                        <p class="intro-subtitle intro-price">
                                            <a href="{{ url('siteplan') }}"
                                                class="btn btn-custom-large btn-outline-primary text-white">
                                                VIEW DETAIL
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item-a intro-item bg-image"
                style="background-image: url('{{ asset('adminnew/img/Asih/Fasad.png') }}');">
                <div class="overlay overlay-a"></div>
                <div class="intro-content display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="intro-body">
                                        <p class="intro-title-top">
                                            Canggu, Bali <br />
                                            78345
                                        </p>
                                        <h1 class="intro-title mb-4">
                                            <span class="color-b">A03 </span> Ayu <br />
                                            Candra Oasis
                                        </h1>
                                        <p class="intro-subtitle intro-price">
                                            <a href="{{ url('siteplan') }}"
                                                class="btn btn-custom-large btn-outline-primary text-white">
                                                VIEW DETAIL
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <!-- <img class="img-fluid w-100" src="img/carousel-5.png" /> -->
                        <video id="video" controls="controls" preload="none" class="w-100 img-fluid">
                            <source id="mp4" src="{{ asset('files/videos/' . $about->video) }}" type="video/mp4" />
                        </video>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">{{ $about->judul }}</h1>
                    <p class="mb-4">
                        {{ $about->paragraf }}
                    </p>
                    <p>
                        <i class="fa fa-check text-primary me-3"></i>{{ $about->daftar_poin1 }}
                    </p>
                    <p>
                        <i class="fa fa-check text-primary me-3"></i>{{ $about->daftar_poin2 }}
                    </p>
                    <p>
                        <i class="fa fa-check text-primary me-3"></i>{{ $about->daftar_poin3 }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Siteplan Start -->
    <div class="container-xxl py-5" id="siteplan">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 text-end wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">{{ $about2->judul }}</h1>
                    <p class="mb-4">
                        {{ $about2->deskripsi }} </p>
                    <p>
                        <i class="fa fa-check text-primary me-3"></i>{{ $about2->daftar_poin1 }}
                    </p>
                    <p>
                        <i class="fa fa-check text-primary me-3"></i>{{ $about2->daftar_poin2 }}
                    </p>
                    <p>
                        <i class="fa fa-check text-primary me-3"></i>{{ $about2->daftar_poin3 }}
                    </p>
                    <a href="{{ url('siteplan') }}" class="btn btn-primary py-3 px-5 animated fadeIn">Details</a>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid" src="{{ asset('adminnew/img/siteplan-2.png') }}"
                            style="width: 500px; height: 400px" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About End -->

    <!-- Call to Action Start -->
    <div class="container-xxl py-5" id="contact">
        <div class="container">
            <div class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, 0.3)">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded w-100" src="{{ asset('adminnew/img/call-to-action.jpg') }}"
                                alt="" />
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="mb-4">
                                <h1 class="mb-3">{{ $contact->judul ?? 'Ini Judul' }} </h1>
                                <p>
                                    {{ $contact->deskripsi ?? 'Ini Deskripsi' }}
                                </p>
                            </div>
                            <a href="" class="btn btn-primary py-3 px-4 me-2"><i
                                    class="fa-lg fa fa-whatsapp me-1"></i>Whatsapp</a>
                            <a href="https://forms.gle/c9trfpimMfBVziwx6" class="btn btn-dark py-3 px-4"><i
                                    class="fa fa-calendar-alt me-2"></i>Make Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->
    <!-- Gallery Start -->
    <div class="container-xxl py-5" id="gallery">
        <div class="container">
            <div class="text-center mx-auto mb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                <h1 class="mb-3">{{ $gallery->judul ?? 'Ini Judul' }}</h1>
                <p>
                    {{ $gallery->paragraf ?? 'Ini Paragraf' }}
                </p>
            </div>
            <!-- Gallery -->
            <div class="slider-wrapper">
                <ul class="image-list" style="padding: 0">
                    <img class="image-item" src="{{ asset('adminnew/img/carousel-3.png') }}" alt="img-3" />
                    <img class="image-item" src="{{ asset('adminnew/img/carousel-4.png') }}" alt="img-4" />
                    <img class="image-item" src="{{ asset('adminnew/img/carousel-5.png') }}" alt="img-5" />
                    <img class="image-item" src="{{ asset('adminnew/img/carousel-6.png') }}" alt="img-6" />
                    <img class="image-item" src="{{ asset('adminnew/img/carousel-7.png') }}" alt="img-7" />

                </ul>
            </div>
            <div class="slider-scrollbar">
                <div class="scrollbar-track">
                    <div class="scrollbar-thumb"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery end -->
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                <h1 class="mb-3">{{ $property->judul ?? 'Ini Judul' }}</h1>
                <p>
                    {{ $property->paragraf ?? 'Ini Paragraf' }}
                </p>
            </div>
            <div class="row g-4">
                @foreach ($detail as $row)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ asset('files/' . $row->foto) }}" alt="" />
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href="http://{{ $row->facebook }}"><i
                                            class="fab fa-facebook-f"></i></a>
                                    {{-- <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a> --}}
                                    <a class="btn btn-square mx-1" href="http://{{ $row->instagram }}"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">{{ $row->nama }}</h5>
                                <small>{{ $row->jabatan }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5" id="testimonial">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                <h1 class="mb-3">{{$testimoni->judul}}</h1>
                <p>
                    {{$testimoni->paragraf}}
                </p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($client as $row)
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>
                            {{$row->ulasan}}
                        </p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded"
                                src="{{ asset('files/' . $row->gambar) }}" style="width: 45px; height: 45px" />
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">{{$row->nama}}</h6>
                                <small>{{$row->profesi}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
