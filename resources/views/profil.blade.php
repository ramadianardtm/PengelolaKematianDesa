@extends('master.master-layout')

@section('title')
Profile Anda
@endsection

@section('header')
@endsection

@section('navbar')
@parent
@endsection

@section('menunya')
Form Pendaftaran
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
<div class="row">
    <form action="/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="userid" value="{{ auth()->user()->id_user}}">
        <div class="col-xl-12">
            <div class="custom-accordion">
                <div class="card">
                    <a href="#personal-data" class="text-dark" data-bs-toggle="collapse">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3"> <i class="uil uil-receipt text-primary h2"></i>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Ubah Akun</h5>
                                </div>
                                <div class="flex-shrink-0"> <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i> </div>
                            </div>
                        </div>
                    </a>
                    <div id="personal-data" class="collapse show">
                        <div class="p-5 border-top">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-nisn">Nama</label>
                                        <input type="text" class="form-control" id="personal-data-nisn" name="name" placeholder="Masukkan nama anda" value="{{$user->name}}">
                                        @error('name')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-name">Email</label>
                                        <input type="email" class="form-control" id="personal-data-name" name="email" placeholder="Masukkan email anda" value="{{$user->email}}">

                                        @error('email')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <label class="form-label" for="personal-data-nik">Password</label>
                                        <input type="password" class="form-control" id="basicpill" name="password" placeholder="Masukkan password">
                                        @error('password')
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col">
                        <div class="text-end mt-2 mt-sm-0">
                            <button type="submit" name="add" class="btn btn-primary">Ubah Akun</button>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end row -->
@endsection

@section('footer')
@endsection