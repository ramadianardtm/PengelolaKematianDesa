@extends('master.master-layout')

@section('title')
Beranda
@endsection

@section('header')
@endsection

@section('navbar')
@parent
@endsection


@section('menunya')
Beranda
@endsection

@section('menu')
<ul class="metismenu text-center" id="menu">
    <li><a href="index">
            <div class="row">
                <div class="col-sm-1">
                    <i class="fas fa-home"></i>
                </div>
                <div class="col-sm-2">
                    <span class="nav-text">Beranda</span>
                </div>
            </div>
        </a>
    </li>
    @if (\Illuminate\Support\Facades\Auth::check())
    @if (\Illuminate\Support\Facades\Auth::user()->role == 'admin')
    <li><a href="/data-pendaftaran">
            <div class="row">
                <div class="col-sm-1">
                    <i class="fa fa-book"></i>
                </div>
                <div class="col-sm-2">
                    <span class="nav-text">Data Pendaftar</span>
                </div>
            </div>
        </a>
    </li>
    <li><a href="profile" aria-expanded="false">
            <div class="row">
                <div class="col-sm-1">
                    <i class="fa fa-user"></i>
                </div>
                <div class="col-sm-2">
                    <span class="nav-text">Profile</span>
                </div>
            </div>
        </a>
    </li>
    @else
    <li><a href="pendaftaran" aria-expanded="false">
            <div class="row">
                <div class="col-sm-1">
                    <i class="fa fa-database"></i>
                </div>
                <div class="col-sm-2">
                    <span class="nav-text">Pendaftaran</span>
                </div>
            </div>
        </a>
    </li>
    <li><a href="profile" aria-expanded="false">
            <div class="row">
                <div class="col-sm-1">
                    <i class="fa fa-user"></i>
                </div>
                <div class="col-sm-2">
                    <span class="nav-text">Profile</span>
                </div>
            </div>
        </a>
    </li>
    @endif

    @endif
    <!--<li><a href="#" aria-expanded="false">
                    <i class="fa fa-download"></i>
                    <span class="nav-text">Pusat Unduhan</span>
                </a>
            </li>-->
</ul>

@endsection

@section('content')
<!--Buat Admin-->
@if (\Illuminate\Support\Facades\Auth::check())
@if (\Illuminate\Support\Facades\Auth::user()->role == 'admin')
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card tryal-gradient">
                            <div class="card-body tryal row">
                                <div class="col-xl-7 col-sm-6">
                                    <h2>Selamat Datang,
                                        {{$user->name}}
                                    </h2>
                                    <span>Terus tetap semangat</span>
                                    <a href="/data-pendaftaran" class="btn btn-rounded  fs-18 font-w500">Lihat
                                        pendaftar</a>
                                </div>
                                <div class="col-xl-5 col-sm-6">
                                    <img src="{{ asset('sipenmaru/images/chart.png') }}" alt="" class="sd-shape">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="items">
                                            <span class="fs-14 font-w400">Data yang baru masuk dan telah
                                                diverifikasi oleh admin akan dapat melanjutkan kegiatan
                                                penerimaan</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 redial col-sm-6">
                                        <!-- <div id="redial"></div>
                                        <span class="text-center d-block fs-18 font-w600">Sedang berlangsung
                                            <small class="text-success"><span id="progressnya">AAAAbbb</span>
                                                %</small></span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex px-4 justify-content-between">
                                        <div>
                                            <h4 class="fs-18 font-w600 mb-4 text-nowrap">Jumlah Kematian
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <h2 class="fs-32 font-w700 mb-4">{{ $jumlahpendaftar }}</h2>
                                                <!--<span class="d-block ms-4">
                                                                        <svg width="21" height="11" viewbox="0 0 21 11" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M1.49217 11C0.590508 11 0.149368 9.9006 0.800944 9.27736L9.80878 0.66117C10.1954 0.29136 10.8046 0.291359 11.1912 0.661169L20.1991 9.27736C20.8506 9.9006 20.4095 11 19.5078 11H1.49217Z"
                                                                                fill="#09BD3C"></path>
                                                                        </svg>
                                                                        <small
                                                                            class="d-block fs-16 font-w400 text-success">+0,5%</small>
                                                                    </span>-->
                                            </div>

                                            <span class="fs-18 font-w400 mb-4 text-nowrap">
                                                Kematian Saat Ini</span>
                                        </div>

                                        <div id="columnChart">

                                            <span id="" style="color:transparent" aria-disabled>ABC</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <!-- <div class="card">
                                    <div class="card-body px-4 pb-0">
                                        <h4 class="fs-18 font-w600 mb-5 text-nowrap">Hasil Seleksi Pendaftar</h4>
                                        <div class="progress default-progress">

                                            <div class="progress-bar bg-gradient1 progress-animated" style="height:10px;" role="progressbar">
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                            <span>yang telah diberi <br> pengumuman, dari</span>
                                            <h4 class="mb-0">4</h4>
                                        </div>

                                    </div>
                                </div> -->
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex px-4  justify-content-between">
                                        <div>
                                            <div class="">

                                                <h4 class="fs-32 font-w700">{{ $jumlahuser }}</h4>
                                                <span class="fs-18 font-w500 d-block">Total
                                                    Pengguna</span>
                                            </div>
                                        </div>
                                        <div id="NewCustomers"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@else
<!--Buat User-->
<div class="row page-titles" style="border-radius: 0%">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" style="color: var(--primary)"><a href="index" style="color: var(--primary)">Beranda</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Pendaftaran</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-xl-7">
        <div class="card transparent-card">
            <div class="bootstrap-carousel">
                <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('sipenmaru/images/banner (1).png') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('sipenmaru/images/banner (2).png') }}" alt="Second slide">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="row">
            <div class="card transparent-card">
                <div class="widget-stat card bg-primary" style="border-radius: 0%">
                    <div class="card-body  p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-users"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">JUMLAH WARGA SOKARAJA KULON</p>
                                <h3 class="text-white">{{$jumlahuser}}</h3>
                                <div class="progress mb-2 bg-secondary">
                                    <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                </div>
                                <small>80% Increase in 20 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: -2.7rem">
            <div class="card transparent-card">
                <div class="widget-stat card bg-warning" style="border-radius: 0%">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-user"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">WARGA YANG MENINGGAL DI SOKARAJA KULON</p>
                                <h3 class="text-white">{{$jumlahmati}}</h3>
                                <div class="progress mb-2 bg-primary">
                                    <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                </div>
                                <small>50% Increase in 25 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endif
@endif
@endsection

@section('footer')
@endsection